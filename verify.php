<?php
	include_once('dbconfig.php');

	if(isset($_GET['vkey'])){
		$vkey = $_GET['vkey'];
		
              $query = "SELECT * from registration  where vkey = '$vkey'";

              $result = mysqli_query($conn, $query);
              if(!$result)
              	echo "fasle<br>";
            
              	$update = "update registration set validation = 1 where vkey = '$vkey'";
              	$r = mysqli_query($conn, $update);

	              	if($r)
	              	{
	              		

					
						echo "<script > alert('Your account has been Successfully Verified');document.location.href=('login.php');</script>";
					}	              		  
	              	else{
	              		echo "Problem in query";
	              	}
              }

              // else
              // {
              // 	echo "Something went wrong";
              // }

    else{
    	echo "<script type='text/javascript'>alert('Something Went Wrong!!!')</script>";
    }

	
?>