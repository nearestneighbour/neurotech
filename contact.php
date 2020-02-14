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

		<form method="post" action="submit_form">
		<div class="row uniform">

			<div class="6u 12u$(small)">
				<input type="text" name="name" value="" placeholder="Name" required />
			</div>
			<div class="6u 12u$(small)">
				<input type="text" name="mail" value="" placeholder="Email" required />
			</div>
			<div class="12u$">
				<textarea name="msg" placeholder="Leave a message" required></textarea>
			</div>
			<div class="6u 12u$(small)">
				<div class="select-wrapper">
					<select name="role">
						<option value="" disabled selected>- What is your role in Neurotech<sup>EU</sup> -</option>
						<option value="student">Student</option>
						<option value="teacher">Teacher</option>
						<option value="researcher">Researcher</option>
						<option value="other">Other</option>
					</select>
				</div>
			</div>
			<div class="6u 12u$(small)">
				<input type="checkbox" name="update" id="update" value="Yes" />
				<label for="update">Keep me updated about NeurotechEU</label>
			</div>
			<div class="12u 12u$(small)">
				<ul class="actions">
					<li><input type="submit" name="submit" value="Send Message" /></li>
				</ul>
			</div>
			<p id="p_desktop">If you want to submit a news article regarding Neurotech<sup>EU</sup>, please send a mail to <b>contact@theneurotech.eu</b></p>
		</div>
		</form>

	</div>
</section>

<div id="p_mobile">
<p>If you want to submit a news article regarding Neurotech<sup>EU</sup>, please send a mail to <b>postmaster@theneurotech.eu</b></p>
</div>

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

</body>
</html>
