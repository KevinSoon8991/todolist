<?php
    /*if(isset($_POST["btnlogin"])){
        print_r($_POST);
    }*/
    if(isset($_SESSION["register"])){
        if($_SESSION["register"] === "1"){
            echo "registration success";
        }
        else{
            echo "registration failed";
        }
    }
    
?>

<h1>Login Page</h1>
<form id = "frm-login" action = "<?= BASEURL ?>/login/validateuser" method = "post">
    <label for = "username">Username : </label>
    <input type = "textbox" id = "username" name = "username" value = <?php if(isset($_SESSION["username"])) echo $_SESSION["username"] ?>>
    <span><?php if(isset($_SESSION["username_err"])) echo $_SESSION["username_err"] ?></span>
    <label for = "password">Password : </label>
    <input type = "password" id = "password" name = "password" value = <?php if(isset($_SESSION["password"])) echo $_SESSION["password"] ?>>
    <span><?php if(isset($_SESSION["password_err"])) echo $_SESSION["password_err"] ?></span>
    <input type = "checkbox" name = "checked" id = "checked" class = "checked"><label for = "checked" id = "checkedlabel" class = "checked">Remember me</label>
    <button type = "submit" name = "btnlogin">Login</button>
    <span><?php if(isset($_SESSION["err_msg"])) echo $_SESSION["err_msg"] ?></span>
</form>