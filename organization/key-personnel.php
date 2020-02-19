<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	<title>Key personnel - NeurotechEU</title>
	<link rel="icon" href="/images/icon.png" />

	<meta name="description" content="" />
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

<!-- Partner list horizontal -->
<section class="wrapper pagetop">
	<div class="inner">

		<header class="align-center">
			<h1>Key personnel for (institution)</h1>
		</header>

    <div class="flex flex-8">
      <div class="col align-center"><div class="image round fit">
          <a href="key-personnel?inst=ru" class="scrolly"><img src="/images/partner_logos/ru.jpg" alt="Logo of Radboud University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit">
          <a href="key-personnel?inst=umh" class="scrolly"><img src="/images/partner_logos/umh.jpg" alt="Logo of Miguel Hernandez University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit">
          <a href="key-personnel?inst=ki" class="scrolly"><img src="/images/partner_logos/ki.jpg" alt="Logo of Karolinska Institute"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit">
          <a href="key-personnel?inst=bonn" class="scrolly"><img src="/images/partner_logos/bonn.jpg" alt="Logo of Bonn University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit">
          <a href="key-personnel?inst=boun" class="scrolly"><img src="/images/partner_logos/boun.jpg" alt="Logo of Bogazici University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit">
          <a href="key-personnel?inst=oxf" class="scrolly"><img src="/images/partner_logos/oxf.jpg" alt="Logo of Oxford University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit">
          <a href="key-personnel?inst=umf" class="scrolly"><img src="/images/partner_logos/umf.jpg" alt="Logo of UMF Cluj-Napoca"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit">
          <a href="key-personnel?inst=ud" class="scrolly"><img src="/images/partner_logos/ud.jpg" alt="Logo of University of Debrecen"/></a>
      </div></div>
    </div>

	</div>
</section>

<!-- News section -->
<?php

if (!isset($_GET['inst'])) {
  header('Location: .');
  exit;
} else {
  $filename = $_GET['inst'] . "/personnel.json";
  if (!file_exists($filename)) {
    header('Location: .');
    exit;
  }
}

$jsonstr = file_get_contents($filename);
$items = json_decode($jsonstr, true);
// Use the same HTML code as the news sections
$search = array("%id%", "%img%", "%alt%", "%tt%", "%txt%");
$sectionstr = array(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/html/newssection1.html"),file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/html/newssection2.html"));

foreach ($items as $item) {
  $replace = array('', $item['imgsrc'], $item['name'], $item['name'], $item['text']);
  echo str_replace($search, $replace, $sectionstr);
}

?>

</div>

<!-- Footer -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/footer.html";
?>

</body>
</html>
