(function(){

    var s;
    // facebook initialization
    window.fbAsyncInit = function() {
        FB.init({
          appId      : '661044557419437',
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

    function uploadPhoto() {
        var source;
        source="http://karmyo.com/iswi/" +s+".jpg";            
        FB.api(
            "/me/photos",
            "POST",
            {
                "url": source,
		"caption": "aaa caption text"
            },
            function (response){
                if (!response || response.error) {
                    alert(response.error.message);
                    console.log(response.error);//window.location.href="index.php";
                } else {           
                    alert("Your photo has been successfuly uploaded");
                    window.location.href="index.php";
                }
            }
        );
    }

    function getPhoto()
    {
        FB.api(
            "/me/picture",
            {height : 400, width:400},
            function (response)
            {
                    if(response && !response.error)
                    {
                            senddata(response.data.url);
			    console.log('image url', response.data.url);
                    }
                    else {
                            console.log(response.error);
                    }
            }
        )
    }

    function senddata(url)
    {
        var params = "url="+encodeURI(url)+"&id="+s;
        console.log(params);
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "overlay2.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("done");

                document.getElementById("test2").src=s+".jpg";

            }
        };

        xhttp.send(params);
    }

    window.login= login;
    window.uploadPhoto= uploadPhoto;
    window.getPhoto= getPhoto;

})();

    
                

              
                
                
                // getting basic user info
                // function getInfo() {
                //         FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
                //                 console.log('response', response);
                //         });
                // }
                // uploading photo 
                
                




//overlay2
    
