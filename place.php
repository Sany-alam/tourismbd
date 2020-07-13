<?php
include("connection.php");

include("includes/header.php");
error_reporting(E_ALL ^ E_WARNING); 
$place_id=$_REQUEST['id'];

$sql="Select * from place_jayed where id=$place_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);

$place_name=$row['place_name'];
$travel_path=$row['travel_path'];

$sql3="Select * from place_review where place_id=$place_id";
$res3=mysqli_query($conn,$sql3);
$rating=0;
$five=0;
$four=0;
$three=0;
$two=0;
$one=0;
$num_of_review=mysqli_num_rows($res3);
while($row3=mysqli_fetch_array($res3))
{
	$rating=$rating+$row3['rating'];
	if($row3['rating']==5)
	{
		$five=$five+1;
	}

	else if($row3['rating']==4)
	{
		$four=$four+1;
	}

	else if($row3['rating']==3)
	{
		$three=$three+1;
	}

	else if($row3['rating']==2)
	{
		$two=$two+1;
	}

	else if($row3['rating']==1)
	{
		$one=$one+1;
	}
}

if($num_of_review!=0){
$rating=$rating/$num_of_review;
$rating=round($rating,1);
}

$five=($five/$num_of_review)*100;
$four=($four/$num_of_review)*100;
$three=($three/$num_of_review)*100;
$two=($two/$num_of_review)*100;
$one=($one/$num_of_review)*100;

$sql_hospital="Select * from hospital_jayed where place_name='$place_name'";
$res_hospital=mysqli_query($conn,$sql_hospital);


$sql_police="Select * from police_station_jayed where place_name='$place_name'";
$res_police=mysqli_query($conn,$sql_police);


$sql_gallery="Select * from place_gallery where place_name='$place_name'";
$res_gallery=mysqli_query($conn,$sql_gallery);

