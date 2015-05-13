<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#7eb3dd;border-bottom:3px black groove">
  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->


    <div class="navbar-header" style="border-right:1px white solid; height:55px; margin-top:2px; margin-bottom:2px; margin-right: 5px;">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" style="padding: 2px 10px;" href="index.php"><img alt="Coagmento" src="assets/img/clogo.png"></a>

    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a class="btn" href="createProject.php" style="color:white; background-color:#0000CB;padding-top:5px;padding-bottom:5px;margin-top:10px;margin-left:5px;padding-left:8px;padding-right:8px">Create Project</a></li>


        <li class="dropdown">


            <?php
            $base = Base::getInstance();
            $project_results = $base->getAllProjects();
            $items = "";
            $selected = "Select a Project";
            while($row = mysqli_fetch_assoc($project_results)) {
              if($row["projectID"] == $base->getSelectedProject()){
                $selected = $row["title"];
              }
              $items .=  sprintf("<li><a href='%s'>%s</a></li>", "selectProject.php?value=" . $row['projectID'], $row["title"]);
            }
            ?>
            <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:white; background-color:#0000CB;padding-top:5px;padding-bottom:5px;margin-top:10px;margin-left:5px;padding-left:8px;padding-right:8px">

            <?php echo $selected; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            <?php echo $items; ?>

          </ul>
        </li>

        <li>

          <a href="etherpad.php" title="Project etherpad"><span class="glyphicon glyphicon-edit"  style="font-size:25px; color:white"></span></a>
          <!-- <a href="etherpad.php" style="padding-top: 0;padding-bottom: 0;"><img alt="Edit" height="50"  src="../assets/img/edit_trans.png"></a> -->
          </li>
        <li>
          <a href="files.php" title="Project files"><span class="glyphicon glyphicon-folder-open"  style="font-size:25px; color:white"></span></a>
          <!-- <a href="files.php" style="padding-top: 0;padding-bottom: 0;"><img height="50" alt="Files" src="../assets/img/files_trans.png"></a> -->
          </li>
        <li>
          <a href="printreport.php" title="Print project reports"><span class="glyphicon glyphicon-print" style="font-size:25px; color:white"></span></a>
          <!-- <a href="printreport.php" style="padding-top: 0;padding-bottom: 0;"><img alt="Print" height="50"  src="../assets/img/print_trans.png" /></a> -->
          </li>
        <li>
          <a href="currentCollaborators.php" title="View project collaborators"><i class="fa fa-group" style="font-size:25px; color:white"></i></a>
          <!-- <a href="currentCollaborators.php" style="padding-top: 0;padding-bottom: 0;"><img height="50"  alt="Collaborators" src="../assets/img/updates_trans.png"></a> -->
          </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown callout">

          <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" style="font-size:25px"></i> <span class="caret"></span></a>

          <!-- <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false" style="padding-top: 0;padding-bottom: 0;"><img height="50" alt="Pic" style="border-radius:100%" src="../assets/img/profile_trans.png" /> <span class="caret"></span></a> -->
          <ul class="dropdown-menu" role="menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="workspace-logout.php?redirect=index.php">Logout</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-option-horizontal" id="logIcon" style="font-size:20px"></span> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="help.php">Help</a></li>
            <li><a href="#">Contact Us</a></li>
            <li class="divider"></li>
            <li><a href="http://coagmento.org/download.php">Get Toolbar</a></li>
            <li><a href="#">Recommendation</a></li>
            <li><a href="interProject.php">Inter-Project</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  <?php if(isset($PAGE)): ?>
  <div class="feed-links clear">
    <ul>
      <li><a class="<?php if($PAGE == 'ALL') echo 'current ' ?>" href="?page=ALL">All</a></li>
      <li><a class="<?php if($PAGE == 'PAGE_VISITS') echo 'current ' ?>" href="?page=PAGE_VISITS">Page Visits</a></li>
      <li><a class="<?php if($PAGE == 'BOOKMARKS') echo 'current ' ?>" href="?page=BOOKMARKS">Bookmarks</a></li>
      <li><a class="<?php if($PAGE == 'SNIPPETS') echo 'current ' ?>" href="?page=SNIPPETS">Snippets</a></li>
      <li><a class="<?php if($PAGE == 'SEARCHES') echo 'current ' ?>" href="?page=SEARCHES">Search History</a></li>
    </ul>
  </div> <!-- /.feed-links -->
  <?php endif; ?>
</nav>
