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

   <script>

    var s;
                // facebook initialization
                window.fbAsyncInit = function() {
                FB.init({
                  appId      : '1970025436566578',
                  cookie     : true,
                  xfbml      : true,
                  version    : 'v2.8'
                });
                FB.AppEvents.logPageView();   
              };

              (function(d, s, id){
                 var js, fjs = d.getElementsByTagName(s)[0];
                 if (d.getElementById(id)) {return;}
                 js = d.createElement(s); js.id = id;
                 js.src = "//connect.facebook.net/en_US/sdk.js";
                 fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));
                
                function login() {
                        FB.login(function(response) {
                                if (response.status === 'connected') {
                                // successful connection
                                s=response.authResponse.userID;
                                document.getElementById('login').style.visibility = 'hidden';
				                        document.getElementById('upload').style.display = 'block';

				                        getPhoto();
                        } else if (response.status === 'not_authorized') {
                                /*not logged in the app*/
				                alert("OOPS!!!Some error has occured or you're not_authorized");
                                        
                        } else {
                                /*not logged in the facebook account*/
					             alert("OOPS!!! Some error has occured please try it again");

                        }
                        }, {scope: 'publish_actions'});
                }
                // getting basic user info
                function getInfo() {
                        FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
                                console.log('response', response);
                        });
                }
                // uploading photo 
                
                function uploadPhoto() {
                       var source;
                      source="http://localhost/boozingo/"+s+"2.jpg"; 
                        
                FB.api(
                    "/me/photos",
                    "POST",
                    {
                        "url": "http://2.media.dorkly.cvcdn.com/58/64/a9e5a0dcbb872c0ec3dd9bd01f3980a1.jpg"

                    },
                    function (response)     

                         {
                                if (!response || response.error) {
                                        
					                               alert(response.error.message);
                                        console.log(response.error);//window.location.href="index.php";
                                } else {
                                       
						alert("Your photo has been successfuly uploaded");
						window.location.href="index.php";
                                }
                        });
                }


 function getPhoto()
        {
                FB.api(
                        "/me/picture",
                        {height : 400,
width:400},
                        function (response)
                        {
                                if(response && !response.error)
                                {
                                        // console.log('response.data', response.data.url);
                                        senddata2(response.data.url);
                                }
                                else {
                                        console.log(response.error);
                                }
                        }
                        )
        }

//overlay2
    function senddata2(url)
    {

        var params = "url="+encodeURI(url)+"&id="+s;
        console.log(url);
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "overlay2.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("done");

//                uploadPhoto();
                document.getElementById("test2").src=s+"2.jpg";

            }
        };

        xhttp.send(params);
    }

        </script>
<style>
.btn-social{position:relative;padding-left:44px;text-align:left;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.btn-social>:first-child{position:absolute;left:0;top:0;bottom:0;width:32px;line-height:34px;font-size:1.6em;text-align:center;border-right:1px solid rgba(0,0,0,0.2)}
.btn-social.btn-lg{padding-left:61px}.btn-social.btn-lg>:first-child{line-height:45px;width:45px;font-size:1.8em}
.btn-social.btn-sm{padding-left:38px}.btn-social.btn-sm>:first-child{line-height:28px;width:28px;font-size:1.4em}
.btn-social.btn-xs{padding-left:30px}.btn-social.btn-xs>:first-child{line-height:20px;width:20px;font-size:1.2em}

.btn-facebook{color:#fff;background-color:#3b5998;border-color:rgba(0,0,0,0.2)}.btn-facebook:focus,.btn-facebook.focus{color:#fff;background-color:#2d4373;border-color:rgba(0,0,0,0.2)}
.btn-facebook:hover{color:#fff;background-color:#2d4373;border-color:rgba(0,0,0,0.2)}
.btn-facebook:active,.btn-facebook.active,.open>.dropdown-toggle.btn-facebook{color:#fff;background-color:#2d4373;border-color:rgba(0,0,0,0.2)}
.btn-facebook:active:hover,.btn-facebook.active:hover,.open>.dropdown-toggle.btn-facebook:hover,.btn-facebook:active:focus,.btn-facebook.active:focus,.open>.dropdown-toggle.btn-facebook:focus,.btn-facebook:active.focus,.btn-facebook.active.focus,.open>.dropdown-toggle.btn-facebook.focus{color:#fff;background-color:#23345a;border-color:rgba(0,0,0,0.2)}
.btn-facebook:active,.btn-facebook.active,.open>.dropdown-toggle.btn-facebook{background-image:none}

body {
        background: url("bg.jpg") no-repeat center center fixed;
        
   background-size:cover;
}

.heading {
  font-family: 'Cherry Swash', cursive;
  color: #e0e0e0;
}

#login, #upload {
  margin-bottom:10px;
}

#logo {
        width: 100px;
        margin-top: 20px;
}


#test1 {
  width: 70%;
  margin: 20px;
  opacity: 0.7;
}

#test2 {
    width: 70%;
    margin: 20px;
    opacity: 0.7;
}

#test3 {
    width: 70%;
    margin: 20px;
    opacity: 0.7;
}
.img {
    position: absolute;
    left: -9999px;
}
input[type=radio]:checked + label>img {
    border: 1px solid #fff;
    box-shadow: 0 0 5px 5px #090;
}
@media only screen and (max-width: 700px) {
  #test1 {
    width: 50%; 
  }
    #test2 {
        width: 50%;
    }
    #test3 {
        width: 50%;
    }
}

@media only screen and (max-width: 500px) {
  #test1 {
    width: 70%; 
  }
    #test2 {
        width: 70%;
    }
    #test3 {
        width: 70%;
    }
}
</style>

<link href="https://fonts.googleapis.com/css?family=Cherry+Swash" rel="stylesheet">

  </head>

  <body>
    <div class="container-fluid text-center">
      <!-- <img id="logo" src="MOM.png"> -->
      <span class="heading">Frame</span>
      <p style="color: #bdbdbd">Get a cool ISWI badge on your Facebook profile picture</p>
      <p style="color: #9e9e9e">Login to Facebook with the button below. Your profile picture with ISWI badge will be displayed.
         Click on Upload to Facebook to set it as your Profile Picture.</p>
         <form onsubmit="function()">
      <div class="row">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4"> <input type="radio" id="img2" value="2" name="frame" class="img">
        <label for="img2"> <img id="test2" class="img-thumbnail" src="dummy.jpg" alt="DP" /></label></div>
        <div class="col-md-4">&nbsp;</div>
      </div>
        <div>
      <div>
        <div id="upload" style="display:none">
           <a href="#" onclick="uploadPhoto()" class="btn btn-lg btn-social btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i>
           Upload photo to Facebook</a>
        </div>
        <div id = "login">
           <a href="#" onclick="login()" class="btn btn-lg btn-social btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i>
           Login with Facebook</a> 
        </div>
      </div>
    </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>

