<?php
   include("header.php");
?>
   
   

  
      
   <section>
   <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
         <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
         <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
         <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
         <li data-bs-target="#carouselId" data-bs-slide-to="3" aria-label="fourth slide"></li>
         <li data-bs-target="#carouselId" data-bs-slide-to="4" aria-label="fifth slide"></li>
         <li data-bs-target="#carouselId" data-bs-slide-to="5" aria-label="sixth slide"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
         <div class="carousel-item active">
            <img src="images/liger.jpg" class="w-100 d-block" alt="First slide" width="150px;" height="600px;">
         </div>
         <div class="carousel-item">
            <img src="images/salaar.jpg" class="w-100 d-block" alt="Second slide" width="150px;" height="600px;">
         </div>
         <div class="carousel-item">
            <img src="images/maharaja.jpg" class="w-100 d-block" alt="Third slide" width="150px;" height="600px;">
         </div>
         <div class="carousel-item">
            <img src="images/jailer.jpg" class="w-100 d-block" alt="fourth slide" width="150px;" height="600px;">
         </div>
         <div class="carousel-item">
            <img src="images/kalki.jpg" class="w-100 d-block" alt="fifth slide" width="150px;" height="600px;">
         </div>
         <div class="carousel-item">
            <img src="images/beast.jpg" class="w-100 d-block" alt="sixth slide" width="150px;" height="600px;">
         </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
      </button>
   </div>

   </section>


   <?php
   include("footer.php");
   ?>


