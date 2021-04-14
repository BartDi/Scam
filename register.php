<?php
    session_start();
    //!checking if we passed the form
    if(isset($_POST['Rlogin']) && isset($_POST['Rpass'])){
        //! checking if the login and password are different from zero
        if(strlen($_POST['Rlogin']) < 4 || strlen($_POST['Rpass']) < 4){
            $_SESSION['error'] = "Wprowadzane dane są zbyt krotkie";
            header('Location: index2.php');
            exit();
        }
        else{
            //! writing data into variables
            //! login protection against polish or forbidden characters
            $login = htmlentities($_POST['Rlogin'], ENT_QUOTES, "UTF-8");
            //! connecting to database - catching exceptions - security
            try{
                $db = new mysqli("localhost","root","","scam");
                if($db->connect_errno !=0){
                    throw new Exception(mysqli_connect_errno());//!check for exception
                }
                else{
                    //! sending a query to the database
                    if($row = $db->query('SELECT * FROM users')){
                        //! checking if such a user exists
                        if($row->num_rows >0){
                            $row2 = $row->fetch_assoc(); //! write all data from the row to the row2 variable
                            //! Check if there is already such a login 
                            if($row2['login'] == $login){
                                //! such a name already exists
                                $_SESSION['error'] = "Niestety taka nazwa użytkownika juz istnieje";
                                header('Location: index2.php');
                                exit();
                            }
                            else{//!If the user name is not the same as the one in the database, create a new user and hash the password
                                $hash = password_hash($_POST['Rpass'], PASSWORD_DEFAULT);
                                $q ="INSERT INTO users(login, pass) VALUES('".$login."','".$hash."');";
                                $db->query($q);
                                $_SESSION['error'] = "Poprawnie zarejestrowano użytkownika";
                                header('Location: index2.php');
                                exit();
                            }
                            unset($login);
                            unset($_POST['Rpass']);
                        }
                    }else{
                        //! wrong query in if($row = mysqli_query($db,"SELECT * FROM users)){
                        $_SESSION['error'] = "Błąd zapytania bazy danych";
                        header('Location: index2.php');
                        exit();
                    }
                }
            }
            catch(Exception $exce){
                //!incorrectly entered data in $db = new mysqli("localhost","root","","scam");
                $_SESSION['error'] = "Błąd bazy danych";
                header('Location: index2.php');
                exit();
            }
        }
    }
    else{
        $_SESSION['error'] = "Proszę wprowadzić dane";
        header('Location: index2.php');
        exit();
    }
?>