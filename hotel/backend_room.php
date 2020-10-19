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
							<th>Flat Name</th>
							<th>Total Room</th>
						    <th>Image</th>
							<th>Price</th> 
							<th>Air Condition</th>
							<th>Delete Action</th>
						</tr>'; 

	$displayquery = " SELECT * FROM hotel_room where hotel_id = '$hotel'"; 
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {

			$image = $row['flat_image'];

			if ($row['flat_ac']) {
				$ac = "YES";
			}
			else{
				$ac = "NO";
			}
			
			$data .= '<tr>  
				<td>'.$number.'</td>
				<td>'.$row['flat_name'].'</td>
				<td>'.$row['flat_total_room'].'</td>
				<td><img src ='.$image.'></td>
				<td>'.$row['flat_price'].'</td>
				<td> '.$ac.' </td>
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

//adding records in database
// if(isset($_POST['district']) &&  isset($_POST['view']) && isset($_POST['travel_path']) && isset($_POST['place_name']) && isset($_POST['place_description']) )

if(isset($_POST['addRecord'])  )
{
	$flat_name =  $_POST['flat_name'];
	$price =  $_POST['price'];
	$total_room =  $_POST['total_room'];
	$ac =  $_POST['ac'];
	$name = $_FILES['picture']['name'];
	$dst="../image/".$name;
	move_uploaded_file($_FILES["picture"]["tmp_name"],"../image/".$name);
	// file_put_contents("a.txt", $flat_name." ".$price." ".$dst." ".$total_room." ".$ac." ".$hotel_name);
	// $query = "INSERT INTO `hotel_room`(`flat_name`, `flat_price`, `flat_image`, `flat_total_room`, `flat_ac`, `hotel_name`) VALUES ('$flat_name','$price',$dst,$total_room,$ac,'$hotel_name')";
	$sql = "INSERT INTO `hotel_room`(`flat_name`, `flat_price`, `flat_image`, `flat_total_room`, `flat_ac`, `hotel_id`) VALUES ('$flat_name','$price','$dst','$total_room','$ac','$hotel')";
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

	$deletequery = " delete from hotel_room where id ='$user_id' ";
	if (!$result = mysqli_query($conn,$deletequery)) {
        exit(mysqli_error());

}

}

?>














