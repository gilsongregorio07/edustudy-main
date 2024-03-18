<?php 
include "../../modules/config/db.php";
include '../../modules/utils/string_utils.php';

if (isset($_POST['submit'])) {

    session_start();
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_first_name'] = $user['first_name'];
        $_SESSION['user_last_name'] = $user['last_name'];
        
        header("Location: ../../modules/library/index.php");
     
    } else {
        signInFail($conn,'login_error');
    }
    $stmt->close();
    
}

function signInFail($conn,$message){
    header("Location: " . parseUrl($_SERVER['HTTP_REFERER']) . "?login_success=false"."&error=".$message);
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