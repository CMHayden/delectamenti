<?php
$servername = "mysql-server-1";
$username = "cmh1";
$password = "abccmh1354";
$DB_Name = "cmh1";

// Create connection
$conn = new mysqli($servername, $username, $password, $DB_Name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['user_name']; // required
$secret = $_POST['secret_answer']; // required
$email = $_POST['email']; // required


$sql = "SELECT user_name, passwd FROM Users WHERE user_name ='$username' AND email ='$email' AND secret_answer='$secret'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        echo '
        <html>
        <head>
            <meta charset="UTF-8"></meta>
            <meta name="description" content="A website gathering recipes and helping to teach people how to cook."></meta>
            <meta name="keywords" content="Delectamenti. Food. Eat. Cook. Recipe."></meta> <!-- used by search engines -->
            <meta name="author" content="Callum M Hayden & Martyn Dewar"></meta>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta> <!-- used for RWD -->
        	  <title>Logged in</title>
            <link rel="stylesheet" media="screen and (min-width: 550px)" href="style.css"></link>
            <link rel="stylesheet" media="screen and (max-width: 550px)" href="smallstyle.css"></link>
        </head>
        <body>
        <div class = "wrapper" id="wrapper">
          <div class = "socialsearch" id="socialsearch">
            <a href=https://www.instagram.com/delectamentiuk><img src="Image/instagram.png" alt="Instagram link" width="25" height="25"></img></a>
            <a href=https://twitter.com/DelectamentiUk><img src="Image/twitter.png" alt="Twitter link" width="25" height="25"></img></a>
            <a href=https://www.pinterest.co.uk/delectamenti/pins/><img src="Image/pinterest.png" alt="Pinterest link" width="25" height="25"></img></a>
            <a href=https://www.facebook.com/DelectamentiUK/><img src="Image/facebook.png" alt="Facebook link" width="25" height="25"></img></a>
          </div>
          <div class = "search" id="search">
            <form>
              <input type="text" name="search" placeholder="Search.."></input>
            </form>
          </div>
          <div class = "logo" id="logo">
            <a href="index.html"><h1>Delectamenti</h1></a>
          </div>
          <div class = "nav" id="myNav">';
			include 'includes/nav.php'; echo'
          </div>
          <div class = "display">
          All information is correct, please change your password using the form bellow:
          <br /><br />
          <form name="changepw" method="post" action="changepw.php">
            <label for="username">Username</label>
            <input type="text" id="user_name" name="user_name" placeholder="Your username.."></input>
            <br />
            <label for="password">New password</label>
            <input type="password" id="passwd" name="passwd" placeholder="Your new password..."></input>
            <br />
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Your email..."</input>
            <br />
            <input type="submit" value="Change password"></input>
        </div>
      </body>
      <footer>
        <div class ="footer" id="footer">';
			include 'includes/footer.php'; echo'
        </div>
      </footer>
      </html>';
} else {
    echo'
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8"></meta>
        <meta name="description" content="A website gathering recipes and helping to teach people how to cook."></meta>
        <meta name="keywords" content="Delectamenti. Food. Eat. Cook. Recipe."></meta> <!-- used by search engines -->
        <meta name="author" content="Callum M Hayden & Martyn Dewar"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta> <!-- used for RWD -->
    	  <title>Forgot password</title>
        <link rel="stylesheet" media="screen and (min-width: 550px)" href="style.css"></link>
        <link rel="stylesheet" media="screen and (max-width: 550px)" href="smallstyle.css"></link>
    </head>
    <body>
    <div class = "wrapper" id="wrapper">
      <div class = "socialsearch" id="socialsearch">
        <a href=https://www.instagram.com/delectamentiuk><img src="Image/instagram.png" alt="Instagram link" width="25" height="25"></img></a>
        <a href=https://twitter.com/DelectamentiUk><img src="Image/twitter.png" alt="Twitter link" width="25" height="25"></img></a>
        <a href=https://www.pinterest.co.uk/delectamenti/pins/><img src="Image/pinterest.png" alt="Pinterest link" width="25" height="25"></img></a>
        <a href=https://www.facebook.com/DelectamentiUK/><img src="Image/facebook.png" alt="Facebook link" width="25" height="25"></img></a>
      </div>
      <div class = "search" id="search">
        <form>
          <input type="text" name="search" placeholder="Search.."></input>
        </form>
      </div>
      <div class = "logo" id="logo">
        <a href="index.html"><h1>Delectamenti</h1></a>
      </div>
      <div class = "nav" id="myNav">';
			include 'includes/nav.php'; echo'
      </div>
      <div class = "display">
        No user found with that username, secret message and email combination. Please try again: <br /><br />
        <form name="login" method="post" action="forgotpasswd.php">
          <label for="username">Username</label>
          <input type="text" id="user_name" name="user_name" placeholder="Your username..."></input>
          <br />
          <label for="secret_answer">Secret message</label>
          <input type="text" id="secret_answer" name="secret_answer" placeholder="Your secret message..."></input>
          <br />
          <label for="email">Email address</label>
          <input type="text" id="email" name="email" placeholder="Your email..."></input>
          <br />
          <input type="submit" value="Submit"></input>
          <input type="button" value="Log In" onclick="window.location.href="login.html""></input>
          <input type="button" value="Sign Up" onclick="window.location.href="signup.html""></input>
        </form>
      </div>
    </body>
    <footer>
      <div class ="footer" id="footer">';
			include 'includes/footer.php'; echo'
      </div>
    </footer>
    </html>';
}
$conn->close();
?>
