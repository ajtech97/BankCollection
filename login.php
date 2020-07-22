<?php session_start();?>
<?php error_reporting(0);
if($_SESSION['username']!="")
{
    header("location:index.php");
}
else{
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <link rel="shortcut icon" href="images/login.png">

    <link rel="stylesheet" href="css/materialblue.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/scrollbar.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/login.png" style="height:50px;">&nbsp;&nbsp;&nbsp;&nbsp;<b>Admin Login</b></span>
                <div class="mdl-layout-spacer"></div>
            </div>
        </header>
         <main class="mdl-layout__content">
            <div class="page-content">

                <div id="loginform">
                    <p id="title1">Login to Admin Panel</p>
                    <form method="POST" action="forlogin.php">
                        <br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label pass">
                            <input class="mdl-textfield__input" type="text" id="sample3" name="username" required>
                            <label class="mdl-textfield__label" for="sample3">Username</label>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label pass">
                            <input class="mdl-textfield__input" type="password"  name="password" id="password" required>
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                        <br><br>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="subb" name="login">Login</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<?php }?>
