<? include("inc/incfiles/header.inc.php"); ?>
<?
//session_start();
?>
<?
if (!isset($_SESSION["user_login"])) {
     //echo "<meta http-equiv=\"refresh\" content=\"0; url=sell-an-item.php\">";
}
else
{
    //echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";	
}
?>
<?
$reg = @$_POST['reg'];
//declaring variables to prevent errors
$fn = ""; //First Name
$ln = ""; //Last Name
$un = ""; //Username
$em = ""; //Email
$em2 = ""; //Email 2
$pswd = ""; //Password
$pswd2 = ""; // Password 2
$d = ""; // Sign up Date
$u_check = ""; // Check if username exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d"); // Year - Month - Day

if ($reg) {
if ($em==$em2) {
// Check if user already exists
$u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
// Count the amount of rows where username = $un
$check = mysql_num_rows($u_check);
//Check whether Email already exists in the database
$e_check = mysql_query("SELECT email FROM users WHERE email='$em'");
//Count the number of rows returned
$email_check = mysql_num_rows($e_check);
if ($check == 0) {
  if ($email_check == 0) {
//check all of the fields have been filled in
if ($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
// check that passwords match
if ($pswd==$pswd2) {
// check the maximum length of username/first name/last name does not exceed 25 characters
if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
echo "The maximum limit for username/first name/last name is 25 characters!";
}
else
{
// check the maximum length of password does not exceed 25 characters and is not less than 5 characters
if (strlen($pswd)>30||strlen($pswd)<5) {
echo "Your password must be between 5 and 30 characters long!";
}
else
{
//encrypt password and password 2 using md5 before sending to database
$pswd = md5($pswd);
$pswd2 = md5($pswd2);
$query = mysql_query("INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$d','0')");
die("<h2>Welcome to findFriends</h2>Login to your account to get started ...");
}
}
}
else {
echo "Your passwords don't match!";
}
}
else
{
echo "Please fill in all of the fields";
}
}
else
{
 echo "Sorry, but it looks like someone has already used that email!";
}
}
else
{
echo "Username already taken ...";
}
}
else {
echo "Your E-mails don't match!";
}
}
?>
<?
//Login Script
//session_start();
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
	$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
	$password_login_md5 = md5($password_login);
	$sql = mysql_query("SELECT id FROM users WHERE username='$user_login' AND password='$password_login_md5' LIMIT 1"); // query the person
	//Check for their existence
	$userCount = mysql_num_rows($sql); //Count the number of rows returned
	if ($userCount == 1) {
		while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
	}
		 $_SESSION["user_login"] = $user_login;
         //header("location: localhost:8888/index.php");
		 exit();
		} else {
		echo 'That information is incorrect, try again';
		exit();
	}
}
?>

<div class="container">
<div id="home-description" class="col-sm-4">
	<h3>Buy, Sell & Trade On Your College Campus!</h3>
	<h3>Textbooks, iPads, Furniture & More!</h3>
	<h3>Signup Free Today!</h3>
</div> 

<div id="home-left-login" class="col-sm-4">        
            <h2>Already a Member? Login below ...</h2>
            <form action="index.php" method="POST">
				<div class="form-group">
                	<input type="text" size="40" name="user_login" class="form-control" placeholder="Username"/><p />
				</div>
                <div class="form-group">
                	<input type="text" size="40" name="password_login" class="form-control" placeholder="Password"/><p />
				</div>
                <div class="form-group">
                	<input type="submit" name="login" value="Login" class="btn btn-primary">
                </div>
			</form>
            </div>
           <div id="home-right-signup" class="col-sm-4">
            <h2>Sign up Below ...</h2>
           <form action="index.php" method="post">
           <div class="form-group">
           	<input type="text" size="40" name="fname"  class="form-control" title="First Name" value="<? echo $fn; ?>" placeholder="First Name"><p />
           </div>
           <div class="form-group">
           	<input type="text" size="40" name="lname" class="form-control" title="Last Name" value="<? echo $ln; ?>" placeholder="Last Name"><p />
           </div>
           <div class="form-group">
           	<input type="text" size="40" name="username" class="form-control" title="Username" value="<? echo $un; ?>" placeholder="Username"><p />
           </div>
           <div class="form-group">
           	<input type="text" size="40" name="email" class="form-control" title="Email" value="<? echo $em; ?>" placeholder="Email"><p />
           </div>
           <div class="form-group">
           	<input type="text" size="40" name="email2" class="form-control" title="Repeat Email" value="<? echo $em2; ?>" placeholder="Confirm Email"><p />
           </div>
           <div class="form-group">
           	<input type="password" size="40" name="password" class="form-control" value="<? echo $pswd; ?>" placeholder="Password"><p />
           </div>
           <div class="form-group">
           <input type="password" size="40" name="password2" class="form-control" value="<? echo $pswd2; ?>" placeholder="Confirm Password"><p />
           </div>
           <div class="form-group">
           	<input type="submit" name="reg" value="Sign Up!" class="btn btn-primary">
           </div>
           </form>
           </div>
</div>
</div><!--end container-->
</body>
</html>