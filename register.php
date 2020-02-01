<?php 
$title = 'Movies And Series - Register';
require_once('header.php');

$_SESSION['message'] = '';
$error = [];

function registerUser ( $user, $password, $email, $gender ){
    global $source;
    if ( isset($password) && strlen($password) >= 8 && strlen($password) > 3 ) {
        $accountAdded = $source->add ($user, $password, $email, $gender);
        if ($accountAdded) {
            global $error;
            $error[] = 'Account has been added to database.';
            return true;
            
        } else {
            global $error;
            $error[] = 'Error creating account.';
            return false;
        }
    } else {
        global $error;
            $error[] = "Password doesn't meet requirements";
            return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( $_POST['password'] == $_POST['confirmpassword']) {

        registerUser( $_POST['username'], $_POST['password'], $_POST['email'], $_POST['gender']);


    } else {
        $error[] = 'Passwords are different.';
        
    }
    print_r($error);
    echo $message->output("Co tam");
}


?>
<main>
    <div class="wrapper">

    <?php if(isset($_SESSION['username']) ) : ?> 
        <?php
            header('Location: index.php');
        ?>
        <p>You are logged in.</p>
    <?php else : ?>
        
        
<? echo 'dwa';
    
?>
        <?php 
            if(!empty($error)){
                foreach($error as $value){
                    echo '<p class="notify-info">'.$value.'</p>';
                }
            }
        ?>
        

        <div class="box">
            <h2>Create Account</h2>
            <hr>
            <p>To register fill these fields (fields with * are required).</p><br>
            <form action="register.php" id="register_form" method="POST" autocomplete="off"> 
                <label for="username"><b>Username: *</b></b></label>
                <input type="text" name="username" placeholder="3-30 characters, only letters, numbers and chars @.+-_"required/>
                <label><b>E-mail: *</b> </label>
                <input type="email" name="email" required/>
                <div class="inline">
                    <div style="width: 50%;">
                        <b>Password: *</b><br>
                        <input type="password" name="password" required/>
                    </div>
                    <div style="width: 50%;">
                        <b>Confirm Password: *</b><br>
                        <input type="password" name="confirmpassword" required/>
                    </div>
                </div>
                <b>Gender:</b>
                <select name="gender">
                    <option value="unknown">Not specified</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
                
                I have read <a href="rules.php">rules</a> <input type="checkbox" required><br>
                <button type="submit" name="register">Register</button>
            </form>
        </div>
    </div>
</main>

<?php endif; ?>

<?php
    require_once('footer.php');
?>