<?php

function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
}


?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <table id="table" class="table table-dark">
            <tbody>
                <tr style="background-color: black">
                    <th>Program</th>
                    <th>Time</th>
                </tr>
                <?php
                $names = [];
                $times = [];

                foreach (glob("*.txt") as $file) {
                    $names[] = base64_decode(substr($file, 0, -4));
                    $times[] = time() - intval(file_get_contents("./$file"));
                }

                array_multisort($times, $names);

                for ($x = (count($names) - 1); $x >= 0; $x--) echo '<tr><td>'.$names[$x].'</td><td>'.secondsToTime($times[$x]).'</td></tr>';
                ?>
            </tbody>
        </table>
        <script>
        
        getData();
        function getData() {
            $.get("handler.php", function(data, status) { document.getElementById("table").innerHTML = data; });
        }
        setInterval(getData(), 1000);

        </script>
    </body>
</html>
