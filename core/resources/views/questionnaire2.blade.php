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
            
            <title>Example of Bootstrap 3 Readonly Inputs</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
<body>
    <div class="bs-example">
        <form>
            <input type="text" class="form-control" placeholder="Please fill out this form as soon as possible." readonly="readonly">
        </form>
    </div>
</body>
            
            <form method="POST" action="/questionnaire2">
                {{ csrf_field() }}
                <br><br>

<!--            <p>Select Your Year in College:</p>-->
                
            <div class="form-group">
                <label for="sel1">Select Year in College:</label>
                <select class="form-control" id="sel1" name="collegeYear">
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
            
            @if(count($errors))
            <div class="alert alert-danger">
                <ul>

                    @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                    @endforeach

                </ul>

            </div>
            @endif

        </div>

    </body>

</html>
