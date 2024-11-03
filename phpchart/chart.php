<?php
echo("hello!!!!");

//function for inserting 
function option_process($new_id){
	$mysqli = require __DIR__ . "/connect.php";
	$oras=date("Y-m-d");
	$sqli= "UPDATE table1 SET number_sel = number_sel + 1, time_sel='$oras' WHERE id_chooses = '$new_id' ";
	$result=mysqli_query($mysqli,$sqli);


	$alert2="<script>alert('Submiited successfully!'); window.location.href='index.php'</script>";

		//call to complete
	if($result){
	    die($alert2);
	 }else{
	    $error_d=$mysqli -> connect_errno;
	    $alert1="<script>alert('Connection error:'); window.location.href='index.php'</script>".$error_d;
	    //die($alert1);
	    	}

}

if(isset($_POST['submit_btn'])){
	$options_selected=$_POST['selection_option'];
	////value instead of id!!!!
	//add the optiion
	if($options_selected == "option_1"){
		$new_id=1;
		option_process($new_id);
	
		}

	if($options_selected == "option_2"){
		$new_id=2;
		option_process($new_id);
	
		}

	if($options_selected == "option_3"){
		$new_id=3;
		option_process($new_id);
	
		}


}




?>