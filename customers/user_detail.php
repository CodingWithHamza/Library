<?php 

session_start();
include ("includes/db.php");
include ("functions/function.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Digital Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body>
   <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><img src="images/logo.jpg" alt="logo"></div>

                    <div class="col-md-5"></div>

                    <div class="col-md-4">
                        
                        <form method="get" action="products.php" enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" name="user_query" placeholder="Search here..." aria-label="Search">
                            <input type="submit" name="search" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <h3 style="color:#FFB233">Digital Library</h3>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="color: #FFB233" >
                        <ul class="navbar-nav ml-auto"> 
                            <li class="navbar-item active">
                                <a href="../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="navbar-item">
                                <a href="../shop.php" class="nav-link">Shop</a>
                            </li>
                            <li class="navbar-item">
                                <a href="../about.php" class="nav-link">About</a>
                            </li>
                            <li class="navbar-item">
                                <a href="user_detail.php" class="nav-link">My Account</a>
                            </li>
                            <li class="navbar-item">
                                
                                <?php
                            if (!isset($_SESSION['customer_email'])) {
                                
                            echo "<a href='checkout.php' class='nav-link'>Login</a> ";
                        }
                        else{
                            echo "<a href='logout.php' class='nav-link'>Logout</a> ";
                        }

                            ?>

                            </li>

                            <li class="navbar-item">
                                <a href="" class="nav-link">
                                    <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<b style='color: #FFB233;'>Welcome Guest!</b> "; 
                        }
                        else
                        {
                            echo "<b>Welcome:" . "<span style='color:skyblue'>" . $_SESSION['customer_email'] . "</span>" . "</b>" ;

                        }
                        
                        ?> 

                    </a>
                            </li>


                        </ul>
                        <div class="cart my-2 my-lg-0">
                            <span>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            <span class="quntity"><?php items(); ?> -Price:<?php total_price();?></span>
                            
                        </div>
                       
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="../index.php">Home</a>
            <span class="breadcrumb-item active">Manage account</span>
        </div>
    </div>
   <div style="background-color: #185578; padding: 10px; "><center><h6><b style="color: #FFB233;">Manage Account</b></h6></center></div>
    <div id="content">
      
        <div id="content_left">
          <div class="content_left_section">

              	      <div class="content_left_section">
				              
				               <picture>


                                <?php 

                    if (isset($_SESSION['customer_email'])) {

                        $customer_session = $_SESSION['customer_email'];

                        $get_customer_pic = "select * from customers where customer_email='$customer_session' ";

                        $run_customer = mysqli_query($con,$get_customer_pic);

                        $row_customer= mysqli_fetch_array($run_customer);

                        $customer_pic= $row_customer['customer_image'];

                        echo "<img src='customer_photos/$customer_pic' alt='picture' width='150' height='150'";

                    }
                    else
                    {
                        echo "<script>window.open('checkout.php','_self') </script>"; 

                    }
                                        

                    ?></picture>  
				        </div>


                <ul>
                    <li><a href="user_detail.php?my_orders">My Orders</a></li>
                    <li><a href="user_detail.php?edit_account">Edit Account</a></li>
                    <li><a href="user_detail.php?delete_account">Delete Account </a></li>
                    <li><a href="logout.php">Logout</a></li>

                    
              </ul>
            </div>
        </div>



<div id="content_right">
          <div class="content_right_section">

                      <div class="content_right_section">

<?php  

                getDefault();
 
                if (isset($_GET['my_orders'])) {

                    include("my_orders.php");
                }

                if (isset($_GET['edit_account'])) {
                    
                    include("edit_account.php");
                }


                if (isset($_GET['change_pass'])) {
                    
                    include("change_pass.php");
                }

                if (isset($_GET['delete_account'])) {
                    
                    include("delete_account.php");
                }


                ?>




        </div>
    </div>
</div>





    </div>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h6>Digital Library.G.T Road shalamar town
                        Beside shalamar guarden, Lahore Pakistan</h6>
                        <h6>Call : 0306-0481445</h6>
                        <h6>Email : Digitallibrary@gmail.com</h6>
                    </div>
                    <div class="timing">
                        <h4>Timing</h4>
                        <h6>Mon - Fri: 7am - 10pm</h6>
                        <h6>​​Saturday: 8am - 10pm</h6>
                        <h6>​Sunday: 8am - 11pm</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="navigation">
                        <h4>Navigation</h4>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="terms-conditions.html">Terms</a></li>
                            <li><a href="products.html">Products</a></li>
                        </ul>
                    </div>
                    <div class="navigation">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="">Shipping & Returns</a></li>
                            <li><a href="privacy-policy.html">Privacy</a></li>
                            <li><a href="faq.html">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Quick Contact us</h3>
                        <h6>We are now offering some good discount 
                            on selected books go and shop them</h6>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input placeholder="Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Messege"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn black">Alright, Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>(C) 2020 All Rights Reserved.Digitl Library</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="share align-middle">
                            <span class="fb"><i class="fa fa-facebook-official"></i></span>
                            <span class="instagram"><i class="fa fa-instagram"></i></span>
                            <span class="twitter"><i class="fa fa-twitter"></i></span>
                            <span class="pinterest"><i class="fa fa-pinterest"></i></span>
                            <span class="google"><i class="fa fa-google-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>