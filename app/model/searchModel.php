<?php
require_once(__ROOT__ . "model\Model.php");
class search extends Model
{
    private $term; 
    private $dbh;

    function __construct($term="")
    {
        $this->term=$term;
    }

    public function viewmessagesuser($term)
    {
    
        $term = $_POST["term"];
    
        $sql="SELECT subject FROM messages";

        $dbh = new DBh();

        $result = $dbh->query($sql);

              


        echo"<table class='table' border=1 width=100%>
            <tr><th class='p-3 mb-2 bg-primary'>Subjects That You Have</th></tr>";

            if(!empty($term))
            {
                $sql = $sql." WHERE subject LIKE '%" . $term . "%' and receiver = '" . $_SESSION['username'] ."' ";
            }

            if($result)
            {
                if($row=mysqli_fetch_assoc($result) > 0)
                {
                    while($row=$dbh->fetchRow())
                    {
                        echo "<tr class='p-3 mb-2 bg-info'><td>" . $row['subject'] . "</td></tr>";
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
           $dbh->__destruct();
        
    }


}

?>