<?php

include "../../modules/config/db.php";
include '../../modules/utils/string_utils.php';

if(isset($_GET['id']) && $_SERVER["REQUEST_METHOD"] == "GET"){
    $sql = "SELECT * FROM study_sets WHERE status = 1 AND study_sets_id = ".$_GET['id']." AND user_id = ".$_SESSION['user_id'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the data
        $studyset = $result->fetch_assoc();

        $sql = "SELECT * FROM questions WHERE status = 1 AND study_set_id = ".$_GET['id'];
        $questions = $conn->query($sql);
        $questions = $questions ->fetch_all(MYSQLI_ASSOC);

        shuffle($questions);
    } else {
        // No rows found
        header("Location: ../library/index.php?unauthorized_access=true");
    }

    
}
