<?php   
    require 'connection.inc.php';
   
    
    
    header('Content-Type: application/download; charset=utf-8');
    $output = fopen("php://output","w");

    
    header('Content-Disposition: attachment; filename=Top_5_heaviest_coins.csv');
    fputcsv($output,array('Coin','Weight'));

    $sql = "SELECT title, weight from coins order by weight desc limit 5;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $line = array($row['title'],$row['weight']);
    fputcsv($output,$line,",");
     
}

fclose($output);
