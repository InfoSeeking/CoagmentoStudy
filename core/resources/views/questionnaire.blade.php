<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        
        <div class="container">
  <h2>Questionnaire</h2>
  <p>Gender:</p>
  <form method="POST" action="/questionnaire">
      {{ csrf_field() }}
    <div class="radio">
      <label><input type="radio" name="gender" value="male">Male</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="gender" value="female">Female</label>
    </div>
      
    <p>Search Sources:</p>
    <div class="checkbox">
      <label><input type="checkbox" value="">Google</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Yahoo</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Bing</label>
    </div>
    <div class="checkbox disabled">
      <label><input type="checkbox" value="">FireFox</label>
    </div>
      
      <button type = "submit" class = "btn btn-default">Submit</button>
  </form>
            
</div>
        
<!--        <h1>Hello</h1>-->
    
    </body>

</html>
