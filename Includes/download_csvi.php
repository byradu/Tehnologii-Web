<?php
 require 'connection.inc.php';
 header('Content-Type: application/download; charset=utf-8');
 $output = fopen("php://output","w");
 header('Content-Disposition: attachment; filename=Top_5_biggest_inventories.csv');
fputcsv($output,array('User','Number of coins'));
$csv = "User, Number of coins,\n";
$sql = "SELECT id_user, count(id_coin) from inventory group by id_user order by count(id_coin) desc limit 5;";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $sql = 'select username from users where id=' . $row['id_user'];
    $result2 = mysqli_query($conn, $sql);
    $user = $result2->fetch_assoc();
    $line = array($user['username'],$row['count(id_coin)']);
    fputcsv($output,$line,",");
    $csv =$csv . $user['username'].','.$row['count(id_coin)'].'\n';
}
fclose($output);
