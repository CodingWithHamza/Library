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
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="navbar-item">
                                <a href="shop.php" class="nav-link">Books</a>
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
                echo "<li class='navbar-item'><a href='checkout.php' class='nav-link'> My Account </a> </li>";
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
                            echo "<b style='color: #FFB233;' >Welcome Guest!</b> "; 
                        }
                        else
                        {
                            echo "<b>Welcome:" . "<span style='color: #FFB233;'>" . $_SESSION['customer_email'] . "</span>" . "</b>" ;

                        }
                        
                        ?> 

                    </a>
                            </li>


                        </ul>

                        <!-- <form method="get" action="products.php" enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" name="user_query" placeholder="Search here..." aria-label="Search">
                            <input type="submit" name="search" value="Search">
                        </form> -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <section class="slider">
        <div class="container">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <div class="item">
                    <?php 
                    item_slider();
                    ?>
                </div>
                <div class="item">
                    <?php 
                    item_slider1();
                    ?>
                </div>
                <div class="item">
                    <?php 
                    item_slider2();
                    ?>
                </div>
                <div class="item">
                    <?php 
                    item_slider3();
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="recomended-sec">
        <div class="container">
            <div class="title">
                <h2>highly recommendes books</h2>
                <hr>
            </div>
            <?php 
            getRealIpAddr();

            ?>
            <div class="row">
                    
                    <?php
                    get_books();

                    ?>

               
                
            </div>
        </div>
    </section>
    <section class="about-sec">
        <div class="about-img">
            <figure style="background:url(./images/about-img.jpg)no-repeat;"></figure>
        </div>
        <div class="about-content">
            <h2>About Us</h2>
            Digital Library system is an organizing and managing the library tasks. Library is place where all kind of books are available. Users can access all kinds of books present on this site. Users can View books just by registration. User can search, view and read a book using this web application.<br> This system provides separate interface and login for admin and users.
			<br> This system also provides the funtionality to search and view thesis, uploaded by the students. 		
            <div class="btn-sec">
                <a href="shop.php" class="btn yellow">View books</a>
                <a href="login.php" class="btn black">Login Now</a>
            </div>
        </div>
    </section>
    <section class="recent-book-sec">
        <div class="container">
            <div class="title">
                <h2>Highly recommendes books</h2>
                <hr>
            </div>
            <div class="row">
                    <?php 
                    get_bookDetail();
                    ?>
                
            </div>
            <div class="btn-sec">
                <a href="#" class="btn gray-btn">view all books</a>
            </div>
        </div>
    </section>
    <section class="features-sec">
        <div class="container">
            <ul>
                <li>
                    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <h3>View Books</h3>
                    
                    <h6>Get Register yourself now to view Books. You can also download the Books.</h6>
                </li>
                <li>
                    <span class="icon return"><i class="fa fa-reply-all" aria-hidden="true"></i></span>
                    <h3>View Thesis</h3>
                    
                    <h6>You can find here Final year Research Paper and Thesis work, provided by students.</h6>
                </li>
                <li>
                    <span class="icon chat"><i class="fa fa-comments" aria-hidden="true"></i></span>
                    <h3>24/7 SUPPORT</h3>
                    
                    <h6>Digital library will be available throughout the day</h6>
                </li>
            </ul>
        </div>
    </section>
<!--     <section class="offers-sec" style="background:url(images/offers.jpg)no-repeat;">
        <div class="cover"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail">
                        <h3>Top 50% OFF on Selected</h3>
                        <h6>We are now offering some good discount 
                    on selected books go and shop them</h6>
                        <a href="products.php" class="btn blue-btn">view all books</a>
                        <span class="icon-point percentage">
                            <img src="images/precentagae.png" alt="">
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail">
                        <h3>Shop $ 500 Above and Get Extra!</h3>
                        <h6>We are now offering some good discount 
                    on selected books go and shop them</h6>
                        <a href="products.php" class="btn blue-btn">view all books</a>
                        <span class="icon-point amount"><img src="images/amount.png" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section class="testimonial-sec">
        <div class="container">
            <div id="testimonal" class="owl-carousel owl-theme">
                <div class="item">
                    <h3>"I have always imagined that Paradise will be a kind of a Library."</h3>
                    <div class="box-user">
                        <h4 class="author">Prof.Dr.Imran Sarwar Bajwa</h4>
                        <span class="country">Bahawalpur,Pakisan</span>
                    </div>
                </div>
                <div class="item">
                    <h3>“If you have a library, then you have everything you need.”</h3>
                    <div class="box-user">
                        <h4 class="author">Prof.Ibrahim</h4>
                        <span class="country">Bahawalpur,Pakistan</span>
                    </div>
                </div>
                <div class="item">
                    <h3>“Today is a reader tomorrow will be a leader.”</h3>
                    <div class="box-user">
                        <h4 class="author">Prof.Dr.Umar</h4>
                        <span class="country">Prof.Pakisan</span>
                    </div>
                </div>
                
                    </div>
                </div>
            </div>
        </div>
        <div class="left-quote">
            <img src="images/left-quote.png" alt="quote">
        </div>
        <div class="right-quote">
            <img src="images/right-quote.png" alt="quote">
        </div>
    </section>

<!--footer-->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h4>Our Address</h4>
                        <h6>Sir Sadiq Muhammad Khan Liabrary,Islamia University of Bahawalpur,Pakistan</h6>
                        <h6>Call :  (062) 9255482 </h6>
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
                            <li><a href="shop.php">Books</a></li>
                            <li><a href="all_records.php">Thesis</a></li>
                            
                        </ul>
                    </div>
                    <div class="navigation">
                       
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