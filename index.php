<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<?php
	require_once "controller/object/Database.php";
?>
<html>
  <head>
    <title>projet Tatoo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/lib/w3.css">
    <link rel="stylesheet" href="view/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
    <?php
    require_once "view/templates/header.php";

	if (isset($_GET['param_url'])) {
		if($_GET["param_url"] == "home.php"){
			 require_once "view/pages/home.php";
		}

		else if($_GET["param_url"] == "tatoueurprofil.php"){
			require_once "view/pages/tatoueurprofil.php";
		}

		else if($_GET["param_url"] == "form.php"){
			require_once "view/pages/form.php";
		}

		else if($_GET["param_url"] == "tatoueurs.php"){
			require_once "view/pages/tatoueurs.php";
		}

		else if($_GET["param_url"] == "galerie.php"){
			require_once "view/pages/galerie.php";
		}
	}
	else {
			require_once "view/pages/home.php";
		}

    ?>

		<script type="text/javascript" src="view/js/input.js"></script>
    <script type="text/javascript" src="view/js/notes.js"></script>
		<?php
    session_unset();
    session_destroy();
    ?>
  </body>
</html>