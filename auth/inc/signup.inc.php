<?php 
include "../../modules/config/db.php";
include '../../modules/utils/string_utils.php';

if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //validations
    checkIfPasswordMatched($conn,$password, $confirm_password);
    checkIfEmailExist($conn,$email);

    //encrypt the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (id, first_name, last_name, email, password, avatar, last_login, created_at, updated_at) VALUES (NULL, '$first_name', '$last_name', '$email', '$password', 'avatar.png', '2024-03-07 12:05:48.000000', '" . date('Y-m-d H:i:s', time()) . "', '" . date('Y-m-d H:i:s', time()) . "')";

    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "New record created successfully.";
        header("Location: " . parseUrl($_SERVER['HTTP_REFERER']) . "?registration_success=true");
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    } 
    $conn->close(); 
}

function signUpFail($conn,$message){
    header("Location: " . parseUrl($_SERVER['HTTP_REFERER']) . "?registration_success=false"."&error=".$message);
    $conn->close(); 
    exit();
}

function checkIfPasswordMatched($conn,$password, $confirm_password){
    if($password != $confirm_password){
        signUpFail($conn,'password_error');
    }
}

function checkIfEmailExist($conn,$email){
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Email already exists in the database
        signUpFail($conn,'email_exist');
    } else {
        $stmt->close();
    }
}