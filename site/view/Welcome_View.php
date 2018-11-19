<div class="row">
		<div class="col-sm-4"><!--register-->
			<div class="register">
				<div class="title">S'INCRIRE</div><br>
				<form action="./site.php?c=welcome&a=register" method="post" accept-charset="utf-8" class="form-group">
					<lable><b>Nom: *</b></lable>
					<input class="form-control form-control-lg" name="name" type="text" placeholder="Votre nom" required>

					<lable><b>Prénom: *</b></lable>
					<input class="form-control form-control-lg" name="subname" type="text" placeholder="Votre prénom" required>

					<lable><b>Adresse mail: * </b></lable><spans id="error"></spans>
					<input class="form-control form-control-lg" id="email" name="email" type="email" placeholder="Votre email" required>

					<lable><b>Mot de passe: *</b></lable>
					<input class="form-control form-control-lg" name="password" type="password" placeholder="Votre mot de passe">

					<button class="btn btn-primary text-right" type="submit" name="create">S'INCRIRE</button>
					<div id="result"></div>
				</form>
			</div>
		</div><!--end register-->

		<div class="col-sm-8"><!--publication-->
			<div class="row" style="margin-top: 20px;">
				<div class="col-sm-8">
					
					<?php
					foreach ($pub as $p) {
						echo "<div class='pub'>";
						echo "<h4><b>".$p['subject']."</b></h4>";
						echo "<div class='row'>";
						echo "<div class='col-sm-5'>";
						echo "<img src='./site/public/upload/".$p['image']."'>";
						echo "</div>";
						echo "<div class='col-sm-7'>";
						echo "<p>".$p['resume']."</p>";
						echo "<button class='btn btn-default'><a href='./site.php?c=welcome&a=publication&id=".$p['id']."''>Savoir en plus</a></button>";
						echo "</div>";
						echo "</div>";
						echo "</div>";
					}
					?>
				</div>
				<div class="col-sm-4">
					<div>
						<h3 style="margin: 150px 0 20px 0;"><b>Posts important</b></h3>
						<?php 
						foreach ($important as $i){
							echo "<div class='popular row'>";
							echo "<div class='col-sm-4'>";
							echo "<a href='./site.php?c=welcome&a=publication&id=".$i['id']."'><img src='./site/public/upload/".$i['image']."' width='70px'></a>";
							echo "</div>";
							echo "<div class='col-sm-8'>";
							echo "<p>".$i['subject']."</p>";
							echo "</div>";
							echo "</div>";
						}
						?>
					</div>

					<div>
						<h3 style="margin: 20px 0 20px 0;"><b>Tags</b></h3>
						<div class="tags">
							<div>VietPro</div>
							<div>Html</div>
							<div>CSS</div>
							<div>JavaScript</div>
							<div>MySQL</div>
							<div>Projet Web Automate</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--end pulication-->
</div>	
<!-- Modal login-->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		    
		<!-- Modal content-->
		<div class="modal-content">
			<form action="./site.php?c=welcome&a=login" method="post" accept-charset="utf-8">
				<div class="modal-header">
				    <h4 class="modal-title"><b>Se connecter</b></h4>
				    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				    <label><b>Adresse mail :</b></label>
		    		<input type="email" name="email" placeholder="Adresse mail" class="form-control form-control-lg" required>

		    		<label><b>Mot de passe :</b></label> 
		    		<input type="password" name="password" placeholder="Password" class="form-control form-control-lg" required>
				
				    <button type="submit" class="btn btn-success form-control form-control-lg">Se connecter</button>
				    
		    	</div>
			</form>
		</div>
		      
	</div>	
</div>

<script type="text/javascript">
	document.getElementById('email').onblur = function()
	{
		
        var xmlhttp;
                
        // for IE7+, Firefox, Chrome, Opera, Safari
        if (window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest();
        }
        // for IE6, IE5
        else
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
                
        // initilisation ajax
        xmlhttp.onreadystatechange = function()
      	{
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
	        {
	            document.getElementById("error").innerHTML = this.responseText;
	        }
        };
        var email = document.getElementById("email");
        var str = email.value;
        xmlhttp.open("GET", "./site.php?c=welcome&a=listemail&email="+str, true);
        xmlhttp.send();
	};

	function validate(){
		var error = document.getElementById("error");

	}
</script>