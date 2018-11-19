<br><br><div class="row login">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4 card">
    	<form action="./admin.php?c=welcome&a=postindex" method="post" accept-charset="utf-8" class="form-group" style="padding: 20px;">
			<h3 class="text-center font-weight-bold">Se connecter</h3>
            <?php
                if($error){
                    echo $error."<br>";
                }
            ?>

    		<label><b>Adresse mail :</b></label>
    		<input type="email" name="email" placeholder="Adresse mail" class="form-control form-control-lg" required>

    		<label><b>Mot de passe :</b></label> 
    		<input type="password" name="password" placeholder="Password" class="form-control form-control-lg" required>

    		<button type="submit" class="btn btn-success form-control form-control-lg">Se connecter</button>
    	</form>
    </div>
</div>