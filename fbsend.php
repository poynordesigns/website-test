<?php
set_include_path("../inc");
require_once("common.inc.php");
require_once("ofeedback.inc.php");
$fb=new feedback;
$fb->sendurl="fbsend.php";
$fb->getparams();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/base.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Cwm Craig Farm message</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<meta name="Description" content="Cwm Craig Farm message">
<meta name="Keywords" content="Cwm Craig Farm, message">
<!-- InstanceEndEditable -->
<link href="ccf-1a.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="Stylesheets" -->
<?php
	$fb->showcsslink();
?>
<!-- InstanceEndEditable -->
<!-- InstanceParam name="menuHome" type="text" value="x" -->
<!-- InstanceParam name="menuBB" type="text" value="x" -->
<!-- InstanceParam name="menuTariff" type="text" value="x" -->
<!-- InstanceParam name="menuLocation" type="text" value="x" -->
<!-- InstanceParam name="menuContact" type="text" value="x" -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31318794-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body>

<div id="container">
	<div id="banner"><!-- InstanceBeginEditable name="banner" --><a href="./"><img src="images/banner-1a.jpg" alt="Cwm Craig Farm banner" width="960" height="240"></a><!-- InstanceEndEditable -->
		<div id="menu">
		  <ul>
		    <li><a href="./" class="x">home</a></li>
	    	<li><a href="farmhousebedbreakfast.html" class="x">farmhouse bed &amp; breakfast</a></li>
	    	<li><a href="facilities.html" class="x">facilities &amp;tariff</a></li>
            <li><a href="googlemap.php" class="x">location</a></li>
		    <li><a href="contact.php" class="x">contact</a></li>
	      </ul>
    	</div>
	</div>
  <div id="sidebar"><div id="sidebarcontent"><!-- InstanceBeginEditable name="Sidebar" --><!-- InstanceEndEditable --></div></div>
	<div id="main"><div id="mainContent"><!-- InstanceBeginEditable name="mainContent" -->
			<h1>Thank you for sending your message</h1>
			<p>&nbsp;</p>
<?php
//$fb->mailto="paul@blackhillcomputersoftware.co.uk";
$fb->mailto="cwmcraigfarm@gmail.com";
if($fb->sendmail()){
	echo "<p>We will respond as soon as possible.</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
<div class=\"floatRight\"><a href=\"./\" class=\"feedback\">Continue</a></div>";
}
?>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
	<!-- InstanceEndEditable --></div></div>
<br class="clear"></div>
<div id="footer">
<div id="copyright">
  <p>Cwm Craig Farm 2018</p>
</div>
</div>
</body>
<!-- InstanceEnd --></html>
