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
            <div class="container">
                <div class="well">Please fill out this form as soon as possible</div>
            </div>

            <form method="POST" action="/questionnaire">
                {{ csrf_field() }}

                <br><br>

<!--            <p>Select Your Year in College:</p>-->
                
            <div class="form-group">
                <label for="sel1">Select Year in College:</label>
                <select class="form-control" id="sel1" name="college_year">
                    <option>Freshman</option>
                    <option>Sophomore</option>
                    <option>Junior</option>
                    <option>Senior</option>
                </select>
                <br>
            </div>
                
            <br><br>

            <button type = "submit" class = "btn btn-success">Submit</button>

            </form>
            
            <div class="alert alert-errror">
                <ul>
                
                    @foreach($errors->all() as $error)
                    
                    <li>{{$error}}</li>
                    
                    @endforeach
                    
                </ul>
            
            </div>

        </div>

    </body>

</html>
