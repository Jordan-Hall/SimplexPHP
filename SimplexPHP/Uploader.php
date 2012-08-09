<?php
/**
  * @author Jordan Hall <nukezilla@hotmail.co.uk> 
  * @co-author JokerHacker
  * @Acknowledge S.C. Chen <http://sourceforge.net/projects/simplehtmldom/>
  * @Contributions Bennett Treptow <Upload class>
  * @version 0.1
  * @copyright 2012 SimplexPHP
  */


namespace SimplexPHP;

class Uploader {
        private $ext = array();
        
        public function __construct(){
            // --- //
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

?>
