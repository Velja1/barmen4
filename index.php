<?php
	session_start();
	if(isset($_GET['page'])){
		if($_GET['page']=='admin'){
			if($_SESSION['korisnik']->id_uloga!=1){
				header("Location: index.php");
			}
		}
	}
?>

<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<?php
	include("views/fixed/head.php");
	include("config/connection.php");
	include("views/fixed/nav.php");
	include("models/functions.php");
?>
	<body class="landing">

	<?php
		if(!isset($_GET['page'])){
			include("views/indexView.php");
		}
		else {
			switch($_GET['page']){
			case 'index':
				include("views/indexView.php");
				break;
			case 'plovila':
				include("views/plovilaView.php");
				break;
			case 'prodaja':
				include("views/prodajaView.php");
				break;
			case 'proizvodi':
				include("views/proizvodiView.php");
				break;
			case 'registracija':
				include("views/registracijaView.php");
				break;
			case 'logovanje':
				include("views/logovanjeView.php");
				break;
			case 'oautoru':
				include("views/oautoruView.php");
				break;
			case 'admin':
				include("views/adminView.php");
				break;
			default: 
			include("views/indexView.php");
				break;
			}
		}
	?>
			

	<!-- Footer -->
	<?php
		include("views/fixed/footer.php");
	?>

	<!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="assets/js/header.js"></script>
		<?php
			if(!isset($_GET['page'])){
				echo '<script src="assets/js/main.js"></script>';
			}
			else {
				switch($_GET['page']){
				case 'index':
					echo '<script src="assets/js/main.js"></script>';
					break;
				case 'plovila':
					echo '<script src="assets/js/plovila.js"></script>
								<script src="assets/js/jquery.colorbox-min.js"></script>';
					break;
				case 'prodaja':
					echo '<script src="assets/js/prodaja.js"></script>';
					break;
				case 'proizvodi':
					echo '<script src="assets/js/proizvodi.js"></script>';
					break;
				case 'registracija':
					echo '<script src="assets/js/registracija.js"></script>';
					break;
				case 'logovanje':
					echo '<script src="assets/js/logovanje.js"></script>';
					break;
				case 'oautoru':
					echo '';
					break;
				case 'admin':
					echo '<script src="assets/js/admin.js"></script>';
					break;
				default: 
				include("views/indexView.php");
					break;
				}
			}
		?>
	</body>
</html>