<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	<title>NeurotechEU -The European University for Brain & Technology</title>
	<meta name="description" content="NeurotechEU is the European University for Brain and Technology. Find out how we are building a European Neurotech ecosystem." />
	<meta name="robots" content="index,follow" />
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/html/commonhead.html"; ?>
</head>
<body>

<!-- Header -->
<?php
// Header on index.php is slightly different than on other pages
$doc = new DOMDocument();
$doc->loadHTMLFile($_SERVER['DOCUMENT_ROOT'] . "/assets/html/header.html");
$header = $doc->getElementById("header");
$header->setAttribute("class", "alt");
echo $doc->saveHTML();
?>

<!-- Banner -->
<section id="banner" style="background-image:url('<?php $f=glob('assets/images/banners/*.*'); echo $f[array_rand($f)]; ?>')">
	<div class="inner">
		<header><h1>The European University of Brain and Technology</h1></header>
		<ul id="stats">
			<li><a href="founders"><i class="fa fa-3x fa-university"></i><p>8</p><p>Universities</p></a></li>
			<li><a href="promise"><i class="fa fa-3x fa-users"></i><p>170,000</p><p>Students</p></a></li>
			<li><a href="organization/key-personnel"><i class="fa fa-3x fa-user-tie"></i><p>70,000</p><p>Staff</p></a></li>
			<li><a href="synergy#funding"><i class="fa fa-3x fa-microscope"></i><p>171</p><p>Joint grants</p></a></li>
			<li><a href="synergy#funding"><i class="fa fa-3x fa-euro"></i><p>€231M</p><p>Joint funding</p></a></li>
			<li><a href="synergy#publications"><i class="fa fa-3x fa-newspaper"></i><p>5553</p><p>Joint publications</p></a></li>
			<li><i class="fa fa-3x fa-globe"></i><p>250+</p><p>Affiliates</p></li>
		</ul>
		<a href="#main" class="button big scrolly">Learn More</a>
	</div>
</section>

<!-- Intro section -->
<section id="main" class="wrapper style1">
	<div class="inner">
			<div class="flex flex-2">
				<div class="col col1"><div class="image round fit">
					<img src="/assets/images/logo.jpg" alt="The Neurotech logo" />
				</div></div>
				<div class="col col2">
					<p>From health & healthcare to learning & education, Neuroscience has a key role in addressing some of the most pressing challenges that we face in Europe today.  Whether the challenge is the translation of fundamental research to advance the state of the art in prevention, diagnosis or treatment of brain disorders or explaining the complex interactions between the brain, individuals and their environments to design novel practices in cities, schools, hospitals, or companies, brain research is already providing solutions for society at large.</p>
					<p>Neuroscience has also a great promise to become an applied science, to provide brain-centred or brain-inspired solutions that could benefit the society and kindle a new economy in Europe. The <b class="redbold">European University of Brain and Technology (Neurotech<sup>EU</sup>)</b> aims to be the backbone of this new vision by bringing together eight leading universities and 250+ partners from all regions of Europe.</p>
					<p>Neurotech<sup>EU</sup> will educate students across all levels (bachelor’s, master’s, doctoral as well as life-long learners) and train the next-generation multidisciplinary scientists, scholars and graduates, provide them direct access to cutting-edge infrastructure for fundamental, translational and applied research to help Europe address this unmet challenge.</p>
					<a href="mission" class="button">Our Mission</a>
				</div>
			</div>
	</div>
</section>

<!-- Urgen action section -->
<section id="main" class="wrapper style2">
	<div class="inner">
			<div class="flex flex-2">
				<div class="col col2">
					<h2>The need for urgent action</h2>
					<p>Brain disorders and mental health are a leading cause of disability and a significant burden on society. In Europe alone, brain disorders account for 24% of all disease-related burden annually, claiming 1.2 million lives, leaving another 21 million individuals with a disability (Raggi & Leonardi, 2019). According to the OECD (Health at a Glance: Europe 2018), mental health problems cost EU >4% of the GDP every year. With the senior population growing ten times faster than the rest of the world’s population, one in four Europeans in 2050 will be 65+ years old (UN World Population Prospect, 2012). The societal and economic impact of brain disorders is thus projected to significantly soar in the coming decades as the European population ages and life expectancy increases. <b>Neurotech<sup>EU</sup> has an actionable plan to provide the necessary multidisciplinary, intersectoral and personalized training to extend education beyond mobility, universities beyond institutional borders.</b></p>
					<a href="mission" class="button">Our Mission</a>
				</div>
				<div class="col col1 first"><div class="image round fit">
					<img src="/assets/images/urgentaction.jpg" alt="Urgent action is needed" />
				</div></div>
			</div>
	</div>
</section>

<!-- News section -->
<section class="wrapper style1">
	<div class="inner">
		<header class="align-center">
			<h2>Latest news</h2>
		</header>
		<div class="flex flex-4">

			<?php
			$jsonstr = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/news/newsitems.json");
			$items = json_decode($jsonstr, true);
			$n = count($items);
			$htmlstr = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/html/indexnews.html");
			$search = array("%tt%", "%img%", "%alt%", "%id%");

			for ($i=1; $i<=4; $i++) {
				$replace = array($items[$n-$i]['title'], $items[$n-$i]['imgsrc'], $items[$n-$i]['alt'], $i);
				echo str_replace($search, $replace, $htmlstr);
			}
			?>

		</div>
	</div>
</section>
<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/html/footer.html"; ?>
</body>
</html>
