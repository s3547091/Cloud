<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<meta charset=utf-8>
	<link rel=stylesheet id=pagestyle href=default.css>
	<script src=navigate.js></script>
	<script src=dropdown.js></script>
	<script src=swapstyles.js></script>
</head>
<body>
<div id=container>

	<header>
		<h1>Queensland Weather</h1>
	</header>
	
	<nav id='local'>
		<a href=index.php>Home</a>
		<a href=forecast.php>Forecast</a>
		<a href=sunlight.php>Sunlight</a>
		<a href=weather.php>Weather</a>
	</nav>
	
	<nav id='dropdown'>
		<form>
			<select id="menu"  onchange="doMenu();">
				<option>Select Data</option>
				<option value="forecast.php">Forecast</option>
				<option value="sunlight.php">Sunlight</option>
				<option value="weather.php">Weather</option>
			</select>
		</form>
	</nav>
	
	
	<h3>Welcome to the Weather website</h3>
	<p>Select any of the links above to visit a weather page</p>
	
</body>
	
	<footer>
		<p>&copy;2020 Aqram Abdul Rahman s3547091 Aimerance Ndayisaba s3722355</p>
		<div class=styles>
		<button onclick="swapStyleSheet('default.css')">Default Style</button>
	    <button onclick="swapStyleSheet('alternate.css')">Alternate Style</button>
		</div>
	</footer>
	
</html>