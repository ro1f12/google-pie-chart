<?php
	//connection
	$conn = new mysqli('localhost', 'root', '', 'mydatabase');
 
	$sql = "SELECT gender, count(*) as number FROM members GROUP BY gender";
	$query = $conn->query($sql);
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>How to Create a Simple Pie Chart using Google Chart API using PHP/MySQLi</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<!-- this is where we show our chart -->
<div id="piechart" style="width: 900px; height: 500px;"></div>
 
<!-- Load our Scripts -->
<script type="text/javascript" src="<a href="https://www.gstatic.com/charts/loader.js"></script>" rel="nofollow">https://www.gstatic.com/charts/loader.js"></script></a>  
<script type="text/javascript">  
	google.charts.load('current', {'packages':['corechart']});  
	google.charts.setOnLoadCallback(drawChart);  
	function drawChart(){  
    var data = google.visualization.arrayToDataTable([  
              	['Gender', 'Number'],  
              	<?php  
	              	while($row = $query->fetch_assoc()){  
	               		echo "['".$row["gender"]."', ".$row["number"]."],";  
	              	}  
              	?>  
         	]);  
    var options = {  
          		title: 'Percentage of Male and Female Members',  
          		//is3D:true,  
          		pieHole: 0.4  
         	};  
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
    chart.draw(data, options);  
}  
</script>
</body>
</html>
