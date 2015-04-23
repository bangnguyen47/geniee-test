<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include('simple_html_dom.php');

echo "<a href='index.php'>Home</a> | Get title: <br /><br />";

$html = new simple_html_dom();
$html->load_file('geniee-test.html');
$title = $html->find("title", 0);
echo $title->plaintext;
?>