<?php
	
	// Create connection
	$conn = new mysqli("localhost", "root", "", "test");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}else{echo "Connected successfully";	
		} 
	//-----
	$username=$_POST['regusername'];
	$password=$_POST['regpassword'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mname=$_POST['mname'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$phone2=$_POST['phone2'];
	$email=$_POST['email'];
	$bankname=$_POST['bank_name'];
	$bank_acc_no=$_POST['bank_acc_no'];
	$pan=$_POST['pan'];
	$city=$_POST['city'];

	$lastsql="select client_id FROM Client ORDER BY client_id DESC LIMIT 1";
	$lastid=0;
	$result=$conn->query($lastsql);
	
	if(mysqli_num_rows($result)>0){
		while($row = $result->fetch_assoc()){
			$lastid=$row['client_id'];
		}
		$lastid=$lastid+1;
	}
	else{
		$lastid=0;
	}
//	echo $lastid;


	$sql1="insert into Login_credential values(".$lastid.",'" . $username . "','" . $password . "')";
	
	$sql2="insert into KYC_detail values('".$pan."','".$fname."','".$mname."','".$lname."','".$gender."')";
	$sql3="insert into Mobile_number values(" . $lastid . ",'".$phone."')";
	$sql4="";
	if(!$phone2===""){
		$sql4="insert into Mobile_number values(" . $lastid . ",'".$phone2."')";
		if ($conn->query($sql4) === TRUE) {
		    echo "added!";
		} else {
		    //echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
	}
	$sql5="insert into Email values(" . $lastid . ",'".$email."')";
	$sql6="insert into Bank_account_detail values (" . $lastid . ",'".$bank_acc_no."',50000,'".$bankname."',1)";
	$sql7="insert into Client values(" . $lastid . ",'".$pan."','".$city."')";
	echo "$sql6";
	
	if ($conn->query($sql1) === TRUE) {
	    echo "added!";
	} else {
	    //echo "Error: " . $sql1 . "<br>" . $conn->error;
	}
	if ($conn->query($sql2) === TRUE) {
	    echo "added!";
	} else {
	    //echo "Error: " . $sql1 . "<br>" . $conn->error;
	}
	if ($conn->query($sql3) === TRUE) {
	    echo "added!";
	} else {
	    //echo "Error: " . $sql1 . "<br>" . $conn->error;
	}
	if ($conn->query($sql5) === TRUE) {
	    echo "added!";
	} else {
	    //echo "Error: " . $sql1 . "<br>" . $conn->error;
	}
	if ($conn->query($sql6) === TRUE) {
	    echo "added!";
	} else {
	    //echo "Error: " . $sql1 . "<br>" . $conn->error;
	}
	if ($conn->query($sql7) === TRUE) {
	    echo "added!";
	} else {
	    //echo "Error: " . $sql1 . "<br>" . $conn->error;
	}





	$conn->close();
	//header("Location: welcome.php", true, 301);
									//exit();

?>