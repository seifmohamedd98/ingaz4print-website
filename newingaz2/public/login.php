<?php 
//define('__ROOT__', "../app/");
//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\model\\user_php.php");
//require_once("C:\\xampp\\htdocs\\ingazclasses\\app\\controller\\UserController.php");

require_once(__ROOT__ . "model\user_php.php");
require_once(__ROOT__ . "controller\UserController.php");

// require_once(__ROOT__ . "view/bar.php");

$model = new user();
$controller = new UserController($model);
?>

<li>
            <a href='#' onclick="document.getElementById('id01').style.display='block'"><span class="glyphicon glyphicon-log-in"></span> Login</a>

            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                    </div>

                    <form action="home.php?action=loginController" method="post" class="w3-container" >
                        <div class="w3-section">
                            <label><b>Username</b></label>
                            <input type="text" class="w3-input w3-border w3-margin-bottom" id="uname" placeholder="Enter Username" name="username" required><br>

                            <label><b>Password</b></label>
                            <input type="password" class="w3-input w3-border" id="pwd" placeholder="Enter password" name="password" required ><br>

                            <button type="submit" class="w3-button w3-block w3-section w3-padding" style="background-color:#ffc60b; color:black; font-size:20px;" name="submitlog">Login</button>

                        </div>
                    </form>

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">

                    <input type="button" value="Cancel" onclick="document.getElementById('id01').style.display='none'" class="btn" style="background-color:black; color:#ffc60b;">
                    </div>

                </div>
            </div>
        </li> 
        <!-------------------------------------------------------End of Login---------------------------------------------------------------->