<?php
require_once("common.inc.php");
class feedback{
	var $name, $email, $phone, $msg, $address, $postcode;
	var $stylesheet, $ownform, $formname, $sendurl, $errorurl, $owntable, $mailto;
	//-----------------------------------------------------------
	function __construct(){
		$this->name="";
		$this->email="";
		$this->phone="";
		$this->msg="";
		$this->address="";
		$this->postcode="";
		// formatting options
		$this->stylesheet="feedback.css";
		$this->ownform=TRUE;
		$this->formname="frmfeedback";
		$this->sendurl="fbsend.php";
		$this->errorurl="contact.php";
		$this->owntable=TRUE;
//		$this->mailto="paul@blackhillcomputersoftware.co.uk";
		$this->mailto="cwmcraigfarm@gmail.com";
	}
	//-----------------------------------------------------------
	function showcsslink(){
		print($this->getcsslink());
	}
	//-----------------------------------------------------------
	function getcsslink(){
		return("
<link href=\"".$this->stylesheet."\" rel=\"stylesheet\" type=\"text/css\" />");
	}
	//-----------------------------------------------------------
	function showform(){
		print($this->getform());
	}
	//-----------------------------------------------------------
	function getform(){
		$r="
<script type=\"text/javascript\">
function feedbacksend(){
	if(feedbackcheck()){
		document.".$this->formname.".submit();
	}
}
function feedbackcheck(){
	var emailRegExp=/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\\.[A-Z]{1,4}$/i;
	if(fbtrim(document.".$this->formname.".fbname.value)==''){
		alert('Please enter your name');
		document.".$this->formname.".fbname.focus();
		return(false);
	}
	else if((fbtrim(document.".$this->formname.".fbemail.value)!='') && !emailRegExp.test(document.".$this->formname.".fbemail.value)){ 
		alert('Your email address does not appear to be correctly formatted');
		document.".$this->formname.".fbemail.focus();
		return(false);
	}
	else if((fbtrim(document.".$this->formname.".fbemail.value)=='') && (fbtrim(document.".$this->formname.".fbphone.value)=='') && (fbtrim(document.".$this->formname.".fbaddress.value)=='')){
		alert('Please enter either your email address, your phone number or address');
		document.".$this->formname.".fbemail.focus();
		return(false);
	}
	else if(fbtrim(document.".$this->formname.".fbtxt.value)==''){
		alert('Please enter your message');
		document.".$this->formname.".fbtxt.focus();
		return(false);
	}
	return(true);
}
function fbtrim(input){
  var b=0;
  var e=input.length;
  while((b<e) &&(input.substr(b,1)==\" \")){
    ++b;
  };
  while((e>b) &&(input.substr(e,1)==\" \")){
    --e;
  }
  return input.substr(b,e);
}
-->
</script>
".($this->ownform?"<form name=\"".$this->formname."\" action=\"".$this->sendurl."\" method=\"post\" class=\"feedback\">":"")."
".($this->owntable?"<table cellpadding=\"2\" cellspacing=\"0\" class=\"feedback\">":"")."
<tr>
  <td class=\"feedback feedbackprompt\">Name:</td>
  <td class=\"feedback\"><input name=\"fbname\" class=\"feedback\" maxlength=\"40\" value=\"".scrsafe(urldecode($this->name))."\" /></td>
</tr>
<tr>
  <td valign=\"top\" class=\"feedback feedbackprompt\">Address:</td>
  <td class=\"feedback\"><textarea name=\"fbaddress\" cols=\"40\" rows=\"4\" wrap=\"virtual\" class=\"feedback\">".scrsafe(urldecode($this->address))."</textarea></td>
</tr>
<tr>
  <td class=\"feedback feedbackprompt\">Postcode:</td>
  <td class=\"feedback\"><input name=\"fbpostcode\" class=\"feedback\" id=\"postcode\"  maxlength=\"12\" value=\"".scrsafe(urldecode($this->postcode))."\" /></td>
</tr>
<tr>
  <td class=\"feedback feedbackprompt\">Telephone:</td>
  <td class=\"feedback\"><input name=\"fbphone\" class=\"feedback\"  maxlength=\"40\" value=\"".scrsafe(urldecode($this->phone))."\" /></td>
</tr>
<tr>
  <td class=\"feedback feedbackprompt\">Email</td>
  <td class=\"feedback\"><input name=\"fbemail\" class=\"feedback\" id=\"email\" maxlength=\"64\" value=\"".scrsafe(urldecode($this->email))."\" /></td>
</tr>
<tr>
<td class=\"feedback feedbackprompt\" valign=\"top\">Message:</td>
<td class=\"feedback\"><textarea name=\"fbtxt\" rows=\"5\" cols=\"40\" class=\"feedback\">".scrsafe(urldecode($this->msg))."</textarea></td>
</tr>
".$this->getextras()."
<tr><td colspan=\"2\"><div class=\"floatRight\"><a href=\"javascript:feedbacksend()\" class=\"feedback\">Send message</a></div></td></tr>
".($this->owntable?"</table>":"")."
".($this->ownform?"</form>":"")."
";
		return($r);
	}
	function getextras(){
		//e.g.
		//<tr><td colspan=3>Please send me some samples
		//<input type=\"checkbox\" name=\"msgbrochure\" value=\"1\"></td></tr>
		return("");
	}
	//-----------------------------------------------------------
	function getparams(){
		$this->name=param("fbname");
		$this->email=param("fbemail");
		$this->phone=param("fbphone");
		$this->msg=param("fbtxt");
		$this->address=param("fbaddress");
		$this->postcode=param("fbpostcode");
	}
	//-----------------------------------------------------------
	function sendmail(){
		global $clientname;
		$ok = true;
		$this->getparams();
		// Check to help prevent spam
		if(array_key_exists("HTTP_REFERER", $_SERVER)){
			$fromwhere=$_SERVER["HTTP_REFERER"];
		}
		else{
			$fromwhere="notdefined";
		}
		$check=($_SERVER["HTTP_HOST"]==substr($fromwhere, 7, strlen($_SERVER["HTTP_HOST"])));
		// Check for new line or semi-colon in string - spam attack
		$check=(strpos($this->name,"\n")===FALSE?$check:FALSE);
//		$check=(strpos($this->name,";")===FALSE?$check:FALSE);
		//print("name:".($check?"true":"false"));
		if($this->email!=""){
			$check=(strpos($this->email,"\n")===FALSE?$check:FALSE);
			$check=(strpos($this->email,";")===FALSE?$check:FALSE);
			//print("email:".($check?"true":"false"));
			$check=(preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\\.[A-Z]{1,4}$/i", $this->email)==1?$check:FALSE);
		}
		else{
			$this->email="no-reply@cwmcraigfarm.co.uk";
		}
		if($this->postcode!=""){
			$check=(strpos($this->postcode,"\n")===FALSE?$check:FALSE);
			$check=(strpos($this->postcode,";")===FALSE?$check:FALSE);
			//print("regexp:".($check?"true":"false"));
		}
		if(!$check){
			$ok = false;
			print($this->retryform());
			print("<p class=\"error\">The form does not appear to have been correctly completed, and the message has not been sent.</p>
	<p>Please <a href=\"javascript:document.frmretry.submit()\">try again</a>.</p>");
			// Not true, unless the problem continues!
		}
		else
		if($this->name!="" and (($this->email!="") or ($this->phone!="") or ($this->address!="")) and $this->msg!=""){
			$msg="This email has been created by a website enquiry.\n\nFrom: ".$this->name
			."\n\nEmail: ".$this->email."\n\n"
			.($this->phone!=""?"Phone: ".$this->phone."\n\n":"")
			.($this->address!=""?"Address:\n".$this->address."\n\n":"")
			.($this->postcode!=""?$this->postcode."\n\n":"")
			."Message: \n\n".$this->msg."\n";

//			if(!$develop){
				if(!mail($this->mailto, $clientname . " Website Enquiry", $msg, "From: ".$this->email."\r\n")){
					$ok = false;
					print($this->retryform()
					."<p class=\"error\">Unfortunately, there was an error sending your message.<br>
Please <a href=\"javascript:document.frmretry.submit()\">try again</a>.</p></form>");
				}
//			}
//			else{
//				print("<p class=\"error\">Development version does not send mail.</p><p>Contents of \$_REQUEST:</p>");
//				print_r($_REQUEST);
//			}
		}
		else{
			$ok  = false;
			print($this->retryform()
			."<p class=\"error\">Unfortunately we will not be able to contact you as the form was not completed fully.<br>
Please <a href=\"javascript:document.frmretry.submit()\">try again</a>.</p></form>");
		}
		return($ok);
	}
	//-----------------------------------------------------------
	function retryform(){
		return("
<form name=\"frmretry\" action=\"".$this->errorurl."\" method=\"get\">
<input name=\"fbname\" type=\"hidden\" value=\"".urlencode($this->name)."\">
<input name=\"fbemail\" type=\"hidden\" value=\"".urlencode($this->email)."\">
<input name=\"fbphone\" type=\"hidden\" value=\"".urlencode($this->phone)."\">
<input name=\"fbtxt\" type=\"hidden\" value=\"".urlencode($this->msg)."\">
<input name=\"fbaddress\" type=\"hidden\" value=\"".urlencode($this->address)."\">
<input name=\"fbpostcode\" type=\"hidden\" value=\"".urlencode($this->postcode)."\">");
	}
}
?>