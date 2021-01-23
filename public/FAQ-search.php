<?php
	define('__ROOT__', "../app/");
	require_once(__ROOT__ . 'db\Dbh.php');
	
	$dbh=new Dbh();


    $term = $_POST["term"];
	
	$sql="SELECT DISTINCT section FROM FAQ;";
	$result=$dbh->query($sql);
    
	echo "<h2>Search Results</h2>";

		
		
        if($result != false)
        {
			if(mysqli_num_rows($result)>0)
			{
				
				while($row = mysqli_fetch_array($result))
				{
					$sql2="SELECT * FROM FAQ WHERE question LIKE '%".$term."%' AND section='".$row['section']."';";
					$result2=$dbh->query($sql2);
					if($result!=false)
					{
						if(mysqli_num_rows($result2)>0)
						{
							echo"<table class='table' width=100%>
										<thead>
										<tr>
											<th width='15%'>Question</th>
											<th width='30%'>Answer</th>
										</tr>
										</thead>
											";
							while($row2 = mysqli_fetch_array($result2))
							{
									echo 
									"
										<tr>
											<td><mark>".$row2['question']."</mark></td>
											<td>".$row2['answer']."</td>
										</tr>
									";
							}
							echo "</table>
							<br>
							";
						}
					}
				}
			
			}
        }

        else
        {
            echo "<tr><td colspan=4>ERROR: Could not able to execute $sql. " . mysqli_error($dbh->getConn())."</td></tr>";
        }
		
?>