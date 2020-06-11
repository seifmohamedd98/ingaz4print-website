<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ingaz";

    $con = mysqli_connect($servername, $username, $password, $dbname);


    $term = $_POST["term"];
    
    $sql="SELECT * FROM users";

    echo"<table class='table' border=1 width=100%>
        <tr><th class='p-3 mb-2 bg-primary'>Username</th><th class='p-3 mb-2 bg-primary text-white'>Email</th><th class='p-3 mb-2 bg-primary text-white'>Action</th></tr>";
    
        if(!empty($term))
        {
            // $sql = $sql." WHERE username LIKE '%" . $term . "%' and access = 'internal' ";
            $sql = $sql." WHERE username LIKE '%" . $term . "%' and email LIKE '%" . $term . "%' and access = 'internal'; ";
        }

        if($result = mysqli_query($con, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    // echo "<tr class='p-3 mb-2 bg-info'><td>" . $row['username'] . "</td></tr>";
                    echo "<tr class='p-3 mb-2 bg-info'><td>" . $row['username'] . "</td><td>".$row["email"]."</td><td><a href=\"DeleteinternalAccount.php?action=Deleteinternal&id=".$row["id"]."\" onClick=\"return confirm('Are you sure you want to delete this Account?')\">Delete</a></td></tr>";

                }
            } 
            else
            {
                echo "<tr ><td colspan=4 class='p-3 mb-2 bg-danger'>No matches found</td></tr>";
                
            }
        }

        else
        {
            echo "<tr><td colspan=4>ERROR: Could not able to execute $sql. " . mysqli_error($con)."</td></tr>";
        }
        mysqli_close($con);

?>