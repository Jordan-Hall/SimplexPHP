<?
include("SimplexHP/functions.inc.php");
 if (isset($_POST['submit'])){ 
 $title = htmlentities($_POST["title"]);
 $message = htmlentities($_POST["message"]);
 $ammount = htmlentities($_POST["ammount"]);
 $domain = htmlentities($_POST["domain"]);
 $user = htmlentities($_POST["user"]);
 $password = htmlentities($_POST["password"]);
 $logindomain = $domain."/login.php?do=login";
 $theadurl = $domain."/newthread.php?do=newthread&f=15";
  $postthread = $domain."/newthread.php?do=postthread&f=15";
  $board = "15";

 
$data = array(
            	'vb_login_username' => $user, 
		'vb_login_password' => $password, 
		'cookieuser' => '1',
		's' => '', 
		'securitytoken' => 'guest',  
		'do'=> 'login',  
		'vb_login_md5password' => md5($password),  
		'vb_login_md5password_utf' => md5($password) 
        );
  
logintowebsite($logindomain,"yourcookie.text",$data,"wheretosavecontent.html");
downloadfromweb($theadurl, "postthread.html");
include("SimplexHP/html_dom.php");
$html = file_get_html('postthread.html');
$token = $html->find('input[name=securitytoken]', 0)->getAttribute('value');
$userid = $html->find('input[name=loggedinuser]', 0)->getAttribute('value');

$i = 1;

while($i <= $ammount)
{
 
  $data1 = array(
		'subject' => $title. "".$i,
		'taglist' => '',
		's' => '',
		'securitytoken' => $token,
		'f' => $board,
		'do' => 'postthread',
		'loggedinuser' => $userid,
		'sbutton' => 'Submit New Thread',
		'message' => $message. "".$i
        );
  postthread($postthread,"cookie",$data1);

$i++;
}
  


} else {
?>
<center><h2><strong><u>vBulletin Forum Spam Bot!</u></strong></h2>
<hr><form action="" method="post"> 
<strong>Thread Title:</strong><br/><input type="text" name="title" /> <br/>
<strong>Thread Message:</strong><br/><textarea name="message"rows="10" cols="60" style="display: block; width: 540px; height: 250px; " tabindex="1" dir="ltr"></textarea><br/>
Amount of Times:<select name="ammount">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="15">15</option>
  <option value="20">20</option>
  <option value="25">25</option>
  <option value="50">50</option>
  <option value="100">100</option>
  <option value="150">150</option>
  <option value="200">200</option>
  <option value="250">250</option>
  <option value="500">500</option>
  <option value="750">750</option>
  <option value="1000">1000</option>
  <option value="2000">2000</option>
  <option value="2500">2500</option>
  <option value="5000">5000</option>
  <option value="7500">7500</option>
  <option value="2000">10000</option>
</select><br/>
Website Domain (W/ Forum Path): <input type="text" name="domain" /> <br/>
Username:<input type="text" name="user" /> <br/>
Password:<input type="password" name="password" /> <br/>
<input name="submit" type="submit" value="Begin Spam Attack!" /></center>
<footer><hr><center>© Lunosolutions!</center></footer>
<?
}
?>