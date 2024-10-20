<?php
session_start(); // Inicia a sessão do usuário
require 'config.php'; // Inclui o arquivo de configuração do banco de dados
require 'getProfileImage.php'; // Inclui o arquivo para obter a imagem de perfil

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location: login.php'); // Redireciona para a página de login se não estiver autenticado
    exit;
}

// Obtém o ID do usuário logado
$user_id = $_SESSION['id'];

// Busca as conversas do usuário
$query = "SELECT c.*, 
                 CASE 
                     WHEN c.user1_id = ? THEN c.user2_id 
                     ELSE c.user1_id 
                 END AS other_user_id 
          FROM chats c 
          WHERE c.user1_id = ? OR c.user2_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id, $user_id, $user_id]);
$conversations = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtém todas as conversas do usuário
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital+ | Mensagens</title>
    <link rel="stylesheet" href="chat2.css">
    <link rel="stylesheet" href="style.global.css">
    <link rel="shortcut icon" href="loginIMG/logo-transparente.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="chat-container">
        <div class="row">
            <?php require 'sidebar.php'; // Inclui a barra lateral ?>
        </div>
        <div class="chat-header">
            <div class="header-left">
                <h1><i class="fa-solid fa-message"></i> Mensagens</h1>
            </div>
        </div>

        <div class="chat-body">
            <div class="conversation-list" id="conversation-list">
                <?php if (empty($conversations)): // Verifica se não há conversas ?>
                    <p>Selecione um chat para conversar.</p> <!-- Mensagem se não houver chats -->
                <?php else: ?>
                    <?php foreach ($conversations as $conversation): // Loop pelas conversas ?>
                        <?php
                        // Obtém o ID do outro usuário na conversa
                        $other_user_id = $conversation['other_user_id'];
                        
                        // Inicializa a variável para armazenar o nome e imagem do outro usuário
                        $other_user_name = '';
                        $profile_image = null;
                        
                        // Verifica se o ID pertence a um profissional
                        $user_query = "SELECT nome, profile_image FROM profissionais WHERE id = ?";
                        $user_stmt = $pdo->prepare($user_query);
                        $user_stmt->execute([$other_user_id]);
                        $other_user = $user_stmt->fetch(PDO::FETCH_ASSOC);
                        
                        if ($other_user) {
                            // Se encontrou um profissional, pega o nome e a imagem
                            $other_user_name = $other_user['nome'];
                            $profile_image = isset($other_user['profile_image']) ? $other_user['profile_image'] : null;
                        } else {
                            // Se não encontrou um profissional, tenta buscar um paciente
                            $user_query = "SELECT nome, profile_image FROM pacientes WHERE id = ?";
                            $user_stmt = $pdo->prepare($user_query);
                            $user_stmt->execute([$other_user_id]);
                            $other_user = $user_stmt->fetch(PDO::FETCH_ASSOC);
                            
                            if ($other_user) {
                                // Se encontrou um paciente, pega o nome e a imagem
                                $other_user_name = $other_user['nome'];
                                $profile_image = isset($other_user['profile_image']) ? $other_user['profile_image'] : null;
                            }
                        }

                        // Busca a última mensagem do chat
                        $message_query = "SELECT message, sent_at FROM messages WHERE chat_id = ? ORDER BY sent_at DESC LIMIT 1";
                        $message_stmt = $pdo->prepare($message_query);
                        $message_stmt->execute([$conversation['id']]);
                        $last_message_data = $message_stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Se houver uma última mensagem, atualiza as variáveis
                        if ($last_message_data) {
                            // Formata a última mensagem para exibir apenas os primeiros 40 caracteres
                            $last_message = substr($last_message_data['message'], 0, 35) . (strlen($last_message_data['message']) > 40 ? '...' : '');

                            // Calcula a data da mensagem
                            $message_time = strtotime($last_message_data['sent_at']);
                            $today = date('Y-m-d'); // Data de hoje
                            $yesterday = date('Y-m-d', strtotime('-1 day')); // Data de ontem

                            if (date('Y-m-d', $message_time) == $today) {
                                // Mensagem enviada hoje
                                $last_message_time = "Ontem";
                            } elseif (date('Y-m-d', $message_time) == $yesterday) {
                                // Mensagem enviada ontem
                                $last_message_time = date('H:i', $message_time);
                            } else {
                                // Mensagem enviada antes de ontem
                                $last_message_time = date('d/m/Y', $message_time);
                            }
                        } else {
                            // Se não há mensagens, define variáveis vazias
                            $last_message = "";
                            $last_message_time = "";
                        }
                        ?>
                        <div class="conversation" data-chat-id="<?php echo $conversation['id']; ?>">
                            <div>
                                <?php if ($profile_image): ?>
                                    <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($profile_image); ?>" alt="Foto de Perfil" id="perfil-img" style="max-width: 200px;">
                                <?php else: ?>
                                    <img id="perfil-img" src="assets/defaultAvatar.png" alt="Imagem de Perfil" style="max-width: 200px;">
                                <?php endif; ?>
                            </div>
                            <div id="wrapper-last-info">
                                <h3><?php echo htmlspecialchars($other_user_name); ?></h3>
                                <span id="last-msg"><?php echo htmlspecialchars($last_message); ?> <br> <small><?php echo htmlspecialchars($last_message_time); ?></small></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="chat-window" id="chat-window" style="display:none;" data-chat-id="">
                <div class="chat-messages" id="chat-messages">
                    <!-- Mensagens do chat -->
                </div>

                <div class="message-input">
                    <input id="message-input" placeholder="Digite uma mensagem...">
                    <button class="blue-button" id="send-message" type="button">Enviar</button>
                </div>
            </div>
            <!-- Mensagem pedindo para selecionar um chat -->
            <div id="no-chat-selected" style="display: none;">
                <div id="empty-chat-img"></div>
                <p>Selecione um chat para conversar.</p>
            </div>
        </div>
    </div>

    <script src="ajax.js"></script>
    <script>
    $(document).ready(function() {
        let currentChatId = null; // Variável para armazenar o chat atual

        // Carrega as mensagens ao clicar em uma conversa
        $('.conversation').on('click', function() {
            const chatId = $(this).data('chat-id');

            // Se o chat selecionado já estiver ativo, não faz nada
            if (currentChatId === chatId) {
                return;
            }

            currentChatId = chatId; // Atualiza o chat atual
            $('#chat-window').show(); // Mostra a janela de chat
            $('#no-chat-selected').hide(); // Oculta a mensagem de seleção
            $('#chat-window').data('chat-id', chatId);
            loadMessages(chatId); // Carrega as mensagens do chat
            const userName = $(this).find('h3').text();
            $('#chat-user-name').text(userName);
            
            // Inicia o recarregamento automático das mensagens
            if (typeof messageInterval !== 'undefined') {
                clearInterval(messageInterval); // Limpa o intervalo anterior
            }

            messageInterval = setInterval(() => {
                loadMessages(chatId); // Atualiza as mensagens a cada 1 segundo
            }, 1000);
        });

        // Função para carregar mensagens
        function loadMessages(chatId) {
            $.ajax({
                type: 'GET',
                url: 'chatLoadMessages.php',
                data: { chat_id: chatId },
                success: function(response) {
                    $('#chat-messages').html(response); // Atualiza as mensagens na janela de chat
                },
                error: function() {
                    alert('Erro ao carregar mensagens.'); // Alerta em caso de erro
                }
            });
        }

        // Enviar mensagem
        $('#send-message').on('click', function() {
            const message = $('#message-input').val(); // Obtém a mensagem do campo de entrada
            const chatId = $('#chat-window').data('chat-id');

            if (message.trim() !== '') {
                $.ajax({
                    type: 'POST',
                    url: 'chatSendMessage.php',
                    data: { message: message, chat_id: chatId },
                    success: function(response) {
                        $('#message-input').val(''); // Limpa o campo de entrada
                        loadMessages(chatId); // Atualiza as mensagens
                    },
                    error: function() {
                        alert('Erro ao enviar mensagem.'); // Alerta em caso de erro
                    }
                });
            }
        });

        // Verifica se nenhum chat foi selecionado
        if (currentChatId === null) {
            $('#no-chat-selected').show(); // Exibe a mensagem pedindo para selecionar um chat
        }
    });

    </script>
</body>
</html>
