<div class="card tableList">
	<h4><b>Liste des utilisateurs</b></h4>

	<div style="overflow-x:auto;">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nom</th>
					<th scope="col">Prénom</th>
					<th scope="col">Adresse mail</th>
					<th scope="col">Téléphone</th>
					<th scope="col">Adresse</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($users as $u) {
						echo "<tr>";
						echo "<td scope='row'>".$u['id']."</td>";
						echo "<td>".$u['name']."</td>";
						echo "<td>".$u['subname']."</td>";
						echo "<td>".$u['email']."</td>";
						echo "<td>".$u['phone']."</td>";
						echo "<td>".$u['address']."</td>";
						echo "<td><button class='btn-info'><a href='./admin.php?c=user&a=delete&token=".$u['token']."' style='text-decoration: none; color:white;'>Supprimer</a></button></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>
