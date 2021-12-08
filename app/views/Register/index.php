<?php
    /*if(!isset($_SESSION)){
        session_start();
    }*/
?>
<h1>Registration Page</h1>
<form id = "frm-register" action = "<?= BASEURL ?>/register/process" method = "post">
    <label for = "username">Username : </label>
    <input type = "textbox" id = "username" name = "username" 
    value = "<?php if(isset($_SESSION["username"])) echo $_SESSION["username"];?>">
    <span><?php if(isset($_SESSION["username_err"])) echo $_SESSION["username_err"];?></span>
    <label for = "username">Email : </label>
    <input type = "email" id = "email" name = "email" 
    value = "<?php if(isset($_SESSION["email"])) echo $_SESSION["email"];?>">
    <span><?php if(isset($_SESSION["email_err"])) echo $_SESSION["email_err"];?>
    </span>
    <label for = "password">Password : </label>
    <input type = "password" id = "password" name = "password" 
    value = "<?php if(isset($_SESSION["password"])) echo $_SESSION["password"];?>">
    <span><?php if(isset($_SESSION["password_err"])) echo $_SESSION["password_err"];?></span>
    <label for = "password">Confirm Password : </label>
    <input type = "password" id = "confirmpassword" name = "confirmpassword"
    value = "<?php if(isset($_SESSION["confirmpassword"])) echo $_SESSION["confirmpassword"];?>">
    <span>
    <?php if(isset($_SESSION["confirmpassword_err"])) echo $_SESSION["confirmpassword_err"];?>
    </span>
    <button type = "submit" name = "btnregister">Register</button>
    <span>
        <?php if(isset($_SESSION["err_msg"])) echo $_SESSION["err_msg"];?>
    </span>
</form>