<?php
    $connect_to_db = null;
    function connect_to_database($host_name,$user_name,$pass,$db_name,$close_db){
        $connect_to_db = mysqli_connect($host_name,$user_name,$pass,$db_name);
        if($close_db==true){
            
            if(mysql_errno()){
                die("Could not connnect to database. <br/>");
            }else{
                echo "Connected to " . $db_name . " Successfully." . "<br/>";
            }
        }else{
            echo "Database Closed <br/>";
            mysqli_close($connect_to_db);
        }
    }

    function search_query($column,$from,$where){
        $query = `SELECT {$column} FROM {$from} WHERE {$where}`;
    }
?>