<h4 class="sub_title">Liste de température</h4><br>
<div style="overflow-x:auto;">
<table class="table">
		<tr>
			<th>Id</th>
			<th>La cuisine</th>
			<th>La Chambre 1</th>
			<th>La chambre 2</th>
			<th>Le salle de salon</th>
			<th>Date</th>
		</tr>
		<?php
		if(!empty($tem)){
			foreach ($tem as $t) {
				echo '<tr>';
				echo "<td>".$t['id']."</td>";
				echo "<td>".$t['kitchen']." °C</td>";
				echo "<td>".$t['bedroom1']." °C</td>";
				echo "<td>".$t['bedroom2']." °C</td>";
				echo "<td>".$t['livingroom']." °C</td>";
				echo "<td>".$t['date']."</td>";
				echo "</tr>";
			}
		}
		?>
</table>
</div>