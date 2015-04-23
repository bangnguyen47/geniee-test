<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include('simple_html_dom.php');

echo "<a href='index.php'>Home</a> | Get ID Affiliate: <br /><br />";

$html = new simple_html_dom();
$html->load_file('geniee-test.html');
$table = $html->find("table[class=tabular_table]", 0)->children(1);
$row = $table->find("td[class=affiliate-other-actions img]");
$data = array();
foreach ($row as $cell) {
	
	$href = $cell->children(0)->href;
	$start = strpos($cell->children(0)->href, '=');
	$data[] = substr($href, $start + 1);
}
echo "<pre />";
print_r($data);
?>