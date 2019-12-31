<?php include 'database.php';
?>
<?php session_start(); ?>

<?php 

//set question no

$number= (int) $_GET['n'];

/*
	* get total
	*/
	
	$query="SELECT * FROM questions";
	
	/*
	* get results
	*/
	$results = $mysqli-> query($query) or die($mysqli-> error.__LINE__);
	$total= $results-> num_rows;
	

//get question

$query= "SELECT * FROM questions
 WHERE question_number= $number";

$result= $mysqli->query($query) or die($mysqli->error.__LINE__);

$question= $result->fetch_assoc();


$query= "SELECT * FROM choices 
WHERE question_number= $number";

$choices= $mysqli-> query($query) or die($mysqli-> error.__LINE__);

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

<div class="current">Question <?php echo $question['question_number'];?>of <?php echo $total;?> </div>

<p class="question">
<?php echo $question['text']; ?>
</p>


<form method="post" action="process.php">

<ul class="choices">
<?php while($row= $choices-> fetch_assoc()): ?>
<li><input name="choice" type="radio" value= "<?php echo $row['id']; ?>"/><?php echo $row['text'];?></li>
<?php endwhile; ?>
</ul>


<input type="submit" value="submit">
<input type="hidden" name="number" value="<?php echo $number;?>"/>

</form>
</div>

</main>

<footer>
<div class="container">
	Copyright &copyright; 2020, PHP Quizzer
</div>
</footer>	
</body>
</html>
