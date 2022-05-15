<?php include('partials/header.php'); ?>
        <!-- main START -->
        <section class="admin main">
            <div class="container pt-5">
                <?php
                    if(isset($_SESSION['login'])){
                        echo '
                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <h4 class="text-success fs-5 mt-3 text-center"><em>'.$_SESSION['login'].'</em></h4>
                                </div>
                            </div>
                            ';
                        unset($_SESSION['login']);
                    }
                ?>
                <div class="row">
                   <div class="col">
                       <h3 class="text-dark">Dashboard</h3>
                   </div>
                </div>
                <div class="row justify-content-around mt-3 mb-5 pt-3">
                    <div class="col-md-2 border border-dark shadow p-3 mb-5 bg-body rounded">
                        <h4 class="text-center">5</h4>
                        <p class="text-center"><strong>Categories</strong></p>
                    </div>
                    <div class="col-md-2 border border-dark shadow p-3 mb-5 bg-body rounded">
                        <h4 class="text-center">5</h4>
                        <p class="text-center"><strong>Categories</strong></p>
                    </div>
                    <div class="col-md-2 border border-dark shadow p-3 mb-5 bg-body rounded">
                        <h4 class="text-center">5</h4>
                        <p class="text-center"><strong>Categories</strong></p>
                    </div>
                    <div class="col-md-2 border border-dark shadow p-3 mb-5 bg-body rounded">
                        <h4 class="text-center">5</h4>
                        <p class="text-center"><strong>Categories</strong></p>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- main END -->
<?php include('partials/footer.php'); ?>
