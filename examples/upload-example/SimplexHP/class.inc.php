<?php
/* 
	    All classes and fuctions made by Luno Solutions ltd
	    © 2011 - 2012 Luno Solutions Ltd All Rights Reserved.
	   		UK Registered Company #07870239.
	   		
	   		
	The code here are to help new developers create simple secured scripts. 
	The idea is to dum the simple PHP version down. Database connects are
	made from PHP PDO But written in a easier from. Scripts here are made
	from php classes built ito php LIKE PDO, MYSQL time and sums. However
	the classes are to help create applications on facebook by builing a 
	classess and fuctions to controll facebook PHP sdk API system. If you
	already know PHP dont worry you can still use normal PHP on top. 
	This is just to help you right the complex PHP in a simple form.	 
	    
*/

/*----------------------------------------------------------------------------------------------------------*/

class email {
	public function spamblock($sender){
	$sender =  stripslashes(trim(filter_var($sender, FILTER_SANITIZE_EMAIL)));
	if (filter_var($sender, FILTER_VALIDATE_EMAIL)) {
	 $this->spam = true;
	} Else {
	 $this->spam = false;
	} 
	}
	public function send($youremail,$sender,$subject,$message){
	$this->spamblock($sender);
	  if ($this->spam==false)
	    {
	    return "Failed";
	    }
	  elseif ($this->spam==true)
	    {//send email
	    $sender = stripslashes(trim($sender));
	    $subject = stripslashes(trim($subject));
	    $message = stripslashes(trim($message)) ;
	    mail($youremail, "Subject: $subject",
	    $message, "From: $sender" );
	    return "Sent";
	    }
	} 
} 
     


/* Uploader Class coded by  Bennett Treptow
    Do not repost or claim as own
*/
    class uploader {
        private $ext = array();
        public function __construct(){
        }
        public function allowed_extensions(){
            foreach(func_get_args() as $val){
                $this->ext[] = $val;
            }
        }
        private function checkFile($name,$directory){
            if(file_exists($directory."/".$name)){
                return false;
            } else {
                return true;
            }
        }
        private function randomAlpha($amount){
            $chars = explode(',','a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N​,O,P,Q,R,S,T,U,V,W,X,Y,Z,0,1,2,3,4,5,6,7,8,9');
            $random='';
            for($i=0; $i<$amount;$i++)  {
                $random.=$chars[rand(0,count($chars)-1)];
            } 
            return $random;
        } 
        public function sortStuff($name,$tmpname,$size){
            return array("name"=>$name,"tmp_name"=>$tmpname,"size"=>$size);
        }
        public function uploadFile($file,$rename,$directory,$num){
            $filename = $file["name"];
            $file_basename = substr($filename, 0, strripos($filename, '.')); // strip extention
            $file_ext = strtolower(substr($filename, strripos($filename, '.'))); // strip name
            $newfilename = ($rename == true) ? $this->randomAlpha($num):$file_basename.$this->randomAlpha(2);
            $newfilename .= $file_ext;
            $s = getimagesize($file["tmp_name"]);
            if(in_array($file_ext,$this->ext)){
                if($this->checkFile($newfilename,$directory)){
        if(move_uploaded_file($file["tmp_name"],$directory."/".$newfilename)){
        return array(true,"height"=>$s[1],"width"=>$s[0],"name"=>$newfilename,"size"=>$file["size"],"extension"=>$file_ext,"oldname"=>$file_basename,"oldfile"=>$filename);
        } else {
        return array(false,"error"=>"Problem moving file");
        }
                } else {
        return array(false,"error"=>"File already exists.");
                }
            } else {
                return array(false,"error"=>"Illegal file extension.");
            }
        }
        public function killFile($tmp){
            if(!empty($tmp)){
                if(unlink($tmp)){
        return true;
                } else {
        return false;
                }
            } else {
                return false;
            }
        }
    }
    
