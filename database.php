<?php
	//create conntion 
	$con=mysqli_connect('localhost','root','root','quizzer');

	//checke connation
	if (mysqli_connect_errno()) 
	{
		//connection failed
		echo "Your connection is failed".mysqli_connect_errno();
	}
	
?>