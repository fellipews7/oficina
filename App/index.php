<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if(isset($_SESSION['login']) AND $_SESSION['login'] == 1){

include_once 'assets/php/sessoes.php';
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
    unsetSessoes();
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
                
                <!-- CHARTS STARTS HERE -->
                <div class="charts" style="padding-top: 0px;">
                    <div class="charts__left" style="width: 500px; height: 390px; padding: 25px;">
                        <div class="charts__left__title">
                            <div>
                                <h1>Grafico</h1>
                                <p>Joinville, Santa Catarina, Brasil</p>
                            </div>
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        </div>
                        <div id="apex1" style="padding-top: 80px;"></div>
                    </div>

                    <div class="charts__right" style="background: white; width: 350px; height: 300px; padding-top: 0px;">
                        <table style="padding-top: 0px;">
                            <tr>
                                <td style="width: 500px; padding-bottom: 10px; padding-top: 0px;">
                                    <div class="card" style="height: 50px;">
                                        <i class="fa fa-money fa-2x text-green" aria-hidden="true"></i>
                                        <?php
                                        $sql1 = "SELECT count(*) as contador0 FROM orcamentos WHERE status = 3";
                                        $resultado = mysqli_query($connect, $sql1);
                                        $dados = mysqli_fetch_array($resultado);

                                        ?>
                                        <div class="card_inner">
                                            <p class="text-primary-p">Orçamentos em Aberto</p>
                                            <span class="font-bold text-title"><?php echo $dados['contador0']; ?></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px;">
                                    <div class="card" style="height: 50px;">
                                        <i class="fa fa-calendar-check-o fa-2x text-lightblue" aria-hidden="true"></i>
                                        <?php
                                        $sql2 = "SELECT count(*) as contador2 FROM ordens_de_servicos WHERE status = 2";
                                        $resultado = mysqli_query($connect, $sql2);
                                        $dados = mysqli_fetch_array($resultado);

                                        ?>
                                        <div class="card_inner">
                                            <p class="text-primary-p">OS Consluidas</p>
                                            <span class="font-bold text-title"><?php echo $dados['contador2']; ?></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px;">
                                    <div class="card" style="height: 50px;">
                                        <i class="fa fa-wrench fa-2x text-yellow" aria-hidden="true"></i>
                                        <?php
                                        $sql3 = "SELECT count(*) as contador1 FROM ordens_de_servicos WHERE status = 1";
                                        $resultado = mysqli_query($connect, $sql3);
                                        $dados = mysqli_fetch_array($resultado);
                                        ?>
                                        <div class="card_inner">
                                            <p class="text-primary-p">OS em Andamento</p>
                                            <span class="font-bold text-title"><?php echo $dados['contador1']; ?></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px;">
                                    <?php
                                        $sql4 = "SELECT count(*) as contador FROM ordens_de_servicos where status = 3";
                                        $resultado = mysqli_query($connect, $sql4);
                                        $dados = mysqli_fetch_array($resultado);

                                    ?>
                                    <div class="card" style="height: 50px;">
                                        <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
                                        <div class="card_inner">
                                            <p class="text-primary-p">OS em Atraso</p>
                                            <span class="font-bold text-title"><?php echo $dados['contador']; ?></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
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

