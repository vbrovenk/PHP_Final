<?php
$fd = fopen("list.csv", 'a+');

fputcsv($fd, array($_GET['id'], $_GET['text']));

fclose($fd);

return array('id' => $_GET['id'], 'text' => $_GET['text']);
?>