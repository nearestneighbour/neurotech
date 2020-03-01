<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	<title>Latest news from NeurotechEU</title>
	<meta name="description" content="Read about the latest news from NeurotechEU and keep yourself up to date with the latest events." />
	<meta name="robots" content="index,follow" />
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/html/commonhead.html"; ?>
</head>
<body class="subpage">

<!-- Header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/html/header.html"; ?>

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

<!-- News section -->
<?php

$jsonstr = file_get_contents("newsitems.json");
$items = json_decode($jsonstr, true);
$search = array("%id%", "%img%", "%alt%", "%tt%", "%txt%");
$sectionstr = array(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/html/newssection1.html"),file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/html/newssection2.html"));

for ($i=0; $i<count($items); $i++) {
	$j = count($items) - $i - 1;
	$replace = array($i+1, $items[$j]['imgsrc'], $items[$j]['alt'], $items[$j]['title'], $items[$j]['text']);
	echo str_replace($search, $replace, $sectionstr[$i % 2]);
}

?>
<!-- Main -->
</div>
<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/html/footer.html"; ?>
</body>
</html>
