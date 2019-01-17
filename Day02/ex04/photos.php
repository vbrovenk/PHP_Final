#!/usr/bin/php
<?php
if ($argc == 2) {
    $dirname = parse_url($argv[1], PHP_URL_HOST);

    if ($dirname) {
        if (file_exists($dirname)) {
            $dd = opendir($dirname);
		    while (FALSE !== ($file = readdir($dd))) {
			    if ($file != "." && $file != "..") {
                    unlink($dirname . "/" . $file);
                }
            }
		    closedir($dd);
            rmdir($dirname);
        }
        
        mkdir($dirname);
        $ch = curl_init($argv[1]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $html = curl_exec($ch);
        preg_match_all("@<img.*?src=\"(.*?)\".*?>@", $html, $images);
        $scheme = parse_url($argv[1], PHP_URL_SCHEME);
        $pattern = "/" . $scheme . "/";

        for ($i = 0; $i < count($images[1]); $i++) {
            $ref = $images[1][$i];
            if (preg_match($pattern, $images[1][$i])) {

            }
            else {
                $ref = parse_url($argv[1], PHP_URL_SCHEME) . "://" . parse_url($argv[1], PHP_URL_HOST) . $images[1][1];
            }
            $cu = curl_init($ref);
            curl_setopt($cu, CURLOPT_RETURNTRANSFER, TRUE);
            $data = curl_exec($cu);
            $temp = explode("/", $images[1][$i]);
            $filewrite = fopen($dirname . "/" . end($temp), 'w');
            fwrite($filewrite, $data);
            curl_close($cu);
        }
        curl_close($ch);
    }
}
?>