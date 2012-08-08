<?php
 /**
  * @author Jordan Hall <nukezilla@hotmail.co.uk>
  * @Acknowledge S.C. Chen <http://sourceforge.net/projects/simplehtmldom/>
  * @Contributions Bennett Treptow <Upload class>
  * @version 0.1
  * @copyright 2012 SimplexPHP 
  */

 /**
  * @return this controls SimplexPHP and must remain in tac
  */
include("SimplexPHP/config.php");


 /**
  * @author Jordan Hall <nukezilla@hotmail.co.uk>
  * @Acknowledge S.C. Chen <http://sourceforge.net/projects/simplehtmldom/>
  * @Contributions Bennett Treptow <Upload class>, <Ninjafy script using SimplexPHP>
  * @version 0.1
  * @copyright 2012 SimplexPHP 
  */
    $ninjachars = array(
        "a" => "ka","b" => "tu","c" => "mi","d" => "te","e" => "ku","f" => "lu","g" => "ji",
        "h" => "ri","i" => "ki","j" => "zu","k" => "me","l" => "ta","m" => "rin","n" => "to",
        "o" => "mo","p" => "no","q" => "ke","r" => "shi","s" => "ari","t" => "chi","u" => "do",
        "v" => "ru","w" => "mei","x" => "na","y" => "fu","z" => "zi"
    );
    ?>

            <title>Ninjafy your name!</title>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
            <style>
            /* ------------------------------------------
CSS3 FACEBOOK-STYLE BUTTONS (Nicolas Gallagher)
Licensed under Unlicense
http://github.com/necolas/css3-facebook-buttons
------------------------------------------ */


/* ------------------------------------------------------------------------------------------------------------- BUTTON */

