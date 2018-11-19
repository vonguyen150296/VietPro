<h4 class="sub_title">Nouvelle température</h4><br><br>
<center>
	<button class="btn btn-primary" id="conn">Récupérer la nouvelle température de chaque salle</button>
	<div id="result"></div>
	<div id="error"></div>
</center>

<br><br><br>
	<?php echo "<input id='id_user' style='display: none;' value='".$temp[0]['id_user']."'>"; ?>
<div class="row">
	<div class="col-sm-5 offset-sm-1 card_temperature">
		<h4><i class="fas fa-couch"></i><b> Le salle de salon</b></h4>
		<?php echo "<div>".$temp[0]['livingroom']."°C</div>"; ?>
	</div>
	<div class="col-sm-5 offset-sm-1 card_temperature">
		<h4><i class="fas fa-utensils"></i><b> La cuisine</b></h4>
		<?php echo "<div>".$temp[0]['kitchen']."°C</div>"; ?>
	</div>
	<div class="col-sm-5 offset-sm-1 card_temperature">
		<h4><i class="fas fa-bed"></i><b> La chambre 1</b></h4>
		<?php echo "<div>".$temp[0]['bedroom1']."°C</div>"; ?>
	</div>
	<div class="col-sm-5 offset-sm-1 card_temperature">
		<h4><i class="fas fa-bed"></i><b> La chambre 2</b></h4>
		<?php echo "<div>".$temp[0]['bedroom2']."°C</div>"; ?>
	</div>
</div>
<script type="text/javascript">
	document.getElementById('conn').onclick = function(){
		var res = confirm("Voulez-vous récupérer la nouvelle température de chaque salle?");
		if(res == true){
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

	        xmlhttp.onreadystatechange = function()
	      	{
		        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		        {
		           window.location = "./site.php?c=myaccount&a=new";
		        }
	        };
	        var id_user = document.getElementById('id_user');
	        xmlhttp.open("GET", "./site.php?c=myaccount&a=modbus&id_user="+id_user.value, true);
	        xmlhttp.send();
			}
	};
</script>