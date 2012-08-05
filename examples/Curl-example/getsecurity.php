<?
include("SimplexHP/html_dom.php");
$html = file_get_html('lol1234.html');
$token = $html->find('input[name=securitytoken]', 0)->getAttribute('value');
echo $token;
?>