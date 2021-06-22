<?php
function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
}

echo '<tbody><tr style="background-color: black"><th>Program</th><th>Time</th></tr>';

$names = [];
$times = [];

foreach (glob("*.txt") as $file) {
    $names[] = base64_decode(substr($file, 0, -4));
    $times[] = time() - intval(file_get_contents("./$file"));
}

array_multisort($times, $names);

for ($x = (count($names) - 1); $x >= 0; $x--) echo '<tr><td>'.$names[$x].'</td><td>'.secondsToTime($times[$x]).'</td></tr>';

echo '</tbody>';
?>
