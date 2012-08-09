<?php
/**
 * Uploader
 *
 * @author jokerhacker
 */

namespace SimplexPHP;

class FbBase {
        public $facebook;

        //Now lets set the application ID's to read from facebook
        public function __construct($appId,$secret,$params,$site,$needliked){
            $config = array(
                'appId' => $appId,
                'secret' => $secret,
            );
            $this->facebook = new Facebook($config);
            if($needliked = "yes") {
                if($signed_request = $this->parsePageSignedRequest()) {
                    $this->basicuser(new Facebook($config)); 
                } 
            }
            $facebook = new Facebook($config);
            $user_id = $facebook->getUser();

            $user = $facebook->getUser();
            if ($user) {
                try {
                    $user_profile = $facebook->api('/me');
                } catch (FacebookApiException $e) {
                    error_log($e);
                    $user = null;
                }
            }

            $loginUrl = $facebook->getLoginUrl($params);

            if (!$user) {
                echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
            } Else {
                $logoutUrl = $facebook->getLogoutUrl();
            }
            if($needliked = "no") {
                $this->basicuser(new Facebook($config)); 
            }
        }

        function parsePageSignedRequest() {
            if (isset($_REQUEST['signed_request'])) {
                $encoded_sig = null;
                $payload = null;
                list($encoded_sig, $payload) = explode('.', $_REQUEST['signed_request'], 2);
                $sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
                $data = json_decode(base64_decode(strtr($payload, '-_', '+/'), true));
                return $data;
            }
            return false;
        }

        public function basicuser($facebook) {
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
            $facebook = $this->facebook;
            $user = $facebook->getUser();
            $user_profile = $facebook->api('/me');
            $access_token = $facebook->getAccessToken();
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
            $facebook = $this->facebook;
            $album = array(
                'message'=> $name,
                'name'=> '$info'
            );
            $facebook = $this->facebook;
            $create_album = $facebook->api('/me/albums', 'post', $album);
            $this->albumid = $create_album['id'];
        }
        
        public function imgupload($message,$tag,$img) {
            $facebook = $this->facebook;
            if ($tag=="yes") {
                require_once("simplex.facebook.tag.php");
                $photoinfo = array(
                    'message'=> $message,  
                    'tags' => $data,
                    'image' => '@' . realpath($img)
                );
                $facebook->api('/'.$this->albumid.'/photos', 'post', $photoinfo );
            }
            elseif ($tag=="no")
            {
                $photoinfo = array(
                    'message'=> $message,  
                    'image' => '@' . realpath($img)
                );
                $facebook->api('/'.$this->albumid.'/photos', 'post', $photoinfo );
            }
            else
            {
                $photoinfo = array(
                    'message'=> $message,  
                    'image' => '@' . realpath($img)
                );
                $facebook->api('/'.$this->albumid.'/photos', 'post', $photoinfo );
            }
        }
        public function wallpost($message,$link,$name) {
            $Wallpost = array(
                'message'=> $message,  
                'link' => $link, 
                'name' => $name,
            );
            $facebook = $this->facebook;
            $facebook->api("/me/feed", 'post', $Wallpost);
        }    
}

?>
