<?
include("SimplexHP/class.inc.php");
if (isset($_REQUEST['submit'])) {
$sender = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];
$sendresult = new email;  
if ($sendresult->send("receivermail@domain.tld",$sender,$subject,$message)== true) {
	echo "email sent thank you";

} else{
echo "email Failed";
} 
} Else {

echo "<form method='post'>
  Email: <input name='email' type='text' /><br />
  Subject: <input name='subject' type='text' /><br />
  Message:<br />
  <textarea name='message' rows='15' cols='40'>
  </textarea><br />
  <input type='submit' name='submit' />
  </form>";

}


?>