if(isset($_POST['review_submit']))
{
    $user_id = $_SESSION['id'];
	$rating=$_POST['rating'];
	$review=$_POST['review'];

	if($rating>5)
	{
		$rating=5;
	}

	$sql_insert_review="INSERT INTO `place_review`(`place_id`, `user_id`, `review`, `rating`) VALUES ('$place_id','$user_id','$review','$rating')";
	$res_insert_review=mysqli_query($conn,$sql_insert_review);
	if($res_insert_review)
	{
		header('location:index.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <link rel="shortcut icon" href="assets\img\icons\tourismbd1.png">

        <!-- Title -->
        <title>Destination</title>

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
            <!-- ========== HERO ========== -->
            <div class="hero-block hero-v1 bg-img-hero-bottom gradient-overlay-half-black-gradient text-center z-index-2" style="background-image: url(<?php echo $row['place_image'] ?>);">
                <div class="container space-2 space-top-xl-9">
                <h1 class="font-size-60 font-size-xs-30 text-white font-weight-bold"><?php echo $place_name ?></h1>
                </div>
            </div>
            <!-- ========== END HERO ========== -->

            <!-- Tabs v1 -->
            <div class="tabs-block tab-v1 space-bottom-1">
                <div class="container space-1">
                    <!-- Nav Classic -->
                    <ul class="nav tab-nav-pill flex-nowrap pb-4 pb-lg-5 tab-nav justify-content-lg-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium active" id="pills-two-example-t2-tab" data-toggle="pill" href="#pills-two-example-t2" role="tab" aria-controls="pills-two-example-t2" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Overview</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-three-example-t3-tab" data-toggle="pill" href="#pills-three-example-t3" role="tab" aria-controls="pills-three-example-t3" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Review</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-four-example-t4-tab" data-toggle="pill" href="#pills-four-example-t4" role="tab" aria-controls="pills-four-example-t4" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Restaurent</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-five-example-t5-tab" data-toggle="pill" href="#pills-five-example-t5" role="tab" aria-controls="pills-five-example-t5" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Hotel</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-six-example-t6-tab" data-toggle="pill" href="#pills-six-example-t6" role="tab" aria-controls="pills-six-example-t6" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Hospital</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-seven-example-t7-tab" data-toggle="pill" href="#pills-seven-example-t7" role="tab" aria-controls="pills-seven-example-t7" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Police station</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-eight-example-t8-tab" data-toggle="pill" href="#pills-eight-example-t8" role="tab" aria-controls="pills-eight-example-t8" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Travel path</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-one-example-t1-tab" data-toggle="pill" href="#pills-one-example-t1" role="tab" aria-controls="pills-one-example-t1" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Photos</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- End Nav Classic -->
                    <div class="tab-content">
                        <!-- Description  -->
                        <div class="tab-pane fade active show" id="pills-two-example-t2" role="tabpanel" aria-labelledby="pills-two-example-t2-tab">
                            <div class="border-bottom border-color-8">
                                <div class="container">
                                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-4 mb-xl-7 pb-xl-1">
                                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Welcome to <?php echo $row['place_name']; ?></h2>
                                    </div>
                                    <div class="w-lg-80 w-xl-60 mx-auto collapse_custom position-relative mb-4 pb-xl-1">
                                        <p><?php echo substr($row['place_des'],0,200) ?></p>

                                        <div class="collapse" id="collapseLinkExample">
                                            <p><?php echo substr($row['place_des'],200) ?></p>
                                        </div>

                                        <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary" data-toggle="collapse" href="#collapseLinkExample" role="button" aria-expanded="false" aria-controls="collapseLinkExample">
                                            <span class="link-collapse__default font-size-14">View More <i class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                                            <span class="link-collapse__active font-size-14">View Less <i class="flaticon-arrow font-size-10 ml-1"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Description -->
                        </div>
                        <!-- Review  -->
                        <div class="tab-pane fade" id="pills-three-example-t3" role="tabpanel" aria-labelledby="pills-three-example-t3-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="py-4">
                                        <h5 class="font-size-21 font-weight-bold text-dark mb-6">
                                            Write a Review
                                        </h5>
                                        <form class="js-validate" novalidate="novalidate" method="post" action="" name="sForm">
                                            <div class="row mb-5 mb-lg-0">
                                                <!-- Input -->
                                                <div class="col-sm-12 mb-5">
                                                    <div class="js-form-message">
                                                        <input type="number" name="rating" min="1" limit="5" class="form-control" placeholder="Ratings" aria-label="Jack Wayley" required="true" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                                    </div>
                                                </div>
                                                <!-- End Input -->

                                                <!-- Input -->
                                                <!-- End Input -->
                                                <div class="col-sm-12 mb-5">
                                                    <div class="js-form-message">
                                                        <div class="input-group">
                                                            <textarea class="form-control" rows="6" cols="77" name="review" placeholder="Review" aria-label="Hi there, I would like to ..." required="true" data-msg="Please enter a reason." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Input -->
                                                <div class="col d-flex justify-content-center justify-content-lg-start">
                                                    <button type="submit" name="review_submit" class="btn rounded-xs bg-blue-dark-1 text-white p-2 height-51 width-190 transition-3d-hover">Submit Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="border-bottom py-4">
                                <h5 class="font-size-21 font-weight-bold text-dark mb-8">
                                    Showing <?php echo $num_of_review ?> verified guest review
                                </h5>
                                <?php
                                $sql3="Select * from place_review where place_id='$place_id'";
                                $res3=mysqli_query($conn,$sql3);
                                while($row3=mysqli_fetch_assoc($res3))
                                {   $id=$row3['user_id'];
                                    $sql4="SELECT * FROM user_jayed where id='$id'";
                                    $res4=mysqli_query($conn,$sql4);
                                    $row4=mysqli_fetch_assoc($res4);
                                    ?>
                                <div class="media flex-column flex-md-row align-items-center align-items-md-start mb-4">
                                    <div class="media-body text-center text-md-left">
                                        <div class="mb-4">
                                            <h6 class="font-weight-bold text-gray-3">
                                                <a href="#"><?php echo $row4['user_name'] ?></a>
                                            </h6>
                                            <div class="d-flex align-items-center flex-column flex-md-row mb-2">
                                                <button type="button" class="btn btn-xs btn-primary rounded-xs font-size-14 py-1 px-2 mr-2 mb-2 mb-md-0">Ratings : <?php echo $row3['rating']; ?>/5 </button>
                                            </div>
                                            <p class="text-lh-1dot6 mb-0 pr-lg-5"><?php echo $row3['review'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Review -->
                        <!-- Restaurent  -->
                        <div class="tab-pane fade" id="pills-four-example-t4" role="tabpanel" aria-labelledby="pills-four-example-t4-tab">
                            <div class="row">
                            <?php
                            $sql_restaurent="Select * from res_jayed where place_name='$place_name'";
                            $res_restaurent=mysqli_query($conn,$sql_restaurent);
								while($row_restaurent=mysqli_fetch_array($res_restaurent)){
									$res_id=$row_restaurent['id'];
									$sql3="Select * from res_review where res_id=$res_id";
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
                                    <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="javascript:;" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="<?php echo $row_restaurent['res_image']; ?>" alt="Image Desription">
                                            </a>
                                        </div>
                                        <div class="card-body px-3 pt-2">
                                            <a href="javascript:;" class="card-title font-size-17 font-weight-bold mb-0 text-dark pt-1 pb-1 d-block"><?php echo $row_restaurent['res_name'] ?></a>
                                            <div class="font-size-14 text-gray-1">
                                                Address : <?php echo $row_restaurent['res_address'] ?>
                                            </div>
                                            <div class="font-size-14 text-gray-1">
                                                Contact : <?php echo $row_restaurent['res_contact'] ?>
                                            </div>
                                            <!-- <div class="font-size-14 text-gray-1">
                                                Ratings : <?php echo $rating;?>/5
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <?php
								}
                                ?>
                                </div>
                        </div>
                        <!-- End Restaurent -->
                        <!-- Hotels  -->
                        <div class="tab-pane fade" id="pills-five-example-t5" role="tabpanel" aria-labelledby="pills-five-example-t5-tab">
                            <div class="row">
                            <?php
                            $sql_hotel="Select * from hotel_jayed where place_name='$place_name'";
                            $res_hotel=mysqli_query($conn,$sql_hotel);
                            while($row_hotel=mysqli_fetch_array($res_hotel)){
                                $hotel_id=$row_hotel['id'];
                                $sql3="Select * from hotel_review where hotel_id=$hotel_id";
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
                                    <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="javascript:;" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="<?php echo $row_hotel['hotel_image']; ?>" alt="Image Desription">
                                            </a>
                                        </div>
                                        <div class="card-body px-3 pt-2">
                                            <a href="javascript:;" class="card-title font-size-17 font-weight-bold mb-0 text-dark pt-1 pb-1 d-block"><?php echo $row_hotel['place_name'] ?></a>
                                            <div class="font-size-14 text-gray-1">
                                                Ratings : <?php echo $rating;?>/5
                                            </div>
                                            <div class="font-size-14 text-gray-1">
                                                Address : <?php echo $row_hotel['hotel_address'] ?>
                                            </div>
                                            <div class="font-size-14 text-gray-1">
                                                Contact : <?php echo $row_hotel['hotel_contact'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
								}
                                ?>
                                </div>
                        </div>
                        <!-- End Hotels -->
                        <!-- Hospitals  -->
                        <div class="tab-pane fade" id="pills-six-example-t6" role="tabpanel" aria-labelledby="pills-six-example-t6-tab">
                            <div class="row">
                            <?php
                            $sql="Select * from hospital_jayed where place_name='$place_name'";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($res)){
                                $hotel_id=$row['id'];
                                $sql3="Select * from hotel_review where hotel_id=$hotel_id";
                                $res3=mysqli_query($conn,$sql3);
                                ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4">
                                        <div class="card transition-3d-hover shadow-hover-2 h-10  p-5">
                                            <div class="card-body px-3 pt-2">
                                                <a href="javascript:;" class="card-title font-size-17 font-weight-bold mb-0 text-dark pt-1 pb-1 d-block"><?php echo $row['hospital_name']; ?></a>
                                                <div class="font-size-14 text-gray-1">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i>
                                                    <?php echo $row['address']; ?>
                                                </div>
                                                <div class="font-size-14 text-gray-1">
                                                <i class="icon flaticon-call mr-2 font-size-20"></i>
                                                    <?php echo $row['contact_no']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
								}
                                ?>
                            </div>
                        </div>
                        <!-- End Hospitals -->
                        <!-- Police station  -->
                        <div class="tab-pane fade" id="pills-seven-example-t7" role="tabpanel" aria-labelledby="pills-seven-example-t7-tab">
                            <div class="row">
                            <?php
                            $sql_police="Select * from police_station_jayed where place_name='$place_name'";
                            $res_police=mysqli_query($conn,$sql_police);
                            while($row=mysqli_fetch_array($res_police)){
                                ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4">
                                        <div class="card transition-3d-hover shadow-hover-2 h-10  p-5">
                                            <div class="card-body px-3 pt-2">
                                                <a href="javascript:;" class="card-title font-size-17 font-weight-bold mb-0 text-dark pt-1 pb-1 d-block"><?php echo $row['police_station_name']; ?></a>
                                                <div class="font-size-14 text-gray-1">
                                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i>
                                                    <?php echo $row['address']; ?>
                                                </div>
                                                <div class="font-size-14 text-gray-1">
                                                <i class="icon flaticon-call mr-2 font-size-20"></i>
                                                    <?php echo $row['contact_no']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
								}
                                ?>
                            </div>
                        </div>
                        <!-- End Police station -->
                        <!-- travel path station  -->
                        <div class="tab-pane fade" id="pills-eight-example-t8" role="tabpanel" aria-labelledby="pills-eight-example-t8-tab">
                            <div class="row">
                            <?php
                            $sql="Select * from place_jayed where id=$place_id";
                            $res=mysqli_query($conn,$sql);
                            $row=mysqli_fetch_array($res);
                            $place_name=$row['place_name'];
                            $travel_path=$row['travel_path'];
                                ?>
                                <div class="col-12 mb-3 mb-md-4">
                                    <div class="card transition-3d-hover shadow-hover-2 h-10  p-5">
                                        <div class="card-body px-3 pt-2">
                                            <h1><?php echo $place_name; ?></h1>
                                            <p><?php echo $travel_path; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End travel path station -->
                        <!-- cards -->
                        <div class="tab-pane fade" id="pills-one-example-t1" role="tabpanel" aria-labelledby="pills-one-example-t1-tab">
                            <div class="row">
                                <?php
                                $sql_gallery="Select * from place_gallery where place_name='$place_name'";
                                $res_gallery=mysqli_query($conn,$sql_gallery);
                                while($row=mysqli_fetch_array($res_gallery)){
                                ?>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card mb-1 transition-3d-hover shadow-hover-2 tab-card h-100">
                                        <div class="position-relative mb-2">
                                            <a href="javacript:;" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="<?php echo $row['image'] ?>" alt="img">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-100">
                                        <div class="position-relative">
                                            <a href="javascript:;" class="d-block gradient-overlay-half-bg-gradient-v5">
                                                <img class="card-img-top" src="../../assets/img/300x230/img28.jpg" alt="Image Desription">
                                            </a>
                                            <div class="position-absolute top-0 left-0 pt-5 pl-3">
                                            <a href="javascript:;">
                                                <span class="badge badge-pill bg-white text-primary px-4 py-2 font-size-14 font-weight-normal">Spain</span>
                                            </a>
                                                <span class="ml-2 text-white">United Airline</span>
                                            </div>
                                            <div class="position-absolute bottom-0 left-0 right-0">
                                                <div class="px-3 pb-2">
                                                    <div class="text-white my-1">
                                                        <span class="mr-1 font-size-14">From</span>
                                                        <span class="font-weight-bold font-size-19">£350.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-3 pt-2">
                                            <a href="javascript:;" class="card-title font-size-17 font-weight-bold mb-0 text-dark pt-1 pb-1 d-block">Dubai to Spain</a>
                                            <div class="font-size-14 text-gray-1">
                                                Oneway Flight
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">
                                    <div class="card transition-3d-hover shadow-hover-2 h-10">
                                        <div class="card-body px-3 pt-2">
                                            <a href="javascript:;" class="card-title font-size-17 font-weight-bold mb-0 text-dark pt-1 pb-1 d-block">Omuk hospital</a>
                                            <div class="font-size-14 text-gray-1">
                                                Oneway Flight
                                            </div>
                                            <div class="font-size-14 text-gray-1">
                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i>
                                                sea side hospital
                                            </div>
                                            <div class="font-size-14 text-gray-1">
                                                Ratings : 5/4
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- end cards -->
                    </div>
                </div>
            </div>
            <!-- End Tabs v1 -->

            <!-- Banner v1-->
            <div class="banner-block banner-v1 bg-img-hero space-3" style="background-image: url(assets/img/1920x500/img1.jpg);">
                <div class="max-width-650 mx-auto text-center mt-xl-5 mb-xl-2 px-3 px-md-0">
                    <h6 class="text-white font-size-40 font-weight-bold mb-1">Travel Tips</h6>
                    <p class="text-white font-size-18 font-weight-normal mb-4 pb-1 px-md-3 px-lg-0">Northern Ireland’s is now contingent. Britain is getting a divorce Northern Ireland is being offered a trial separation for Britain there is a one</p>
                    <a class="btn btn-outline-white border-width-2 rounded-xs min-width-200 font-weight-normal transition-3d-hover" href="https://madrasthemes.github.io/mytravel-html/html/blog/blog-list.html">Get Inspired</a>
                </div>
            </div>
            <!-- End Banner v1-->
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->

        <!-- ========== End FOOTER ========== -->

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
