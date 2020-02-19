<!DOCTYPE HTML>
<html>
<head>
	<!-- This page cannot be found by search engines -->
	<meta name="robots" content="noindex, nofollow" />
</head>
<body>
<?php

if (isset($_POST['submit'])) {
	$filepath = $_SERVER['DOCUMENT_ROOT'] . "/../writable/messages.json";
	# Handle mailing list checkbox
	if (!(isset($_POST['update']) && $_POST['update'] == "Yes")) {
		$_POST['update'] = 'No';
	}
	# Handle role selection
	if (!isset($_POST['role'])) {
		$_POST['role'] = 'role not specified';
	}
	# Handle message
	if (!isset($_POST['msg'])) {
		$_POST['msg'] = '';
	}
	$body = "From: ".$_POST['name']." (".$_POST['mail']." - ".$_POST['role'].")\r\nDate: ".date('d-m-Y')."\r\nAdd to mailing list: ".$_POST['update']."\r\nMessage: \r\n".$_POST['msg'];

	# Forward message to postmaster@theneurotech.eu
	$headers = array('From' => '"Neurotech Contact Form"', 'Content-Type' => 'text/plain; charset="utf-8"');
	mail('contact@theneurotech.eu', $_POST['name'], $body, $headers, '-f www-neurotech@science.ru.nl');
	# Save message as JSON
	unset($_POST['submit']);
	$_POST['date'] = date('d-m-Y');

	if (file_exists($filepath)) {
		$data = json_decode(file_get_contents($filepath));
	} else {
		$data = array();
	}
	array_push($data, $_POST);
	file_put_contents($filepath, json_encode($data), LOCK_EX);

	# Redirect to "thank you for submitting" page
	header('Location: submitted');
} else {
	# If someone tries to access this page directly, redirect to contact page
	header('Location: .');
}

?>
</body>
</html>
