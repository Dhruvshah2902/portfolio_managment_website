<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
</head>
<body>

	<div class="container login-container">
            	<form  action="oauth.php" method="post">
            		
                <div class="col-md-6 login-form">
                    <h3>Login</h3>
                    
                        <div class="form-group">
                            <input type="text" id="username" name="username" class="form-control username" placeholder="Your Username" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password"id="password" name="password" class="form-control password" placeholder="Your Password" value="" />
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                        	<input type="submit" name="submit">
                        </div>
                        <div class="form-group">
                        	<input type="button" onclick="location.href='register.php';" value="Register" />

                    
                </div>
            	</form>
                
            
        </div>


</body>
</html>