<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include('simple_html_dom.php');

echo "<a href='index.php'>Home</a> | Get name and status: <br /><br />";

$html = new simple_html_dom();
$html->load_file('geniee-test.html');
$table = $html->find("table[class=tabular_table]", 0)->children(1);
$row = $table->find("tr");
$data = array();
foreach ($row as $cell) {
	$data[] = array(
		'name' => trim($cell->children(0)->plaintext),
		'status' => trim($cell->children(1)->plaintext),  
	);
//	echo $cell->children(0) .' | ' .$cell->children(1) .'<br />';
}

//add to file .csv
//using http://php.net/manual/en/function.fputcsv.php
$file = fopen("affiliate.csv","w");
foreach ($data as $line) {
	fputcsv($file, $line);
}
fclose($file);

echo "<pre />";
print_r($data);

?>