<?php 
session_start();
include '../utils/env.php' ;
include 'inc/flashcard.inc.php'; ?>
<?php require_once('../../layouts/user/header.layout.php') ?> 
    
    <!-- CONTENT AREA -->
    <div class="row">
        <div class="col-md-6 col-lg-12">
        
            <div class="statbox widget box box-shadow layout-top-spacing">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>FlashCard Mode</h4>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area studysets-container">
                    <div class="row mb-3">
                        <div class="col-md-3 col-lg-2"></div>
                        <div class="col-md-6 col-lg-8">
                            <div id="style1" class="carousel slide style-custom-1" data-bs-ride="false">
                                
                                <div class="carousel-flip">
                                    <div class="carousel-inner">
                                        <?php foreach ($questions as $key => $question) { ?>
                                            <?php if ($key === 0) { ?>
                                                <div class="carousel-item active">
                                            <?php } else { ?>
                                                <div class="carousel-item">
                                            <?php } ?>
                                                    <div class="col-lg-11 mx-auto">
                                                        <div class="card bg-primary card-flip">
                                                            <div class="card-inner">
                                                                <div class="card-front bg-primary rounded">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"><?php echo $question['question'] ?> </h5>
                                                                    </div>
                                                                </div>
                                                                <div class="card-back bg-secondary rounded">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"><?php echo $question['answer'] ?> </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php } ?>
                                        <div class="carousel-item ">
                                            <div class="col-lg-11 mx-auto">
                                            <div class="card bg-primary card-flip">
                                                    <div class="card-inner">
                                                        <div class="card-front bg-primary rounded">
                                                            <div class="card-body">
                                                                <h5 class="card-title">End of Studyset</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add more carousel items as needed -->
                                    </div>
                                </div>

                                <a class="carousel-control-prev" href="#style1" role="button" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#style1" role="button" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-2"></div>
                    </div>
                    <div class="row">

                        <div class="col-md-3 col-lg-2"></div>
                        <div class="col-md-6 col-lg-8">
                            <div id="iconsAccordion" class="accordion-icons accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne3">
                                        <section class="mb-0 mt-0">
                                            <div role="menu" class="collapsed d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#iconAccordionOne" aria-expanded="false" aria-controls="iconAccordionOne">
                                                <div class="accordion-icon me-2">
                                                    <i class="fa fa-lightbulb-o" style="font-size:24px"></i>
                                                </div>
                                                Keys and Terminologies
                                                <div class="icons ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                        <polyline points="6 9 12 15 18 9"></polyline>
                                                    </svg>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    
                                        <div id="iconAccordionOne" class="collapse" aria-labelledby="headingOne3" data-bs-parent="#iconsAccordion">
                                            <div class="card-body .no-outer-spacing">
                                                <div id="toggleAccordion" class="accordion">
                                                    <?php foreach ($questions as $question) { ?>
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne1">
                                                                <section class="mb-0 mt-0">
                                                                    <div role="menu" class="collapsed collapsed d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#defaultAccordionOne_<?php echo $question['questions_id'] ?>" aria-expanded="false" aria-controls="defaultAccordionOne_<?php echo $question['questions_id'] ?>">
                                                                        <?php echo $question['question'] ?>  <div class="icons ms-auto"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                                    </div>
                                                                </section>
                                                            </div>

                                                            <div id="defaultAccordionOne_<?php echo $question['questions_id'] ?>" class="collapse" aria-labelledby="headingOne1" data-bs-parent="#toggleAccordion">
                                                                <div class="card-body">
                                                                        <p class="">
                                                                        <?php echo $question['answer'] ?>            
                                                                        </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-2"></div>
                        
                    </div>

                </div>

            </div>
        </div>
        
    </div>
    
    <!-- CONTENT AREA -->
<?php require_once('../../layouts/user/footer.layout.php') ?> 

<script>

    $(document).ready(function(){
         // Disable the Prev button initially
        $('.carousel-control-prev').hide();
    });
    // Add click event listener to flip the carousel
    $('.carousel-flip').on('click', function () {
        $(this).toggleClass('carousel-flipped');
    });

    $('.carousel-control-prev').on('click', function () {
        $('.carousel-flip').removeClass('carousel-flipped');
        console.log(123);
    });

    $('.carousel-control-next').on('click', function () {
        $('.carousel-flip').removeClass('carousel-flipped');
        console.log(12);
    });
    

      // Add click event listener to flip the carousel
    $('#style1').on('slid.bs.carousel', function (event) {
        var isFirstSlide = $(event.relatedTarget).index() === 0;
        var isLastSlide = $(event.relatedTarget).index() === $(this).find('.carousel-item').length - 1;

        if(isFirstSlide){
            $('.carousel-control-prev').hide();
        }
        else{
            $('.carousel-control-prev').show();
        }

        if (isLastSlide) {
            // Last slide reached, show Swal alert
            Swal.fire({
                title: 'Congratulations!',
                text: 'You have completed the lesson. Do you want to restart?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Yes, restart',
                cancelButtonText: 'No, go to library',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes, restart"
                    location.reload(); // Reload the page
                } else {
                    // User clicked "No, go to library"
                    window.location.href = '../library/index.php'; // Redirect to library.php
                }
            });
        }
    });

</script>




</body>
</html>