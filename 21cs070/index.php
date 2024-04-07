<?php
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['first_name']; 
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email)) {
        
        $query = "INSERT INTO form (name, gender, dob, email, password) VALUES ('$name','$gender','$dob','$email','$password')";
        
        mysqli_query($con, $query);
        
        echo "<script type='text/javascript'> alert('Successfully Register')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Please enter valid details')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="signup">
    <h1>Sign Up</h1>
    
    <form method="POST">
        <label>Name</label>
        <input type="text" name="first_name" required> <!-- corrected name attribute -->
        <label>Gender</label>
        <input type="text" name="gender" required>
        <label>Date of birth</label>
        <input type="text" name="dob" placeholder="dd/mm/yyyy" required> <!-- corrected input type -->
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <input type="submit" value="Submit">
    </form>
    <p>Already have an account? <a href="login.php">Login Here</a></p>
</div>
</body>
</html>
