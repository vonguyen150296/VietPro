<h4 class="sub_title">La coube de tendance</h4><br>

<div>
	<canvas id="bar-chart-grouped" width="800" height="450"></canvas>
</div>

<script type="text/javascript">

	new Chart(document.getElementById("bar-chart-grouped"), {
	    type: 'bar',
	    data: {
	      labels: [<?php 
		      for ($i=1; $i<$temps[0]['num'];$i++){
		      	echo $i.",";
		      }
		      	echo $i;	      
		      ?>],
	      datasets: [
	        {
	          label: "La Cbambre 1",
	          backgroundColor: "#3e95cd",
	          data: [<?php 
		      for ($i=0; $i<$temps[0]['num']-1;$i++){
		      	echo $temps[$i]['bedroom1'].",";
		      }
		      	echo $temps[$i]['bedroom1'];	      
		      ?>]
	        }, {
	          label: "La Chambre 2",
	          backgroundColor: "#8e5e11",
	          data: [<?php 
		      for ($i=0; $i<$temps[0]['num']-1;$i++){
		      	echo $temps[$i]['bedroom2'].",";
		      }
		      	echo $temps[$i]['bedroom2'];	      
		      ?>]
	        },
	         {
	          label: "La salle de salon",
	          backgroundColor: "#8e1111",
	          data: [<?php 
		      for ($i=0; $i<$temps[0]['num']-1;$i++){
		      	echo $temps[$i]['livingroom'].",";
		      }
		      	echo $temps[$i]['livingroom'];	      
		      ?>]
	        },
	         {
	          label: "La cuissine",
	          backgroundColor: "#8e11a2",
	          data: [<?php 
		      for ($i=0; $i<$temps[0]['num']-1;$i++){
		      	echo $temps[$i]['kitchen'].",";
		      }
		      	echo $temps[$i]['kitchen'];	      
		      ?>]
	        }
	      ]
	    },
	    options: {
	      title: {
	        display: true,
	        text: 'Les <?php echo $temps[0]['num']?> dernières températures'
	      }
	    }
	});
	
	
</script>