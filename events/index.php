<!DOCTYPE html>
<?php
include 'constants.php';
?>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo @$title; ?></title>


    <!-- [ FONT-AWESOME ICON ] 
        
=========================================================================================================================-->

    <link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">


    <!-- [ PLUGIN STYLESHEET ]
        
=========================================================================================================================-->

    <link rel="shortcut icon" type="image/x-icon" href="images/icon.png">

    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

    <link rel="stylesheet" type="text/css" href="css/owl.theme.css">

    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

    <!-- [ Boot STYLESHEET ]
        
=========================================================================================================================-->

    <link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">

    <link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">

    <!-- [ DEFAULT STYLESHEET ] 
        
=========================================================================================================================-->

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">

    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <link rel="stylesheet" type="text/css" href="css/color/themecolor.css">


</head>

<body>

    <!-- [ LOADERs ]

================================================================================================================================-->

    <div class="preloader">

        <div class="loader theme_background_color">

            <span></span>


        </div>
    </div>
    <!-- [ /PRELOADER ]

=============================================================================================================================-->

    <!-- [WRAPPER ]

=============================================================================================================================-->

    <div class="wrapper">

        <!-- [NAV]
 
============================================================================================================================-->

        <!-- Navigation
    ==========================================-->

        <nav class=" nim-menu navbar navbar-default navbar-fixed-top">

            <div class="container">

                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header">

                <nav class="navbar">
                    <!-- <img class="logo" id="logo" src="" alt="Event Management system"> -->
                    <input class="menu-btn" type="checkbox" id="menu-btn" />
                    <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
                    <!-- Menu-->
                    <ul class="menu">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#two">About us</a></li>
                        <li><a href="">Contact</a></li>
                        <li class="has-dropdown">
                            <a onclick="toggleDropdown(this)">Login/Sign Up</a>
                            <ul>
                                <li><a href="pro/adminsignin.php">Admin</a></li>
                                <li><a href="pro/organizer_signin.php">Event Organizer</a></li>
                                <li><a href="pro/signin.php">Customer</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                    <a class="navbar-brand" href="index.php"><?php echo $title[0]; ?><span class="themecolor">
                            <?php echo $title[1]; ?></span><?php for ($i = 2; $i < strlen($title); $i++) echo $title[$i]; ?></a>

                </div>


                <!-- Collect the nav links, forms, and other content for toggling -->
                
                

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- nav/menu -->
               
                </div>
                <!-- /.navbar-collapse -->

            </div><!-- /.container-fluid -->

        </nav>



        <!-- [/NAV]
 
============================================================================================================================-->


        <!-- [/MAIN-HEADING]
 
============================================================================================================================-->

        <section class="main-heading" id="home">

            <div class="overlay">

                <div class="container">

                    <div class="row">

                        <div class="main-heading-content col-md-12 col-sm-12 text-center">

                            <h1 class="main-heading-title"><span class="main-element themecolor"
                                    data-elements=" Egerton E-Ticket,  Egerton E-Ticket, Egerton E-Ticket "></span></h1>

                            <h1 class="main-heading-title"><span class="main-element themecolor"
                                    data-elements=" Reservation System, Reservation System, Reservation System"></span>
                            </h1>

                            <p class="main-heading-text">WELCOME TO,<br />E - TICKETING FOR EVENT BOOKINGS</p>

                            <div class="btn-bar">

                                <a href="pro/signin.php" class="btn btn-custom theme_background_color">Book your tickets Now</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </section>

        <section class="main-heading" id="home">

            <div class="overlay">

                <div class="container">

                    <div class="row">

                        <div class="main-heading-content col-md-12 col-sm-12 text-center">

                            <h1 class="main-heading-title">EGERTON EVENTS Co. Contact List</h1>

                            <p class="main-heading-text">Get your event Tickets from the comfort of your home.<br>
Book event tickets from anywhere using the robust ticketing platform exclusively built to provide the customers with pleasant ticketing experience.
                                
                            </p>

                            <div class="btn-bar">
                               
                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </section>


        <!-- [/MAIN-HEADING]
 
============================================================================================================================-->



        <!-- [ABOUT US]
 
============================================================================================================================-->

        <section class="aboutus white-background black" id="two">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 text-center black">

                        <h3 class="title">ABOUT <span class="themecolor">US</span></h3>

                        <p class="a-slog">Developed By <?php echo $developer_name; ?> 
                            and Supervised By <?php echo $supervisor_name; ?></p>

                    </div>

                </div>

                <div class="gap">


                </div>


                <div class="row about-box">

                    <div class="col-sm-4 text-center">

                        <div class="margin-bottom">

                            <i class="fa fa-newspaper-o"></i>

                            <h4>Get Event Tickets from the comfort of your home</h4>

                            <p class="black">Book Event tickets from anywhere using the robust ticketing platform
                                exclusively built to provide the customers with pleasant ticketing experience. </p>

                        </div> <!-- / margin -->

                    </div> <!-- /col -->

                    <div class="col-sm-4 about-line text-center">

                        <div class="margin-bottom">

                            <i class="fa fa-event"></i>

                            <h4>Event Ticketing related information at your fingertips</h4>

                            <p class="black">Checkout available events, venue information, cost information on real time
                                basis with Egerton e-ticketing.</p>

                        </div> <!-- / margin -->

                    </div><!-- /col -->

                    <div class="col-sm-4 text-center">

                        <div class="margin-bottom">

                            <i class="fa fa-dollar"></i>

                            <h4>Pay Securely</h4>

                            <p class="black">Online payment. (NO REFUND!)</p>

                        </div> <!-- / margin -->

                    </div><!-- /col -->

                </div> <!-- /row -->





            </div>
        </section>



        <footer class="site-footer section-spacing text-center " id="eight">


            <div class="container">

                <div class="row">

                    <div class="col-md-4">

                        <p class="footer-links"><a href="#">Terms of Use</a> <a href="#">Privacy Policy copyright@2024</a></p>

                    </div>

                </div>

            </div>

        </footer>




        <!-- [/FOOTER]
 
============================================================================================================================-->




    </div>


    <!-- [ /WRAPPER ]

=============================================================================================================================-->


    <!-- [ DEFAULT SCRIPT ] -->

    <script src="library/modernizr.custom.97074.js"></script>

    <script src="library/jquery-1.11.3.min.js"></script>

    <script src="library/bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

    <!-- [ PLUGIN SCRIPT ] -->

    <script src="library/vegas/vegas.min.js"></script>

    <script src="js/plugins.js"></script>

    <!-- [ TYPING SCRIPT ] -->

    <script src="js/typed.js"></script>

    <!-- [ COUNT SCRIPT ] -->

    <script src="js/fappear.js"></script>

    <script src="js/jquery.countTo.js"></script>

    <!-- [ SLIDER SCRIPT ] -->

    <script src="js/owl.carousel.js"></script>

    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/SmoothScroll.js"></script>


    <!-- [ COMMON SCRIPT ] -->
    <script src="js/common.js"></script>
    <!-- <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
            }
        }
        }
    </script> -->
    <script>
    function toggleDropdown(link) {
      var dropdown = link.parentNode;
      // Toggle the active state of the dropdown
      dropdown.classList.toggle('active');

      // Close the dropdown when clicking outside
      if (!dropdown.classList.contains('active')) {
        document.removeEventListener('click', closeDropdown);
      } else {
        document.addEventListener('click', closeDropdown);
      }

      function closeDropdown(event) {
        if (!dropdown.contains(event.target)) {
          dropdown.classList.remove('active');
          document.removeEventListener('click', closeDropdown);
        }
      }
    }
  </script>
</body>


</html>