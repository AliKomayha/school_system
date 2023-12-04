<?php 
function connectToDB(){
    $conn= new mysqli("localhost","root","","school_system");
    if(!$conn){
        die("connection failed ".mysqli_error($conn));
    }
    return $conn;

}

function closeDBconnection($conn) {
    mysqli_close($conn);
}






?>