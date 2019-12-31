<?php include 'database.php'; ?>

<?php session_start(); ?>

<?php 

if(!isset($_SESSION['score'])){
	$_SESSION['score']= 0;
	
}

if($_POST){
	
	//echo 'submitted';
	
	$number= $_POST['number'];
	$selected_choice= $_POST['choice'];
	$next= $number+1;
	
	/*
	* get total
	*/
	
	$query="SELECT * FROM `questions`";
	
	/*
	* get results
	*/
	$results= $mysqli-> query($query) or die($mysqli-> error.__LINE__);
	$total= $results-> num_rows;
	
	/*
	* get correct choice
	*/
	
	$query= "SELECT * FROM `choices` 
	         WHERE question_number= $number AND is_correct=1";
	
/*
	* get results
	*/	
	
	$result= $mysqli-> query($query) or die($mysqli-> error.__LINE__);
	
	/*
	* get row
	*/
			  $row= $result->fetch_assoc();
			  /*
	* set correct choice
	*/
	
	$correct_choice= $row['id'];
	
	/*
	* compare
	*/
	if($correct_choice == $selected_choice){
		
		
		$_SESSION['score']++;
		
		
	}
	/*
	* to see if it is last question
	*/
	
	if($number == $total){
		header("Location: final.php");
		exit();
		
	}
	else{
		
		header("Location: question.php?n=" .$next);
	}
}
