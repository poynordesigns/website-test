<?php
// Common functions
$develop=TRUE;
//$develop=FALSE;

date_default_timezone_set('Europe/London');

// Remember trailing /
//----------------------Root
$clientname="Cwm Craig Farm";
if($develop){
	$server="ccf";
	$siteroot="http://".$server."/";
	$errorlogroot="C:/Users/Paul/Black Hill/Clients/Cwm Craig/v1/site/errorlog/";
	error_reporting(E_ALL);
}
else{
	$server="www.xxx.co.uk";
	$siteroot="http://".$server."/";
	$errorlogroot="/home/sites/www.farmbedbreakfasthereford.co.uk/errorlog/";
	error_reporting(E_NONE);
}
//---------------------Errors
function myErrorHandler($errno, $errmsg, $filename, $linenum){
	global $develop;
	$dt=date("Y-m-d H:i:s (T)");
	$errorType=array(
	1  => "Error",
	2  => "Warning",
	4  => "Parsing Error",
	8  => "Notice",
	16 => "Core Error",
	32 => "Core Warning",
	64 => "Compile Error",
	128=> "Compile Warning",
	256=> "User Error",
	512=> "User Warning",
	1024=>"User Notice"
	);
	$nonFatalErrors=array(E_NOTICE, E_USER_NOTICE);
	$err="\nError information: Date: ".$dt;
	$err.="\nError number:".$errno;
	$err.="\nError type:".$errorType[$errno];
	$err.="\nError msg:".$errmsg;
	$err.="\nScript:".$filename;
	$err.="\nLine no:".$linenum;
	$err.="\nUser agent:".$_SERVER["HTTP_USER_AGENT"];
	$err.="\nRequest:";
	foreach($_REQUEST AS $k=>$v){
		$err.="\n".$k."=".$v;
	}
	$err.="\nSession:";
	foreach($_SESSION AS $k=>$v){
		$err.="\n".$k."=".$v;
	}
	$err.="\n";
	logerror($err);
	if(!$develop){
		mail("paul@blackhillcomputersoftware.co.uk","PHP error",$err);
	}
	if(!in_array($errno, $nonFatalErrors)){
		showerror($err);
		die();
	}
}
//-------------
function logerror($err){
	global $errorlogroot;
	error_log($err, 3, $errorlogroot."errorlog.txt");
}
set_error_handler("myErrorHandler");
//-----------------------param
function param($name, $type="S", $default=""){
	$r="";
	if(array_key_exists($name, $_REQUEST)){
		if(get_magic_quotes_gpc()==1){
			$r=stripslashes($_REQUEST[$name]);
		}
		else{
			$r=$_REQUEST[$name];
		}
	}
	switch($type){
		case "N":
			if(!is_numeric($r)){
				$r=-1;
			}
			if(($r==-1) and ($default!="")){
				$r=$default;
			}
			break;
		case "S":
			$r=trim(strtr($r, "\xA0", "\x20")); // replace &nbsp; with space
			if(($r=="") and ($default!="")){
				$r=$default;
			}
	}
	return($r);
}
//-----------------------postparam
function postparam($name){
	if(array_key_exists($name, $_POST)){
		if(get_magic_quotes_gpc()==1){
			return(stripslashes($_REQUEST[$name]));
		}
		else{
			return($_REQUEST[$name]);
		}
	}
	return("");
}
//-----------------------fileparam
function fileparam($name){
	if(array_key_exists($name, $_FILES)){
		return($_FILES[$name]);
	}
	return(array("tmp_name"=>"", "error"=>UPLOAD_ERR_NO_FILE, "size"=>0));
}
//----------------------session
class session{
	function session(){
		ini_set("session.use_only_cookies","1");
		session_start();
	}
	function set($name, $value){
		$_SESSION[$name]=$value;
	}
	function get($name,$type="S", $default=""){
		if(isset($_SESSION[$name])){
			return($_SESSION[$name]);
		}
		else{
			if($type=="S"){
				return($default);
			}
			elseif ($type=="N"){
				return(-1);
			}
			else
			return("");

		}
	}
	function del($name){
		unset($_SESSION[$name]);
	}
	function destroy(){
		$_SESSION=array();
		session_destroy();
	}
}
$session=new session();
//-----------------------sessionparam
function sessionparam($name){
	if(array_key_exists($name, $_SESSION)){
		return($_SESSION[$name]);
	}
	return("");
}
//----------------------arrayparam
// Used for select with multiple attribute
function arrayparam($name){
	if(array_key_exists($name, $_REQUEST)){
		$var=$_REQUEST[$name];
		if(is_array($var)){
			return($var);
		}
		else{
			return(array());
		}
	}
	return(array());
}
//-------------------------
function scrsafe($str){
	return(htmlentities($str, ENT_QUOTES, "UTF-8"));
}
//-------------------------
function showerror($err){
	global $siteroot, $develop, $clientname;
	print("<p class=\"error\">Please accept our apologies</p>
<p class=\"errortext\">This page has been affected by an error</p>
<p class=\"errortext\">The error has been logged and will be dealt with as soon as possible.<br>
We apologise for any inconvenience, please try again shortly.</p>
<p class=\"errortext\"><i><a href=\"".$siteroot."\" target=\"_top\">".$clientname."</a></i></p>");
	if($develop){
		print(nl2br($err));
	}
}

?>