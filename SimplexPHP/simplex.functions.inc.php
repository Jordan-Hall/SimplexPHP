<?php
 /**
  * @author Jordan Hall <nukezilla@hotmail.co.uk>
  * @Acknowledge S.C. Chen <http://sourceforge.net/projects/simplehtmldom/>
  * @Contributions Bennett Treptow <Upload class>
  * @version 0.1
  * @copyright 2012 SimplexPHP
  */


function filter ($type, $input, $min = null, $max = null)
	{
		If ($type == "string")
		{
		 if (($min == null) & $max == null))
		 {
			 if (filter_var($input, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH))
			 {
				return 'Input been blocked';
			 }
			 Else
			 {
				return $input;
			 }
		 }
		 Else
		 {
		 	if (strlen($input) < $min)
			{
			 	return 'Input is less than '.$min.' char';
			}
			ElseIf (strlen($input) > $max)
			{
			 	return 'Input is less than '.$max.' char';
			}
			Elseif (filter_var($input, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH))
			{
				return 'Input been blocked';
			}
			Else
			{
				return $input;
			}
		 }
		}
		ElseIf ($type == "int")
		{
		 if (filter_var($input, FILTER_SANITIZE_NUMBER_INT))
		 {
			return 'Input been blocked';
		 }
		 Else
		 {
			return $input;
		 }
		}
		ElseIf ($type == "url")
		{
		 if (filter_var($input, FILTER_SANITIZE_URL))
		 {
			return 'Not an URL';
		 }
		 Else
		 {
			return $input;
		 }
		}
		ElseIf ($type == "ip")
		{
		 if (filter_var($input, FILTER_VALIDATE_IP))
		 {
			return 'Not an IP';
		 }
		 Else
		 {
			return $input;
		 }
		}
		ElseIf ($type == "email")
		{
		 if (filter_var($input, FILTER_SANITIZE_EMAIL))
		 {
			return 'Not an email address';
		 }
		 Else
		 {
			return $input;
		 }
		}
	}


 /**
  * @param $name is the name of the site.
  * @return  copyright statment:  © (year file was created) - (current year) $name - All Rights Reserved
  * @example copyright($site)
  */
        function copyright($name) {  
        if (date("Y") > date("Y", filemtime(__FILE__)))  {
         echo "&copy; ". $creation . "-" .date("y")." ".$name." - All Rights Reserved"; 
         } Else { 
         echo "&copy; ".date("Y")." ".$name." - All Rights Reserved";
         }
        }
        
        
        
        function getip() {
        	return $_SERVER['REMOTE_ADDR'];
        }
        function downloadfromweb($URL,$file) { 
        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL, $URL); 
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6'); 
	curl_setopt ($ch, CURLOPT_COOKIEFILE, "yourcookie.text");
        $file = fopen($file, 'w') or die("can't open file");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FILE, $file);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);  
        curl_close($ch);
        fclose($file);
        

        }
        
        function logintowebsite($url,$cookie,$data,$file) {  



//url-ify the data for the POST
$params = array();
foreach($data as $key=>$value) { array_push($params, $key.'='.$value); }
$params = implode('&', $params);

	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt ($ch, CURLOPT_URL, $url); 
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6');

	curl_setopt ($ch, CURLOPT_TIMEOUT, 60); 
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt ($ch, CURLOPT_REFERER, $url); 
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $params); 
	curl_setopt ($ch, CURLOPT_POST, 1); 
	$file = fopen($file, 'w') or die("can't open file");
	curl_setopt($ch, CURLOPT_FILE, $file);
	curl_exec ($ch);   
	curl_close($ch);
}


function postthread($url,$cookiepath,$data) {  



preg_match("/^(http:\/\/)?([^\/]+)/i",
    $url, $matches);
$name= $matches[2];
preg_match("/([^.]+).[^.]+$/", $host, $matches);
$name = $matches[1];
$cookie = $cookiepath."/".$name;
$file = "hahahpost.html";


//url-ify the data for the POST
	$params = array();
	foreach($data as $key=>$value) { array_push($params, $key.'='.$value); }
	$params = implode('&', $params);

	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6'); 
	curl_setopt ($ch, CURLOPT_COOKIEFILE, "yourcookie.text");
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_POST, TRUE);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
	$file = fopen($file, 'w') or die("can't open file");
	curl_setopt($ch, CURLOPT_FILE, $file);
	$output = curl_exec($ch);
	curl_close($ch);
	fclose($file);

}


?>