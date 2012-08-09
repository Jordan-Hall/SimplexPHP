<?php
 /**
  * @author Jordan Hall <nukezilla@hotmail.co.uk>
  * @Acknowledge S.C. Chen <http://sourceforge.net/projects/simplehtmldom/>
  * @Contributions Bennett Treptow <Upload class>
  * @version 0.1
  * @copyright 2012 SimplexPHP
  * 
  */


	$url   = ("https://graph.facebook.com/fql?q=SELECT+uid2+FROM+friend+WHERE+uid1=$fbid+ORDER+BY+rand()+LIMIT+100&access_token=$access_token"); // This limits the tags to 100 to add more change 100 to anything
	$info = curl_init(); // Leave this in place
	curl_setopt($info, CURLOPT_URL, $url); // Leave this in place
	curl_setopt($info, CURLOPT_RETURNTRANSFER, true); // Leave this in place
	$data = curl_exec($info); // Leave this in place
	curl_close($info);   // Leave this in place
	$data  = json_decode($data,true); // Leave this in place


	// By defualt this will only tag 11 people to add more or to tag less add or remove the lines
$friends = $data['data']['0']['uid2'];
$friends1 = $data['data']['1']['uid2'];
$friends2 = $data['data']['2']['uid2'];
$friends3 = $data['data']['3']['uid2'];
$friends4 = $data['data']['4']['uid2'];
$friends5 = $data['data']['5']['uid2'];
$friends6 = $data['data']['6']['uid2'];
$friends7 = $data['data']['7']['uid2'];
$friends8 = $data['data']['8']['uid2'];
$friends9 = $data['data']['9']['uid2'];
$friends10 = $data['data']['10']['uid2'];


	// By defualt this will only tag 11 people to add more or to tag less add or remove the lines
$data = array(
    array(
           'tag_uid' => $friends,
           'x' => rand() % 100,
           'y' => rand() % 100
    ),
    array(
           'tag_uid' => $friends1,
           'x' => rand() % 100,
           'y' => rand() % 100
              ),
              array(
           'tag_uid' => $friends2,
           'x' => rand() % 100,
           'y' => rand() % 100
              ),
              array(
           'tag_uid' => $friends3,
           'x' => rand() % 100,
           'y' => rand() % 100
              ),
              array(
           'tag_uid' => $friends4,
           'x' => rand() % 100,
           'y' => rand() % 100
              ),
              array(
           'tag_uid' => $friends5,
           'x' => rand() % 100,
           'y' => rand() % 100
              ),
              array(
           'tag_uid' => $friends6,
           'x' => rand() % 100,
           'y' => rand() % 100
              ),
              array(
           'tag_uid' => $friends7,
           'x' => rand() % 100,
           'y' => rand() % 100
           ),
           array(
           'tag_uid' => $friends8,
           'x' => rand() % 100,
           'y' => rand() % 100
           ),
           array(
           'tag_uid' => $friends9,
           'x' => rand() % 100,
           'y' => rand() % 100
           ),
           array(
           'tag_uid' => $friends10,
           'x' => rand() % 100,
           'y' => rand() % 100
            
          
              ));
$data = json_encode($data); // Leave this in place
?>