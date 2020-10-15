<?php
 include("../connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Travel Stock</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <?php include("page_content/header_sidebar.php") ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            
            <nav aria-label="breadcrumb">
              
            </nav>
          </div>
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  
                 <div class="container">
  
  
  <div class="d-flex flex-row justify-content-end ">
    <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#myModal">
     Click To Insert
    </button>
  </div>

  <div >
    <h2 style="color: #062f4f; font-family: 'Cormorant Unicase', serif;" class="font-weight-bold mb-4"> All Records </h2>
    <div id="records_content">  </div>
  </div>
  

</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <label>  Package Name </label>
          <input type="text" name="package_name" id="package_name"  placeholder="Package Name" class="form-control">
        </div>
        <div class="form-group">
          <label>  Package Description </label>
          <textarea name="package_description" id="package_description"  placeholder="Package Description" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>  Price </label>
          <input type="number" name="price" id="package_price"  placeholder="Price" class="form-control">
        </div>
        <div class="form-group">
          <label>  Image </label>
          <input type="file" name="image" id="package_image"  placeholder="Image" class="form-control">
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecord()">Save</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- //////////////// after update ////////////////// -->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<script>
  
$(document).ready(function () {
    readRecords(); 
  });

function addRecord(){
  var package_name =  $("#package_name").val();
  var package_description =  $("#package_description").val();
  var package_price =  $("#package_price").val();
  var formData= new FormData();
  formData.append("package_name",package_name);
  formData.append("package_description", package_description);
  formData.append("package_price", package_price);
  formData.append('package_image',$('#package_image')[0].files[0]);
  formData.append('addRecord','addRecord');
  $.ajax({
    processData: false,
    contentType: false,
    url:"backend_package.php",
    type:'POST',
    data: formData,
    success:function(data, status){
        // alert("Data added successfully");
        alert(data);
        readRecords();
    },
  });
}

//////////////////Display Records
  function readRecords(){
    
    var readrecords = "readrecords";
    $.ajax({
      url:"backend_package.php",
      type:"POST",
      data:{readrecords:readrecords},
      success:function(data,status){
        $('#records_content').html(data);
      },

    });
  }


/////////////delete userdetails ////////////
function DeleteUser(deleteid){

  var conf = confirm("are u sure");
  if(conf == true) {
  $.ajax({
    url:"backend_package.php",
    type:'POST',
    data: {  deleteid : deleteid},

    success:function(data, status){
      readRecords();
    }
  });
  }
}



function GetUserDetails(id){
    $("#hidden_user_id").val(id);
    $.post("backend_hotel.php", {
            id: id
        },
        function (data, status) {
            alert(data);
            //JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
            var user = JSON.parse(data);
            alert(user);

     $("#updated_place_name").val() ;
// $("#updated_travel_path").val();
//    $("#updated_place_description").val();
        }
    );
    $("#update_user_modal").modal("show");
}




function UpdateUserDetails() {
   var district =  $("#updated_district").val();
    var view =  $("#updated_view").val();
    var place_name =  $("#updated_place_name").val();
    var travel_path =  $("#updated_travel_path").val();
    var place_description =  $("#updated_place_description").val();
    $.post("backend_hotel.php", {
            hidden_user_id: hidden_user_id,
           district:district,
        view:view,
        place_name:place_name,
        travel_path:travel_path,
        place_description:place_description,
        },
        function (data, status) {
            $("#update_user_modal").modal("hide");
            readRecords();
        }
    );
}

</script>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/js-grid-hotel.js"></script>
  <script src="js/db.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/js-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:42 GMT -->
</html>
