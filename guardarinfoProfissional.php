<?php 
require "config.php";
session_start(); // Iniciar a sessão para pegar o ID

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Verifica se o ID do profissional está armazenado na sessão
        if (!isset($_SESSION['id'])) {
            throw new Exception("ID do profissional não encontrado na sessão.");
        }

        // Recupera o ID do profissional da sessão
        $id = $_SESSION['id'];

        // Dados do formulário final
        $descricao = $_POST['descricao'] ?? null;
        $resumo = $_POST['resumo'] ?? null;
        $profissao = $_POST['profissao'] ?? null;
        $estado = $_POST['estado'] ?? null;
        $cidade = $_POST['cidade'] ?? null;
        $bairro = $_POST['bairro'] ?? null;
        $escolaridade = $_POST['escolaridade'] ?? null;
        $comunicacao = $_POST['comunicacao_exp'] ?? null;
        $enfermagem = $_POST['enfermagem_exp'] ?? null;
        $equipamentos = $_POST['equipamentos_exp'] ?? null;
        $educacao = $_POST['educacao_exp'] ?? null;

        // Atualizar a tabela profissionais com o ID correto
        $sql = "UPDATE profissionais SET 
                    descricao = IFNULL(:descricao, descricao), 
                    resumo = IFNULL(:resumo, resumo), 
                    profissao = IFNULL(:profissao, profissao), 
                    estado = IFNULL(:estado, estado), 
                    cidade = IFNULL(:cidade, cidade), 
                    bairro = IFNULL(:bairro, bairro), 
                    escolaridade = IFNULL(:escolaridade, escolaridade), 
                    comunicacao_exp = IFNULL(:comunicacao_exp, comunicacao_exp), 
                    enfermagem_exp = IFNULL(:enfermagem_exp, enfermagem_exp), 
                    equipamentos_exp = IFNULL(:equipamentos_exp, equipamentos_exp), 
                    educacao_exp = IFNULL(:educacao_exp, educacao_exp)
                WHERE id = :id"; // Certifique-se de que o nome da coluna no WHERE está correto

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':descricao' => $descricao,
            ':resumo' => $resumo,
            ':profissao' => $profissao,
            ':estado' => $estado,
            ':cidade' => $cidade,
            ':bairro' => $bairro,
            ':escolaridade' => $escolaridade,
            ':comunicacao_exp' => $comunicacao,
            ':enfermagem_exp' => $enfermagem,
            ':equipamentos_exp' => $equipamentos,
            ':educacao_exp' => $educacao,
            ':id' => $id
        ]);

        echo "Informações atualizadas com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar os dados: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Erro: Método inválido!";
}
?>
