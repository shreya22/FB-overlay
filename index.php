<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ISWI 2k17">
    <title>ISWI | Frame</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="logic.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Cherry+Swash" rel="stylesheet">
  </head>


  <body>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="container-fluid text-center">
      <!-- <img id="logo" src="MOM.png"> -->
      <h1 class="heading">Get a cool ISWI badge on your Facebook profile picture</h1>
      <!-- <p>
        Login to facebook with the button below.
      </p>
          -->

      <form onsubmit="function()">
        <div class="row">
          <div class="col-md-4">&nbsp;</div>
          <div class="col-md-4"> <input type="radio" id="img2" value="2" name="frame" class="img">
            <label for="img2"> <img id="test2" class="img-thumbnail" src="dummy1.jpg" alt="DP" /></label>
          </div>
          <div class="col-md-4">&nbsp;</div>
        </div>

        <div id="upload" style="display:none">
           <a href="#" onclick="uploadPhoto()" class="btn btn-lg btn-social btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i>
           Upload photo to Facebook
           </a>
        </div>
        <div id = "login">
           <a href="#" onclick="login()" class="btn btn-lg btn-social btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i>
           Login with Facebook</a> 
        </div>
      </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>

