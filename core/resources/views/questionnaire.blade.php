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
                <select multiple class="form-control" name="search_sources_v2[]">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <br><br>


            <p>Rate the difficulty level of the task.</p>
                <div class="row">
                    <div class="col-xs-1" style="background-color:lavender;">Not at all Difficult</div>
                    <div class="col-xs-1" style="background-color:lavender;">Somewhat Difficult</div>
                    <div class="col-xs-1" style="background-color:lavender;">Medium</div>
                    <div class="col-xs-1" style="background-color:lavender;">Very Difficult</div>
                    <div class="col-xs-1" style="background-color:lavender;">Extremely Difficult</div>
                </div>

                <div class="row">
                    <div class="col-xs-1" style="background-color:lightgray;"><center><input class="radio-inline" type="radio" name="task_difficulty" value="not_difficult"></center>
                    </div>
                    <div class="col-xs-1" style="background-color:lightgray;"><center><input class="radio-inline" type="radio" name="task_difficulty" value="somewhat_difficult"></center>
                    </div>
                    <div class="col-xs-1" style="background-color:lightgray;"><center><input class="radio-inline" type="radio" name="task_difficulty" value="medium"></center>
                    </div>
                    <div class="col-xs-1" style="background-color:lightgray;"><center><input class="radio-inline" type="radio" name="task_difficulty" value="very_difficult"></center>
                    </div>
                    <div class="col-xs-1" style="background-color:lightgray;"><center><input class="radio-inline" type="radio" name="task_difficulty" value="extremely_difficult"></center>
                    </div>
                </div>


<!--
            <div class="container">
  <p>The form below contains three inline radio buttons:</p>
  <form>
    <label class="radio-inline">
      <input type="radio" name="optradio">Option 1
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio">Option 2
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio">Option 3
    </label>
  </form>
</div>
-->


<!--
                Language Used:<br>
                <input type="text" class="form-control" name="language" value="">
-->

                <br><br>

                <button type = "submit" class = "btn btn-default[]">Submit</button>

            </form>

            <!-- PHP Version 1 -->

            <div class="alert alert-danger">
                <ul>
                  <?php
                  foreach($errors->all() as $error){
                    echo "<li>$error</li>";
                  }
                  ?>
                </ul>
            </div>

            <!--  PHP version 2-->

<!--
            <div class="alert alert-danger">
                <ul>
                  <?php
                    foreach($errors->all() as $error)
                      {
                      ?>

                    <li>
                      <?php
                      echo $error;
                      ?>
                    </li>
                    
                    <?php
                      }
                    ?>

                </ul>

            </div>


            <div class="alert alert-danger">
                <ul>

                    @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                    @endforeach

                </ul>

            </div>
-->

        </div>

    </body>

</html>
