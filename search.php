<?php
include("connection.php");

$district=$_POST['district'];
$view=$_POST['view'];
 if($district=='Any' and $view!="Any")
{
	$sql="Select * from place_jayed where place_category='$view'";
}
else if($view=="Any" and $district!="Any")
{
	$sql="Select * from place_jayed where district='$district'";
}
else if($district=="Any" and $view=="Any")
{
	$sql="Select * from place_jayed";
}
else{
	$sql="Select * from place_jayed where place_category='$view' and district='$district' ";
}

$res=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <!-- Title -->
        <title>Places</title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php include("includes/css.php"); ?>
    </head>
    <body>
        <!-- ========== HEADER ========== -->
        <?php include("includes/header.php"); ?>
        <!-- ========== End HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content">
            <div class="container">
                <div class="text-center" style="padding: 100px;"><h1>Serched places</h1></div>
            </div>
            <!-- Destinantion v1 -->
            <!-- <div class="destinantion-block destinantion-v1 border-bottom border-color-8">
                <div class="container space-bottom-1 space-top-lg-3">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-4">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Searched Place</h2>
                    </div>
                    <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                    data-slides-show="4"
                    data-slides-scroll="1"
                    data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v2 u-slick__arrow-classic--v3 u-slick__arrow-centered--y rounded-circle mx-xl-n6"
                    data-arrow-left-classes="flaticon-left-arrow u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left"
                    data-arrow-right-classes="flaticon-right-arrow u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right"
                    data-pagi-classes="d-lg-none text-center u-slick__pagination mt-4"
                    data-responsive='[{"breakpoint": 1025, "settings": { "slidesToShow": 3 } }, { "breakpoint": 992, "settings": { "slidesToShow": 2 } }, { "breakpoint": 768, "settings": { "slidesToShow": 1 } }, { "breakpoint": 554, "settings": { "slidesToShow": 1 } }]'> -->
                    <div class="row m-0">
                        <?php
                        while($row=mysqli_fetch_array($res))
                        {
                           
				$place_id=$row['id'];

				$sql3="Select * from place_review where place_id=$place_id";
				$res3=mysqli_query($conn,$sql3);
				$rating=0;
				$num_of_review=mysqli_num_rows($res3);
				while($row3=mysqli_fetch_array($res3))

				{
					$rating=$rating+$row3['rating'];



				}
              if($num_of_review==0)
              {
              	$num_of_review=1;
              }

              if($rating==0)
              {
              	$rating=0;
              }
				$rating=floor($rating/$num_of_review);
                            ?>
                        <div class="col-md-6 col-xl-3 mb-3 mb-md-4">
                            <div class="min-height-350 gradient-overlay-half-bg-gradient rounded-border p-5 bg-img-hero transition-3d-hover shadow-hover-2 border-0 dropdown" style="background-image: url(<?php echo $row['place_image']  ?>);">
                                <header class="w-100 d-flex justify-content-between mb-2">
                                    <div class="position-relative">
                                        <a href="place.php?id=<?php echo $row['id']  ?>" class="destination text-white font-weight-bold font-size-21 pb-3 mb-3 text-lh-1 d-block"><?php echo $row['place_category'].','.$row['place_name'] ?> <br> <?php echo $row['district'] ?></a>

                                        <!-- Dropdown List -->
                                        <div class="destination-dropdown v1">
                                            <div class="green-lighter mr-2">
                                            <?php 
                                                if ($rating < 1) {
                                            ?>
                                            <p style="margin:0px;font-size:10px;color:white;" >No Ratings</p>
                                            <?php
                                                }else {
                                                    for($i=0;$i<$rating;$i++) 
                                                    {
                                                    ?>
                                                    <small class="fas fa-star"></small>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <!-- End Dropdown List -->
                                    </div>
                                </header>
                            </div>
                        <!-- </div> -->
                        </div>
                        <?php
                        }
                        ?>
            </div>
            <!-- End Destinantion v1 -->

            <!-- Banner v1-->
            <div class="banner-block banner-v1 bg-img-hero space-3" style="background-image: url(assets/img/1920x500/img1.jpg);">
                <div class="max-width-650 mx-auto text-center mt-xl-5 mb-xl-2 px-3 px-md-0">
                    <h6 class="text-white font-size-40 font-weight-bold mb-1">Travel Tips</h6>
                    <p class="text-white font-size-18 font-weight-normal mb-4 pb-1 px-md-3 px-lg-0">Northern Ireland’s is now contingent. Britain is getting a divorce Northern Ireland is being offered a trial separation for Britain there is a one</p>
                    <a class="btn btn-outline-white border-width-2 rounded-xs min-width-200 font-weight-normal transition-3d-hover" href="javascript:;">Get Inspired</a>
                </div>
            </div>
            <!-- End Banner v1-->

        <!-- Page Preloader -->
        <!-- <div id="jsPreloader" class="page-preloader">
            <div class="page-preloader__content-centered">
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div> -->
        <!-- End Page Preloader -->

        <!-- Go to Top -->
        <a class="js-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed" data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
            <span class="flaticon-arrow u-go-to-modern__inner"></span>
        </a>
        <!-- End Go to Top -->

        <?php include("includes/js.php"); ?>
    </body>
</html>
