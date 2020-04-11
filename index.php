<?php
function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
}
?>
<html>
    <body>
        <table>
            <tbody>
                <tr>
                    <th>
                        Program
                    </th>
                    <th>
                        Time
                    </th>
                </tr>
                <?php
                $files = glob("*.txt");
                foreach ($files as $file) {
                    echo "<tr><td>";
                    $name = base64_decode(substr($file, 0, -4));
                    echo $name;
                    echo "</td>";
                    echo "<td>";
                    echo secondsToTime(time() - intval(file_get_contents("./$file")));
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
