<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	.wrapper{
		margin: 20px;
	}
</style>
</head>
<body>
<div class="wrapper">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#order-wrapper">Orders</a></li>
        <li class="dropdown">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolio
		    <span class="caret"></span></a>
		    <ul class="dropdown-menu">
		      <li><a href="#position-dropdown" data-toggle="tab">Positions</a></li>
		      <li><a href="#holding-dropdown" data-toggle="tab">Holdings</a></li>
		    </ul>

        </li>
        <li><a data-toggle="tab" href="#neworder">New Order</a></li>

    </ul>

    <div class="tab-content">
        <div id="order-wrapper" class="tab-pane fade in active">
            <?php 
           		$conn = new mysqli("localhost", "root", "", "test");
            	$result = $conn->query("select usr from curusr ORDER BY id DESC LIMIT 1");
				while($row = $result->fetch_assoc()){
					$username=$row['usr'];{
				}
				//find client id
				$cidsql="select client_id from Login_credential where user_name='".$username."'";
				//echo $cidsql;
				$result=$conn->query($cidsql);
				
				while($row = $result->fetch_assoc()){
					$client_id=$row['client_id'];{
				}
				$sql="select * from Orders where client_id='".$client_id."'";
				$result=$conn->query($sql);
				
				function resultToarray($result){
					$rows=array();
					while($row=$result->fetch_assoc()){
						$rows[]=$row;
					}
					return $rows;
				}


				if(mysqli_num_rows($result)>0){
					//$rows=resultToarray($result);
						//var_dump($rows);
						while($row = $result->fetch_assoc()) {
							if ($row['position_type']) {
								$postype="Delivery";
							}else{
								$postype="MIS";
							}
							if ($row['order_type']) {
								$ordtype="Market Order";
							}else{
								$ordtype="Limit Order";
							}
						echo "
							<div id=\"order\" style=\"margin: 20px\">
								<label for=\"order-no\" style=\"font-size: 20px\">Order No. 0</label> <br>
				            	<label for=\"order-stock\">Stock Name: </label>TCS<br>
				            	<label for=\"order-stocksize\">Size: </label>5<br>
								<label for=\"order-stockprice\">Price: </label>1999.09<br>
								<label for=\"order-positiontype\">Position Type: </label>MIS<br>
								<label for=\"order-ordertype\">Order Type: </label>Market Order<br>
								<label for=\"status\">Status: </label>Pending<br>
							</div>
						";		
						}
					}
				}
				
}
            ?>
            

        </div>
        <div id="position-dropdown" class="tab-pane fade">
            	<div style="margin: 20px">
            		<label for="pos-stock">Stock Name: </label>TCS<br>
            		<label for="pos-stockprice">Price: </label>1999.09<br>
            		<label for="pos-stockprice">Size: </label>5<br>
            	</div>
        </div>
        <div id="holding-dropdown" class="tab-pane fade">
            	<div style="margin: 20px">
            		<label for="pos-stock">Stock Name: </label><br>
            		<label for="pos-stockprice">Price: </label><br>
            	</div>
        </div>


        <div id="neworder" class="tab-pane fade">
            <div class="form-group" style="margin: 20px;width: 20%">
            	<form action="neworder.php" method="POST">
            		
	            	<label for="stock">Select Stock to order:</label>
					<select class="form-control" id="sel1" name="stock">
						<option>RIL</option>
						<option>TCS</option>
						<option>INFY</option>
						<option>ZEE</option>
						<option>HDFC</option>
					</select>
					<label for="stocksize">Select Stock Size:</label>
					<input type="text" name="stocksize" placeholder="Enter Stock Size" class="form-control stocksize">
					<label for="stocksize">Select MIS or Delivery:</label>
					<div class="radio">
						<label><input type="radio" name="position-type" value=0>MIS</label>
						<label><input type="radio" name="position-type" value=1>Delivery</label>
					</div>
					<label for="stocksize">Select Market or Limit Order:</label>
					<div class="radio">
						<label><input type="radio" name="order-type" value=0 onclick="hideprice();">Market</label>
						<label><input type="radio" name="order-type" value=1 onclick="showprice();">Limit</label>
					</div>
					<div id="price" style="display: none">
						<label for="price">Enter Stock Price:</label>
						<input type="text" name="stockprice" placeholder="Enter Stock Price" class="form-control stockprice">
					</div>
					<div class="col-sm-10" style="width:20%">
						
						<br><input class="btn btn-primary" type="submit" value="Submit">
					</div>
				</form>
				
				
			</div>

        </div>
    </div>

</div>
</body>
</html> 

<script type="text/javascript">
	function hideprice(){
	  document.getElementById('price').style.display ='none';
	}
	function showprice(){
	  document.getElementById('price').style.display = 'block';
	}
</script>                           