<?php
function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
}
$files = glob("*.txt");
echo "<tbody><tr style=\"background-color: black\"><th>Program</th><th>Time</th></tr>";
$names = array();
$times = array();

foreach ($files as $file) {
    array_push($names, base64_decode(substr($file, 0, -4)));
    array_push($times, time() - intval(file_get_contents("./$file")));
}

array_multisort($times, $names);

for ($x = (count($names) - 1); $x >= 0; $x--) {
    echo "<tr><td>";
    echo $names[$x];
    echo "</td>";
    echo "<td>";
    echo secondsToTime($times[$x]);
    echo "</td></tr>";
}
echo "</tbody>";
?>
