<?php 
session_start();
include '../utils/env.php' ;
include 'inc/library.inc.php';
?>

<?php require_once('../../layouts/user/header.layout.php') ?> 
    <!-- CONTENT AREA -->
    <div class="row">
        <div class="col-md-6 col-lg-12">
            <div class="statbox widget box box-shadow layout-top-spacing">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Your Library</h4>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    
                    <div class="col-md-6 col-lg-12">
                        <?php if(!isset($studysets) || $studysets->num_rows < 1) {?>
                            <div class="alert alert-arrow-right alert-icon-right alert-light-danger alert-dismissible fade show mb-4" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                <strong>You don't have any study sets as of now. To create a new one, go to this link </strong><a href="../studysets/index.php">Create StudySets</a>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-lg-6">
                                
                            </div>
                            <?php if(isset($studysets) && $studysets->num_rows >= 1) {?>
                                <div class="col-lg-6">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            
                                                <input type="text" class="form-control" placeholder="Search your sets" aria-label="Search your sets" value="<?php echo isset($_GET['search_sets']) ? htmlspecialchars($_GET['search_sets']) : ''; ?>" aria-describedby="button-addon2" name="search_sets">
                                                <input class="btn btn-primary" type="submit" value="Search">
                                            
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="row g-3">
                            <?php foreach ($studysets as $studyset) { ?>
                                <div class="col-md-6 col-lg-4">
                                    <a onclick="showStudySetModePrompt(<?php echo $studyset['study_sets_id'] ?>)" target="_blank" style="text-decoration: none; color: inherit;">
                                        <div class="card bg-primary">
                                            <div class="card-body pt-3">
                                                <h5 class="card-title mb-3"><?php echo $studyset['title'] ?></h5>
                                                <p class="card-text"><?php echo $studyset['description'] ?></p>
                                            </div>
                                            <div class="card-footer px-4 pt-0 border-0 d-flex justify-content-between align-items-center">
                                                
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle" href="#" role="button" id="elementDrodpown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="12" cy="5" r="1"></circle>
                                                            <circle cx="12" cy="19" r="1"></circle>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu right" aria-labelledby="elementDrodpown" style="will-change: transform; position: absolute; transform: translate3d(105px, 0, 0px); top: 0px; left: 0px;">
                                                       
                                                        <a class="dropdown-item" name="studysets_id" style="font-size: 1rem;" href="../studysets/update_studyset.php?studyset_id=<?php echo $studyset['study_sets_id']; ?>">Edit StudySets</a>
                                                      
                                                        <form id="deleteForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                            <button class="dropdown-item" type="button" onclick="confirmDelete(<?php echo $studyset['study_sets_id']; ?>)">Delete StudySets</button>
                                                            <input type="hidden" name="del_studysets_id" id="del_studysets_id" value="">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>   
                            <?php } ?>
                            
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
        $('#studysets-menu').removeClass('active');
        $('#library-menu').addClass('active');

      
        
        
       // Function to update the labels
        
       $('#studysets_id_51').submit();
    });    
    
    function confirmDelete(studysetId) {
        Swal.fire({
            title: 'Are you sure to delete this StudySet?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Set the value of the hidden input
                $('#del_studysets_id').val(studysetId);
                // Submit the form
                $('#deleteForm').submit();
            }
        });
    }

    function showStudySetModePrompt(study_sets_id) {
        Swal.fire({
            title: 'Choose a StudySet Mode',
            icon: 'info',
            input: 'select',
            inputOptions: {
                'flashcard': 'FlashCard',
                'multiple_choice': 'Multiple Choice'
            },
            inputPlaceholder: 'Select a mode',
            showCancelButton: true,
            confirmButtonText: 'Start',
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                // Process the selected mode
                const selectedMode = result.value;
                if (selectedMode === 'flashcard') {
                    // Redirect to flashcard.php?id=1
                    window.location.href = '../studysets/flashcard.php?id='+study_sets_id;
                } else if (selectedMode === 'multiple_choice') {
                    // Redirect to multiple_choice.php?id=1 (adjust the actual file name)
                    window.location.href = '../studysets/multiple_choice.php?id='+study_sets_id;
                }
            }
        });
    }
    const urlParams = new URLSearchParams(window.location.search);
    const unauthorizedAccess = urlParams.get('unauthorized_access');
    const editSuccess = urlParams.get('edit_success');
    console.log(unauthorizedAccess)
    
    if(unauthorizedAccess == 'true'){
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Studyset is not available or You're not allowed to access this study set",
        });
    }
    if(editSuccess == 'true'){
        Swal.fire({
        icon:'success',
        title: "OK",
        text: "StudySets edited successfully!",
        timer: 2000,
        timerProgressBar: true,
        });
    }
</script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>