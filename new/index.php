<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <table id="table">
            <tbody>
                <tr>
                    <th>
                        Program
                    </th>
                    <th>
                        Time
                    </th>
                </tr>
            </tbody>
        </table>
        <script>
        getData();
        function getData() {
            $.get("handler.php", function(data, status){
                document.getElementById("table").innerHTML = data;
            });
        }
        var i = 1;
        function myLoop () {
           setTimeout(function () {
              getData();
              if (i < 10) {
                 myLoop();
              }
           }, 1000)
        }
        
        myLoop();
        </script>
    </body>
</html>
