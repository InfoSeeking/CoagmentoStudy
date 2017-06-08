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

                <br><br>

            <p>Search Sources:</p>
                <div class="checkbox">
                    <label><input type="checkbox" name="searchSource[]" value="google">Google</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="searchSource[]" value="yahoo">Yahoo</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="searchSource[]" value="bing">Bing</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="searchSource[]" value="firefox">FireFox</label>
                </div>

                <br><br>

            <p>Languge Used:</p>
                <div class="form-group">
                    <input type="text" name="language">
                </div>

                <br><br>

            <p>Describe the search tasks you do on a daily basis:</p>
                <div class="form-group">
                    <textarea class="form-control" rows="5" name="searchTasks"></textarea>
                </div>

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

            <div class="form-group">
                <label for="sel2">Mutiple select list (hold shift to select more than one):</label>
                <select multiple class="form-control" name="seach_sources_v2[]">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>


<!--
                Language Used:<br>
                <input type="text" class="form-control" name="language" value="">
-->

                <br><br>

                <button type = "submit" class = "btn btn-default[]">Submit</button>

            </form>

        </div>

<!--        <h1>Hello</h1>-->

    </body>

</html>
