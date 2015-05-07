<?php
	session_start();
	require_once('../core/Base.class.php');
	require_once('../core/Connection.class.php');
	$connection = Connection::getInstance();
	$base = Base::getInstance();


	$version = $_GET['version'];
  $currentVersion = 307;
  $newToolbarURL = "http://www.coagmento.org/getToolbar.php";
  if ($version<$currentVersion)
      echo "0;";
  else
      echo "1;";


	$userID = $base->getUserID();
	$projectID = $base->getProjectID();
	if ($projectID == 0) {
		$query = "SELECT projects.projectID FROM projects,memberships WHERE memberships.userID='$userID' AND (projects.description LIKE '%Untitled project%' OR projects.description LIKE '%Default project%') AND projects.projectID=memberships.projectID";
		$results = $connection->commit($query);
		$line = mysqli_fetch_array($results, MYSQL_ASSOC);
		$projectID = $line['projectID'];
	}

	$originalURL = $_GET['URL'];
	$title = $_GET['title'];
	$url = $originalURL;

	// Update the entry for the current page by this user

		$pageToRecord = $url.";:;".$title; // Demarker is ;:;
		$pageToRecord = addslashes($pageToRecord);
		$query = "SELECT * FROM options WHERE userID='$userID' AND `option`='current-page'";
		$results = $connection->commit($query);
		$line = mysqli_fetch_array($results, MYSQL_ASSOC);
		if (mysqli_num_rows($results)==0) {
			$query = "INSERT INTO options VALUES('','$userID','$projectID','current-page','$pageToRecord')";
			$results = $connection->commit($query);
		}
		else {
			$query = "UPDATE options SET projectID='$projectID',value='$pageToRecord' WHERE userID='$userID' AND `option`='current-page'";
			$results = $connection->commit($query);
		}

	if ($userID>0) {
		$query = "SELECT * FROM options WHERE userID='$userID' AND `option`='page-status'";
		$results = $connection->commit($query);
		$line = mysqli_fetch_array($results, MYSQL_ASSOC);
		$pageStatus = $line['value'];
		if ($pageStatus=='on') {
			$query = "SELECT (SELECT count(*) as num FROM pages WHERE projectID = '$projectID' AND url='$url' AND result=1) as bookmarked, (SELECT count(*) as num FROM pages WHERE projectID = '$projectID' AND url='$url') as views, (SELECT count(*) as num FROM annotations WHERE projectID = '$projectID' AND url='$url') as annotations,(SELECT count(*) as num FROM snippets WHERE projectID = '$projectID' AND url='$url') as snippets,(SELECT title FROM projects WHERE projectID='$projectID') as title";
			$results = $connection->commit($query);
			$line = mysqli_fetch_array($results, MYSQL_ASSOC);
			$title = $line['title'];

      if ($line['bookmarked'] == 0)
				$saved = 0;
			else
				$saved = 1;
			echo "$saved;";
      echo "Views: ".$line['views'];
      echo ";Annotations: ".$line['annotations'];
      echo ";Snippets: ".$line['snippets'];
      if ($title =="")
          $title = "N/A";
			echo ";Project: $title";

		} // if ($pageStatus=='on')
		else {
			$query = "SELECT (SELECT count(*) as num FROM pages WHERE userID='$userID' AND projectID='$projectID' AND url='$url' AND result=1) as bookmarked, (SELECT title FROM projects WHERE projectID='$projectID') as projectTitle";
			$results = $connection->commit($query);
			$line = mysqli_fetch_array($results, MYSQL_ASSOC);
      $title = $line['projectTitle'];

			if ($line['bookmarked'] == 0)
				$saved = 0;
			else
				$saved = 1;
			echo "$saved";
      if ($title =="")
          $title = "N/A";
			echo ";0;;;Project: $title";

		} // else with if ($pageStatus=='on')
	} // if ($userID>0)
	else
		echo "0; Views: N/A; Annotations: N/A; Snippets: N/A; Project: N/A";

	if ($version<$currentVersion)
	  echo ";$newToolbarURL";
?>
