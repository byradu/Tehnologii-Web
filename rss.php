<?php header("Content-Type: application/rss+xml; charset=ISO-8859-1");
    
    include_once 'Includes/connection.inc.php';
    $sql="select count(id_coin) as numar,title,value,country,createdAt from inventory i join coins c on i.id_coin=c.id  group by id_coin order by 1 desc LIMIT 10;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo 'SQL ERROR';
    }else{
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $url="http://localhost/Tehnologii-Web/";
        
        echo "<?xml version='1.0' encoding='UTF-8' ?>" . PHP_EOL;
        
        echo "<rss version='2.0'" . PHP_EOL;

        echo "<channel>" . PHP_EOL;

        echo "\t<title> RSS FEED</title>" . PHP_EOL;

        echo "\t<description>RSS FEED- Top 10 Coins </description>" . PHP_EOL;

        echo "\t<language>en-us</language>" . PHP_EOL;

        while($row=mysqli_fetch_assoc($result)){
            echo "\t<item xmlns:dc='ns:1'>" . PHP_EOL;
            echo "\t\t<title>".$row['title']. "</title>" . PHP_EOL;
            echo "\t\t<value>".$row['value']."</value>" . PHP_EOL;
            echo "\t\t<country>".$row['country']."</country>" . PHP_EOL;
            echo "\t\t<createdAt>".$row['createdAt'] ."</createdAt>" . PHP_EOL;
            echo "\t\t<presences>".$row['numar']."</presences>" . PHP_EOL;
            echo "\t</item>" . PHP_EOL;
        }

        echo "</channel>" . PHP_EOL;

        echo "</rss>" . PHP_EOL;
    }

?>