/* 
  Facebook base class coded by Jordan
  The classes and functions are to help collect information from facebook PHP sdk API
  Do not repost or claim as own
*/   
class fbbase {
//Now lets set the application ID's to read from facebook
 public function applcationID($appId,$secret){
 include("src/facebook.php");
 $config = array(
  'appId' => $appId,
  'secret' => $secret,
  );
  $facebook = $this->connect;
 }
public function basicuser() {
    include("src/facebook.php");
    $facebook = $this->connect;
    $user = $facebook->getUser();
    $user_profile = $facebook->api('/me');
    $access_token = $facebook->getAccessToken();
    $this->name = "".$user_profile['name']."";
    $this->id = "".$user_profile['id']."";
    $this->fname = "".$user_profile['first_name']."";
    $this->lname = "".$user_profile['last_name']."";
    $this->link = "".$user_profile['link']."";
    $this->username = "".$user_profile['username']."";
    $this->gender = "".$user_profile['gender']."";
    $this->locale = "".$user_profile['locale']."";
 }
 public function getname() {
    return  $this->name;
    }
 public function getid() {
    return  $this->id;
    }
 public function getgender() {
    return  $this->gender;
    }
 public function getlocale() {
    return  $this->locale;
    }
 public function getfname() {
    return  $this->fname;
    }
 public function getlname() {
    return  $this->lname;
    }
 public function getlink() {
    return  $this->link;
    }
 public function getusername() {
    return  $this->username;
    }
 public function getpicture() {
    return  $this->picture;
    }

public function aboutuser() {
    include("src/facebook.php");
    $facebook = $this->connect;
    $user = $facebook->getUser();
    $user_profile = $facebook->api('/me');
    $access_token = $facebook->getAccessToken();
    $this->birthday = "".$user_profile['birthday']."";
    $this->timezone = "".$user_profile['timezone']."";
    $this->verified = "".$user_profile['verified']."";
    $this->updated_time = "".$user_profile['updated_time']."";
    $this->type = "".$user_profile['type']."";
    $this->bio = "".$user_profile['bio']."";
    $this->townID = "".$user_profile['hometown']['id']."";
    $Hometown = $facebook->api($this->townID);
    $access_token = $facebook->getAccessToken();
    $this->townname = "".$Hometown['name']."";
    $this->townlink = "".$Hometown['link']."";
    $this->towndescription = "".$Hometown['description']."";
    $this->towncheckins = "".$Hometown['checkins']."";
    $this->townlatitude = "".$Hometown['latitude']."";
    $this->longitude = "".$Hometown['longitude']."";
 }
   public function getbirthday() {    
    return  $this->birthday;
    }
 public function getGMT() {
    return  $this->timezone;
    }
 public function getverified() {    
    return  $this->verified;
    }
 public function getupdatetime() {
    return  $this->updated_time;
    }
  public function gettype() {
    return  $this->type;
    }
 public function getbio() {
    return  $this->bio;
    }
 public function gethomeid() {
    return  $this->townID;
    }

 public function gettownname() {
    return  $this->townname;
    }
 public function gettownlink() {
    return  $this->townlink;
    }
 public function gettdescription() {
    return  $this->towndescription;
    }
 public function gettcheckins() {
    return  $this->towncheckins;
    }
 public function gettlatitude() {
    return  $this->townlatitude;
    }
 public function gettlongitude() {
    return  "".$Hometown['longitude']."";
    }
 public function createalbum($name,$info) {
 include("src/facebook.php");
 $facebook = $this->connect;
 $album = array(
  'message'=> $name,
  'name'=> '$info'
    );
    $facebook = $this->connect;
    $create_album = $facebook->api('/me/albums', 'post', $album);
  $this->albumid = $create_album['id'];
 }

 public function imgupload($message,$tag,$img) {
     include("src/facebook.php");
 $facebook = $this->connect;
  if ($tag=="yes")
  {
  require_once("tag.php");
  $photoinfo = array(
  'message'=> $message,  
  'tags' => $data,
  'image' => '@' . realpath($img) );
    $facebook->api('/'.$this->albumid.'/photos', 'post', $photoinfo );  }
  elseif ($tag=="no")
  {
  $photoinfo = array(
  'message'=> $message,  
  'image' => '@' . realpath($img) );
  $facebook->api('/'.$this->albumid.'/photos', 'post', $photoinfo );
  }
  else
  {
  $photoinfo = array(
  'message'=> $message,  
  'image' => '@' . realpath($img) );
  $facebook->api('/'.$this->albumid.'/photos', 'post', $photoinfo );
  }
  }
  public function wallpost($message,$link,$name) {
  $Wallpost = array(
  'message'=> $message,  
  'link' => $link, 
  'name' => $name,
);
  $facebook = $this->connect;
  $facebook->api("/me/feed", 'post', $Wallpost);
  }    
}
  
