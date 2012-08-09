<?php
/**
  * @authors Jordan Hall <nukezilla@hotmail.co.uk> & JokerHacker
  * @Acknowledge S.C. Chen <http://sourceforge.net/projects/simplehtmldom/>
  * @Contributions Bennett Treptow <Upload class>
  * @version 0.1
  * @copyright 2012 SimplexPHP
  */

namespace SimplexPHP;

class Email {
        public function __construct($youremail,$sender,$subject,$message) {
            $this->spamblock($sender);

            if ($this->spam==false) {
                return "Failed";
            }
            elseif ($this->spam==true) {
                $sender = stripslashes(trim($sender));
                $subject = stripslashes(trim($subject));
                $message = stripslashes(trim($message)) ;
                mail($youremail, "Subject: $subject",
                $message, "From: $sender" );
                return "Sent";
            }
        }
        public function spamblock($sender){
            $sender =  stripslashes(trim(filter_var($sender, FILTER_SANITIZE_EMAIL)));
            if (filter_var($sender, FILTER_VALIDATE_EMAIL)) {
                $this->spam = true;
            } else {
                $this->spam = false;
            } 
        }
}

?>
