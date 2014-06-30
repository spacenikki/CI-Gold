																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																	<html>
<head>
	<title>Ninja Money</title>
</head>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
<body>
	<div>
	<h3>Your Gold</h3> 
	<!-- return $_SESSION['gold'] <?php   ?> -->
	<!-- <div id='gold'> -->
	<?php  
		echo $this->session->userdata('gold')."<br>";
	?>

	</div>

	<div class='block'>
		<h3>Farm</h3>
		<h4>(earns 10-20 golds)</h4>
		<form action = '/process/farm' method='post'>
			<input type="hidden" name="building" value="farm" />
			<input type='submit' value='Find Gold!'>
		</form>
	</div> 	

	<div class='block'>
		<h3>Cave</h3>
		<h4>(earns 5-10 golds)</h4>
		<form action = '/process/cave' method='post'>
			<input type="hidden" name="building" value="cave" />
			<input type='submit' value='Find Gold!'>
		</form>
	</div> 	

	<div class='block'>	 
		<h3>House</h3>
		<h4>(earns 2-5 golds)</h4>	
		<form action='/process/house' method='post'>
			<input type="hidden" name="building" value="house" />
			<input type='submit' value='Find Gold!'>
		</form>
	</div> 	

	<div class='block'> 	
		<h3>Casino</h3>
		<h4>(earns/ takes 0-50 golds)</h4>	
		<form action= '/process/casino' method='post'> 
			<input type="hidden" name="building" value="casino" />
			<input type='submit' value='Find Gold!'>
		</form>
	</div> 	
	<form action='/process/reset'>
		<input type='submit' value='reset'>
	</form>

	<h4>Activities</h4>
	<div>
		<?php  
		// mistake i made -> i put isset!!! codelgnite -> never isset!
		// it will auto return true below !
		if ($this->session->userdata('activities'))
		{
			$array = $this->session->userdata('activities');
				foreach (array_reverse($array) as $activity) 
				{
					echo $activity."<br>";
				}
		}
		?>
	</div>
</body>
</html>