<!DOCTYPE>
<html>
    <title>Log-In</title>
    <body>
        <h2>Log-in with your account</h2><br>
        
        <h4>
            <?php
                if(isset($_POST["userN"])){
                    $username = $_POST["userN"];
                }else{
                    $username = "user name is empty";
                }if(isset($_POST["passW"])){
                    $password = $_POST["passW"];
                }else {
                    $password = "empty password";
                }
                echo "{$username} {$password}";
            ?>
        </h4>
    </body>
</html>