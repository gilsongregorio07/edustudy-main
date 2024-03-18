<?php 
session_start();
include '../utils/env.php' ;
include 'inc/studysets.inc.php'; ?>
<?php require_once('../../layouts/user/header.layout.php') ?> 
    
    <!-- CONTENT AREA -->
    <div class="row">
        <div class="col-md-6 col-lg-12">
        
            <div class="statbox widget box box-shadow layout-top-spacing">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Create StudySets</h4>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area studysets-container">
                    <div class="row">
                        <div class="col-lg-3 "></div>
                        <div class="col-lg-6 ">
                            <form method="POST" class="row g-3" id="create_studyset_form">
                               
                                <div class="row bg-light-dark pb-3 rounded mb-2 g-3">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control  w-100" id="title" name="title" placeholder='Enter a title, like "Reviewer for Test"' required>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control  w-100" id="description" name="descriptions" rows="3" placeholder="Add a description..." required></textarea>
                                    </div>
                                </div>
                               
                                <div class="row p-0 m-0" id="question-container">
                                    <div class="row rounded bg-light-dark p-2 g-3 question-row">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="" class="form-label question-label">1</label>
                                            </div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                <a href="javascript:void(0)" class="deleteButton bs-tooltip" data-bs-placement="top" title="Delete this card" data-itemid="1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 448 512" class="bg-reverse-light-dark" ><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                                                    
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="question" name="question[]" placeholder="Enter term or question" required>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="answer" name="answer[]" placeholder="Enter description or answer" required>
                                        </div>
                                    </div>
                                    <div class="row rounded bg-light-dark p-2 g-3 question-row">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="" class="form-label question-label">2</label>
                                            </div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                <a href="javascript:void(0)" class="deleteButton bs-tooltip" data-bs-placement="top" title="Delete this card" data-itemid="1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 448 512" class="bg-reverse-light-dark"><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="question" name="question[]" placeholder="Enter term or question" required>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="answer" name="answer[]" placeholder="Enter description or answer" required>
                                        </div>
                                    </div>
                                    <div class="row rounded bg-light-dark p-2 g-3 question-row">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="" class="form-label question-label">3</label>
                                            </div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                <a href="javascript:void(0)" class="deleteButton bs-tooltip" data-bs-placement="top" title="Delete this card" data-itemid="1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 448 512" class="bg-reverse-light-dark"><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="question" name="question[]" placeholder="Enter term or question" required>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="answer" name="answer[]" placeholder="Enter description or answer" required>
                                        </div>
                                    </div>
                                    <div class="row rounded bg-light-dark p-2 g-3 question-row">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="" class="form-label question-label">4</label>
                                            </div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                <a href="javascript:void(0)" class="deleteButton bs-tooltip" data-bs-placement="top" title="Delete this card" data-itemid="1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 448 512" class="bg-reverse-light-dark"><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="question" name="question[]" placeholder="Enter term or question" required>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="answer" name="answer[]" placeholder="Enter description or answer" required>
                                        </div>
                                    </div>
                                    <div class="row rounded bg-light-dark p-2 g-3 question-row">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="" class="form-label question-label">5</label>
                                            </div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                <a href="javascript:void(0)" class="deleteButton bs-tooltip" data-bs-placement="top" title="Delete this card" data-itemid="1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 448 512" class="bg-reverse-light-dark"><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="question" name="question[]" placeholder="Enter term or question" required>
                                        </div>
                                        <div class="col-lg-6 mt-0">
                                            <input type="text" class="form-control" id="answer" name="answer[]" placeholder="Enter description or answer" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <a class="btn btn-primary" id="generateCard" style="font-size: 17px;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 448 512"><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg> Add Card</a>
                                </div>
                                <div class="row g-3"> 
                                    <div class="col-lg-8"></div>

                                    <div class="col-lg-4 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" name="create_studyset" style="font-size: 17px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#ffffff" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg> Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
 
                    </div>

                </div>
                

            </div>
        </div>
        

    </div>
    <!-- CONTENT AREA -->
<?php require_once('../../layouts/user/footer.layout.php') ?> 

<script>
    $(document).ready(function(){

    // jQuery methods go here...
        console.log("Dog")
        $('#library-menu').removeClass('active');
        $('#studysets-menu').addClass('active');

        $(document).on("click", ".deleteButton",  function() {
            // Add your deletion logic here based on itemId

            // Remove the entire <a> tag (including the SVG)
            $(this).closest('.question-row').remove();
            $('.tooltip').remove();
            updateLabels();
        });
       
        $("#generateCard").on("click", function() {
            var cardDiv = document.createElement("div");
            cardDiv.className = "row rounded bg-light-dark p-2 g-3 question-row";

            // Create the inner content of the card
            cardDiv.innerHTML = `
            
                <div class="row">
                    <div class="col-lg-6">
                        <label for="" class="form-label question-label">1</label>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="javascript:void(0)" class="deleteButton bs-tooltip" data-bs-placement="top" title="Delete this card" data-itemid="1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 448 512" class="bg-reverse-light-dark"><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mt-0">
                    <input type="text" class="form-control" id="question" name="question" placeholder="Enter term or question" required>
                </div>
                <div class="col-lg-6 mt-0">
                    <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter description or answer" required>
                </div>
           
            `;

            // Append the new card to the container
            $('#question-container').append(cardDiv);
            updateLabels();
        });

        $('#create-button').click(function() {
            var numCards = $('#question-container .question-row').length;

            if (numCards >= 4) {
                // Submit the form
                console.log("Good to go")
                $('#create_studyset_form').submit();
            }
            else{
                console.log("qweqwe");
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Only 4 questions or above are allowed to submit.",
                });
            }
        });

       // Function to update the labels
        function updateLabels() {
            // Select all question rows
            var questionLabels = $('#question-container .question-row .question-label');
            
            // Loop through each question label and update the text
            questionLabels.each(function(index) {
                $(this).text(index + 1);
            });
        }

        

    });    
 // Check for the query parameter in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const creationSuccess = urlParams.get('creation_success');
        const errorMsg = urlParams.get('error_msg');
       
        if(errorMsg == 'quantity' && creationSuccess == 'false'){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Only 4 questions or above are allowed to submit.",
            });
        }
        else if(creationSuccess == 'false'){
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "There's something wrong with your studysets. Please try again",
            });
        }
        if(creationSuccess == 'true'){
            Swal.fire({
            icon:'success',
            title: "OK",
            text: "StudySets added successfully!",
            timer: 2000,
            timerProgressBar: true,
            }).then((result) => {
            /* Read more about handling dismissals below */
                window.location.href = '../library/index.php'
            });
        }
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>