<?php
if (file_exists('../config/db.php')) {
    include '../config/db.php';
}
// If the first file doesn't exist, check if the second file exists and include it
elseif (file_exists('../../config/db.php')) {
    include "../../config/db.php";
}

if (file_exists('../utils/string_utils.php')) {
    include '../utils/string_utils.php';
}
// If the first file doesn't exist, check if the second file exists and include it
elseif (file_exists('../../utils/string_utils.php')) {
    include '../../utils/string_utils.php';
}



if (isset($_POST['create_studyset'])) {

    
     // Access the arrays containing questions and answers
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $descriptions = $_POST['descriptions'];
    $questions = $_POST['question'];
    $answers = $_POST['answer'];

    if(count($questions)< 4){
        header("Location: " . parseUrl($_SERVER['HTTP_REFERER']) . "?creation_success=false&error_msg=quantity");
        exit();
    }

    // Start a transaction
    $conn->begin_transaction();

    try {
        $sql = "INSERT INTO study_sets VALUES (NULL, $user_id, '$title', '$descriptions', 1 , '" . date('Y-m-d H:i:s', time()) . "')";

        $result = $conn->query($sql);
        if ($result == TRUE) {
            $study_set_id = $conn->insert_id;
            $status = 1;
            // Prepare the SQL query with placeholders
            $sql = "INSERT INTO questions VALUES (?, ?, ?, ?, ?, ?)";
    
            // Prepare and bind the statement
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iissis", $questionId, $study_set_id, $question, $answer, $status, $createdAt);
    
            // Set user_id (replace with the actual user ID)
            $userId = 1;
            $is_inserted = true;
            // Iterate through the arrays and execute the statement for each set of data
            for ($i = 0; $i < count($questions); $i++) {
                $questionId = null; // Assuming question_id is auto-incremented and will be assigned by the database
                $question = $questions[$i];
                $answer = $answers[$i];
                $createdAt = date('Y-m-d H:i:s'); // Assuming you want to set the current date and time for created_at
    
                // Execute the statement
                $is_inserted = $stmt->execute();
                if($is_inserted != true){
                    throw new Exception("Error executing statement: " . $stmt->error);
                    break;
                }
            }     
        } 

        // If everything is successful, commit the transaction
        $conn->commit();
        echo "Data inserted successfully!";
    } catch (Exception $e) {
        // If an error occurs, rollback the transaction
        $conn->rollback();
        header("Location: " . parseUrl($_SERVER['HTTP_REFERER']) . "?creation_success=false");
        exit();
    }
 
   
    $stmt->close();
    $conn->close();
    header("Location: " . parseUrl($_SERVER['HTTP_REFERER']) . "?creation_success=true");
}

if(isset($_GET['studyset_id']) && $_SERVER["REQUEST_METHOD"] == "GET"){
    $study_set_id = $_GET['studyset_id'];
    $sql = "SELECT * FROM study_sets WHERE status = 1 AND study_sets_id = $study_set_id AND user_id = ".$_SESSION['user_id'];
    $result = $conn->query($sql);
    $studysets = array();
    $questions = array();
    if($result->num_rows > 0){
        $studysets = $result->fetch_assoc();

        $sql = "SELECT * FROM questions WHERE status = 1 AND study_set_id =".$studysets['study_sets_id'];
        $question_result = $conn->query($sql);

        while ($question = $question_result->fetch_assoc()) {
            // Append each row to the $rows array
            $questions[] = $question;
        }
    
        // Encode the $rows array into JSON format
        $questions = json_encode($questions);
    }
    else{
        header("Location: ../library/index.php?edit_success=false");
    }
}


if (isset($_POST['update_studyset'])) {

    $questions_id = $_POST['questions_id'];
    $questions = $_POST['question'];
    $answers = $_POST['answer'];
    $studySetId = $_POST['study_set_id'];

    $submittedQuestions = array();
    $newQuestions = array();

    if(count($questions)<4){
        header("Location: " . parseUrl($_SERVER['HTTP_REFERER']) . "?studyset_id=$studySetId&edit_success=false&error_msg=question_count");
        exit();
    }

    for ($i = 0; $i < count($questions); $i++) {
        $questionId =  $questions_id[$i];
        $question = $questions[$i];
        $answer = $answers[$i];

        // Execute the statement
        if($questionId == 0){
            $newQuestions[] = array("questions_id" => $questionId, "question" => $question, "answer" => $answer, "status" => 1);
        }
        else{
            $submittedQuestions[] = array("questions_id" => $questionId, "question" => $question, "answer" => $answer, "status" => 1);
        }
        
    }     
    
    // Fetch current list of questions from the database for a specific study_set_id
    
    $sql = "SELECT questions_id, question, answer, status FROM questions WHERE study_set_id = $studySetId AND status = 1";
    $result = $conn->query($sql);

    $currentQuestions = [];
    while ($row = $result->fetch_assoc()) {
        $currentQuestions[] = [
            "questions_id" => $row['questions_id'],
            "question" => $row['question'],
            "answer" => $row['answer'],
            "status" => $row['status']
        ];
    }
    $inactiveQuestions = array_udiff($currentQuestions, $submittedQuestions, 'compareQuestions');
    
    //Mark questions as inactive in the database
    if (!empty($inactiveQuestions)) {
        $inactiveQuestionIds = implode(",",array_column($inactiveQuestions, 'questions_id'));
        $sql = "UPDATE questions SET status = 0 WHERE questions_id IN ($inactiveQuestionIds)";
        $conn->query($sql);
    }

    foreach ($submittedQuestions as $id => $questionData) {
        if ($questionData['questions_id'] != 0) {
            // If questions_id is 0, it's a new question
            foreach($currentQuestions as $current){
                if ($current['question'] != $questionData['question'] || 
                $current['answer'] != $questionData['answer'] || 
                $current['questions_id'] != $questionData['questions_id']) {
                
                $question = $questionData['question'];
                $answer = $questionData['answer'];
                $questions_id = $questionData['questions_id'];
                $sql = "UPDATE questions SET question = '$question', answer = '$answer' WHERE questions_id = $questions_id";
                $conn->query($sql);
            }
            }
        } 
    }
  
    // Add new questions to the database
    if (!empty($newQuestions)) {
        $values = [];
        foreach ($newQuestions as $questionData) {
            $studySetId = $studySetId;
            $question = $questionData['question'];
            $answer = $questionData['answer'];
            $status = $questionData['status'];
            $values[] = "(NULL, $studySetId, '$question', '$answer', $status, '" . date('Y-m-d H:i:s', time()) . "')";
        }
        $valuesString = implode(",", $values);
        $sql = "INSERT INTO questions (questions_id, study_set_id, question, answer, status, created_at) VALUES $valuesString";
        $conn->query($sql);
    }

    header("Location: ../../library/index.php?edit_success=true");
}

function compareQuestions($a, $b) {
    return $a['questions_id'] - $b['questions_id'];
}