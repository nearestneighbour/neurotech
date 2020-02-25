<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	<title>Key personnel - NeurotechEU</title>
	<meta name="description" content="" />
	<meta name="robots" content="index,follow" />
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/html/commonhead.html"; ?>
</head>
<body class="subpage">

<!-- Header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/header.html";

$i = $_GET['inst'] ?? 'ru';
$filename = $i . "/personnel.json";
if (!file_exists($filename)) {
  header('Location: .');
  exit;
}
$s = ' selected';
$names = array('ru' => 'Radboud University', 'umh' => 'Miguel Hernández University',
							'ki' => 'Karolinska Institute', 'ubo' => 'Bonn University',
							'boun' => 'Boğaziçi University', 'oxf' => 'Oxford University',
							'umf' => 'Iuliu Hațieganu University', 'ud' => 'University of Debrecen');
?>

<!-- Partner list horizontal -->
<section class="wrapper pagetop">
	<div class="inner">

		<header class="align-center">
			<h1>Team from <?php echo $names[$i]; ?></h1>
			<b><p>Click on a logo to view the people involved from each partner institution</p></b>
		</header>

    <div class="flex flex-8">
      <div class="col align-center"><div class="image round fit<?php echo $i=='ru'?$s:''?>">
          <a href="key-personnel?inst=ru"><img src="/images/partner_logos/ru.jpg" alt="Logo of Radboud University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit<?php echo $i=='umh'?$s:''?>">
          <a href="key-personnel?inst=umh"><img src="/images/partner_logos/umh.jpg" alt="Logo of Miguel Hernandez University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit<?php echo $i=='ki'?$s:''?>">
          <a href="key-personnel?inst=ki"><img src="/images/partner_logos/ki.jpg" alt="Logo of Karolinska Institute"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit<?php echo $i=='ubo'?$s:''?>">
          <a href="key-personnel?inst=ubo"><img src="/images/partner_logos/ubo.jpg" alt="Logo of Bonn University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit<?php echo $i=='boun'?$s:''?>">
          <a href="key-personnel?inst=boun"><img src="/images/partner_logos/boun.jpg" alt="Logo of Bogazici University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit<?php echo $i=='oxf'?$s:''?>">
          <a href="key-personnel?inst=oxf"><img src="/images/partner_logos/oxf.jpg" alt="Logo of Oxford University"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit<?php echo $i=='umf'?$s:''?>">
          <a href="key-personnel?inst=umf"><img src="/images/partner_logos/umf.jpg" alt="Logo of UMF Cluj-Napoca"/></a>
      </div></div>
      <div class="col align-center"><div class="image round fit<?php echo $i=='ud'?$s:''?>">
          <a href="key-personnel?inst=ud"><img src="/images/partner_logos/ud.jpg" alt="Logo of University of Debrecen"/></a>
      </div></div>
    </div>

	</div>
</section>

<!-- Personnel sections -->
<div class="personlist">
<?php
$jsonstr = file_get_contents($filename);
$items = json_decode($jsonstr, true);
$sectionstr = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/html/personnel.html");
foreach ($items as $item) {
	echo strtr($sectionstr, $item);
}
?>
</div>
<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . "/html/footer.html"; ?>
</body>
</html>
