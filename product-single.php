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
    <link rel="stylesheet" href="css/styles.css">
</head>

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
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="navbar-item">
                                <a href="shop.php" class="nav-link">Shop</a>
                            </li>
                            <li class="navbar-item">
                                <a href="about.php" class="nav-link">About</a>
                            </li>
                           <?php
                if (!isset($_SESSION['customer_email'])) {
                 
                 
                echo " <li class='navbar-item'>
                                <a href='checkout.php' class='nav-link'> My Account</a>
                            </li> ";
            }else
            {
                echo "<li><a href='customers/user_detail.php'> My Account </a> </li>";
            }
                ?>
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
            <a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">Terms and Condition</span>
        </div>
    </div>
    <section class="product-sec">
        <div class="container">

            <?php 

                if (isset($_GET['b_id'])) {
                    $book_id= $_GET['b_id'];
                
                

                $get_books = "select * from books where book_id='$book_id'";
                
				$run_books = mysqli_query($con, $get_books);

                while ($row_books=mysqli_fetch_array($run_books)) {
                    $b_id = $row_books['book_id'];
                    $b_title = $row_books['book_title'];
                    $b_short_desc = $row_books['book_short_desc'];
                    $b_desc = $row_books['book_desc'];
                    $b_price = $row_books['book_price'];
                    $b_image1 = $row_books['book_img1'];
                    $b_image2 = $row_books['book_img2'];
                    $b_image3 = $row_books['book_img3'];
                    $b_file = $row_books['book_file'];


                    
                        

                        if ($b_price==1) {

                        echo "<h1>$b_title</h1>
            <div class='row'>
                <div class='col-md-6 slider-sec'>
                    <!-- main slider carousel -->
                    <div id='myCarousel' class='carousel slide'>
                        <!-- main slider carousel items -->
                        <div class='carousel-inner'>
                            <div class='active item carousel-item' data-slide-number='0'>
                                <img src='admin_area/book_images/$b_image1' class='img-fluid'>
                            </div>
                            <div class='item carousel-item' data-slide-number='1'>
                                <img src='admin_area/book_images/$b_image2' class='img-fluid'>
                            </div>
                            <div class='item carousel-item' data-slide-number='2'>
                                <img src='admin_area/book_images/$b_image3' class='img-fluid'>
                            </div>
                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class='carousel-indicators list-inline'>
                            <li class='list-inline-item active'>
                                <a id='carousel-selector-0' class='selected' data-slide-to='0' data-target='#myCarousel'>
                                <img src='admin_area/book_images/$b_image1' class='img-fluid'>
                            </a>
                            </li>
                            <li class='list-inline-item'>
                                <a id='carousel-selector-1' data-slide-to='1' data-target='#myCarousel'>
                                <img src='admin_area/book_images/$b_image2' class='img-fluid'>
                            </a>
                            </li>
                            <li class='list-inline-item'>
                                <a id='carousel-selector-2' data-slide-to='2' data-target='#myCarousel'>
                                <img src='admin_area/book_images/$b_image3' class='img-fluid'>
                            </a>
                            </li>
                        </ul>
                    </div>
                    <!--/main slider carousel-->
                </div>
                <div class='col-md-6 slider-content'>
                    <p> $b_short_desc </p>
                    <p> $b_desc </p>
                    <ul>
                        
                        <li>
                            <span class='name'></span><span class='clm'>:</span>
                            <span class='price final'></span>
                        </li>
                        
                    </ul>
                    <div class='btn-sec'>
                         
                        <a href='admin_area/book_files/$b_file' target='_blank'><button class='btn'>Download Now</button></a>
                </div>
            </div>";



                    }


                    


                     else


                    {

                    echo "<h1>$b_title</h1>
            <div class='row'>
                <div class='col-md-6 slider-sec'>
                    <!-- main slider carousel -->
                    <div id='myCarousel' class='carousel slide'>
                        <!-- main slider carousel items -->
                        <div class='carousel-inner'>
                            <div class='active item carousel-item' data-slide-number='0'>
                                <img src='admin_area/book_images/$b_image1' class='img-fluid'>
                            </div>
                            <div class='item carousel-item' data-slide-number='1'>
                                <img src='admin_area/book_images/$b_image2' class='img-fluid'>
                            </div>
                            <div class='item carousel-item' data-slide-number='2'>
                                <img src='admin_area/book_images/$b_image3' class='img-fluid'>
                            </div>
                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class='carousel-indicators list-inline'>
                            <li class='list-inline-item active'>
                                <a id='carousel-selector-0' class='selected' data-slide-to='0' data-target='#myCarousel'>
                                <img src='admin_area/book_images/$b_image1' class='img-fluid'>
                            </a>
                            </li>
                            <li class='list-inline-item'>
                                <a id='carousel-selector-1' data-slide-to='1' data-target='#myCarousel'>
                                <img src='admin_area/book_images/$b_image2' class='img-fluid'>
                            </a>
                            </li>
                            <li class='list-inline-item'>
                                <a id='carousel-selector-2' data-slide-to='2' data-target='#myCarousel'>
                                <img src='admin_area/book_images/$b_image3' class='img-fluid'>
                            </a>
                            </li>
                        </ul>
                    </div>
                    <!--/main slider carousel-->
                </div>
                <div class='col-md-6 slider-content'>
                    <p> $b_short_desc </p>
                    <p> $b_desc </p>
                    <ul>
                        
                        <li>
                            <span class='name'></span><span class='clm'>:</span>
                            <span class='price final'>$</span>
                        </li>
                        
                    </ul>
                    <div class='btn-sec'>
                       <a href='admin_area/book_files/$b_file' target='_blank'><button class='btn'>View Book</button></a>
                    </div>
                </div>
            </div>";

            }

                   

                }

            }
            



                    ?>

                    <?php

                    cart();

                    ?>


            
        </div>
    </section>
    <section class="related-books">
        <div class="container">
            <h2>You may also like these book</h2>
            <div class="recomended-sec">
                <div class="row">
                    
                        <?php
                    get_books();

                    ?>
                    
                </div>
            </div>
        </div>
    </section>


    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h4>Our Address</h4>
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
                        <h4 style="color: #FFF;">Navigation</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="privacy-policy.php">Privacy Policy</a></li>
                            <li><a href="terms-conditions.php">Terms</a></li>
                            <li><a href="products.php">Products</a></li>
                        </ul>
                    </div>
                    <div class="navigation">
                        <h4 style="color: #FFF;">Help</h4>
                        <ul>
                            <li><a href="">Shipping & Returns</a></li>
                            <li><a href="privacy-policy.php">Privacy</a></li>
                            <li><a href="faq.php">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Quick Contact us</h3>
                        <h6>We are now offering some good discount 
                            on selected books go and shop them</h6>
                        
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