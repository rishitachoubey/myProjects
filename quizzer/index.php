<?php include 'database.php';
?>
<?php 

//get total questions

$query= "SELECT * FROM questions";

$result=$mysqli-> query($query) or die($mysqli-> error.__LINE__);
$total= $result->num_rows;
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP Quizzer</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body>
<header>
<div class="container">
<h1>PHP Quizzer</h1>
</div>
</header>

<main>
<div class="container">
<h2>TEST YOUR PHP KNOWLEDGE</h2>
<p>This is a multiple choice quiz to check your php knowledge</p>
<ul>
<li><strong>Number of Questions:</strong><?php echo $total;?></li>
<li><strong>Type:</strong>Multiple Choice</li>
<li><strong>Estimated Time:</strong><?php echo $total * 0.5;?> minutes</li>
</ul>
<a href="question.php?n=1" class="start">Start Quiz</a><br><br>
<a href="add.php" class="start">Add a Question</a>
</div>
</main>

<footer>
<div class="container">
	Copyright &copyright; 2020, PHP Quizzer
</div>
</footer>	
</body>
</html>
