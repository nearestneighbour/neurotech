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
		<header><h2>Thank you for submitting!</header>
	</div>
</section>


<?php

$txt = $_POST['name'] . '|||' . $_POST['mail'] . '|||' . $_POST['msg'] . '|||' . $_POST['role'] . PHP_EOL;

file_put_contents('../writable/formresults.txt', $txt,  FILE_APPEND | LOCK_EX);

?>


<!-- Partner list horizontal -->
<footer class="wrapper style1 logos">
	<div class="inner">
		<div class="flex flex-8">
			<div class="col align-center"><div class="image round fit">
					<a href="partners.html#radboud"><img src="images/partner_logos/radboud.png" alt="Radboud University"/></a>
			</div></div>
			<div class="col align-center"><div class="image round fit">
					<a href="partners.html#umh"><img src="images/partner_logos/umh.png" alt="Miguel Hernandez University"/></a>
			</div></div>
			<div class="col align-center"><div class="image round fit">
					<a href="partners.html#karolinska"><img src="images/partner_logos/karo.png" alt="Karolinska Institute"/></a>
			</div></div>
			<div class="col align-center"><div class="image round fit">
					<a href="partners.html#bonn"><img src="images/partner_logos/bonn.png" alt="Bonn University"/></a>
			</div></div>
			<div class="col align-center"><div class="image round fit">
					<a href="partners.html#bogazici"><img src="images/partner_logos/boga.png" alt="Bogazici University"/></a>
			</div></div>
			<div class="col align-center"><div class="image round fit">
					<a href="partners.html#oxford"><img src="images/partner_logos/oxford.png" alt="Oxford University"/></a>
			</div></div>
			<div class="col align-center"><div class="image round fit">
					<a href="partners.html#cluj"><img src="images/partner_logos/cluj.png" alt="Cluj-Napoca University"/></a>
			</div></div>
			<div class="col align-center"><div class="image round fit">
					<a href="partners.html#debrecen" class="scrolly"><img src="images/partner_logos/debrecen.png" alt="University of Debrecen"/></a>
			</div></div>
		</div>
	</div>
	<p>&copy; Tido Bergmans, Neurotech<sup>EU</sup>. All rights reserved. Design: <a href="https://templated.co">TEMPLATED</a>.
</footer>

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
