<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Empresa de Indústria especializada em soluções inovadoras para o mercado.">
    <title>Indústria Petropolis Ltda. - Inovação e Tecnologia</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/landing.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <img src="assets/logo-transparente.png" alt="">
        <a class="navbar-brand" href="#"><strong>Petropolis Ltda</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#sobre">Sobre Nós</a></li>
                <li class="nav-item"><a class="nav-link" href="#servicos">Serviços</a></li>
                <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
                <li class="nav-item"><a class="btn btn-primary" href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Header / Hero Section -->
    <header class="hero">
        <div class="container">
            <h1 class="display-4">Bem-vindo à <br>Indústria Petropolis Ltda.</h1>
            <p class="lead">Soluções inovadoras para impulsionar seu negócio</p>
        </div>
    </header>

    <!-- Seção Sobre Nós -->
    <section id="sobre" class="section bg-light">
        <div class="container">
            <h2 class="text-center">Sobre Nós</h2>
            <p class="text-center">Somos a Indústria Petrópolis Ltda., especialistas no desenvolvimento de soluções industriais inovadoras que impulsionam o crescimento sustentável e a eficiência dos nossos clientes. Comprometidos com a excelência e a inovação, oferecemos produtos e serviços tecnológicos de alta qualidade, buscando sempre transformar o setor e criar valor para nossos parceiros e colaboradores.</p>
            <div class="row text-center">
                <div class="col-md-4"><i class="fas fa-bullseye fa-2x"></i>
                    <h3>Missão</h3>
                    <p>Nossa missão é fornecer soluções industriais que aumentam a produtividade e sustentabilidade dos nossos clientes, criando tecnologias que facilitam o dia a dia e impulsionam o desenvolvimento de forma ética e responsável.</p>
                </div>
                <div class="col-md-4"><i class="fas fa-eye fa-2x"></i>
                    <h3>Visão</h3>
                    <p>Acreditamos em um futuro em que a indústria e a tecnologia caminham juntas para um mundo mais eficiente e sustentável. Até 2030, queremos ser referência no setor industrial, reconhecidos pela inovação e pelo impacto positivo em nossos clientes e na comunidade.</p>
                </div>
                <div class="col-md-4"><i class="fas fa-heart fa-2x"></i>
                    <h3>Valores</h3>
                    <p>Inovação, Excelência, Sustentabilidade, Transparência e Foco no Cliente</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Serviços -->
    <section id="servicos" class="section">
        <div class="container">
            <h2 class="text-center">Nossos Serviços</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fas fa-robot fa-3x mb-3"></i>
                    <h4>Automação Industrial</h4>
                    <p>Oferecemos serviços de automação industrial, aplicando tecnologias avançadas para otimizar processos e reduzir custos, visando maximizar a eficiência e segurança das operações.</p>
                </div>
                <div class="col-md-4 text-center"><i class="fas fa-cogs fa-3x mb-3"></i>
                    <h4>Engenharia Mecânica</h4>
                    <p>Nossos projetos de engenharia mecânica são desenvolvidos com precisão e inovação, adaptados às necessidades específicas de cada cliente e setor, ajudando a impulsionar a produtividade industrial.</p>
                </div>
                <div class="col-md-4 text-center"><i class="fas fa-tools fa-3x mb-3"></i>
                    <h4>Manutenção Técnica</h4>
                    <p>Garantimos a continuidade operacional dos nossos clientes por meio de serviços de manutenção técnica, que incluem inspeções periódicas, diagnóstico de falhas e intervenções rápidas para minimizar paradas e aumentar a vida útil dos equipamentos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Contato -->
    <section id="contato" class="section bg-light">
        <div class="container">
            <h2 class="text-center">Entre em Contato</h2>
            <p class="text-center">Precisa de mais informações?</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="enviar_contato.php" method="post">
                        <div class="form-group"><label for="nome">Nome:</label><input type="text" class="form-control" id="nome" name="nome" required></div>
                        <div class="form-group"><label for="email">Email:</label><input type="email" class="form-control" id="email" name="email" required></div>
                        <div class="form-group"><label for="mensagem">Mensagem:</label><textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea></div>
                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container text-center">
        <p>&copy; 2024 Indústria Petrópolis Ltda. Todos os direitos reservados.</p>
            <p><a href="#sobre">Sobre Nós</a> | <a href="#servicos">Serviços</a> | <a href="#contato">Contato</a></p>
            <p>Siga-nos nas redes sociais: <a href="#" class="text-light mx-2"><i class="fab fa-facebook-f"></i></a> <a href="#" class="text-light mx-2"><i class="fab fa-instagram"></i></a> <a href="#" class="text-light mx-2"><i class="fab fa-linkedin"></i></a></p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>