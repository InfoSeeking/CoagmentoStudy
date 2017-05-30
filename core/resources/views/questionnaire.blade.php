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
    
      
      <button type = "submit" class = "btn btn-default">Submit</button>
  </form>
            
<p>Search Sources:</p>
            <div class="checkbox">
      <label><input type="checkbox" value="">Option 1</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Option 2</label>
    </div>
    <div class="checkbox disabled">
      <label><input type="checkbox" value="" disabled>Option 3</label>
    </div>
</div>
        
<!--        <h1>Hello</h1>-->
    
    </body>

</html>
