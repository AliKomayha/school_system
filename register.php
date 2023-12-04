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
    <input type="text" name="password" required><br>

    <label for="role"> Role: </label>
    <select name="role"required>
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
    </select><br>

    <input type="submit" value="Register">
</form>
    

</body>
</html>