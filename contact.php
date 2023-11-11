<?php
set_include_path('../inc');
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
<title>Cwm Craig Farm contact details</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<meta name="Description" content="Cwm Craig Farm contact details">
<meta name="Keywords" content="Cwm Craig Farm, contact details">
<!-- InstanceEndEditable -->
<link href="ccf-1a.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="Stylesheets" -->
<?php
$fb->showcsslink();
?>
<style type="text/css">
#sidebar{
	width:420px;
	border-left:1px solid #eee;
	padding-left:24px;
}
#main{
	margin-right:440px;
}
table.contact{
	border-collapse:collapse;
	margin-left:30px;
	margin-top:30px;
}
table.contact th{
	font-weight:normal;
	font-size:0.8em;
	text-align:right;
	vertical-align:top;
	padding:10px 12px 6px 0;
	background-color:inherit;
}
table.contact td{
	vertical-align:top;
	padding:6px 0;
	font-size:1.25em;
}
</style>
<!-- InstanceEndEditable -->
<!-- InstanceParam name="menuHome" type="text" value="x" -->
<!-- InstanceParam name="menuBB" type="text" value="x" -->
<!-- InstanceParam name="menuTariff" type="text" value="x" -->
<!-- InstanceParam name="menuLocation" type="text" value="x" -->
<!-- InstanceParam name="menuContact" type="text" value="this" -->
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
		    <li><a href="contact.php" class="this">contact</a></li>
	      </ul>
    	</div>
	</div>
  <div id="sidebar"><div id="sidebarcontent"><!-- InstanceBeginEditable name="Sidebar" -->
    <h2>Send a message or booking request</h2>
    <p>&nbsp;</p>
<?php
$fb->showform();
?>
  <!-- InstanceEndEditable --></div></div>
	<div id="main"><div id="mainContent"><!-- InstanceBeginEditable name="mainContent" -->
    <h1>Contact details</h1>
	<script type="text/javascript">
	var e = "cwmc"+"raigfarm\u0040gma"+"il.com";
	</script>
<table cellpadding="0" cellspacing="0" class="contact">
<tr><th>Address</th><td>Andrea Lee<br>
Cwm Craig Farm<br>
Little Dewchurch<br>
Hereford<br>
HR2 6PS</td></tr>
<tr><th>Phone</th>
<td>01432 840 250</td></tr>
<tr><th>Email</th><td><script type="text/javascript">document.write('<a href="mailto:'+e+'">'+e+'</a>');</script></td></tr>
</table>
	<!-- InstanceEndEditable --></div></div>
<br class="clear"></div>
<div id="footer">
<div id="copyright">
  <p>Cwm Craig Farm 2018</p>
</div>
</div>
</body>
<!-- InstanceEnd --></html>
