<?php

    function curl($url) {
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $data = curl_exec($ch);
            curl_close($ch);

            return $data;
        } 

    if ($_GET['city']) {
        
        $urlContents = curl("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&type=accurate&appid=f7594438429f7e2ddfc1c22fc8df3894");
        
        $weatherArray = json_decode($urlContents, true);
        
        $weather = "The weather in ".$_GET['city']." is currently ".$weatherArray['weather'][0]['description'].".";
        
        $tempInFahrenheit = intval($weatherArray['main']['temp']* 9/5 - 459.67);
        
        $speedInMPH = intval($weatherArray['wind']['speed']*2.24);
        
        $weather .=" The temperature is ".$tempInFahrenheit."&deg; F with a wind speed of ".$speedInMPH." MPH."; 
    }
?>

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
	
	<main>
		
<h2>Weather Forecast</h2>
		
<div class="container">
         
        <h1>What's the Weather?</h1>
         
         <form>
          <div class="form-group">
            <label for="city">Enter the name of a city.</label>
            <input type="text" class="form-control" id="city" name="city" aria-describedby="city" placeholder="E.g. New York, Tokyo" value="<?php echo $_GET['city']; ?>">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
         <div id="weather">
          <?php 
            if($weather) {
                echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
            } else {
                if ($_GET['city'] !="") { 
                    echo '<div class="alert alert-danger" role="alert">Sorry, that city could not be found.</div>';
                }
            }
          ?>
      </div>
     </div> 
  
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		
	</main>
	
	<footer>
		<p>&copy;2020 Aqram Abdul Rahman s3547091 Aimerance Ndayisaba s3722355</p>
		<div class=styles>
		<button onclick="swapStyleSheet('default.css')">Default Style</button>
	    <button onclick="swapStyleSheet('alternate.css')">Alternate Style</button>
		</div>
	</footer>
	
	
<div>
</body>
</html>