.uibutton { 
    position: relative; 
    z-index: 1;
    overflow: visible; 
    display: inline-block; 
    padding: 0.3em 0.6em 0.375em; 
    border: 1px solid #999; 
    border-bottom-color: #888;
    margin: 0;
    text-decoration: none; 
    text-align: center;
    font: bold 11px/normal 'lucida grande', tahoma, verdana, arial, sans-serif; 
    white-space: nowrap; 
    cursor: pointer; 
    /* outline: none; */
    color: #333; 
    background-color: #eee;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f5f6f6), to(#e4e4e3));
    background-image: -moz-linear-gradient(#f5f6f6, #e4e4e3);
    background-image: -o-linear-gradient(#f5f6f6, #e4e4e3);
    background-image: linear-gradient(#f5f6f6, #e4e4e3);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f5f6f6', EndColorStr='#e4e4e3'); /* for IE 6 - 9 */
    -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #fff;
    -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #fff;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #fff;
    /* IE hacks */
    zoom: 1; 
    *display: inline; 
}

.uibutton:hover,
.uibutton:focus,
.uibutton:active {
    border-color: #777 #777 #666;
}

.uibutton:active {
    border-color: #aaa;
    background: #ddd;
    filter: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}

/* overrides extra padding on button elements in Firefox */
.uibutton::-moz-focus-inner {
    padding: 0;
    border: 0;
}

/* ............................................................................................................. Icons */

.uibutton.icon:before {
    content: "";
    position: relative; 
    top: 1px; 
    float:left;
    width: 10px; 
    height: 12px; 
    margin: 0 0.5em 0 0; 
    background: url(fb-icons.png) 99px 99px no-repeat;
}

.uibutton.edit:before  { background-position: 0 0; }
.uibutton.add:before  { background-position: -10px 0; }
.uibutton.secure:before  { background-position: -20px 0; }
.uibutton.prev:before  { background-position: -30px 0; }
.uibutton.next:before  { float:right; margin: 0 -0.25em 0 0.5em; background-position: -40px 0; }

/* ------------------------------------------------------------------------------------------------------------- BUTTON EXTENSIONS */

/* ............................................................................................................. Large */

.uibutton.large {
    font-size: 13px;
}

/* ............................................................................................................. Submit, etc */

.uibutton.confirm {
    border-color: #29447e #29447e #1a356e;
    color: #fff;
    background-color: #5B74A8;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#637bad), to(#5872a7));
    background-image: -moz-linear-gradient(#637bad, #5872a7);
    background-image: -o-linear-gradient(#637bad, #5872a7);
    background-image: linear-gradient(#637bad, #5872a7);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#637bad', EndColorStr='#5872a7'); /* for IE 6 - 9 */
    -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #8a9cc2;
    -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #8a9cc2;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #8a9cc2;
}

.uibutton.confirm:active {
    border-color: #29447E;
    background: #4F6AA3;
    filter: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}

/* ............................................................................................................. Special */

.uibutton.special {
    border-color: #3b6e22 #3b6e22 #2c5115;
    color: #fff;
    background-color: #69a74e;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#75ae5c), to(#67a54b));
    background-image: -moz-linear-gradient(#75ae5c, #67a54b);
    background-image: -o-linear-gradient(#75ae5c, #67a54b);
    background-image: linear-gradient(#75ae5c, #67a54b);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#75ae5c', EndColorStr='#67a54b'); /* for IE 6 - 9 */
    -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #98c286;
    -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #98c286;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #98c286;
}

.uibutton.special:active {
    border-color: #3b6e22;
    background: #609946;
    filter: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}

/* ............................................................................................................. Disable */

.uibutton.disable {
    z-index: 0;
    border-color: #c8c8c8;
    color: #b8b8b8;
    background: #f2f2f2;
    cursor: default;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}

.uibutton.confirm.disable {
    color: #fff;
    border-color: #94a2bf;
    background: #adbad4;
}

.uibutton.special.disable {
    color: #fff;
    border-color: #9db791;
    background: #b4d3a7;
}

.uibutton.disable.icon:before,
.uibutton.disable.icon:after {
    opacity: 0.5;
}

/* ------------------------------------------------------------------------------------------------------------- BUTTON GROUPS */

.uibutton-group {
    display: inline-block;
    list-style: none;
    padding: 0;
    margin: 0;
    /* IE hacks */
    zoom: 1; 
    *display: inline; 
}

.uibutton + .uibutton,
.uibutton + .uibutton-group,
.uibutton-group + .uibutton,
.uibutton-group + .uibutton-group {
    margin-left: 3px;
}

.uibutton-group li {
    float: left;
    padding: 0;
    margin: 0;
}

.uibutton-group .uibutton {
    float: left;
    margin-left: -1px; 
}

.uibutton-group .uibutton:hover,
.uibutton-group .uibutton:focus,
.uibutton-group .uibutton:active {
    z-index:2;
}

.uibutton-group > .uibutton:first-child,
.uibutton-group li:first-child .uibutton { 
    margin-left: 0; 
}

/* ------------------------------------------------------------------------------------------------------------- BUTTON CONTAINER */
/* For mixing buttons and button groups, e.g., in a navigation bar */

.uibutton-toolbar {
    padding: 6px;
    border-top: 1px solid #ccc;
    background: #f2f2f2;
}

.uibutton-toolbar .uibutton,
.uibutton-toolbar .uibutton-group {
    vertical-align: bottom;
}
                body {
        font-family: Verdana, Arial, sans-serif;
        background-color: #222;
        color: white;
        height: 90%;
  overflow: hidden;
                }
                form {
        width: 45%;
        margin: 0 auto;
        text-align: center;
        position: relative;
        top: 50%;
                }
                form input[type="text"] {
        width: 100%;
        padding: 5px;
        background-color: #ADADAD;
        border: 1px solid #E9e9e9;
        border-radius: 3px;
        height: 40px;
        font-size: 20px;
                }
                button {
        background-color: transparent;
        border: 0;
                }
                button:hover {
        cursor: pointer;
                }
                .result {
        width: 99%;
        position: absolute;
        bottom: 10px;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        display: none;
                }
                .result span {
        background-color: #adadad;
        border: 1px solid #e9e9e9;
        border-radius: 3px;
        padding: 4px;
                }
                label {
        float: right;
        font-size: 18px;
        font-weight: bold;
        position: relative;
        top: 4px;
                }
            </style>
            <script>
                $(document).ready(function(){
        if($(".result").length){
        $(".result").animate({
        opacity: "show"
        }, 2000, function(){
        $(".result").animate({
        left: "+=100",
        bottom: "+=500"
        }, 500, function(){
        $(".result").animate({
        bottom: "+=10",
        left: "-=200",
        opacity: "hide"
        }, 500, function(){
        $(".result").animate({
        left: "+=100",
        bottom: "10",
        opacity: "show"
        }, 1000, function(){
        $(".result").animate({
        opacity: "hide"
        }, 100, function(){
        $(".result").animate({
        opacity: "show"
        }, 500);
        });
        });
        });
        });

        });
        }
                });
            </script>

            <?php
$params = array(
	  'scope' => 'status_update,publish_stream,user_photos,status_update, user_photo_video_tags, friends_photo_video_tags',
	  'redirect_uri' => 'http://graftdev.com/Simplex/facebook.php',

	);
$site = "http://graftdev.com/Simplex/facebook.php";
$obj = new fbbase("471885182821934","9643899f6a18fb20f5e5740fa2c185f2",$params,$site,"no"); 
$name = $obj->getname(); 

        $ne = "";
        for($x=0;$x<strlen($name);$x++){
        if($name[$x] == " "){
        $ne .= " ";
        } else {
        $ne .= $ninjachars[strtolower($name[$x])];
        }
        }
        echo "<div class='result'><span><img src='http://cdn3.iconfinder.com/data/icons/musthave/16/Redo.png' border='0' alt='result' /> ".ucwords($ne)."</span></div>";
echo $ne;
if (isset($_POST['submit'])) {
$message = "My ninja nae is ".$ne.". Ninjafy your name here: http://apps.facebook.com/ninjamask/facebook.php";
$obj->wallpost($message,"http://apps.facebook.com/ninjamask/facebook.php","Ninjafy");
echo " been posted on your wall";
} else {
echo "<form action='' method='post'>";
echo "<br /><input class='uibutton large confirm' type='submit' name='submit' value='publish'>";
echo "<br />";
}
?>