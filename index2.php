<?php

	include 'init2.php';
  $weather = "";
    $error = "";
   
    if (array_key_exists('city', $_GET)) {
        
        $city_name =  $_GET['city'];
  $api_key = '26de184a487c8e963e4a1109cad87dff';
  $api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid='.$api_key;
 $weather_data = json_decode(file_get_contents($api_url), true);

if ($weather_data['cod'] == 200) {
        $temperature = $weather_data['main']['temp'];
         $weather = round($temperature - 273.15);
        } else {
            
            $error = "Could not find city - please try again.";
            
        }


    }
 
?>

<!DOCTYPE html>

<html lang="en">
    
  <head>
      
    <meta charset="utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      
    <link rel="stylesheet" type="text/css" href="first.css">

      <style type="text/css">
      
        
          body {
              
              background: none;
              
          }
          
          .container {
              
              text-align: center;
              margin-top: 100px;
              width: 450px;
              
          }
         
          
          #weather {
              
              margin-top:15px;
              
          }
         
      </style>
      
  </head>
    
  <body data-spy="scroll" data-target="#navbar" data-offset="150" id="nnn">
    <nav class="navbar navbar-light bg-faded navbar-fixed-top" id="navbar">
         
           
          <ul class="nav navbar-nav" >
		  
            <li class="nav-item">
              <a class="nav-link" href="#nnn" style="color:white" id="gaurav" >Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#cflexh" style="color:white" id="gaurav" >About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer" style="color:white" id="gaurav">Contact</a>
            </li>
          </ul>
          
          <form class="form-inline pull-xs-right">
          <a href="SignUp.php"  <button class="btn btn-primary"  type="submit">Sign Up</button></a>
          <a href="login2.php" <button class="btn btn-success" type="submit">Log in</button></a>
          </form>
        
        </nav>
        
      <div class = "slider">
	  <div class = "load">
	  
	  </div>
	  <div class="content">
	  <div class="principal">

       <form>
  <fieldset class="form-group">

	     <p id="heading" >Find the weather</p>
		 <div id="common">

		   <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value = "<?php 
                                                       
                                                       if (array_key_exists('city', $_GET)) {
                                                       
                                                       echo $_GET['city']; 
                                                       
                                                       }
                                                       
                                                       ?>">
             </fieldset>
  
  <button type="submit" class="btn btn-danger">Submit</button>
</form>      


          <div id="weather"><?php 
              
              if ($weather) {
                  
  echo '<div class="alert alert-success" role="alert">The Weather in '.$city_name.' is  '.$weather.' degree celcius
</div>';
                  
              } else if ($error) {
                  
                  echo '<div class="alert alert-danger" role="alert">
  '.$error.'
</div>';
                  
              }
              
              ?></div>                                    
           

			</div>
		</div>
        </div>
         </div>		
		 
		 
		 
		  <div class="container">
      
        <div class="row" id="appSummary">
          
            <h1>Social Media </h1>
            <p class="lead">Click below to follow us on social media</p>
          
          </div>
          
      </div>
	  
	  <div id="cflexh">

    <a href="https://www.instagram.com/_iam.gourav/">
     <div class="card"  id="cflex">
      <div class="card-image"></div>
      <div class="card-text">
        
        <h2>Instagram</h2>
        <h5>Follow us on instagram and tag us to share your experience and query.</h5>
      </div>
      <div class="card-stats">
        <h1 style="color:white">Follow</h1>
      </div>
    </div>
   </a>
   
    <div class="card" id="cflex">
      <div class="card-image card2"></div>
      <div class="card-text card2">
        
        <h2>Twitter</h2>
        <h5>Follow us on twitter and tag us to share your experience and query.</h5>
      </div>
      <div class="card-stats card2">
         <h1 style="color:white" >Follow</h1>
      </div>
    </div>

    <a href="https://www.linkedin.com/in/gourav-srivastava-3485261b7/">
    <div class="card" id="cflex">
        <div class="card-image card3"></div>
        <div class="card-text card3">
        
          <h2>Linkedin</h2>
          <h5>Follow us on linkedin and tag us to share your experience and query.</h5>
        </div>
        <div class="card-stats card3">
           <h1 style="color:white" >Follow</h1>
        </div>
      </div>
    </a>
		  
	</div>
		
	  
		   <div id="footer">
      
        <div class="row">
          
                <h2 style="color:white">Download the app! </h2>
            
            <p class="lead" style="color:white">Really, why should I download this app??</p>
            
      
          </div>
      
      </div>
	  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js"></script>	
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
  </body>
    
</html>