<?php
    session_start();
    
    $error = "";
    
    if (array_key_exists("submit", $_POST)) {
        $link = mysqli_connect("localhost", "root", "", "forum");
        
        if (mysqli_connect_error()) {
            die("does not connect to database");
        }
        
        if (!$_POST['email']) {
            $error .= "<p>Email address is required</p>";
        }
        
        if (!$_POST['password']) {
            $error .= "<p>Password is required</p>";
        }
        
        if (!$_POST['name']) {
            $error .= "<p>Name is required</p>";
        }
        
        if (!$_POST['year']) {
            $error .= "<p>Pursuing year is required</p>";
        }
        
        if (!$_POST['branch']) {
            $error .= "<p>Branch is required</p>";
        }
        
        if (!$_POST['userid']) {
            $error .= "<p>User Id is required</p>";
        }
        
        if ($error != "") {
            $error = "<p>There is/are some error(s)</p>" . $error;
        } else {
            if ($_POST['signUp'] == '1') {
                
                
                $query = "SELECT id FROM users WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'LIMIT 1";
                
                $result = mysqli_query($link, $query);
                
                if (mysqli_num_rows($result) > 0) {
                    $error = "Email address already exists";
                } else {
                    $query = "INSERT INTO users (email,password,name,year,branch,userid) VALUES ('" . mysqli_real_escape_string($link, $_POST['email']) . "','" . mysqli_real_escape_string($link, $_POST['password']) . "','" . mysqli_real_escape_string($link, $_POST['name']) . "','" . mysqli_real_escape_string($link, $_POST['year']) . "','" . mysqli_real_escape_string($link, $_POST['branch']) . "','" . mysqli_real_escape_string($link, $_POST['userid']) . "')";
                    
                    if (!mysqli_query($link, $query)) {
                        $error = "<p>There is error while signing up - please try again later</p>";
                    } else {
                        $query = "UPDATE users SET password = '" . md5(md5(mysqli_insert_id($link)) . $_POST['password']) . "' WHERE id = " . mysqli_insert_id($link);
                        
                        $result = mysqli_query($link, $query);
                        
                        $_POST['id'] = mysqli_insert_id($link);
                        
                    }
                }
            } else {
                if (!$_POST['userid']) {
                    $error .= "<p>User Id is required</p>";
                }
                
                if (!$_POST['password']) {
                    $error .= "<p>Password is required</p>";
                }
                
                $query = "SELECT * FROM users WHERE userid = '" . mysqli_real_escape_string($link, $_POST['userid']) . "'";
                
                $result = mysqli_query($link, $query);
                
                $row = mysqli_fetch_array($result);
                
                if (isset($row)) {
                    $hashedPassword = md5(md5($row['id']) . $_POST['password']);
                    
                    if ($hashedPassword == $row['password']) {
                        $_POST['id'] = $row['id'];
                        
                    } else {
                        $error = "That email/password combination could not found.";
                    }
                } else {
                    $error = "That email/password combination could not found.";
                }
            }
        }
    }

?>

<html lang="en">
    <head>
        <title>
            Forum MainPage
        </title>
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Coda&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="index.css">
        <script src="jquery.min.js"></script>
        <script src="js/functions.js"></script>
    </head>
    <body>
        <div id="main-container">
            <div id="header-container">
                <div id="logo-image">
                    Image
                </div>
                <div id="header-text">
                    Project_Name
                </div>
                <div id="date-div">
                </div>
            </div>
            <div id="header-seperater" class="seperater">
    
            </div>
            <div id="middle-container" datafld="unchanged">
                <div id="left-div">
                    <span id="signup-text" class="option-text">
                        Signup
                    </span>
                    <div id="sign-up-form-div" hidden>
                        <form method="post">
                    
                            <div id="sign-up-form">
                        
                                <p>Sign-Up Form</p>
                        
                                <label for="name">Name :</label>
                                <input type="text" name="name" placeholder="eg.Sanket Deone">
                        
                                <label for="email">Email :</label>
                                <input type="email" name="email" placeholder="eg.sanketsd@gmail.com">
                        
                                <label name="year" for="years">Class :</label>
                        
                                <select name="year">
                                    <option value="0">Choose a year :</option>
                                    <option value="FE">First Year</option>
                                    <option value="SE">Second Year</option>
                                    <option value="TE">Third Year</option>
                                    <option value="BE">Last Year</option>
                                </select>
                        
                                <label name="branch" for="branches">Branch :</label>
                                <input list="branches" name="branch">
                                <select name="branch">
                                    <option value="0">Choose a branch :</option>
                                    <option value="CSE">Computer Engg</option>
                                    <option value="ME">Mechanical Engg</option>
                                    <option value="EE">Electrical Engg</option>
                                    <option value="PE">Printing Engg</option>
                                    <option value="CE">Civil Engg</option>
                                    <option value="ENTC">Electronics & Telecommunication Engg</option>
                                    <option value="IT">Information & Technology</option>
                                </select>
                        
                                <label for="userid">User ID : </label>
                                <input name="userid" type="text" placeholder="User Id">
                        
                                <label for="password">Password :</label>
                        
                                <input name="password" type="password" placeholder="Password">
                        
                                <input type="hidden" name="signUp" value="1">
                        
                                <input type="submit" name="submit" value="Sign Up">
                    
                            </div>
                
                        </form>
            
                    </div>
                    <img src="Images/Picture1.png" id="left-expand-image" class="expand-button" alt=">">
                </div>
                <div id="right-div">
                    <span id="login-text" class="option-text">
                        Login
                    </span>
                    <div id="log-in-form-div" hidden>
                        <form method="post">
                    
                            <div id="login-form">
                        
                                <p>Login Form</p>
                        
                                <label for="userid">User ID </label>
                                <input name="userid" type="text" placeholder="User Id">
                        
                                <label for="password">Password</label>
                                <input name="password" type="password" placeholder="Password"><br>
                        
                                <input type="hidden" name="signUp" value="0">
                        
                                <input type="submit" name="submit" value="Login">
                        
                                <p><a id="goToSignUp">Sign Up</a></p>
                    
                            </div>
                
                        </form>
                    </div>
                    <img src="Images/Picture2.png" id="right-expand-image" class="expand-button" alt="<">
                </div>
            </div>
            <div id="footer-seperator" class="seperater"></div>
            <div id="footer-container">
                <span id="copyright-text">&copy; 2020</span>
            </div>
        </div>
        <script src="index_after.js"></script>
    </body>
</html>