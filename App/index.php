<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$_SESSION['login'] = 1;

if(isset($_SESSION['login']) AND $_SESSION['login'] == 1){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />


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
                        <i class="fa fa-money fa-2x text-green" aria-hidden="true"></i>
                        <?php
                        $sql1 = "SELECT * FROM orcamentos WHERE status = 3";
                        $calculoOsAberto = 0;
                        $resultado = mysqli_query($connect, $sql1);
                        while ($dados = mysqli_fetch_array($resultado)) {
                            $calculoOsAberto++;
                        }
                        ?>
                        <div class="card_inner">
                            <p class="text-primary-p">Orçamentos aguardando aprovação</p>
                            <span class="font-bold text-title"><?php echo $calculoOsAberto; ?></span>
                        </div>
                    </div>

                    <div class="card">
                        <i class="fa fa-calendar-check-o fa-2x text-lightblue" aria-hidden="true"></i>
                        <?php
                        $sql2 = "SELECT * FROM ordens_de_servicos WHERE status = 2";
                        $calculoOsConcluida = 0;
                        $resultado = mysqli_query($connect, $sql2);
                        while ($dados = mysqli_fetch_array($resultado)) {
                            $calculoOsConcluida++;
                        }
                        ?>
                        <div class="card_inner">
                            <p class="text-primary-p">OS Consluidas</p>
                            <span class="font-bold text-title"><?php echo $calculoOsConcluida; ?></span>
                        </div>
                    </div>

                    <div class="card">
                        <i class="fa fa-wrench fa-2x text-yellow" aria-hidden="true"></i>
                        <?php
                        $sql3 = "SELECT * FROM ordens_de_servicos WHERE status = 1";
                        $calculoOsAndamento = 0;
                        $resultado = mysqli_query($connect, $sql3);
                        while ($dados = mysqli_fetch_array($resultado)) {
                            $calculoOsAndamento++;
                        }
                        ?>
                        <div class="card_inner">
                            <p class="text-primary-p">OS em Andamento</p>
                            <span class="font-bold text-title"><?php echo $calculoOsAndamento; ?></span>
                        </div>
                    </div>


                    <?php
                    $sql4 = "SELECT * FROM ordens_de_servicos";
                    $calculoOsAtraso = 0;
                    $resultado = mysqli_query($connect, $sql4);
                    while ($dados = mysqli_fetch_array($resultado)) {
                        if ($dados['data_previsao'] < date('y/m/d') and $dados['status'] != 2) {
                            $calculoOsAtraso++;
                        }
                    }
                    ?>
                    <div class="card">
                        <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
                        <div class="card_inner">
                            <p class="text-primary-p">OS em Atraso</p>
                            <span class="font-bold text-title"><?php echo $calculoOsAtraso; ?></span>
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

        <?php include_once 'assets/php/menu.php'; ?>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <?php include_once 'assets/php/graficoIndex.php'; ?>
        <script>
            // This is for able to see chart. We are using Apex Chart. U can check the documentation of Apex Charts too..
            var options = {
                series: [{
                        name: "Quantidade de Ordens de Serviços",
                        data: [<?php foreach ($qtdOs as $qtdOs) {
                                    echo intval($qtdOs);
                                    echo ',';
                                }; ?>],
                    },
                    {
                        name: "Quantidade de Orçamentos",
                        data: [<?php foreach ($qtdOrc as $qtdOrc) {
                                    echo intval($qtdOrc);
                                    echo ',';
                                }; ?>],
                    },
                    {
                        name: "Orçamentos rejeitados",
                        data: [<?php foreach ($orcRejeitado as $orcRejeitado) {
                                    echo intval($orcRejeitado);
                                    echo ',';
                                }; ?>],
                    },
                ],
                chart: {
                    type: "bar",
                    height: 250, // make this 250
                    sparkline: {
                        enabled: true, // make this true
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "55%",
                        endingShape: "rounded",
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: [<?php foreach ($mesNome as $mesNome) {
                                        echo '"';
                                        echo $mesNome;
                                        echo '"';
                                        echo ',';
                                    }; ?>],
                },
                yaxis: {
                    title: {
                        text: "",
                    },
                },
                fill: {
                    opacity: 1,
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val;
                        },
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#apex1"), options);
            chart.render();

            // Sidebar Toggle Codes;

            var sidebarOpen = false;
            var sidebar = document.getElementById("sidebar");
            var sidebarCloseIcon = document.getElementById("sidebarIcon");

            function toggleSidebar() {
                if (!sidebarOpen) {
                    sidebar.classList.add("sidebar_responsive");
                    sidebarOpen = true;
                }
            }

            function closeSidebar() {
                if (sidebarOpen) {
                    sidebar.classList.remove("sidebar_responsive");
                    sidebarOpen = false;
                }
            }
        </script>
</body>
</html>
<?php

}else if($_SESSION['login'] == 0){
     header('location: ../index.php');
     $_SESSION['tipoErro'] = 'Por favor faça login!';
     $_SESSION['mensagem'] = 'erro';
}

