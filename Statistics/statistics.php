<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Coins, Coins Collection, Statistics about coins">
  <meta name="author" content="Loghin Alexandru-Stelian & Zaharioaei Radu">
  <meta name="description" content="Here you can see a few statistics about our users inventories and our coins collections.">
  <title>Statistics</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="icon" type="image/png" href="../logo.jpg">

  
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
 <!--  <script type="text/javascript">
    function exp(type){
      
      var hr = new XMLHttpRequest();
      
      if(type=="csv-top5i")
        var url = "../Includes/download_csvi.php";
      if(type=="csv-top5c")
        var url = "../Includes/download_csvc.php";
      if(type=="csv-top5h")
        var url = "../Includes/download_csv.php";
      hr.open("POST",url,true) ;
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      if(hr.readyState == 4 && hr.status == 200) {
          var return_data = hr.responseText;
          
          if(type=="csv-top5i")
            downloadAsFile(return_data,"Top 5 inventories");
          if(type=="csv-top5c")
            downloadAsFile(return_data,"Top 5 coins in inventories.csv");
          if(type=="csv-top5h")
            downloadAsFile(return_data,"Top 5 heaviest coins.csv");
          }
      hr.send(null);
      }
      function downloadAsFile(csv, fileName) {
      var file = new File([csv], fileName, { type: "text/csv" })
      var anUrl = window.URL.createObjectURL(file)
      var a = window.document.createElement('a');
      a.href = window.URL.createObjectURL(file)
      a.download = fileName;
      a.click();
  }
    
  </script> -->
  


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
          <form action="../Includes/download_csvi.php" method="POST">
          <button type="submit" name="csv-top5i" id="csv-top5i" class="csv-top5i" > Download CSV Top 5 Inventories</button>
          </form>
          
        </div>
      </li>
      <li>
        <div id="piechart2" class="pie"></div>
        <div class="csv">
        <form action="../Includes/download_csvc.php" method="POST">
          <button type="submit" id="csv-top5c" ">Download CSV Top 5 Coins in inventories</button>
        </form>
        </div>
      </li>
      <li>
        <div id="piechart3" class="pie"></div>
        <div class="csv">
        <form action="../Includes/download_csv.php" method="POST">
          <button id="csv-top5h" ">Download CSV Top 5 heaviest coins</button> <!-- onclick="exp(this.id) -->
        </form>
        </div>
      </li>
    </ul>
  </div>


</body>

</html>