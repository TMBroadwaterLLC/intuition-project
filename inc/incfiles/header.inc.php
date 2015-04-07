<?
include ("inc/scripts/mysql_connect.inc.php");
session_start();
if (!isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
//header ("location: localhost:8888/index.php");
}

$get_unread_query = mysql_query("SELECT opened FROM pvt_messages WHERE user_to='$user' && opened='no'");
$get_unread = mysql_fetch_assoc($get_unread_query);
$unread_numrows = mysql_num_rows($get_unread_query);
$unread_numrows = "(".$unread_numrows.")";
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<title>inTuition</title>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
    	<!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a href="index.php" class="navbar-brand" >inTuition</a>
        </div>
			<?
			if (isset($_SESSION["user_login"])) {
			echo '
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
					<li><a href="' . $user . '" class="" >Profile</a></li>
					<li><a href="account_settings.php" class="" >Account Settings</a></li>
					<li><a href="sell-an-item.php" class="" >Sell an Item</a></li>
					<li><a href="your-item.php" class="" >Your Items</a></li>
					<li><a href="logout.php" class="" >Logout</a></li>
				</ul>
			';
			}
			else
			{
				echo '
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
						<li><a href="index.php" class="" >Sign Up </a></li>
						<li><a href="index.php" class="" >Login </a></li>
					</ul>
				';
			}
			?>
			<form class="navbar-form navbar-right" role="search">
            	<input type="text" class="Search" id="s" value="" placeholder="Search inTuition ..."/>
                <input type="submit" id="searchSubmit" value="submit" class="btn btn-primary" />
            </form>
		</div><!-- /.navbar-collapse -->
  	</div><!-- /.container-fluid -->
</nav>
        <div id="wrapper">
<br />
<br />
<br />
<br />