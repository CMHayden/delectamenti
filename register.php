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
$password = $_POST['passwd']; // required
$email = $_POST['email']; // required
$secret = $_POST['secret_answer']; // required

$sql = "INSERT INTO Users (user_name, email, passwd, secret_answer)
VALUES ('$username', '$email','$password', '$secret')";

if ($conn->query($sql) === TRUE) {
		// sets email where appropriate
                        $mailFrom = "Delectamenti <md46@macs.hw.ac.uk>";
                        $mailTo = $email;
                        $mailCC = "md46@hw.ac.uk;cmh1@hw.ac.uk;mdehome@demonuk.org";
                        $mailSubject = "Welcome to Delectamenti!";
                        // compose email
                        $mailBody = "Dear $username,\r\n".
                        "Thank you for signing up to our online recipe community, we're delighted to have you on board.\r\n".
                        "We're just getting started and have a lot in store, so, please do keep an eye on our website.\r\n".
						"Also, remember to follow us on Social Media - we're at @delectamentiuk on your favourite platforms.\r\n".
						"Thank you,\r\n".
						"Team Delectamenti.";

                        // glue the headers together
                        $mailHeaders = "From: $mailFrom" . "\r\n" .
                        "CC: $mailCC" . "\r\n" .
                        "X-Mailer: Error Handler";
		mail($mailTo,$mailSubject,$mailBody,$mailHeaders);
    echo '
    <html>
    <head>
        <meta charset="UTF-8"></meta>
        <meta name="description" content="A website gathering recipes and helping to teach people how to cook."></meta>
        <meta name="keywords" content="Delectamenti. Food. Eat. Cook. Recipe."></meta> <!-- used by search engines -->
        <meta name="author" content="Callum M Hayden & Martyn Dewar"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta> <!-- used for RWD -->
    	  <title>Login</title>
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
        Account created succesfully! Fill in the form bellow to log in: <br /><br />
        <form name="login" method="post" action="login.php">
          <label for="username">Username</label>
          <input type="text" id="user_name" name="user_name" placeholder="Your username.."></input>
          <br />
          <label for="lname">Password</label>
          <input type="password" id="passwd" name="passwd" placeholder="Your password..."></input>
          <br />
          <input type="submit" value="Log In"></input>
          <input type="button" value="Sign Up" onclick="window.location.href="signup.html"></input>
          <input type="button" value="Forgot Password" onclick="window.location.href="forgotpassword.html"></input>
        </form>
      </div>
    </body>
    <footer>
      <div class ="footer" id="footer">';
			include 'includes/footer.php'; echo'
      </div>
    </footer>
    </html>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
