<?php
    //setcookie("philrey",30,time() + (60*60));

    //1. Opening a connection to my Database//
    $host_name="localhost";
    $user_name="cinema_admin";
    $password="cinema_admin";
    $db_name="cinema_db";
    $connection = mysqli_connect($host_name,$user_name,$password,$db_name);
    //Checks if the connection was unsuccessfull//
    if(mysql_errno()){
        die("Connection failed with an error: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
    }else{
        echo "Connected Successfully.";
    }
?>
<!DOCTYPE>
<html>
    <title>Log-In</title>
    <body>
        <h2>Log-in with your account</h2><br>
        
        <h4>
            <?php
                //2. Performing a query//
                $query =  "SELECT * FROM purchases";
                $result = mysqli_query($connection,$query);
                //Checks if there was no result
                if(!$result){
                    die("Query Failed");
                }
                $cLine = array();
                //3. Use Returned Rows //
                while($row = mysqli_fetch_assoc($result)){
                    // Output each row//
                                      
                    $cLine[] = array($row['id'],$row['user_id'],$row['movie_name'],$row['seat_number'],$row['booked_date']);
                }
                //4. Release Data//
                mysqli_free_result($result);

                for($n=0;$n<sizeof($cLine);$n++){
                    for($x=0;$x<sizeof($cLine[$n]);$x++){
                        echo $cLine[$n][$x] . " ";
                    }
                }
            ?>
        </h4>
    </body>
</html>

<?php
    mysqli_close($connection);
?>