<?php
    //Connect to Database//
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
    //Search Items With//
    function search_query($column,$from,$where){
        //2. Performing a query//
        $query = `SELECT {$column} FROM {$from} WHERE {$where}`;
        $result = mysqli_query($connection,$query);
        //Checks if there was no result
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                // Output each row//
                                  
                $cLine[] = array($row['id'],$row['user_id'],$row['movie_name'],$row['seat_number'],$row['booked_date']);
            }
            return $cLine;
        }
        
    }
?>
<html>
    <body>
        <form method="post" enctype="multipart/form-data">
            <br/>
            <input type="file" name="image">
            <br><br>
            <input type="submit" value="Upload Image" name="submit">
        </form>
        <?php
            display_image();

            ini_set('mysql.connect_timeout',300);
            ini_set('default_socket_timeout',300);
            if(isset($_POST['submit'])){
                if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
                    echo "Please Select an Image to Upload.";
                }else{
                    $image = addslashes($_FILES['image']['tmp_name']);
                    $name = addslashes($_FILES['image']['name']);
                    $image = file_get_contents($image);
                    $image = base64_encode($image);
                    save_image($name,$image);
                }
            }
            function save_image($name,$image){
                $connect_to_db = mysqli_connect('localhost','cinema_admin','admin','cinema_db');
                $query = 'insert into movie_management ';
                $query .="(movie_name,movie_price,movie_details,movie_image,image_name)VALUES";
                $query .="('Phil Rey','150','The Secret Behind the Legend','" . $image . "','" . $name . "')";
                echo $query . "<br/>";
        
                $result = mysqli_query($connect_to_db,$query);
                if($result){
                    echo "Image Uploaded";
                    display_image();
                }else{
                    echo "Image not Uploaded";
                }
            }
            function display_image(){
                $connect_to_db = mysqli_connect('localhost','cinema_admin','admin','cinema_db');
                $query = 'select * from movie_management';
                //echo $query . "<br/>";

                $result = mysqli_query($connect_to_db,$query);
                while($row = mysqli_fetch_assoc($result)){
                    // Output each row//
                                      
                    $cLine[] = array($row['movie_name'],$row['movie_price'],$row['movie_details'],$row['movie_image']);
                }
                mysqli_free_result($result);
                for($n=0;$n<sizeof($cLine);$n++){
                    for($x=0;$x<sizeof($cLine[$n]);$x++){
                        if($x==3){
                            echo '<img /*height="200" width="150"*/ src="data:image;base64,'.$cLine[$n][$x].'">';
                        }else{
                            echo $cLine[$n][$x];
                        }
                        echo ", ";
                    }
                    echo "<br/>";
                }
            }
?>
    </body>
</html>