<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	<title>NeurotechEU -The European University for Brain & Technology</title>
	<link rel="icon" href="images/icon.png" />

	<meta name="description" content="NeurotechEU is the European University for Brain and Technology. Find out how we are building a European Neurotech ecosystem." />
	<meta name="robots" content="index,follow" />

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/main.css" />
</head>
<body>

<!-- Header -->
<?php
$doc = new DOMDocument();
$doc->loadHTMLFile("html/header.html");
$header = $doc->getElementById("header");
$header->setAttribute("class", "alt");
echo $doc->saveHTML();
?>

<!-- Banner -->
<section id="banner">
	<div class="inner">
		<header><h1>The European University of Brain and Technology</h1></header>
		<ul id="stats">
			<li><a href="partners"><i class="fa fa-3x fa-university"></i><p>8</p><p>Universities</p></a></li>
			<li><i class="fa fa-3x fa-users"></i><p>170,000</p><p>Students</p></li>
			<li><i class="fa fa-3x fa-user-tie"></i><p>70,000</p><p>Staff</p></li>
			<li><a href="synergy#funding"><i class="fa fa-3x fa-microscope"></i><p>171</p><p>Joint grants</p></a></li>
			<li><a href="synergy#funding"><i class="fa fa-3x fa-euro"></i><p>€231M</p><p>Joint funding</p></a></li>
			<li><a href="synergy#publications"><i class="fa fa-3x fa-newspaper"></i><p>5277</p><p>Joint publications</p></a></li>
			<li><i class="fa fa-3x fa-globe"></i><p>100+</p><p>Affiliates</p></li>
		</ul>
		<a href="#main" class="button big scrolly">Learn More</a>
	</div>
</section>

<!-- Intro section -->
<section id="main" class="wrapper style1">
	<div class="inner">
			<div class="flex flex-2">
				<div class="col col1"><div class="image round fit">
					<img src="images/logo.png" alt="The Neurotech logo" />
				</div></div>
				<div class="col col2">
					<h2>The European University of Brain and Technology</h2>
					<b>Our goals are:</b>
					<p><ul>
						<li>Creating synergy for a long-term strategy in Neuroscience and Neurotechnology to increase the competitiveness of European education, research, economy, and society</li>
						<li>Seamless mobility for students, research and staff to study, train, teach, do research and innovate</li>
						<li>Flexible curricula tailored to each student’s needs and are not constrained by institutional capabilities and borders</li>
						<li>Lasting close cooperation between partners for a trans-European network of excellence in brain research and technologies</li>
					</ul></p>
					<p>The logo represents the mission and values of the Neurotech<sup>EU</sup> Alliance.  The cartoon representation of the brain and an electrical circuit diagram portray the focus of the alliance on Brain and Technology.  Eight raised hands in the foreground, each one representing one of the 8 founding partners, bring the educational goals of the alliance in focus.  The colored ribbons characterize Neurotech<sup>EU</sup>’s devotion to and celebration of the diversity in any shape or form. The outline of the front halves of several human faces stresses the fact that education and research in the fields of brain and technology will be brought together to benefit individuals as well as society at large.</p>
					<a href="mission" class="button">Our Mission</a>
				</div>
			</div>
	</div>
</section>

<!-- News section -->
<section class="wrapper style2">
	<div class="inner">
		<header class="align-center">
			<h2>Latest news</h2>
		</header>
		<div class="flex flex-3">

			<?php
			$jsonstr = file_get_contents("newsitems/newsitems.json");
			$items = json_decode($jsonstr, true);
			$n = count($items);
			$htmlstr = file_get_contents("html/indexnews.html");
			$search = array("%tt%", "%img%", "%alt%", "%id%");

			for ($i=1; $i<=3; $i++) {
				$replace = array($items[$n-$i]['title'], $items[$n-$i]['imgsrc'], $items[$n-$i]['alt'], $i);
				echo str_replace($search, $replace, $htmlstr);
			}
			?>

		</div>
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

<script src="https://kit.fontawesome.com/12081b1371.js"></script>
<script src="js/random_banner.js"></script>

</body>
</html>
