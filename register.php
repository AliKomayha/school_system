<?php
    include "connection.php";

    $conn = mysqli_connect("localhost", "root", "", "school_system");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // else{
    //     echo"tam";
    // }
    

    // security function 
    function escapehtmlchars($input){
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }


    //handle registration from form
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username= isset($_POST["username"])? mysqli_real_escape_string($conn, $_POST["username"]): '';
        $password= isset($_POST["password"])? mysqli_real_escape_string($conn, $_POST["password"]): '';
        $role=isset($_POST["role"])? mysqli_real_escape_string($conn, $_POST["role"]): '';

        // security feature
        $username = escapehtmlchars($username);
        $password = escapehtmlchars($password);
        $role = escapehtmlchars($role);

        //security feature 2 
        $username=substr($username, 0, 20);
        $password=substr($password, 0, 20);
        $password= md5($password); // hashing the password

        if(empty($username) || empty($password)){
            echo"Username and password cannot be empty.";
        }
        else{
            $validRoles= array('teacher','student');
            if(!in_array($role,$validRoles)){
                echo"Invalid role";
            }
            else{
                $sql=" INSERT INTO users (id, username, password, role) VALUES (NULL,'$username', '$password','$role') ";


                
            }
            if(mysqli_query($conn,$sql)){
                echo"Registartion successful";
            }
            else{
                echo "Error: ". mysqli_error($conn);
            }
        }

    }
    closeDBconnection($conn);

?>








<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    
</head>
<body>
    
<h2>Register</h2>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>" >
    <label for="username"> Username: </label>
    <input type="text" name="username" required><br>

    <label for="password"> Password: </label>
    <input type="password" name="password" required><br>

    <label for="role"> Role: </label>
    <select name="role"required>
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
    </select><br>

    <input type="submit" value="Register">
</form>
    

</body>
</html>