<?php
    $title = 'Movies And Series - Profile';
    require_once('header.php');
?>

<main>
    <div class="wrapper">
        <?php 
            if (isset($_SESSION["username"])) {
            echo $_SESSION["username"];

            echo '<a href="logout.php">Log out</a>';
        } else {
            echo 'You are not logged in.';
        }
        ?>
    </div>
</main>

<?php
    require_once('footer.php');
?>
