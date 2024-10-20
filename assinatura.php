<?php 
    require 'protect.php'
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="loginIMG/logo-transparente.png" type="image/x-icon">
    <link rel="stylesheet" href="style.global.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php 
                require 'sidebar.php';
            ?>
        </div>
        <main>
            <section id="left-wrapper">
                <div>
                    <h2>Grátis</h2>
                    <p>A Vital+ conecta famílias a profissionais qualificados, oferecendo cuidados práticos e seguros para seus clientes.</p>
                    <h1>R$ 0 Anual </h1>
                    <h3>Plano atual</h3>
                </div>
                <div>
                    <ol>
                        <li>Visibilidade Básica: Perfis aparecem nas buscas, mas com menos destaque.</li>
                        <li>Conteúdos Acessíveis: Acesso a alguns recursos educacionais.</li>
                        <li>Conexões Limitadas: Oportunidades de se conectar com famílias.</li>
                        <li>Suporte Básico: Atendimento para dúvidas, mas com menor prioridade.</li>
                    </ol>
                </div>
            </section>
            <section id="right-wrapper">
                <div>
                    <h2>Premium</h2>
                    <p>A Vital+ conecta famílias a profissionais qualificados, oferecendo cuidados práticos e seguros para seus clientes.</p>
                    <h1>R$ 32,99 Anual </h1>
                    <a class="blue-button" href="">ASSINAR</a>
                </div>
                <div>
                    <ol>
                        <li>Destaque de Perfil: Perfis premium têm maior visibilidade nas buscas.</li>
                        <li>Recursos Exclusivos: Acesso a conteúdos e treinamentos em geriatria.</li>
                        <li>Rede de Networking: Conexões com outros profissionais da área.</li>
                        <li>Suporte Personalizado: Atendimento prioritário para dúvidas.</li>
                        <li>Marketing Direcionado: Promoção do perfil para um público amplo.</li>
                    </ol>
                </div>
            </section>
        </main>
    </div>

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>