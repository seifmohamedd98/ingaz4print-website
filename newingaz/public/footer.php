<!DOCTYPE html>
<html>
    <head>
        <title>INGAZ | Footer</title>
        <meta charset="UTF-8"> <!-- 3ashan a3raf akteb 3araby -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   <!-- 3ashan a3raf ash8lo 3ala ay device // Bootstrap -->
        <!-- <link rel="stylesheet" type="text/css" href="Headerandfooter_CSS.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- 3ashan icons el social media-->   


        <!-- links of bootstrap 3 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style>
            footer 
            {
            background-color: #ffc60b;
            color: black;
            padding: 10px;
            }
            .fa
            {
            padding: 10px;
            font-size: 25px;
            width: 50px;
            margin:0px 3px;
            text-align: center;
            border-radius: 50%;
            
            }
            .fa:hover
            {
            opacity: 0.9;
            }
            .fa-facebook
            {
            background: #3B5998;
            color: white;
            
            }
            .fa-twitter
            {
            background: #55ACEE;
            color: white;
            }
            .fa-whatsapp
            {
            background: #25D336;
            color: white;
            }
            .fa-whatsapp:hover
            {
            background: #25D336;
            color: white;
            }
            .copyrights
            {
            text-align:center;
            margin-top:10px;
            }
            #myBtn 
            {
            display: none;
            position: fixed;
            bottom: 10px;
            right: 15px;
            font-size: 20px;
            border: none;
            outline: none;
            background-color: black;
            color: white;
            cursor: pointer;
            padding: 10px;
            border-radius: 45px;
            }

            #myBtn:hover
            {
            opacity:0.5;
            }
        </style>
    </head>

    <body>
        <footer class="container-fluid text-center">
            <div class="footer-section contact">
                <span style="font-size:40px" ><b>Contact us</b></span>
                <br>
                <i class="fa fa-phone" style="font-size:20px; width: 30px;"></i>123-456-789
                <i class="fa fa-envelope" style="font-size:20px; width: 30px;"></i>info@ingaz.com
                <br>
                <i class="fa fa-home" style="font-size:20px; width: 30px;" ></i>Nasr City   
            </div>

            <div class="footer-section links">
                <h2>Follow us on Social Media</h2>
                <a href="https://www.facebook.com" class="fa fa-facebook"></a>
                <a href="https://www.twitter.com" class="fa fa-twitter" style="text-decoration:none"></a>
                <a href="https://www.whatsapp.com" class="fa fa-whatsapp" style="text-decoration:none" title="we will write mobile number"></a>
            </div>

            <div class="copyrights">
                Copyrights 2020 &copy; ingaz.com | All rights reserved
            </div>
        </footer>
      
        <!-------------------------------------------------------End of Footer---------------------------------------------------------------->
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="fa fa-angle-up" style="font-size:30px;"></button>
        <script>
            var mybutton = document.getElementById("myBtn");
            window.onscroll = function() {scrollFunction()};
            function scrollFunction() 
            {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) 
                {
                    mybutton.style.display = "block";
                } 
                else
                {
                 mybutton.style.display = "none";
                }
            }
            function topFunction() 
            {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>

        <!-- GetButton.io widget -->
        <script type="text/javascript">
            (function () {
                var options = {
                    whatsapp: "+201142602024", // WhatsApp number
                    email: "seifmohamedvilla@gmail.com", // Email
                    call_to_action: "Contact us", // Call to action
                    button_color: "black", // Color of button
                    position: "left", // Position may be 'right' or 'left'
                    order: "whatsapp,email", // Order of buttons
                };
                var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
        </script>
        <!-- /GetButton.io widget -->

    </body>
</html>
