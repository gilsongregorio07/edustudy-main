<?php 
session_start();
include '../utils/env.php' ;
include 'inc/multiple_choice.inc.php'; ?>
<?php require_once('../../layouts/user/header.layout.php') ?> 
    
    <!-- CONTENT AREA -->
    <div class="row">
        <div class="col-md-6 col-lg-12">
        
            <div class="statbox widget box box-shadow layout-top-spacing">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Quiz Mode</h4>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area studysets-container">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <form id="quizForm" class="w-100 mx-auto">
                                <?php
                                // Display each question
                                foreach ($questions as $index => $questionData) {
                                    $question = $questionData['question'];
                                    $correctAnswer = $questionData['answer'];

                                    // Get other random wrong answers
                                    $wrongAnswers = array();
                                    foreach ($questions as $otherQuestion) {
                                        if ($otherQuestion !== $questionData) {
                                            $wrongAnswers[] = $otherQuestion['answer'];
                                        }
                                    }

                                    // Combine correct and wrong answers, then shuffle
                                    $choices = array_merge(array($correctAnswer), $wrongAnswers);
                                    shuffle($choices);

                                     // Display the question and choices as cards with rectangular radio buttons
                                    echo '<div class="form-check mb-3">';
                                    echo '<h6 class="card-title">Question ' . ($index + 1) . ': ' . $question . '</h6>';

                                    foreach ($choices as $choice) {
                                        echo '<div class="custom-radio form-check mb-2">';
                                        echo '<input class="form-check-input" type="radio" name="question' . ($index + 1) . '" id="customRadio' . ($index + 1) . '" value="' . htmlspecialchars($choice) . '">';
                                        echo '<label class="form-check-label" for="customRadio' . ($index + 1) . '">' . htmlspecialchars($choice) . '</label>';
                                        echo '</div>';
                                    }

                                    echo '<p id="correctAnswer' . ($index + 1) . '" style="color: green; display: none;">Correct Answer: ' . htmlspecialchars($correctAnswer) . '</p>';
                                    echo '</div>';
                                }
                                ?>

                                <button type="button" class="btn btn-primary submit_btn w-100" onclick="calculateScore()">Submit</button>
                                <button type="button" class="btn btn-primary  restart_btn  w-100" onclick="restartQuiz()">Restart Quiz</button>
                            </form>

                        </div>
                        <div class="col-lg-3"></div>
                        
                        

                        <div id="result" class="mt-3"></div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
    
    <!-- CONTENT AREA -->
<?php require_once('../../layouts/user/footer.layout.php') ?> 

<script>
   function calculateScore() {
        // Initialize score and unanswered questions
        let score = 0;
        let unanswered = [];

        // Loop through questions
        <?php
        foreach ($questions as $index => $questionData) {
            $correctAnswer = $questionData['answer'];
            echo "const answer$index = document.querySelector('input[name=\"question" . ($index + 1) . "\"]:checked');\n";
            echo " if (answer$index) {\n";
            echo "    if (answer$index.value === '" . addslashes($correctAnswer) . "') score++;\n";
            echo "} else {\n";
            echo "    unanswered.push(" . ($index + 1) . ");\n";
            echo "}\n";
        }
        ?>

        // Display result and correct answers
        const resultElement = document.getElementById('result');
        if (unanswered.length === 0) {
            resultElement.innerHTML = `<p>Your score is: ${score}/${<?php echo count($questions); ?>}</p>`;
            // Display correct answers
            showSwal(`${score}/${<?php echo count($questions); ?>}`);
            <?php
            foreach ($questions as $index => $questionData) {
                $correctAnswer = $questionData['answer'];
                echo "document.getElementById('correctAnswer" . ($index + 1) . "').style.display = 'block';\n";
            }
            ?>

        } else {
            Swal.fire({
                title: 'Incomplete Quiz',
                text: 'Please answer all questions before submitting.',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-warning'
                },
                buttonsStyling: false
            });
        }
    }

    function restartQuiz() {
        location.reload();
    }

    function showSwal(score){
        Swal.fire({
            title: 'Quiz Completed!',
            html: 'Your Total Score: '+score,
            icon: 'success',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Review Answers',
            cancelButtonText: 'Restart',
            customClass: {
                confirmButton: 'btn btn-primary me-2',
                cancelButton: 'btn btn-danger me-2',
                denyButton: 'btn btn-secondary me-2'
            },
            buttonsStyling: false,
            allowOutsideClick: false,
            focusCancel: true,
            showDenyButton: true,
            denyButtonText: 'Go to Library',
        }).then((result) => {
            if (result.isConfirmed) {
                // User clicked "Review Answers"
                // Add your logic to navigate to the review answers page
                Swal.fire({
                    title: 'Review Answers',
                    text: 'This is where you can review your answers.',
                    icon: 'info',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(() => {
                    // Replace the window.location.href with the URL of your library page
                    $('.submit_btn').hide();
                    $('.restart_btn').show();
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // User clicked "Restart"
                // Add your logic to restart the quiz
                Swal.fire({
                    title: 'Restarting Quiz',
                    text: 'The quiz will restart.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-warning'
                    },
                    buttonsStyling: false
                }).then(() => {
                    // Replace the window.location.href with the URL of your library page
                    restartQuiz();
                });
            } else if (result.isDenied) {
                // User clicked "Go to Library"
                // Add your logic to navigate to the library
                Swal.fire({
                    title: 'Going to Library',
                    text: 'Redirecting to the library...',
                    icon: 'info',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                }).then(() => {
                    // Replace the window.location.href with the URL of your library page
                    window.location.href = '../library/index.php';
                });
            } else {
                // User closed the modal
                // Add any additional logic here
            }
        });
    }
    $('.restart_btn').hide();
</script>



</body>
</html>