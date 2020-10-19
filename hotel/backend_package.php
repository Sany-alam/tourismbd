<?php
// @ob_start();
// ini_set('error_log', 'ussd-app-error.log');
include("../connection.php");
// if(session_status()!=PHP_SESSION_ACTIVE) session_start();
$hotel = $_SESSION['hotel']['id'];
$place_name = $_SESSION['place_name'];
// extract($_POST);

if(isset($_POST['readrecords'])){

	$data =  '<table class="table table-bordered table-striped ">
						<tr class="bg-dark text-white">
							<th>No.</th>
							<th>Package Name</th>
							<th>Package Description</th>
						    <th>Image</th>
							<th>Price</th> 
							<th>Delete Action</th>
						</tr>'; 

	$displayquery = " SELECT * FROM hotel_package where hotel_id = '$hotel'"; 
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {

			$image = $row['package_image'];
			
			$data .= '<tr>  
				<td>'.$number.'</td>
				<td>'.$row['package_name'].'</td>
				<td>'.$row['package_description'].'</td>
				<td><img src ='.$image.'></td>
				<td>'.$row['package_price'].'</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;

		}
	} 
	 $data .= '</table>';
    	echo $data;

}

if(isset($_POST['addRecord'])  )
{
	$package_name =  $_POST['package_name'];
	$package_price =  $_POST['package_price'];
	$package_description =  $_POST['package_description'];
	$name = $_FILES['package_image']['name'];
	$dst="../image/".$name;
	move_uploaded_file($_FILES["package_image"]["tmp_name"],$dst);
	// file_put_contents("a.txt", $package_name." ".$package_price." ".$package_description." ".$dst." ".$hotel_name);
	$sql = "INSERT INTO `hotel_package`(`hotel_id`, `package_name`, `package_price`, `package_description`, `package_image`) VALUES ('$hotel','$package_name','$package_price','$package_description','$dst')";
	$res=mysqli_query($conn,$sql);
	if ($res) {
		echo var_dump($res);
	}else{
		echo var_dump($res);
	}
}
	// pass id on modal
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    $user_id = $_POST['id'];
    $query = "SELECT * FROM hotel WHERE id = '$user_id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
    
    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
       
            $response = $row;
        }
    }
  //  // agar ek bhi value nai milta hai tho data not found no. of rows 0 hai tho
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
   //     PHP has some built-in functions to handle JSON.
// Objects in PHP can be converted into JSON by using the PHP function json_encode(): 

    echo json_encode($response);
}
// ye top wala id jo humhe mil raha hai uska hai jaha wo id check karega sahi hai ya nai agar nai tho invalid req boldega...
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
//////////////// update table//////////////


/////////////Delete user record /////////

if(isset($_POST['deleteid']))
{

	$user_id = $_POST['deleteid']; 

	$deletequery = " delete from hotel_package where id ='$user_id' ";
	if (!$result = mysqli_query($conn,$deletequery)) {
        exit(mysqli_error());

}

}

?>














