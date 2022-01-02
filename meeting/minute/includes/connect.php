<?php
    require_once "includes/database.php";
?>




<?php
    $sql = "SELECT * FROM logs";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0){
        while($row = mysqli_fetch_assoc($result)){
            // echo $row['username'] . "<br>";
        }
    }else{
        echo "No result Found!!!";
    }
?>
     
</body>
</html>