<div class="sidebar">
	<a href="./admin.php?c=publication&a=list" class="pub"">Les Publications</a>
	<a href="./admin.php?c=publication&a=new" class="newPub">Nouvelle Publication</a>
	<a href="./admin.php?c=user&a=list" class="user">Les utilisateurs</a>
	<a href="./admin.php?c=user&a=info" class="info">Mes informations</a>
</div>
<script>
	var linkCurrent = window.location.search; //prendre le lien courant

	//ajouter class active
	switch (linkCurrent){
		case '?c=publication&a=list':
		classCurrent = document.getElementsByClassName("pub");
		classCurrent[0].className = classCurrent[0].className.replace("pub", "active");
		break;

		case '?c=publication&a=new':
		classCurrent = document.getElementsByClassName("newPub");
		classCurrent[0].className = classCurrent[0].className.replace("newPub", "active");
		break;

		case '?c=user&a=list':
		classCurrent = document.getElementsByClassName("user");
		classCurrent[0].className = classCurrent[0].className.replace("user", "active");
		break;

		case '?c=user&a=info':
		classCurrent = document.getElementsByClassName("info");
		classCurrent[0].className = classCurrent[0].className.replace("info", "active");
		break;
	}
</script>