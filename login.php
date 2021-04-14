<?php
    session_start();
    //!checking if we passed the form
    if(isset($_POST['login']) && isset($_POST['pass'])){
        //! checking if the login and password are different from zero
        if(strlen($_POST['login']) < 4 || strlen($_POST['pass']) < 4){
            $_SESSION['error'] = "Wprowadzane dane są zbyt krotkie";
            header('Location: index2.php');
            exit();
        }
        else{
            //! writing data into variables
            //! login protection against polish or forbidden characters
            $login = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");
            //$_POST['pass'];
            //! connecting to database - catching exceptions - security
            try{
                $db = new mysqli("localhost","root","","scam");
                if($db->connect_errno !=0){
                    throw new Exception(mysqli_connect_errno());//!check for exception
                }
                else{
                    //! sending a query to the database
                    if($row = $db->query('SELECT * FROM users WHERE login ="'.$login.'"')){
                        //! checking if such a user exists
                        if($row->num_rows >0){
                            $row2 = $row->fetch_assoc(); //! write all data from the row to the row2 variable
                            //!  checking if the password and the number of letters in the login match 
                            if(password_verify($_POST['pass'],$row2['pass']) && $row2['login'] == $login){
                                    $_SESSION['zalogowany'] = True; //! variable telling us if I am logged in
                                    $_SESSION['login'] = $row2['login']; //!variable storing login
                                    $db ->close();
                                    header('Location: index.php');//!INSERT HOME PAGE HERE
                                    exit();
                            }
                            else{
                                //! invalid password
                                $_SESSION['error'] = "Wprowadziłeś niepoprawne dane";
                                header('Location: index2.php');
                                exit();
                            }
                            unset($login);
                            unset($_POST['pass']);
                        }
                        else{
                            //! invalid user name
                            $_SESSION['error'] = "Wprowadziłeś niepoprawne dane";
                            header('Location: index2.php');
                            exit();
                        }
                    }else{
                        //! wrong query in   if($row = mysqli_query($db,"SELECT * FROM users WHERE login = '$login'")){
                        $_SESSION['error'] = "Błąd zapytania bazy danych";
                        header('Location: index2.php');
                        exit();
                    }
                }
            }
            catch(Exception $exce){
                //!incorrectly entered data in $db = new mysqli("localhost","root","","sesjalog");
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