<!DOCTYPE html>

<html>
    <?php
        include_once("functions.php");
        connect_to_database("localhost","cinema_admin","cinema_admin","cinema_db",true);
    ?>
    <?php 
        $name = "next page";
        $prep = "Phil_Rey_01 @ gmail.com";
        $id = 2;
    ?>
    <a href="asda" ></a>
    <title>Main Menu</title>
    <form action="log_in.php" method="post" target="blank">
        User Nime: <input type="text" name="userN" value="asd" maxlength="5"/><br>
        Passwerd: <input type="password" name="passW" value="asd"/><br>
        Number: <input type="number" name="numbeR" value ="asd"/><br>
        Date: <input type="datetime" name="datE" /><br>
        <input type="submit" name="submit" value="Submit"/>
    </form>
</html>