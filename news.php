<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	<title>Latest news from NeurotechEU</title>
	<link rel="icon" href="images/icon.png" />

	<meta name="description" content="Read about the latest news from NeurotechEU and keep yourself up to date with the latest events." />
	<meta name="robots" content="index,follow" />

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/main.css" />
</head>
<body class="subpage">

<!-- Header -->
<header id="header">
	<div class="logo"><a href="index.html">NEUROTECH<sup>EU</sup></a></div>
	<nav class="menulist"><ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="mission.html">Mission</a></li>
		<li><a href="partners.html">Partners</a></li>
		<li><a href="synergy.html">Synergy & Excellence</a></li>
		<li><a href="news.html">News</a></li>
		<li><a href="contact.html">Contact</a></li>
	</ul></nav>
</header>

<!-- Main -->
<div id="main">
	<section class="wrapper pagetop">
		<div class="inner">
			<header class="align-center">
				<h1>News</h1>
				<b><p>Read about the latest updates in the Neurotech<sup>EU</sup> network</p></b>
			</header>
		</div>
	</section>


<?php
$section = "<!-- Section -->
<section class='wrapper style%st% news'>
	<a class='partneranchor' id='%id%'></a>
	<div class='inner'>
		<div class='flex flex-2'>%ct%</div>
	</div>
</section>";
$content = array("<div class='col col1'>
	<div class='image round fit'>
		<img src='%img%' />
	</div>
</div>
<div class='col col2 padtop'>
	<h3>%tt%</h3>
	<p>%txt%</p>
</div>",
"<div class='col col2 padtop'>
	<h3>%tt%</h3>
	<p>%txt%</p>
</div>
<div class='col col1'>
	<div class='image round fit'>
		<img src='%img%'/>
	</div>
</div>");

$jsonstr = file_get_contents("newsitems/newsitems.json");
$items = json_decode($jsonstr, true);
$search = array("%st%", "%img%", "%tt%", "%txt%", "%id%");

for ($i=0; $i<count($items); $i++) {
	$items[$i]['title'] = str_replace('<br>', '', $items[$i]['title']);
}

for ($i=1; $i<=count($items); $i++) {
	$st = $i % 2;
	$j = count($items) - $i;
	$sectionstr = str_replace("%ct%", $content[1 - $st], $section);
	$replace = array(strval($st + 1), $items[$j]['imgsrc'], $items[$j]['title'], $items[$j]['text'], $i);
	echo str_replace($search, $replace, $sectionstr);
}
?>
</div>

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

</body>
</html>
