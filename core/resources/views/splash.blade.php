<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  
  <title>Coagmento 2.0 Announcement</title>
  
	<link rel="icon" type="image/png" href="images/coagfavicon.png" />
  <!-- Bootstrap + FontAwesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<link href="css/splash.css" rel="stylesheet" />
</head>

<body>

<!-- Facebook SDK -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1638539226407668',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">  
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<li>--}}
                {{--<a target="_blank" id="facebook_share" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnew.coagmento.org"> --}}
                    {{--<i class="fa fa-facebook-square"></i>--}}
                    {{--Share--}}
                {{--</a>--}}
            {{--</li>--}}
             {{--<li>--}}
                {{--<a target="_blank" href="https://twitter.com/intent/tweet?status=Check%20out%20the%20next%20version%20of%20Coagmento%3A+http//new.coagmento.org"> --}}
                    {{--<i class="fa fa-twitter"></i>--}}
                    {{--Tweet--}}
                {{--</a>--}}
            {{--</li>--}}
			 {{--<li>--}}
                {{--<a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http://new.coagmento.org&title=Coagmento"> --}}
                    {{--<i class="fa fa-google-plus"></i>--}}
                    {{--Google+--}}
                {{--</a>--}}
            {{--</li>--}}
             {{--<li>--}}
                {{--<a target="_blank" href="https://github.com/InfoSeeking/Coagmento"> --}}
                    {{--<i class="fa fa-github"></i>--}}
                    {{--Github--}}
                {{--</a>--}}
            {{--</li>--}}
       {{--</ul>--}}
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
<div class="main" style="background-image: url('images/splash/bg16.jpg')">

<!--    Change the image source '/images/default.jpg' with your favourite image.     -->
    
    
     
<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    <div class="container">

		<h1 class="logo" itemprop="name">
            <img src="images/logo.png" itemprop="image" alt="logo" WIDTH=100 HEIGHT=100>
			COAGMENTO 2.0
        </h1>
		
        <div class="row">
			<div class="col-lg-12 motto">
				<h4>WELCOME TO THE STUDY!</h4>
        {{--<p><i class="fa fa-cog"> Thorough developer documentation and an <a href='{{ url("apidoc")}}/'>open API</a></i></p>--}}
        {{--<p><i class="fa fa-cog"> Realtime feed of user activity</i></p>--}}
        {{--<p><i class="fa fa-cog"> Up to date Firefox extension</i></p>--}}
				{{--<p><i class="fa fa-cog"> Easy setup for your own custom studies</i></p>--}}
                <form action='/auth/login' method='get'>
                    <button class='btn btn-success btn-fill' type='submit'>Log in</button>
                </form>
                <form action='/auth/register' method='get'>
                    <button class='btn btn-primary btn-fill' type='submit'>Register</button>
                </form>
            </div>
		</div>


       
    </div>
    <div class="footer">  
    </div>
 </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $("#facebook_share").on("click", function(e) {
            e.preventDefault();
            FB.ui({
                method: 'share',
                href: 'http://new.coagmento.org'
            });
        });
    </script>
 </body>
</html>