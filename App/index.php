<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
            crossorigin="anonymous"
    />

    <link rel="stylesheet" href="assets/css/styles.css" />
    <title>Dashboard</title>
</head>
<body id="body">
<?php
require_once 'assets/php/mensagem.php';
include_once 'connection.php';
?>
<div class="container">
    <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
            <h2>Bem-Vindo!</h2>
        </div>
    </nav>

    <main>
        <div class="main__container">
            <!-- MAIN TITLE STARTS HERE -->

            <div class="main__title">
                <img src="assets/hello.svg" alt="" />
                <div class="main__greeting">
                    <h1>Olá!</h1>
                    <p>Bem-Vindo ao seu admin dashboard</p>
                </div>
            </div>

            <!-- MAIN TITLE ENDS HERE -->

            <!-- MAIN CARDS STARTS HERE -->
            <div class="main__cards">
                <div class="card">
                    <i
                        class="fa fa-money fa-2x text-green" 
                        aria-hidden="true"
                    ></i>
                    <?php
                    $sql1 = "SELECT * FROM ordens_de_servicos WHERE status = 1";
                    $calculoOsAberto = 0;
                    $resultado = mysqli_query($connect, $sql1);
                    while($dados = mysqli_fetch_array($resultado)){
                        $calculoOsAberto ++;
                    }
                    ?>
                    <div class="card_inner">
                        <p class="text-primary-p">Orçamentos em Aberto</p>
                        <span class="font-bold text-title"><?php echo $calculoOsAberto;?></span>
                    </div>
                </div>

                <div class="card">
                    <i
                        class="fa fa-calendar-check-o fa-2x text-lightblue" 
                        aria-hidden="true"
                    ></i>
                    <?php
                    $sql2 = "SELECT * FROM ordens_de_servicos WHERE status = 3";
                    $calculoOsConcluida = 0;
                    $resultado = mysqli_query($connect, $sql2);
                    while($dados = mysqli_fetch_array($resultado)){
                        $calculoOsConcluida ++;
                    }
                    ?>
                    <div class="card_inner">
                        <p class="text-primary-p">OS Consluidas</p>
                        <span class="font-bold text-title"><?php echo $calculoOsConcluida;?></span>
                    </div>
                </div>

                <div class="card">
                    <i
                        class="fa fa-wrench fa-2x text-yellow" 
                        aria-hidden="true"
                    ></i>
                    <?php
                    $sql3 = "SELECT * FROM ordens_de_servicos WHERE status = 3";
                    $calculoOsAndamento = 0;
                    $resultado = mysqli_query($connect, $sql3);
                    while($dados = mysqli_fetch_array($resultado)){
                        $calculoOsAndamento ++;
                    }
                    ?>
                    <div class="card_inner">
                        <p class="text-primary-p">OS em Andamento</p>
                        <span class="font-bold text-title"><?php echo $calculoOsAndamento;?></span>
                    </div>
                </div>


                <?php
                $sql4 = "SELECT * FROM ordens_de_servicos";
                $calculoOsAtraso = 0;
                $resultado = mysqli_query($connect, $sql4);
                while($dados = mysqli_fetch_array($resultado)){
                    if($dados['data_previsao'] < date('y/m/d') AND $dados['status'] != 3){
                        $calculoOsAtraso++;
                    }
                }
                ?>
                <div class="card">
                    <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
                    <div class="card_inner">
                        <p class="text-primary-p">OS em Atraso</p>
                        <span class="font-bold text-title"><?php echo $calculoOsAtraso;?></span>
                    </div>
                </div>
            </div>
            <!-- MAIN CARDS ENDS HERE -->

            <!-- CHARTS STARTS HERE -->
            <div class="charts">
                <div class="charts__left">
                    <div class="charts__left__title">
                        <div>
                            <h1>Grafico</h1>
                            <p>Joinville, Santa Catarina, Brasil</p>
                        </div>
                        <i class="fa fa-usd" aria-hidden="true"></i>
                    </div>
                    <div id="apex1"></div>
                </div>

                <div class="charts__right">
                    <div class="charts__right__title">
                        <div>
                            <h1>Contagem</h1>
                            <p>Joinville, Santa Catarina, Brasil</p>
                        </div>
                        <i class="fa fa-usd" aria-hidden="true"></i>
                    </div>

                    <div class="charts__right__cards">
                        <div class="card1">
                            <h1>Nome</h1>
                            <p>Valor</p>
                        </div>

                        <div class="card2">
                            <h1>Nome</h1>
                            <p>Valor</p>
                        </div>

                        <div class="card3">
                            <h1>Nome</h1>
                            <p>Valor</p>
                        </div>

                        <div class="card4">
                            <h1>Nome</h1>
                            <p>Valor</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CHARTS ENDS HERE -->
        </div>
    </main>

    <div id="sidebar">
        <div class="sidebar__title">
            <div class="sidebar__img">
                <img src="assets/logo.png" alt="logo" />
                <h2> Oficina Schulz </h2>
            </div>
            <br>
            <i
                    onclick="closeSidebar()"
                    class="fa fa-times"
                    id="sidebarIcon"
                    aria-hidden="true"
            ></i>
        </div>

        <div class="sidebar__menu">
            <div class="sidebar__link active_menu_link">
                <i class="fa fa-home"></i>
                <a href="index.php">Dashboard</a>
            </div>
            <h2>Cadastros</h2>
            <div class="sidebar__link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <a href="Cadastro-Cliente.php">Cadastro Cliente</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-car" aria-hidden="true"></i>
                <a href="Cadastro-Carro.php">Cadastro Carro</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-money" aria-hidden="true"></i>
                <a href="Cadastro-Orcamento.php">Cadastro Orçamento</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-users" aria-hidden="true"></i>
                <a href="Cadastro-Funcionario.php">Cadastro Funcionário</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                <a href="Cadastro-Cargo.php">Cadastro Cargo</a>
            </div>
            <h2>Consultas</h2>
            <div class="sidebar__link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <a href="Consulta-Cliente.php">Consulta Cliente</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-car" aria-hidden="true"></i>
                <a href="Consulta-Carros.php">Consulta Carro</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-money" aria-hidden="true"></i>
                <a href="Consulta-Orcamento.php">Consulta Orçamento</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                <a href="Consulta-OS.php">Consulta Ordem Serviço</a>
            </div>
            <div class="sidebar__link">
                <i class="fa fa-users" aria-hidden="true"></i>
                <a href="Consulta-Funcionarios.php">Consulta Funcionario</a>
            </div>
            <div class="sidebar__logout">
                <i class="fa fa-power-off"></i>
                <a href="#">Log out</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
