<?php
session_start();
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/user_php.php");
require_once(__ROOT__ . "controller/UserController.php");
$model = new User();
$controller = new UserController($model);
$dbh=new Dbh();

$sql="SELECT * FROM FAQ;";

$result=$dbh->query($sql);

if($result!=false)
{
	while($row=$dbh->fetchRow($result))
	{
		if(isset($_POST["delete".$row['id']]))
		{
			$sql2="DELETE FROM FAQ WHERE id = ".$row['id'].";";
			$result2=$dbh->query($sql2);
		}
		else if (isset($_POST["edit".$row['id']]))
		{
			$_SESSION['FAQAction']=$row['id'];
			header("Location: editFAQ.php");
		}
		else if (isset($_POST["add"]))
		{
			$_SESSION['FAQAction']="add";
			header("Location: editFAQ.php");
		}
	}
}

?>
<!DOCTYPE HTML>

<html>

<head>
  <title>FAQ | INGAZ</title>
  <link rel = "icon" href ="images/logo2.jpg" type = "image/x-icon"> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- links of bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
	<!-------------------------------------------------------Start of Header---------------------------------------------------------------->
    <?php require_once(__ROOT__ . "view/Viewbar.php"); ?>

    <!-------------------------------------------------------End of Header------------------------------------------------------------------>
    
	<!-------------------------------------------------------Start of Content--------------------------------------------------------------->   

        <div class="container">
        
          <h1><b>FAQ (Frequently Asked Questions) :-</b></h1>
          <hr> <br>
          <script>
            function getResult() 
            {
                debugger;
                if($("#term").val() != '')
                {
            jQuery.ajax(
            {
                url: "FAQ-search.php",
                data:'term='+$("#term").val(),
                type: "POST",
                success:function(data2)
                {
                    $("#result").html(data2);
                    $("#result").show();
                }
            });
				}
				else{
                    $("#result").hide();
                }
            }
        </script>
				<input type="search" placeholder="Search for question..." class="form-control" id="term" name="term" onkeyup="getResult()" value='' />
			
            <div id="result"></div>
             
			<?php
			 


    
				$sql2="SELECT DISTINCT section FROM FAQ;";
				$result2=$dbh->query($sql2);
				
				$flag=false;

				echo"<form action='' method='post' class='need-validated' enctype='multipart/form-data'>";
				
				if($result2 != false)
				{
					while($row2 = mysqli_fetch_array($result2))
					{
						$sql3="SELECT * FROM FAQ WHERE section='".$row2['section']."';";
						$result3=$dbh->query($sql3);
						echo "<h3>".$row2['section'].":-</h3>";
						if($result3!=false)
						{
							echo"<table class='table table-dark' width=100%>
									<thead>
									<tr>
										<th width='15%'>Question</th>
										<th width='30%'>Answer</th>
										";
							if(isset($_SESSION['username']))
							{
								if($_SESSION['username']=="internal" || $_SESSION['username']=="admin")
								{
											echo "<th width='1%' colspan='2'>Action</th>";
											$flag=true;
								}
							}
									echo"
									</tr>
									</thead>
									";
							while($row3 = mysqli_fetch_array($result3))
							{
								echo 
								"
									<tr>
										<td>".$row3['question']."</td>
										<td>".$row3['answer']."</td>";
										
								if($flag==true)
								{
										echo"<td><button  type='submit' class='btn btn-primary' name='edit".$row3['id']."'>Edit Q&A</button></td>
										<td><button  type='submit' class='btn btn-danger' style='float:right;' onClick=\"return confirm('Are you sure you want to delete this Q&A?')\" name='delete".$row3['id']."'>Delete Q&A</button></td>";
								}
									echo"</tr>";
								
							}
							echo"</table>";
							
							
						}
					}
					if($flag==true)
					{
						echo"<button style='float:right;' type='submit' class='btn btn-success' name='add'>Add Q&A</button>";
					}
					echo "<br><br><br>";
				}

				else
				{
					echo "<tr><td colspan=4>ERROR: Could not able to execute $sql. " . mysqli_error($dbh->getConn())."</td></tr>";
				}
				echo"</form>";
			?>
 
			</div>


    <!-------------------------------------------------------End of Content----------------------------------------------------------------->

    <!-------------------------------------------------------Start of Footer---------------------------------------------------------------->
    <?php include "footer.php"; ?>
    <!-------------------------------------------------------End of Footer------------------------------------------------------------------>
</body>

</html>