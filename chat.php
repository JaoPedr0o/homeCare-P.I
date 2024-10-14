<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Chat Interface</title>
    <link rel="stylesheet" href="chat.css">
    <link rel="stylesheet" href="style.global.css">
</head>
<body>
    <div class="chat-container">
        <div class="row">
            <?php
            require 'sidebar.php';
            ?>
        </div>
        <div class="chat-header">
            <div class="header-left">
                <h1><i class="fa-solid fa-message"></i>Mensagens</h1>
            </div>
            <div class="header-right">
                <input type="text" placeholder="Search messages..." class="search-input">
                <select class="filter-select">
                    <option value="all">Todas</option>
                    <option value="unread">Não Lidas</option>
                    <option value="archived">Arquivadas</option>
                </select>
            </div>
        </div>

        <div class="chat-body">
            <div class="conversation-list">
                <div class="conversation-item">
                    <div class="avatar">
                        <img src="https://via.placeholder.com/50" alt="User Avatar">
                    </div>
                    <div class="conversation-info">
                        <h3>João Pedro</h3>
                        <p>Mensagem de teste bacana e legal!</p>
                    </div>
                    <div class="conversation-time">
                        <span>2h</span>
                    </div>
                </div>

            </div>

            <div class="chat-window">
                <div class="chat-window-header">
                    <h2>João Pedro</h2>
                </div>
                <div class="chat-messages">
                    <div class="message received">
                        <p>Mensagem de teste bacana e legal!</p>
                    </div>
                    <div class="message sent">
                        <p>Outra mensagem de teste estatica.</p>
                    </div>
                </div>

                <div class="message-input">
                    <textarea placeholder="Type a message..."></textarea>
                    <button class="blue-button" type="submit">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
