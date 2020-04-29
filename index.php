<?php include'database.php';?>
<?php
	$query='SELECT * FROM questions';
	
	$resulte=mysqli_query($con,$query);

	$total=mysqli_num_rows($resulte);
	//echo $total;
	session_start();
    $_SESSION['score']=0;

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quizzer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Test Your PHP Knowledge</h2>
			<p>This is amultiple choice quiz to test your knowledge of PHP</p>
			<ul>
				<li><strong>Number of Questions :</strong><?php echo $total; ?></li>
				<li><strong>Type:</strong>Multiple Choice</li>
				<li><strong>Estimated Time:</strong><?php echo $total* .5; ?> Minutes</li>
			</ul>
			<a href="question.php?num=1" class="start">Start Quiz</a>
		</div>
	</main>
	<footer>
		<div class="container">
		Copyright &copy 2020, PHP Quizzer 
		</div>
	</footer>
</body>
</html>