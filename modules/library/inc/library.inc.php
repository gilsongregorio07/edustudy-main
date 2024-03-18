<?php

include "../../modules/config/db.php";
include '../../modules/utils/string_utils.php';





if(!isset($_GET['search_sets']) && $_SERVER["REQUEST_METHOD"] == "GET"){
    $sql = "SELECT * FROM study_sets WHERE status = 1 AND user_id = ".$_SESSION['user_id'];
    $studysets = $conn->query($sql);
    $studysets->fetch_assoc();
}
else if (isset($_GET['search_sets']) && $_SERVER["REQUEST_METHOD"] == "GET"){
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search_sets']);

    $sql = "SELECT * FROM study_sets WHERE status = 1 AND user_id = " . $_SESSION['user_id'] . " AND (title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%')";

    $studysets = $conn->query($sql);
    $studysets->fetch_assoc();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['del_studysets_id'])) {
    $studyset_id = $_POST['del_studysets_id'];
    $user_id = $_SESSION['user_id'];

    // Prepare and execute the UPDATE query
    $sql = "UPDATE study_sets SET status = 0 WHERE study_sets_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $studyset_id,$user_id);

    if ($stmt->execute()) {
        header("Location: " . parseUrl($_SERVER['HTTP_REFERER']) . "?delete_success=true");
    } else {
        echo "Error updating StudySet status: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}