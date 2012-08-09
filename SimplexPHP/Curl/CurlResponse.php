<?php
/**
  * @authors Jordan Hall <nukezilla@hotmail.co.uk> & JokerHacker
  * @Acknowledge S.C. Chen <http://sourceforge.net/projects/simplehtmldom/>
  * @Contributions Bennett Treptow <Upload class>
  * @version 0.1
  * @copyright 2012 SimplexPHP
  */

namespace SimplexPHP\Curl;

class CurlResponse {
	public $data;
	public $request;
	public $info;
	public $status_code;
	public $header_list;

	public function __construct() {
		$this->data = '';
		$this->info = array();
		$this->status_code = 0;
		$this->request = null;
		$this->header_list = array();
	}
}

?>
