<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/user_php.php");
require_once(__ROOT__ . "controller/UserController.php");
$model = new User();
$controller = new UserController($model);
$dbh=new Dbh();



$questionValue = $answerValue = $sectionValue = "";
$questionError = $answerError = $sectionError = $allError = "";


$flagEdit = $flagAdd = true;

$sql="SELECT * FROM FAQ;";

$result=$dbh->query($sql);

if($result != false)
{
	while($row = $dbh->fetchRow($result))
	{
		if($_SESSION['FAQAction'] != "add")
		{
			if($_SESSION['FAQAction']==$row['id'])
			{
				$questionValue = $row['question'];
				$answerValue = $row['answer'];
				$sectionValue = $row['section'];
			}
		}
		if(isset($_POST["edit"]) || isset($_POST['add']))
		{
			$flag = true;
			$flagQuestion = $flagAnswer = $flagSection = true;
			
			//Question Validation
			if(empty($_POST['question']))
			{
				$questionError = "* Question can't be empty.";
				$flag = false;
			}
			else if(is_numeric($_POST['question']))
			{
				$questionError = "* Question can't be a number.";
				$flag = false;
			}
			else if(strpos($_POST['question'],'?') != (strlen($_POST['question'])-1) )
			{
				$questionError = "* Question must end with a '?'.";
				$flag = false;
			}
			else if(strlen($_POST['question']) > 200)
			{
				$questionError = "* Question can't exceed 200 characters.";
				$flag = false;
			}
			else
			{
				$questionValue = mysqli_real_escape_string($dbh->getConn(), $_POST['question']);
			}
			
			
			//Answer Validation
			if(empty($_POST['answer']))
			{
				$answerError = "* Answer can't be empty.";
				$flag = false;
			}
			else if(is_numeric($_POST['answer']))
			{
				$answerError = "* Answer can't be a number.";
				$flag = false;
			}
			else if(strlen($_POST['answer']) > 400)
			{
				$answerError = "* Answer can't exceed 400 characters.";
				$flag = false;
			}
			else
			{
				$answerValue = mysqli_real_escape_string($dbh->getConn(), $_POST['answer']);
			}
			
			
			//Section Validation
			if(empty($_POST['section']))
			{
				$sectionError = "* Section can't be empty.";
				$flag = false;
			}
			else if(is_numeric($_POST['section']))
			{
				$sectionError = "* Section can't be a number.";
				$flag = false;
			}
			else if(strlen($_POST['section']) > 100)
			{
				$sectionError = "* Section can't exceed 100 characters.";
				$flag = false;
			}
			else
			{
				$sectionValue = mysqli_real_escape_string($dbh->getConn(), $_POST['section']);
			}
			
			if($_POST['question'] == $questionValue)
			{
				$flagQuestion = false;
			}
			
			if($_POST['answer'] == $answerValue)
			{
				$flagAnswer = false;
			}
			
			if($_POST['section'] == $sectionValue)
			{
				$flagSection = false;
			}
			
			if(isset($_POST["edit"]) && $flag == true && $flagEdit == true)
			{
				// if($flagQuestion == true || $flagAnswer == true || $flagSection == true )
				// {
					$flagEdit=false;
					$sql2 = "UPDATE FAQ SET answer = '".$answerValue."' , question = '".$questionValue."' , section = '".$sectionValue."' WHERE id = ".$_SESSION['FAQAction'].";";  
					$result2=$dbh->query($sql2);	
					header("Location: FAQ.php");
				// }			
				// else
				// {
				// 	$allError="* All fields are the same, please change at least 1 field.";
				// }
			}
			else if(isset($_POST["add"]) && $flag == true && $flagAdd == true)
			{
				$flagAdd = false;
				$sql2 = "INSERT INTO FAQ (answer,question,section,access) VALUES ('".$answerValue."' , '".$questionValue."' , '".$sectionValue."' , '".$_SESSION['username']."');";
				$result2=$dbh->query($sql2);
				header("Location: FAQ.php");
			}
			
		}

	}
}

?>
<!DOCTYPE HTML>

<html>

<head>
  <title>Edit FAQ | INGAZ</title>
  <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- links of bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.error {color: #FF0000;}
	</style>
</head>

<body>
	<!-------------------------------------------------------Start of Header---------------------------------------------------------------->
    <?php require_once(__ROOT__ . "view/Viewbar.php"); ?>

    <!-------------------------------------------------------End of Header------------------------------------------------------------------>
    
	<!-------------------------------------------------------Start of Content--------------------------------------------------------------->   
		<div class="container">
        
			<h1><b>FAQ (Frequently Asked Questions) :-</b></h1>
			<hr> <br>
			
			
			
			<form action='' method='post' class='need-validated' enctype='multipart/form-data'>
			
				<h3><b>Question</b></h3>
				<input type="text" placeholder="Insert Question" class="form-control" name="question" value = <?php echo "'".$questionValue."'"; ?> >
				<span class = 'error'><?php echo $questionError;?></span>
				
				<h3><b>Answer</b></h3>
				<textarea style='width:100%; height:100px;' name='answer' placeholder='Insert Answer for Question'><?php echo $answerValue; ?></textarea>
				<span class = 'error'><?php echo $answerError;?></span>
				
				<h3><b>Section</b></h3>
				<input type="text" placeholder="What section your Q&A lies under" class="form-control" name="section" value= <?php echo "'".$sectionValue."'"; ?> >
				<span class = 'error'><?php echo $sectionError;?></span>
				<br>
				<span class = 'error'><?php echo $allError;?></span>
			<?php
				if(isset($_SESSION['FAQAction']))
				{
					if($_SESSION['FAQAction'] == "add")
					{
						echo"<button style='float:right;' type='submit' class='btn btn-success' name='add'>Add Q&A</button>";
					}
					else
					{
						echo"<button style='float:right;' type='submit' class='btn btn-success' name='edit'>Edit Q&A</button>";
					}
				}
				
			?>
			<br><br><br>
			</form>
		</div>


    <!-------------------------------------------------------End of Content----------------------------------------------------------------->

    <!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
    <?php include "footer.php"; ?>
    <!-------------------------------------------------------End of Footer------------------------------------------------------------------>
</body>

</html>