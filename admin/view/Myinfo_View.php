<div class="card myinfo">
	<h4><b>Mes informations</b></h4><br>
	
	<?php echo "<form action='./admin.php?c=user&a=update&token=".$admin[0]['token']."' method='POST' accept-charset='utf-8' class='form-group'>"?>
		<div class="row">
			<div class="col-sm-6">
				<label><b>Votre nom :</b></label>
				<?php echo "<input type='text' name='name' placeholder='Votre nom' class='form-control-lg  form-control' value='".$admin[0]['name']."' required>"?>
			</div>
			<div class="col-sm-6">
				<label><b>Votre prénom :</b></label>
				<?php echo "<input type='text' name='subname' placeholder='Votre prénom' class='form-control-lg form-control' value='".$admin[0]['subname']."' required>"; ?>
			</div>
		</div>

		<label><b>Votre adresse :</b></label>
		<?php echo "<input type='address' name='address' placeholder='Votre adresse' class='form-control form-control-lg' value='".$admin[0]['address']."' required>"; ?>

		<label><b>Votre numéro de téléphone: </b></label>
		<?php echo "<input type='text' name='phone' placeholder='Votre numéro de téléphone' class='form-control form-control-lg' value='".$admin[0]['phone']."' required>"; ?>

		<label><b>Votre adresse mail : </b></label>
		<?php echo "<input type='email' name='email' placeholder='Votre adresse mail' class='form-control form-control-lg' value='".$admin[0]['email']."' disabled>"; ?>

		<label><b>Votre mot de passe :</b></label>
		<input type="password" name="password" placeholder="Votre password" class="form-control form-control-lg"><br>

		<button type="submit" class="btn btn-success form-control form-control-lg">Mettre à jour</button>
		
	</form>
</div>