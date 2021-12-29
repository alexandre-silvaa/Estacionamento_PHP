<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .carousel-inner img
        {
            height: 700px;
            border-radius: 10px;
        }
    </style>

    <title>Página Inicial</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

    <header class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php"><img src="./images/xarc.png" alt="logo_xarc" width="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="carros.php">Carros</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="contatos.php">Contatos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="sobre.php">Sobre</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                        </li>
                    </ul>
                </div>
             </div>
            </nav>
        </header>	

    <main  class="container">
		<div>
			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="./images/urus.jpg" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="./images/corolla.jpg" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="./images/speciale.jpg" class="d-block w-100" alt="...">
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</main>

    <section class="container">
		<div class="container-fluid">
			<h2></br>Lamborghini Urus</h2>
			<p class="fw-normal fs-5">O Lamborghini Urus tem um motor 4.0 V8 Biturbo de 650 cv de potência máxima e 86,6 kgf.m de torque. A transmissão é automática de 8 marchas e a tração integral sob demanda, podendo transferir até 87% da força para as rodas traseiras ou 70% para as rodas da frente. A aceleração de 0 a 100 km/h acontece em 3,6 segundos e a velocidade máxima é de 305 km/h. Suas dimensões são de 5,11 m de comprimento, 2,06 m de largura, 1,63 m de altura e 3 metros de entre-eixos, a altura do solo é de 158 mm a 248 mm conforme o ajuste da suspensão a ar. No porta-malas, a capacidade varia de 616 litros a 1.596 litros.</p>
		
			<h2>Toyota Corolla</h2>
			<p class="fw-normal fs-5">Mecanicamente, o sedã segue equipado nas versões aspiradas com motor 2.0 de 177 cv e 21,4 kgfm de torque, sempre associado ao câmbio automático do tipo CVT que simula 10 marchas (1ª mecânica). Nas variantes híbridas, o conjunto é formado pela união do motor 1.8 aspirado de 101 cv com um propulsor elétrico de 72 cv. A transmissão neste caso é CVT convencional com o motor elétrico acoplado.</p>
		
            <h2>Ferrari 458 Speciale</h2> 
            <p class="fw-normal fs-5">A Ferrari lança uma configuração limitada da 458 Itália, denominada Ferrari F-458 Speciale, que tem como destaque a relação peso-potência de 2,13 kg / cv, o que lhe permite acelerar de 0-100 km / h em 3 segundos. A aderência lateral chega a 1,33 g, e o tempo de resposta aos comandos de apenas 0,060 segundo.</p>
        </div>
	</section>

        
    <?php
        require('conexao.php');
    ?>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>    
</body>
</html>