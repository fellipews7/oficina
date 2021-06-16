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

    <title>CSS GRID DASHBOARD</title>
</head>
<body id="body">
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
                    <div class="card_inner">
                        <p class="text-primary-p">Orçamentos em Aberto</p>
                        <span class="font-bold text-title">Valor</span>
                    </div>
                </div>

                <div class="card">
                    <i
                        class="fa fa-calendar-check-o fa-2x text-lightblue" 
                        aria-hidden="true"
                    ></i>

                    <div class="card_inner">
                        <p class="text-primary-p">OS Consluidas</p>
                        <span class="font-bold text-title">Valor</span>
                    </div>
                </div>

                <div class="card">
                    <i
                        class="fa fa-wrench fa-2x text-yellow" 
                        aria-hidden="true"
                    ></i>
                    <div class="card_inner">
                        <p class="text-primary-p">OS em Andamento</p>
                        <span class="font-bold text-title">Valor</span>
                    </div>
                </div>

                <div class="card">
                    <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
                    <div class="card_inner">
                        <p class="text-primary-p">OS em Atraso</p>
                        <span class="font-bold text-title">Valor</span>
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
    </div>
	<title>Login Oficina Schulz</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Email Inválido: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Senha Inválida!">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							<a href="App/index.php"> Login </a>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


</body>
</html>