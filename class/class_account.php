<?php

    class Account {

        private $_db;
        function __construct($db){
            
            $this->_db = $db;
        }

        public function add ( $name, $pass, $email, $gender="unknown" ) {
            if ($this->get($name)) {
                return false;
            } else {
                $result = $this->_db->prepare('INSERT INTO mas_accounts (username, password, email, gender, regdate, usergroup) VALUES (:name, :pass, :email, :gender, NOW(), 1)');
                $result->execute(array(':name' => $name, ':pass' => password_hash($pass, PASSWORD_BCRYPT), ':email' => $email, ':gender' => $gender));
                return $this->get($name);
            }
        }

        public function remove ( $account ) {

        }

        /*
            $username: The username of the account to retrieve.
            Returns An account or false.   
        */

        public function get ( $username ){
            $result = $this->_db->prepare('SELECT * FROM mas_accounts WHERE username = :username');
            $result->execute(array(':username' => $username));
            if (($result->rowCount() == 0)){
                return false;
            } else {
                $account = $result->fetch( PDO::FETCH_ASSOC );
                return $account;
            }
        }

        public function isLoggedIn(){
            if ( isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true )
                return true;
            else
                return false;
        }

        /*
            $account: The account to log the user into.
            $password: The password needed to sign into this account
            Returns true if the user was successfully logged into the given account. Returns false or null
            if the log in failed for some reason.
        */

        public function logIn ($account, $password){
            if ( password_verify( $password, $account['password'] )){
                if ($_SESSION['isLoggedIn'] == true) {
                    return false;
                    $error[] = "You are already logged in";
                } else {
                    $_SESSION['username'] = $account['username'];
                    $_SESSION['isLoggedIn'] = true;
                    //header("location: index.php");
                    return true;
                }
            } else {
                return false;
            }
        }

        public function logOut(){
            session_destroy();
        }
    }
?>