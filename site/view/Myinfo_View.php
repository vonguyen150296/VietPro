<h4 class="sub_title">Mes informations</h4>
<?php 
echo "<form action='./site.php?c=myaccount&a=update&token=".$user[0]['token']."' method='POST' accept-charset='utf-8' class='form-group'>";
echo "<div class='row'>";
echo "<div class='col-sm-6'>";
echo "<label><b>Votre nom :</b></label>";
echo "<input type='text' name='name' placeholder='Votre nom' class='form-control-lg  form-control' value='".$user[0]['name']."' required>";
echo "</div>";
echo "<div class='col-sm-6'>";
echo "<label><b>Votre prénom :</b></label>";
echo "<input type='text' name='subname' placeholder='Votre prénom' class='form-control-lg form-control' value='".$user[0]['subname']."' required>";
echo "</div>";
echo "</div>";

echo "<label><b>Votre adresse :</b></label>";
echo "<input type='address' name='address' placeholder='Votre adresse' class='form-control form-control-lg' value='".$user[0]['address']."' required>";

echo "<label><b>Votre numéro de téléphone: </b></label>";
echo "<input type='text' name='phone' placeholder='Votre numéro de téléphone' class='form-control form-control-lg' value='".$user[0]['phone']."' required>";

echo "<label><b>Votre adresse mail : </b></label>";
echo "<input type='email' name='email' placeholder='Votre adresse mail' class='form-control form-control-lg' value='".$user[0]['email']."' disabled>";

echo "<label><b>Votre mot de passe :</b></label>";
echo "<input type='password' name='password' placeholder='Votre password' class='form-control form-control-lg'><br>";
echo "<div class='row'>";
echo "<div class='col-sm-4 offset-sm-4'>";
echo "<button type='submit' class='form-control button'>Mettre à jour</button>";
echo "</div>";
echo "</div>";
		
echo "</form>";
?>