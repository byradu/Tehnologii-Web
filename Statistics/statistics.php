<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistics</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Nume', 'Numar monede'],

        <?php
        require_once '../Includes/connection.inc.php';
        $sql = "SELECT id_user, count(id_coin) from inventory group by id_user order by count(id_coin) desc limit 5;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $sql = 'select username from users where id=' . $row['id_user'];
          $result2 = mysqli_query($conn, $sql);
          $user = $result2->fetch_assoc();


          echo "['" . $user['username'] . "', " . $row['count(id_coin)'] . "],";
        }

        ?>
      ]);

      var options = {
        title: 'Top 5 biggest inventories',
        backgroundColor: 'transparent',
        titleTextStyle: {
          color: '#25f54f'
        },
        legend: {
          position: 'bottom',
          textStyle: {
            color: '#25f54f',
            fontSize: 16
          }
        }

      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Titlu', 'Multitudine'],

        <?php
        require_once '../Includes/connection.inc.php';
        $sql = "SELECT id_coin, count(id) from inventory group by id_coin order by count(id) desc limit 5;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $sql = 'select title from coins where id=' . $row['id_coin'];
          $result2 = mysqli_query($conn, $sql);
          $user = $result2->fetch_assoc();

          echo "['" . $user['title'] . "', " . $row['count(id)'] . "],";
        }

        ?>
      ]);

      var options = {
        title: 'Top 5 coins in inventories',
        backgroundColor: 'transparent',
        titleTextStyle: {
          color: '#25f54f'
        },
        legend: {
          position: 'bottom',
          textStyle: {
            color: '#25f54f',
            fontSize: 16
          }
        }

      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
      chart.draw(data, options);
    }
  </script>
  
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Titlu', 'Greutate'],

        <?php
        require_once '../Includes/connection.inc.php';
        $sql = "SELECT title, weight from coins order by weight desc limit 5;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {

          echo "['" . $row['title'] . "', " . $row['weight'] . "],";
        }

        ?>
      ]);

      var options = {
        title: 'Top 5 heaviest coins',
        backgroundColor: 'transparent',
        titleTextStyle: {
          color: '#25f54f'
        },
        legend: {
          position: 'bottom',
          textStyle: {
            color: '#25f54f',
            fontSize: 16
          }
        }

      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
      chart.draw(data, options);
      
    }
  </script>
  
  <script>
    $(document).ready(function() {
      $("button").click(function() {
        var src = $(this).attr("id");
        $.ajax({
          url: "../Includes/download_csv.php",
          method: "post",
          data: {
            src: src
          },
          success: function(response) {
            var link = document.createElement("a");
            link.href = 'data:text/csv,' + encodeURIComponent(response);
            if(src=="csv-top5i")
              link.download = "Top 5 Inventories.csv"
            if(src=="csv-top5c")
              link.download = "Top 5 coins in inventories.csv"
            if(src=="csv-top5h")
              link.download = "Top 5 heaviest coins.csv"
            link.click();
          }
        });
      });
    });
  </script>

</head>

<body>
  <div class="go-home">
    <a href="../index.php">Home</a>
  </div>
  <div>
    <ul>
      <li>
        <div id="piechart" class="pie"></div>
        <div class="csv">
          <button id="csv-top5i">Download CSV Top 5 Inventories</button>
        </div>
      </li>
      <li>
        <div id="piechart2" class="pie"></div>
        <div class="csv">
          <button id="csv-top5c">Download CSV Top 5 Coins in inventories</button>
        </div>
      </li>
      <li>
        <div id="piechart3" class="pie"></div>
        <div class="csv">
          <button id="csv-top5h">Download CSV Top 5 heaviest coins</button>
        </div>
      </li>
    </ul>
  </div>


</body>

</html>