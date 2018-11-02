<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>VietPro- La confiance est la clé</title>
	<!--Responsive-->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" href="./site/public/css/style.css">
</head>
<body>
	<!--header-->
	<div class="header">
		<uL>
			<li><a href="#"><img src="./site/public/image/logo.png" alt="" height="80px"></a></li>
			<li><a href="#" class="button1"><i class="fas fa-user"></i> NOM PRENOM</a></li>
			<li style="float:right;"><a href="#" class="btn btn-success button2">Se déconnecter</a></li>
		</uL>
	</div>
	<!--end header -->
	<div class="row">
		<!-- menu -->
		<div class="col-sm-4">
			<div class="menu">
				<div><a href="#"><i class="fas fa-list-ul"></i> Liste De Température</a></div>
				<div><a href="#" class="active"><i class="fas fa-plus-circle"></i> Nouvelle Température</a></div>
				<div><a href="#"><i class="fas fa-user"></i> Mes Informations</a></div>
				<div><a href="#"><i class="far fa-chart-bar"></i> Coube De Tentance</a></div>
			</div>
		</div>
		<!-- content -->
		<div class="col-sm-8">
			<div class="content2">
				<?php
					$View_Loader = new View_Loader();
					$data = array();

					$View_Loader->load($content,$data);
					$View_Loader->show();
				?>
			</div>
		</div>
	</div>
	
</body>
</html>