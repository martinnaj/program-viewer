<?php

if (isset($_POST['x'])) {
    foreach (array_slice(explode("###NEWITEM###", $_POST['x']), 1) as $item) {
        $name = base64_encode($item);
        if (!(file_exists("./$name.txt"))) file_put_contents("./$name.txt", strval(time()));
    }

    foreach (glob("*.txt") as $file) {
        $name = base64_decode(substr($file, 0, -4));
        if (!(in_array($name, $items))) unlink($file);
    }
}

?>
