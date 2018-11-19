<div class="card tableList">
	
	<?php 
	if(!empty($pub)){
		echo "<div><h1>".$pub[0]['subject']."<h1></div>"; 
		echo "<div>".$pub[0]['content']."</div>";
	}else{
		echo "<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>";
	}	
	?>
	
</div>