/* 
 	xbox gamertag class coded by Jordan
 	The classes and functions are to help collect information from xbox.com website
   	Do not repost or claim as own
*/   
class Xbox {
 public $gamer= "Major Nelson";  
 public function geturl($gamer){
 	@include('html_dom.php');
	$this->site = file_get_html('http://gamercard.xbox.com/' . $gamer .  '.card');
 }
 public function gamertag(){
 	@include('html_dom.php');
 	$stat = $this->site;
	return $stat->find('a[id=Gamertag]', 0)->innertext;
 }
 public function motto(){
 @include('html_dom.php');
 	$stat = $this->site;
	return $stat->find('[id=Motto]', 0)->innertext;
 }
 public function name(){
 @include('html_dom.php');
 	$stat = $this->site;
	return $stat->find('[id=Name]', 0)->innertext;
 }
 public function location(){
 @include('html_dom.php');
 	$stat = $this->site;
	return $stat->find('[id=Location]', 0)->innertext;
 }
 public function bio(){
 @include('html_dom.php');
 	$stat = $this->site;
	return $stat->find('[id=Bio]', 0)->innertext;
 }
 public function gamerscore(){
 @include('html_dom.php');
 	$stat = $this->site;
	return $stat->find('[id=Gamerscore]', 0)->innertext;
 }
 public function rep(){
 @include('html_dom.php');
 	$stat = $this->site;
 	foreach($stat->find('div[class="Star Empty"]') as $element)
{
	$StarTotal += 0;
}
foreach($stat->find('div[class="Star Quarter"]') as $element)
{
	$StarTotal += 25;
}
foreach($stat->find('div[class="Star Half"]') as $element)
{
	$StarTotal += 50;
}
foreach($stat->find('div[class="Star ThreeQuarter"]') as $element)
{
	$StarTotal += 75;
}
foreach($stat->find('div[class="Star Full"]') as $element)
{
	$StarTotal += 100;
}

	return $StarTotal;
 }
 public function gender(){
 @include('html_dom.php');
 	$stat = $this->site;
 	// Find XbcGamercard Info (Male/Female) (Gold/Silver)
foreach($stat->find('div[class="XbcGamercard Gold Male "]') as $element)
{
	$Gender = "Male";
}
foreach($stat->find('div[class="XbcGamercard Gold Female "]') as $element)
{
	$Gender = "Female";
}
foreach($stat->find('div[class="XbcGamercard Silver Male "]') as $element)
{
	$Gender = "Male";
}
foreach($stat->find('div[class="XbcGamercard Silver Female "]') as $element)
{
	$Gender = "Female";
}
	return $Gender;
 }
 public function subscription(){
 @include('html_dom.php');
 	$stat = $this->site;
 	// Find XbcGamercard Info (Male/Female) (Gold/Silver)
foreach($stat->find('div[class="XbcGamercard Gold Male "]') as $element)
{
	$Subscription = "Gold";
}
foreach($stat->find('div[class="XbcGamercard Gold Female "]') as $element)
{
	$Subscription = "Gold";
}
foreach($stat->find('div[class="XbcGamercard Silver Male "]') as $element)
{
	$Subscription = "Silver";
}
foreach($stat->find('div[class="XbcGamercard Silver Female "]') as $element)
{
	$Subscription = "Silver";
}
	return $Gender;
 }
 public function images(){
 @include('html_dom.php');
 	$stat = $this->site;
	$stati = 0;
	foreach($stat->find('img') as $element)
	{
		switch($stati)
		{
			case 0:
				$this->pic = $element->src; break;
			case 1:
				$this->recent1s = $element->src; break;
			case 2:
				$this->recent2s = $element->src; break;
			case 3:
				$this->recent3s = $element->src; break;
			case 4:
				$this->recent4s = $element->src; break;
			case 5:
				$this->recent5s = $element->src; break;

		}
		$stati++;
	}
 }
 public function picture(){
	return $this->pic;
 }
 public function recent1s(){
	return $this->recent1s;
 }
 public function recent2s(){

	return $this->recent2s;
 }
 public function recent3s(){

	return $this->recent3s;
 }
 public function recent4s(){

	return $this->recent4s;
 }
 public function recent5s(){

	return $this->recent5s;
 }
}

?>