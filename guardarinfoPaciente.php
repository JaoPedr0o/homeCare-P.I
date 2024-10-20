<?php 
require "config.php";
session_start(); // Iniciar a sessão para pegar o ID

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Verifica se o ID do paciente está armazenado na sessão
        if (!isset($_SESSION['id'])) {
            throw new Exception("ID do paciente não encontrado na sessão.");
        }

        // Recupera o ID do paciente da sessão
        $id = $_SESSION['id'];

        // Dados do formulário final
        $descricao = $_POST['descricao'] ?? null;
        $necessidades = $_POST['resumo'] ?? null;  // Mapeando o campo 'resumo' para 'necessidades'
        $estado = $_POST['estado'] ?? null;
        $cidade = $_POST['cidade'] ?? null;
        $bairro = $_POST['bairro'] ?? null;
        $tipoProf_desejado = $_POST['profissao'] ?? null; // Mapeando 'profissao' para 'tipoProf_desejado'
        $qntd_pessoas = $_POST['familia'] ?? null; // Mapeando 'familia' para 'qntd_pessoas'
        $horario = $_POST['horario'] ?? null;
        $idade = $_POST['idade'] ?? null;

        // Atualizar a tabela pacientes com o ID correto
        $sql = "UPDATE pacientes SET 
                    descricao = IFNULL(:descricao, descricao), 
                    necessidades = IFNULL(:necessidades, necessidades), 
                    estado = IFNULL(:estado, estado), 
                    cidade = IFNULL(:cidade, cidade), 
                    bairro = IFNULL(:bairro, bairro), 
                    tipoProf_desejado = IFNULL(:tipoProf_desejado, tipoProf_desejado), 
                    qntd_pessoas = IFNULL(:qntd_pessoas, qntd_pessoas), 
                    horario = IFNULL(:horario, horario), 
                    idade = IFNULL(:idade, idade)
                WHERE id = :id"; 

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':descricao' => $descricao,
            ':necessidades' => $necessidades,
            ':estado' => $estado,
            ':cidade' => $cidade,
            ':bairro' => $bairro,
            ':tipoProf_desejado' => $tipoProf_desejado,
            ':qntd_pessoas' => $qntd_pessoas,
            ':horario' => $horario,
            ':idade' => $idade,
            ':id' => $id
        ]);

        echo "Informações do paciente atualizadas com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar os dados: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Erro: Método inválido!";
}
?>
