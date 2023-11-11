<?php
class googleMap{
	private $APIKey;
	public $name, $width, $height, $lat, $lon, $markers, $mapSize, $debug, $title, $infoContent;
	function __construct($width = 500, $height = 300, $lat = 51.986257795376225, $lon = -2.678341269493103, $title = "", $infoContent = ""){
		$this->APIKey = "AIzaSyAMOCFOMuiHPZNE_vLX2v4gaGfN49FC97o";
		$this->name = "map_canvas";
		$this->width = $width;
		$this->height = $height;
		$this->lat = $lat;
		$this->lon = $lon;
		$this->mapSize = 11;
		$this->markers = array();
		$this->title = $title;
		$this->infoContent = $infoContent;
	}
	function getMapDiv(){
		return "\n<div id=\"$this->name\" style=\"width:".$this->width."px; height:".$this->height."px;\"></div>\n";
	}
	function getJS(){
		// Body tag should be:    <body onload="googleMapInit()" onunload="GUnload()">
		global $siteroot;
		$r = "\n<script src=\"http://maps.googleapis.com/maps/api/js?key=".$this->APIKey."&amp;sensor=false\" type=\"text/javascript\"></script>\n";
		$r .= "
<script type=\"text/javascript\">
var map = null;
function googleMapInit() {
	var myLatLng = new google.maps.LatLng($this->lat, $this->lon);
	var myOptions = {
		center: myLatLng,
		zoom: 11,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
	var marker = new google.maps.Marker({
		position: myLatLng,
		title:'".$this->title."'
	});
	marker.setMap(map);
	var infoContent = '<div id=\"googleInfo\">".$this->infoContent."</div';
	var infoWindow = new google.maps.InfoWindow({
		content: infoContent
	});
	infoWindow.open(map, marker);
}
function panTo(){
	var myLatLng = new google.maps.LatLng($this->lat, $this->lon);
	map.panTo(myLatLng);
}
</script>\n";
		return $r;
	}
}
?>
