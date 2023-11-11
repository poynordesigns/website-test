<?php
set_include_path('../inc');
require_once 'common.inc.php';
require_once 'oGoogleMap.inc.php';
$propertyLatitude = 51.986257795376225;
$propertyLongitude = -2.678341269493103;
$propertyName = "Cwm Craig Farm";
$propertyDetails = "Cwm Craig Farm<br>Little Dewchurch<br>Hereford<br>HR2 6PS";
$googleMap = new googleMap(560,560,$propertyLatitude, $propertyLongitude, $propertyName, $propertyDetails);
//$infoHTML = "<strong>".scrsafe($propertyName)."</strong><br>".scrsafe($propertyDetails);
//$googleMap->addMarker($propertyLatitude, $propertyLongitude, 0, $infoHTML);
$bodyonunload = "GUnload()";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/page.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Cwm Craig Farm location and Google map</title>
<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="head" -->
<meta name="Description" content="Cwm Craig Farm location and Google map">
<meta name="Keywords" content="Cwm Craig Farm, location, Google map">
<!-- InstanceEndEditable -->

<link href="ccf-1a.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="Stylesheets" -->
<style type="text/css">
#sidebar{
	display:none;
}
#main{
	margin-right:0;
}
#map_canvas{
	border:1px solid #555;
}
#map_canvas a[target="_blank"] {
	padding-right: 0;
	background-image: none;
}
</style>
<?php
echo $googleMap->getJS();
?>
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript">
$(document).ready(
	function(){
		googleMapInit();
	});
</script>
<!-- InstanceEndEditable -->

<!-- InstanceParam name="menuBB" type="text" value="x" -->
<!-- InstanceParam name="menuTariff" type="text" value="x" -->
<!-- InstanceParam name="menuLocation" type="text" value="this" -->
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
            <li><a href="googlemap.php" class="this">location</a></li>
		    <li><a href="contact.php" class="x">contact</a></li>
	      </ul>
    	</div>
	</div>
  <div id="sidebar"><div id="sidebarcontent"><!-- InstanceBeginEditable name="Sidebar" --><!-- InstanceEndEditable --></div></div>
	<div id="main"><div id="mainContent"><!-- InstanceBeginEditable name="content" -->
    <h1>How to find Cwm Craig Farm</h1>
      <div style="width:560px;float:left">
        <?php
echo $googleMap->getMapDiv();
echo "<p><a href=\"javascript:panTo()\">Locate Cwm Craig Farm on map</a></p>";
?>      
      
      </div>
      <div style="margin-left:24px;width:300px;float:left">
        <h2>Sat Nav code: </h2>
<ul>
  <li><strong>HR2 6PS</strong>    </li>
</ul>
<h3>Travelling from Hereford:</h3>
<ul>
  <li>Take the A49 from Hereford<br>
    <span class="small">    (keeping in the left lane)</span></li>
  <li>Travel over the River Wye</li>
  <li>Follow the signs for Ross-on-Wye to the next set of lights by a church</li>
  <li>Turn left onto the B4399 road to mini-roundabout and take third exit</li>
  <li>Continue 5 miles to Little Dewchurch</li>
  <li>On entering the village turn left</li>
  <li>Cwm Craig Farm is the first farm on the left</li>
  </ul>
<h2>Travelling from Ross-onWye</h2>
<ul>
  <li>Take the A49 from the Ross roundabout <br>
    <span class="small">    (signposted to Hereford)</span></li>
  <li>Once on the road, take the second turning on the right which is the Hoarwithy road.</li>
  <li>Continue to Hoarwithy and up a steep hill into Little Dewchurch</li>
  <li>In the village, a few yards past the Plough Inn, turn right.</li>
  <li>Cwm Craig Farm is the first farm on the left</li>
</ul>
<h3>Nearest train stations:</h3>
<ul>
  <li>Hereford <span class="small">(20 minutes by car)</span></li>
  <li>Abergavenny <span class="small">(30  minutes by car)</span></li>
</ul>
      </div>
      <div class="clear"></div>
<!-- InstanceEndEditable -->
	</div></div>
<br class="clear"></div>
<div id="footer">
<div id="copyright">
  <p>Cwm Craig Farm 2018</p>
</div>
</div>
</body>
<!-- InstanceEnd --></html>
