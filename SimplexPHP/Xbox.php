<?php
/**
 * Xbox
 *
 * @author jokerhacker
 */

namespace SimplexPHP;
use SimplexPHP\HtmlDom;

class Xbox {
        public $gamer= "Major Nelson";  
        
        public function geturl($gamer){
            $this->site = file_get_html('http://gamercard.xbox.com/' . $gamer .  '.card');
        }
        public function gamertag(){
            $stat = $this->site;
            return $stat->find('a[id=Gamertag]', 0)->innertext;
        }
        public function motto(){
            $stat = $this->site;
            return $stat->find('[id=Motto]', 0)->innertext;
        }
        public function name(){
            $stat = $this->site;
            return $stat->find('[id=Name]', 0)->innertext;
        }
        public function location(){
            $stat = $this->site;
            return $stat->find('[id=Location]', 0)->innertext;
        }
        public function bio(){
            $stat = $this->site;
            return $stat->find('[id=Bio]', 0)->innertext;
        }
        public function gamerscore(){
            $stat = $this->site;
            return $stat->find('[id=Gamerscore]', 0)->innertext;
        }
        public function rep(){
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
            $stat = $this->site;
            $stati = 0;
            foreach($stat->find('img') as $element) {
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
