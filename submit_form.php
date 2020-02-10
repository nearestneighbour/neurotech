<!DOCTYPE HTML>
<html>
<head>
	<!-- This page cannot be found by search engines -->
	<meta name="robots" content="noindex, nofollow" />
</head>
<body>
<?php

if (isset($_POST['submit'])) {
	# Forward message to postmaster@theneurotech.eu
	$body = "From: ".$_POST['name']." (".$_POST['mail']." - ".$_POST['role'].")\r\nDate: ".date('d-m-Y')."\r\nMessage: ".$_POST['msg'];
	$headers = array('From' => '"Neurotech Contact Form"', 'Content-Type' => 'text/plain; charset="utf-8"');
	mail('postmaster@theneurotech.eu', $_POST['name'], $body, $headers, '-f www-neurotech@science.ru.nl');
	# Save message as JSON
	unset($_POST['submit']);
	$_POST['date'] = date('d-m-Y');
	if (file_exists('../writable/messages.json')) {
		$data = json_decode(file_get_contents('../writable/messages.json'));
	} else {
		$data = array();
	}
	array_push($data, $_POST);
	file_put_contents('../writable/messages.json', json_encode($data), LOCK_EX);
	# Redirect to "thank you for submitting" page
	header('Location: submitted');
} else {
	header('Location: contact');
}

?>
</body>
</html>
