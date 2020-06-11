<?php   
    require 'connection.inc.php';
    $method = $_POST['src'];

    header('Content-Type: application/download; charset=utf-8');
    $output = fopen("php://output","w");

    if(strcmp($method,"csv-top5i")){
        header('Content-Disposition: attachment; filename=Top 5 biggest inventories.csv');
        fputcsv($output,array('User','Number of coins'));
        $sql = "SELECT id_user, count(id_coin) from inventory group by id_user order by count(id_coin) desc limit 5;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $sql = 'select username from users where id=' . $row['id_user'];
          $result2 = mysqli_query($conn, $sql);
          $user = $result2->fetch_assoc();
            $line = array($user['username'],$row['count(id_coin)']);
            fputcsv($output,$line,",");
        }
    }else if(strcmp($method,"csv-top5c")){
        header('Content-Disposition: attachment; filename=Top 5 coins in inventory.csv');
        fputcsv($output,array('Coin','Quantity'));
        $sql = "SELECT id_coin, count(id) from inventory group by id_coin order by count(id) desc limit 5;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $sql = 'select title from coins where id=' . $row['id_coin'];
            $result2 = mysqli_query($conn, $sql);
            $user = $result2->fetch_assoc();
            $line = array($user['title'],$row['count(id)']);
            fputcsv($output,$line,",");
      }
    
    }else if(strcmp($method,"csv-top5h")){
    header('Content-Disposition: attachment; filename=Top 5 heaviest coins.csv');
    fputcsv($output,array('Coin','Weight'));
    $sql = "SELECT title, weight from coins order by weight desc limit 5;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    fputcsv($output,$row);
    }
    
}

fclose($output);
exit();