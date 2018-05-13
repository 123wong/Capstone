<!DOCTYPE html>
<html>
<head>
<title>Email message to Software Developer</title>
<link href="style.css" rel="stylesheet">
</head>
<!-- Body Starts Here -->
<body bgcolor="#ffe699">
<div class="container">
<!-- Feedback Form Starts Here -->
<div id="feedback">
<!-- Heading Of The Form -->
<div class="head">
<h3>Email messages</h3>
<p>This is email messages sent to Software Developers !</p>
</div>
<!-- Feedback Form -->
<form id="form" method="post" name="form" action="SwiftMailer.php">
<input name="recipient" placeholder="Recipient Email e.g. mail1@msn.com,mail2@msn.com" type="text" required value="">
<input name="subject" placeholder="Subject" type="text" value="" required>
<label>Message</label>
<textarea name="message" placeholder="Type your text here..." required></textarea>
<input id="send" name="submit" type="submit" value="Submit">
</form>


<h3>
<?php //include "secure_email_code.php"; ?></h3>
<?php include "SwiftMailer.php"; ?></h3>


</div>
<!-- Feedback Form Ends Here -->
</div>
</body>
<!-- Body Ends Here -->
</html>