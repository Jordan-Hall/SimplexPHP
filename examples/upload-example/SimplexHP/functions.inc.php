<?
/* 
	    All classes and fuctions made by Luno Solutions ltd
	    © 2011 - 2012 Luno Solutions Ltd All Rights Reserved.
	   		UK Registered Company #07870239.
	   		
	   		
	The code here are to help new developers create simple secured scripts. 
	The idea is to dum the simple PHP version down. Database connects are
	made from PHP PDO But written in a easier from. Scripts here are made
	from php functions built ito php LIKE PDO, MYSQL time and sums. However
	the classes are to help create applications on facebook by builing a 
	classess and fuctions to controll facebook PHP sdk API system. If you
	already know PHP dont worry you can still use normal PHP on top. 
	This is just to help you right the complex PHP in a simple form.	 
	    
*/

/*----------------------------------------------------------------------------------------------------------*/

/* 
 	Copyright class coded by Jordan
 	This is a simple function to add copyright into your website
   	Do not repost or claim as own
*/
        function copyright($name) {  
        if (date("Y") > date("Y", filemtime(__FILE__)))  {
         echo "&copy; ". $creation . "-" .date("y")." ".$name." - All Rights Reserved"; 
         } Else { 
         echo "&copy; ".date("Y")." ".$name." - All Rights Reserved";
         }
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