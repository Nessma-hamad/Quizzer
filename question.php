<?php include'database.php';

	$number=$_GET['num'];

    //echo $number;
	//create query
	$query='SELECT * FROM questions where question_number ='.$number;
	//get resulat
	$resulte=mysqli_query($con,$query);

    //fech data
	$question=mysqli_fetch_all($resulte, MYSQLI_ASSOC);

	//get choices
	$query='SELECT * FROM choices where question_number ='.$number;
	//get resulat
	$resulte=mysqli_query($con,$query);

    //fech data
	$choices=mysqli_fetch_all($resulte, MYSQLI_ASSOC);

/*
	foreach ($choices as $key ) 
	{
		echo $key['text'];
		
	}
*/	
	
	$query='SELECT * FROM questions';
	
	$resulte=mysqli_query($con,$query);

	$total=mysqli_num_rows($resulte);
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
			<div class="current">Question<?php
				 foreach ($question as $key ) 
					{
						echo $key['question_number'];
					} 
				?> of <?php echo $total; ?></div>
			<p class="question">
				<?php
				 foreach ($question as $key ) 
					{
						echo $key['text'];
					} 
				?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					<?php foreach ($choices as $key): ?>
						<li><input type="radio" name="choice" value="<?php echo$key['id']?>"><?php echo $key['text'];?></li>
					<?php endforeach ;?>
				</ul>
				<input type="submit" name="submit" value="Submit">
				<input type="hidden" name="number" value="<?php echo $number; ?>">
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
		Copyright &copy 2020, PHP Quizzer 
		</div>
	</footer>
</body>
</html>