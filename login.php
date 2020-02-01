<?php
    $title = 'Movies And Series - Log In';
    require_once('header.php');
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $account = $source->get($_POST['username']);

        

        $source->logIn($account, $_POST['password'] );
  
    }
?>

<main>
    <div class="wrapper">
    <?php if(isset($_SESSION['username'])) : ?>
            <p class="notify-info">You are logged in.
                
            </p>
            <?php else : ?>
                <p class="notify-info">You are not logged in.</p>
        <?php endif; ?>
            <div class="box">
            <h2>Log In</h2>
            <form action="login.php" method="POST" autocomplete="off"> 
                Login:
                <input type="text" name="username"/><br>
                Password:
                <input type="password" name="password"/><br>
                <button type="submit">Log In</button>
            </form>
        </div>
    </div>
</main>

<?php 
    include 'footer.php';
?>