<?php
if (isset($_POST['x'])) {
    $txt = $_POST['x'];
    $items = explode("###NEWITEM###", $txt);
    unset($items[0]);
    $ls = array();
    foreach ($items as $item) {
        $name = base64_encode($item);
        array_push($ls, $name);
        if (!(file_exists("./$name.txt"))) {
            $fp = fopen("./$name.txt", 'w');
            fwrite($fp, time());
            fclose($fp);
        }
    }
    
    $files = glob("*.txt");
    
    foreach ($files as $file) {
        $name = base64_decode(substr($file, 0, -4));
        if (!(in_array($name, $items))) {
            unlink($file);
        }
    }
}
?>
