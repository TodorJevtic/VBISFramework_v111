
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Metal Rasa</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
		<link rel="shortcut icon" href="../assets/images/logo.png">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Sora:wght@800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Montserrat+Subrayada:wght@700&family=Oswald:wght@700&family=Quicksand:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="../assets/js/plugins/toastr/toastr.min.css" rel="stylesheet"/>
		
    	<script
            src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
		<script src="../assets/js/plugins/toastr/toastr.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js" integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	</head>
	<body>
		<section class="wrapper">
			<header>
				<h1>Gvožđara Metal Raša</h1>
			</header>
			<div id="glavni">
				<header>
					<nav id="navigation">
						<ul>
							<li class="active"><a href="/home">Pocetna</a></li>
							    <li><a href="/info">O nama</a></li>
							    <li><a href="/alati">Alati</a></li>
							    <li><a href="/rasveta">Rasveta</a></li>
							    <li><a href="/sanitarija">Sanitarija</a></li>
							    <li><a href="/kontakt">kontakt</a></li>
							<nav class="logo">
								<a href="/korpa"><img src="../assets/images/bag.png" alt="" width = "33" height = "27"></a>
								<a href="/login"><img src="../assets/images/user.png" alt="" width = "33" height = "27"></a>
								<a href="/createProduct"><img src="../assets/images/admin.png" alt="" width = "33" height = "27"></a>

							</nav>
						</ul>
					</nav>
					</nav>
				</header>
			</div>
			{{ renderPartialView }}
			<footer>
				<div class="social">
					 <a href="https://www.facebook.com/profile.php?id=100009135678164"><i class="fab fa-facebook-f"></i></a>
					 <a href="https://twitter.com/home?lang=sr"><i class="fab fa-twitter"></i></a>
					 <a href="https://en.wikipedia.org/wiki/Google%2B"><i class="fab fa-google-plus-g"></i></a>
					 <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
					 <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
				</div>
				<p>&copy; Gvožđara Metal Raša doo 2022.Sva prava zadržana.</p>
			</footer>
		</section>	
		<?php

use app\core\Application;

$success = Application::$app->session->getFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS);

if ($success !== false) {
    echo "
        <script>
            $(document).ready(function (){
                toastr.success('$success');
            });
        </script>
        ";
}

$error = Application::$app->session->getFlash(Application::$app->session->FLASH_MESSAGE_ERROR);

if ($error !== false) {
    echo "
        <script>
            $(document).ready(function (){
                toastr.error('$error');
            });
        </script>
        ";
}
?>	
	</body>
</html>

