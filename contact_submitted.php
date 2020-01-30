<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	<title>Get in touch with NeurotechEU</title>
	<link rel="icon" href="images/icon.png" />

	<!-- This page cannot be found by search engines -->
	<meta name="robots" content="noindex" />

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/main.css" />
</head>
<body>

<!-- Header -->
<?php
include "html/header.html";
?>

<!-- Banner -->
<section id="banner" class="nofade">
	<div class="inner">
		<header><h1>Thank you for submitting!</h1></header>
	</div>
</section>


<?php
if (isset($_POST['submit'])) {
	unset($_POST['submit']);
	if (file_exists('../writable/messages.json')) {
		$data = json_decode(file_get_contents('../writable/messages.json'));
	} else {
		$data = array();
	}
	array_push($data, $_POST);
	file_put_contents('../writable/messages.json', json_encode($data), LOCK_EX);
}
?>

<!-- Footer -->
<?php
include 'html/footer.html';
?>

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.scrolly.min.js"></script>
<script src="js/jquery.scrollex.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/util.js"></script>
<script src="js/main.js"></script>

<script src="https://kit.fontawesome.com/12081b1371.js"></script>
<script src="js/random_banner.js"></script>

</body>
</html>