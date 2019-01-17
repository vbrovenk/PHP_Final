#!/usr/bin/php
<?php
if ($argc == 3 && file_exists($argv[1])) {
    $fd = fopen($argv[1], "r");
    $data_csv = array();
    
    while (($str = fgetcsv($fd, 0, ";")) != null) {
        array_push($data_csv, $str);
    }
    /* get index in array*/
    $key_number = array_search($argv[2], $data_csv[0]);
	if ($key_number === FALSE)
        exit;
    $field0 = $data_csv[0][0];
	$field1 = $data_csv[0][1];
	$field2 = $data_csv[0][2];
	$field3 = $data_csv[0][3];
    $field4 = $data_csv[0][4];
    
	for ($i = 1; $i < count($data_csv); $i++) {
        $key = $data_csv[$i][$key_number];
        $$field0[$key] = $data_csv[$i][0];
		$$field1[$key] = $data_csv[$i][1];
		$$field2[$key] = $data_csv[$i][2];
		$$field3[$key] = $data_csv[$i][3];
        $$filed4[$key] = $data_csv[$i][4];
    }
    while (true) {
        echo "Enter your command: ";
        $command = fgets(STDIN);
        if ($command == null) {
            echo "\n";
            break;
        }
        eval($command);
    }
}
?>