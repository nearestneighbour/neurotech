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

	<meta name="description" content="At NeurotechEU we are very eager to hear your opinion and thoughts on the future of education and research. Feel free to contact us or leave a message." />
	<meta name="robots" content="index,follow" />

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
<section id="banner" class="nofade" style="background-image:url('<?php $f=glob('images/banners/*.*'); echo $f[array_rand($f)]; ?>')">
	<div class="inner">
		<header><h1>Get in touch with us</h1></header>
		<p>We are very interested in your thoughts about Neurotech<sup>EU</sup></p>

		<form method="post" action="contact_submitted">
		<div class="row uniform">

			<div class="6u 12u$(small)">
				<input type="text" name="name" id="name" value="" placeholder="Name" required />
			</div>
			<div class="6u 12u$(small)">
				<input type="text" name="mail" id="mail" value="" placeholder="Email" required />
			</div>
			<div class="12u$">
				<textarea name="msg" id="msg" placeholder="Leave a message" required></textarea>
			</div>
			<div class="9u 12u$(small)">
				<div class="select-wrapper">
					<select name="role" id="role">
						<option value="0" disabled selected>- What is your role in Neurotech<sup>EU</sup> -</option>
						<option value="1">Student</option>
						<option value="2">Teacher</option>
						<option value="3">Researcher</option>
						<option value="4">Other</option>
					</select>
				</div>
			</div>
			<div class="3u 12u$(small)">
				<ul class="actions">
					<li><input type="submit" name="submit" value="Send Message" /></li>
				</ul>
			</div>
		</div>
		</form>

	</div>
</section>

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

</body>
</html>
