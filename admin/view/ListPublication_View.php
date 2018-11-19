<div class="card tableList">
	<h4><b>Liste des publications</b></h4>

	<div style="overflow-x:auto;">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col"></th>
					<th scope="col">Sujet</th>
					<th scope="col">Résumé</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($pub as $p){
						echo '<tr>';
						echo "<td scope='row'>".$p['id']."</td>";
						echo "<td>".$p['subject']."</td>";
						echo "<td>".$p['resume']."</td>";
						echo "<td><button class='btn btn-info'><a href='./admin.php?c=publication&a=pub&id=".$p['id']."' style='text-decoration: none; color:white;'>Voir</a></button></td>";
						echo "</tr>";
					} 
				?>
			</tbody>
		</table>
	</div>
</div>
