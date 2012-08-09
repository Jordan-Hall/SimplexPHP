<?php
/**
  * @authors Jordan Hall <nukezilla@hotmail.co.uk> & JokerHacker
  * @Acknowledge S.C. Chen <http://sourceforge.net/projects/simplehtmldom/>
  * @Contributions Bennett Treptow <Upload class>
  * @version 0.1
  * @copyright 2012 SimplexPHP
  */

namespace SimplexPHP;

class PasswordHasher {
    private $curl;
    private $request;
    private $password;
    private $hash;
    private $url = 'http://lunosolutions.com/encryption/api.php';
    
    function __construct($password) {
        $this->request = new Curl\CurlRequest($this->url);
        $this->curl = new Curl\Curl();
        $this->$password = $password;
        $post = array('password' => $this->password, 'format' => 'Plain');
        $this->request->set_post($post);
        return $this->curl->run($this->request)->data;  
    }
  
}

?>
