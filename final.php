<?php  
	session_start();

	//echo $_SESSION['score'];

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
			<h2>you're Done!</h2>
			<p>Congrats! you have completed the test</p>
			<p>Final Score :<?php echo$_SESSION['score']; ?></p>
			<a href="question.php?num=1" class="start" > Take Again</a>
		</div>
	</main>
	<footer>
		<div class="container">
		Copyright &copy 2020, PHP Quizzer 
		</div>
	</footer>
</body>
</html>