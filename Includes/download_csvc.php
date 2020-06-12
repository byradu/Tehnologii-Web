<?php   
    require 'connection.inc.php';
    
    
    
    header('Content-Type: application/download; charset=utf-8');
    $output = fopen("php://output","w");
    header('Content-Disposition: attachment; filename=Top_5_coins_in_inventory.csv');
        fputcsv($output,array('Coin','Quantity'));
        $csv = "Title, Number of coins,\n";
        $sql = "SELECT id_coin, count(id) from inventory group by id_coin order by count(id) desc limit 5;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $sql = 'select title from coins where id=' . $row['id_coin'];
            $result2 = mysqli_query($conn, $sql);
            $user = $result2->fetch_assoc();
            $line = array($user['title'],$row['count(id)']);
            fputcsv($output,$line,",");
            $csv =$csv . $user['title'].','.$row['count(id)'].'\n';
      }
      fclose($output);