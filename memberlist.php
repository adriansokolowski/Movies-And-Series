<?php 
    $title = 'Movies And Series - Members';
    require_once('header.php');
?>
<main>
    <div class="wrapper">
        <div class="box">
            <?php
                $started = microtime(true);
                $result = $db->query("SELECT uid, username, email, password, gender, regdate, usergroup FROM mas_accounts");

                
                if ($result->rowCount() > 0) {
                    // output data of each row
                    while($row = $result->fetch( PDO::FETCH_ASSOC )) {
                        echo "id: " . $row["uid"]. " - Username: " . $row["username"]. " - ". $row["email"]. " - ".$row["gender"]. " ". $row["regdate"]. " ". $row["usergroup"]. "<br>";
                    }
                } else {
                    echo "0 results";
                }
                $db = null;
                // query time display
                $end = microtime(true);
                $difference = $end - $started;
                $queryTime = number_format($difference, 10);
                echo "SQL query took $queryTime seconds.";
            ?>
        </div>
    </div>
</main>
<?php
    include 'footer.php';
?>