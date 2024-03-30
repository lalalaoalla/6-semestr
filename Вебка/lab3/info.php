<?php
require_once 'config/connect.php';
require_once 'header.php';
//require_once 'actions/admin.php';
?> 
        
       <main class="main d-flex align-items-center  flex-column">
            <div class="card-list row row-cols-5 row-cols-md-2 justify-content-center gap-5">
                <div class="card text-dark bg-light mb-3  bg-transparent w-25">
                    <img class="info-img" src="photos/я.jpg" alt="">
                    <div class="card-wraper d-flex flex-column align-items-end gap-2">
                        <span class="info-name fs-4 fw-bold">Вострецова Екатерина</span>
                        <span class="info-group fs-5">ПМ-13</span>
                    </div>
                </div>
                <div class="card text-dark bg-light mb-3  bg-transparent w-25" >
                    <img class="info-img" src="photos/Данил.jpg" alt="">
                    <div class="card-wraper d-flex flex-column align-items-end gap-2">
                        <span class="info-name fs-4 fw-bold">Исакин Даниил</span>
                        <span class="info-group fs-5">ПМ-13</span>
                    </div>
                </div>
            </div>     
       </main>
       <?php require_once ('footer.php') ?>
    
    
    </div>
</body>
</html>
