<?php
	include'database.php';
	if (isset($_POST['submit']))
	{
		$question_number=$_POST['question_number'];
		$question_text=$_POST['question_text'];

		//choice array
		$choices=array();
		$choices[1]=$_POST['choice1'];
		$choices[2]=$_POST['choice2'];
		$choices[3]=$_POST['choice3'];
		$choices[4]=$_POST['choice4'];
		$choices[5]=$_POST['choice5'];

		$correct_choice=$_POST['correct_choice'];

		//echo $correct_choice;

		//create query
		$query="INSERT INTO questions (question_number,text) VALUES ('$question_number','$question_text')";
		$insert=mysqli_query($con,$query);

		if ($insert)
		{
			foreach ($choices as $choice => $value) 
			{
				if ($value!='') 
				{
					if ($correct_choice==$choice) 
					{
						$is_correct=1;
					}
					else
					{
						$is_correct=0;
					}
					

					$query="INSERT INTO choices (question_number,is_correct,text)
					    VALUES ('$question_number','$is_correct','$value') ";
					$insert=mysqli_query($con,$query); 

					if ($insert) 
					{
					   	continue;
					} 
					else
					{
						echo "can not insert";
					}  
				}
			}
			$meg='Question has been added';
		}




	}
	$query='SELECT * FROM questions';
	
	$resulte=mysqli_query($con,$query);

	$total=mysqli_num_rows($resulte);
	$next=$total+1;

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
			<h2>Add A Question</h2>
			<?php
				if (isset($meg)) 
				{
					echo '<h4>'.$meg.'</h4>';
				}
			?>
			<form method="post" action="add.php">
				<p>
					<label>Question Number : </label>
					<input type="number" value="<?php echo $next; ?>" name="question_number">
				</p>
				<p>
					<label>Question Text : </label>
					<input type="text" name="question_text">
				</p>
				<p>
					<label>Choice #1 : </label>
					<input type="text" name="choice1">
				</p>
				<p>
					<label>Choice #2 : </label>
					<input type="text" name="choice2">
				</p><p>
					<label>Choice #3 : </label>
					<input type="text" name="choice3">
				</p><p>
					<label>Choice #4 : </label>
					<input type="text" name="choice4">
				</p><p>
					<label>Choice #5 : </label>
					<input type="text" name="choice5">
				</p>
				<p>
					<label>Correct Choice Number : </label>
					<input type="number" name="correct_choice">
				</p>
				<p>
					
					<input type="submit" name="submit" value="Submit">
				</p>
				
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