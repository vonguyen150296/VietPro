<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>VietPro-Plate forme administrateur</title>
	<!--Responsive-->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" href="./admin/public/css/style.css">
</head>
<body>
	<!-- header -->
	<div class="header">
		<uL>
			<li><a href="./admin.php"><img src="./admin/public/image/logo.png" alt="" height="80px"></a></li>
			<?php
			if (isset($_COOKIE['VietPro'])) {
				if($_SESSION[$_COOKIE['VietPro']] == 'admin'){
				echo "<li><a href='#' class='button1'><i class='fas fa-user'></i> ".$_COOKIE['VietPro-Name']."</a></li>";
				echo "<li style='float:right;'><a href='./admin.php?c=welcome&a=logout' class='btn btn-success button2'>Se déconnecter</a></li>";
				}
            }
			?>
		</uL>
	</div><!--end -->

	<div class="content">
		<?php
			if(isset($_COOKIE['VietPro'])){
				if($_SESSION[$_COOKIE['VietPro']] == 'admin')
					{
					// call file menu.php
					require (PATH_APPLICATION . '/view/Menu.php');
					}
			}
			
			$View_Loader = new View_Loader();
			$data = array();
			if(!empty($infos)){
				$data = $infos;
			}
			
			//load content page
			$View_Loader->load($content,$data);
			$View_Loader->show();
		?>
	</div>

	<div class="footer text-center">
		<p>&copy 2018, VietPro. Tous droits réservés.</p>
		<p>Réalisé avec beaucoup de passion et un peu de cidre breton</p>
	</div>
	
	<!-- JavaScript -->
	
	<!--Bootstrap JS-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>