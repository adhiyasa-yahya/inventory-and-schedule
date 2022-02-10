<nav class="navbar navbar-expand-md navbar-dark bg-danger justify-content-center p-3">
    <?php 
    $result = mysqli_query($conn,"SELECT * FROM setting");
    $no = 1;
    while ($data = mysqli_fetch_array($result)) { 
        $titile = $data['titile'];
        $sub_title   = $data['subTitle']; 
        $logo1   = $data['logo1']; 
        $logo2   = $data['logo2']; 

        ?>
    <div class="d-flex w-50 order-0 pl-5">
        <a class="navbar-brand mr-1" href="#"><img src="assets/img/<?php echo $logo1 ?>" width="115px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="justify-content-center w-50  text-center">
        <h3 style="color: white">
            <b style="letter-spacing: 2px;"><?php echo $titile; ?> <br> </b> 
            <p class="small mt-3"><?php echo $sub_title; ?></p>
        </h3>
    </div>
    <span class="navbar-text mt-1 w-50 text-right order-1 order-md-last pr-5"><img src="assets/img/<?php echo $logo2 ?>" width="115px"></span>
<?php } ?>
</nav>