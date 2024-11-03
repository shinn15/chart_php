
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Chart PHP Test</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<h2 class="text-center mt-4 mb-3">Chart Test</h2>
	<div class="card">

		<div class="barnav">
  <navbar id="navbar" class="navbar">
  <ul class="bar-list">
    <li><a href="#question1">Question</a></li>
    <li><a href="#line_chart">Line chart</a></li>
    <li><a href="#donut_chart">Donut chart</a></li>
    <li><a href="#bar_chart">Bar chart</a></li>
</ul> 
  </navbar>
</div>
<br>
<div id="question1">
		<div class="card-header">Sample Survey!</div>
		<div class="card-body" id="card-body">

		<form action="chart.php" method="POST">
    <h2 class="mb-4">Choose Option only!</h2>

    <select id="selection_option" name="selection_option" tabindex="1" size="1" style="width: 240px;">
        <option id="option1s" value="option_1" selected>option 1</option>
        <option id="option2s" value="option_2">option 2</option>
        <option id="option3s" value="option_3">option 3</option>
    </select>
    

    <div class="form-group">
        <input type="submit" name="submit_btn" class="btn btn-primary" id="submit_btn" value="Submit!">
    </div>
</form>

			
		</div>
	
</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="card mt-4">
				<div class="card-header">line chart</div>
				<div class="chart-cointainer pie-chart">
					<canvas id="line_chart"></canvas>
				</div>
			</div>	
		</div>

		<div class="col-md-4">
			<div class="card mt-4">
				<div class="card-header">Donut chart</div>
				<div class="chart-cointainer pie-chart">
					<canvas id="donut_chart"></canvas>
					
				</div>
			</div>	
		</div>

		<div class="col-md-4">
			<div class="card mt-4">
				<div class="card-header">Bar chart</div>
				<div class="chart-cointainer pie-chart">
					<canvas id="bar_chart"></canvas>
					
				</div>
			</div>	
		</div>
	</div>
</div>

<?php

	$mysqli = require __DIR__ . "/connect.php";
//conect to sqli and read data
	$query = "SELECT * FROM table1";
	$result=mysqli_query($mysqli,$query);
//continuesly add
	foreach($result as $data){
		$option_selected[] = $data['selected'];
		$number_selected[]= $data['number_sel'];
		$date_added[] = $data['time_sel'];
	}

?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const mylinechart = document.getElementById('line_chart');
  const mydonutchart = document.getElementById('donut_chart');
  const mybarchart = document.getElementById('bar_chart');

  //line
  new Chart(mylinechart, {
    type: 'line',
    data: {
      labels: <?php echo(json_encode($option_selected)) ?>,
      datasets: [{
        labels: '',
        data:<?php echo(json_encode($number_selected)) ?>,
        backgroundColor: [
          'rgba(255, 255, 0,1)',
	      'rgba(255, 0, 0, 1)',
	      'rgba(0, 128, 0, 1)',
	      'rgba(0, 0, 255, 1)'
	    ],

	    borderColor: [
	      'rgba(255, 0, 0, 1)',
	      'rgba(0, 128, 0, 1)',
	      'rgba(0, 0, 255, 1)',
	    ],
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },

  });

  
//donut
  new Chart(mydonutchart, {
    type: 'doughnut',
    data: {
      labels: <?php echo(json_encode($option_selected)) ?>,
      datasets: [{
        labels: '',
        data:<?php echo(json_encode($number_selected)) ?>,
        backgroundColor: [
	      'rgba(255, 0, 0, 1)',
	      'rgba(0, 128, 0, 1)',
	      'rgba(0, 0, 255, 1)',

	    ],
	    borderColor: [
	      'rgba(255, 0, 0, 1)',
	      'rgba(0, 128, 0, 1)',
	      'rgba(0, 0, 255, 1)',
	    ],
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },

  });

//bar
  new Chart(mybarchart, {
    type: 'bar',
    data: {
      labels: <?php echo(json_encode($option_selected)) ?>,
      datasets: [{
        labels: '',
        data:<?php echo(json_encode($number_selected)) ?>,
        backgroundColor: [
	      'rgba(255, 0, 0, 1)',
	      'rgba(0, 128, 0, 1)',
	      'rgba(0, 0, 255, 1)',

	    ],
	    borderColor: [
	      'rgba(255, 0, 0, 1)',
	      'rgba(0, 128, 0, 1)',
	      'rgba(0, 0, 255, 1)',
	    ],
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },

  });


</script>



</body>
</html>

