<style>
div.itzurkarthi-box {margin:1em 0 1.5em 0; padding:0px 10px 9px 100px; border-width:1px 0 1px 0; border-style:solid;color:#222;text-shadow:none;}
.itzurkarthi-box.none {border-width:0;}
.itzurkarthi-box.full {border-width:1px;}
.itzurkarthi-box.medium {padding:18px 20px 18px 50px; font-size:1.1em;}
.itzurkarthi-box.large {padding:25px 27px 25px 50px; font-size:1.2em; }
.itzurkarthi-box.rounded { -webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; }
.itzurkarthi-box.alert { font-family verdana arial helvetica sans-serif;border-color:#f0baa2; background:#ffd9c8 url(images/alert.png) no-repeat 20px 45%; }
.itzurkarthi-box.download { border-color:#d4ebaf; background:#edfcd5 url(images/download.png) no-repeat 20px 45%; }
.itzurkarthi-box.tick { border-color:#d4ebaf; background:#edfcd5 url(images/tick.png) no-repeat 20px 45%; }
.itzurkarthi-box.info { border-color:#ccc; background:#eee url(images/info.png) no-repeat 20px 45%; }
.itzurkarthi-box.note { border-color:#efe3ae; background:#fef6d2 url(images/note.png) no-repeat 20px 45%; }
.itzurkarthi-box.normal { border-color:#ccc; background:#eee; padding:9px 15px;}
</style>

	<?
$ip = $_SERVER['REMOTE_ADDR'];

$arrAllowedIPs = array("127.0.0.1", //admin98
                       "0.0.0.0" //efb
					   );
					   
$checkaccpoint = false;

foreach($arrAllowedIPs as $ippoint)
{
  if (preg_match("/".$ippoint."/i", $ip, $count))

  {
    $checkaccpoint = true;
	break;
  }
  
} 
if ($checkaccpoint == false) {
 echo "
<div class=\"itzurkarthi-box alert\">
<H1>Attention </H1>" . $ip;
echo "Access to this section is denied.</br>";
echo "You are trying to access a restricted web site section from a forbidden address.</br>";
echo "</div>";
die;

}
	?>