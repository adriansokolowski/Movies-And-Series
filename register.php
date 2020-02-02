<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<?php 

require_once('header.php');
$title = 'Movies And Series - Register';

$notifications = [];

function registerUser ( $username, $password, $email, $gender ) {
    global $source, $message, $notifications;
    if (isset($username) && strlen($username) >= 3 && strlen($username < 16) ) {  
        if ( isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL && strlen($email) >= 3 && strlen($email) < 16) ) { 
            if ( isset($password) && strlen($password) >= 8 ) {
                $accountAdded = $source->add ($username, $password, $email, $gender);
                if ($accountAdded) {
                    $notifications[] = 'Account has been added to database.';
                    return true;
                } else {
                    $notifications[] = 'Error creating account.';
                    return false;
                }
            } else {
                $notifications[] = "Password doesn't meet requirements";
                return false;
            }
        } else {
            $notifications[] = "Email doesn't meet requirements.";
        }
    } else {
        $notifications[] = "Username doesn't meet requirements.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( $_POST['password'] == $_POST['confirmpassword']) {

        registerUser( $_POST['username'], $_POST['password'], $_POST['email'], $_POST['gender']);

    } else {
        $notifications[] = 'Passwords are different.';
    }
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
        <?php if(!empty($notifications)): ?>
            <?php foreach($notifications as $value): ?>
                <p class="notify-info"><?php $message->output($value) ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
            
       

        <div class="box">
            <h2>Create Account</h2>
            <hr>
            <p>To register fill these fields (fields with * are required).</p><br>
            <form action="register.php" id="register_form" method="POST" autocomplete="off"> 

                <div id='validate'>
                    <label for="username"><b>Username: *</b></b></label>
                    <input type="text" name="username" id="username" v-bind:class="[hasError ? 'error' : 'valid']" class="form-control" v-model='username' @keyup='checkUsername()' placeholder="3-30 characters, only letters, numbers and chars @.+-_"/>
                    <label for="username" v-bind:class="[hasError ? 'notavailable' : 'available']" class="error">{{responseMessage}}</label>
                
                <br>
                    <label><b>E-mail: *</b> </label>
                    <input type="text" name="email" class="form-control" />
                </div>
                <div class="inline">
                    <div style="width: 50%;">
                        <b>Password: *</b><br>
                        <input type="password" name="password" />
                    </div>
                    <div style="width: 50%;">
                        <b>Confirm Password: *</b><br>
                        <input type="password" name="confirmpassword" />
                    </div>
                </div>
                <b>Gender:</b>
                <select name="gender">
                    <option value="unknown">Not specified</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
                
                I have read <a href="rules.php">rules</a> <input type="checkbox" ><br>
                <button type="submit" name="register">Register</button>
            </form>
        </div>
    </div>
</main>

<?php endif; ?>

<script src="public/js/validation.js"></script>


<?php
    require_once('footer.php');
?>