<?php
	include'database.php';
	session_start();

	 if (!isset($_SESSION['score']))
	 {
	 	$_SESSION['score']=0;
	 }

	 if (isset($_POST['submit']))
	 {
	 	$number=$_POST['number'];
	 	$selected_choice=$_POST['choice'];
	 	$next=$number+1;

	 	//get total number of  questions
	 	$query='SELECT * FROM questions';
	
		$resulte=mysqli_query($con,$query);

		$total=mysqli_num_rows($resulte);
	 	//create query
	 	$query="SELECT * FROM choices 
	 			where question_number=$number AND is_correct=1";

	 	$resulat=mysqli_query($con,$query);
	 	$resulat=mysqli_fetch_assoc($resulat);

	 	//print_r($resulat);

	    $correct_choice=$resulat['id'];

	    if ($correct_choice==$selected_choice)
	    {

	    	$_SESSION['score']++;
	    	

	    }
	    if ($number==$total) 
	    {
	    	header("location:final.php");
	    	exit();
	    }
	    else
	    {
	    	header("location:question.php?num=".$next);
	    }

	 }
?>