<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	<title>Latest news from NeurotechEU</title>
	<link rel="icon" href="/images/icon.png" />

	<meta name="description" content="Read about the latest news from NeurotechEU and keep yourself up to date with the latest events." />
	<meta name="robots" content="index,follow" />

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="/css/main.css" />
</head>
<body class="subpage">

<!-- Header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/header.html";
?>

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

	for ($i=0; $i<count($items); $i++) {
		$j = count($items) - $i - 1;
		$items[$j]["title"] = str_replace("<br>", "", $items[$j]["title"]);
		$sectionstr = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/html/newssection" . (($i % 2)+1) . ".html");
		$replace = array($i+1, $items[$j]['imgsrc'], $items[$j]['alt'], $items[$j]['title'], $items[$j]['text']);
		echo str_replace($search, $replace, $sectionstr);
	}

	?>
</div>

<!-- Footer -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/footer.html";
?>

<!-- Scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.scrolly.min.js"></script>
<script src="/js/jquery.scrollex.min.js"></script>
<script src="/js/skel.min.js"></script>
<script src="/js/util.js"></script>
<script src="/js/main.js"></script>

<script src="https://kit.fontawesome.com/12081b1371.js"></script>

</body>
</html>
