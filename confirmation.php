<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.global.css">
    <title>Confirmação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .confirmation-box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            height: 20rem;
            display: flex;
            flex-direction: column;
            align-content: space-around;
            justify-content: space-between;
            align-items: center;
        }
        .confirmation-box h1 {
            color: var(--secondary-blue);
        }
        .confirmation-box h1.error {
            color: #f44336;
        }
        .confirmation-box p {
            margin: 20px 0;
            font-size: 18px;
        }
        .blueButton{
            bottom: 0rem;
            left: 0rem;
            width: 20rem !important;
            background-color: var(--primary-blue);
            transition: all 0.2s;
            color: var(--white);
            box-shadow: var(--shadow-color);
            padding: 1rem 1rem;
            font-size: 1.2rem;
            border: 0.2rem solid var(--primary-blue);
            cursor: pointer;
            text-decoration: none !important;
            font-size: var(--font-size-s2);
            font-weight: bold;
        }

        .blueButton:hover{
            width: 20rem;
            background-color: var(--white);
            color: var(--primary-blue);
            box-shadow: var(--shadow-color);
            padding: 1rem 1rem;
            font-size: 1.2rem;
            border: 0.2rem solid var(--primary-blue);
            cursor: pointer;
            text-decoration: none;
            font-size: var(--font-size-s2);
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="confirmation-box">
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <h1>Sucesso!</h1>
        <p>Imagem de perfil atualizada com sucesso.</p>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
        <h1 class="error">Erro!</h1>
        <p><?php echo htmlspecialchars($_GET['message'] ?? 'Ocorreu um erro ao processar sua solicitação.'); ?></p>
    <?php endif; ?>

    <a class="blueButton" href="javascript:history.back()">Voltar</a>
</div>

</body>
</html>
