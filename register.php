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
                        
                       
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">Register</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h1>My Account / REgister</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem </p>
            <div class="form">
                <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                        <div class="col-md-4">
                            <td>
                            <input type="text" name="c_name" placeholder="Customer Name" required>
                            <span class="required-star">*</span>
                            </td>
                        </div>
                    </tr>

                    <tr>
                        <div class="col-md-4">
                            <td>
                            <input type="text" name="c_email" placeholder="Customer Email"  required>
                            <span class="required-star">*</span>
                            </td>
                        </div>
                    </tr>

                    <tr>
                        <div class="col-md-4">
                            <td>
                            <input type="Password" name="c_pass" placeholder="Customer Password" required>
                            <span class="required-star">*</span>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="col-md-4">
                            <td>
                            <input type="text" name="c_country" placeholder="Customer Country" required>
                            <span class="required-star">*</span>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="col-md-4">
                            <td>
                            <input type="text" name="c_city" placeholder="Customer City" required>
                            <span class="required-star">*</span>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="col-md-4">
                            <td>
                            <input type="text" name="c_contact" placeholder="Customer Contact" required>
                            <span class="required-star">*</span>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="col-md-4">
                            <td>
                            <input type="text" name="c_address" placeholder="Customer Address" required>
                            <span class="required-star">*</span>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="col-md-4">
                            <td><b align="right">Enter Image:</b></td>
                            <td>
                                <input type="file" name="c_image" required>
                                <span class="required-star">*</span>
                            </td>
                            
                        </div>
                    </tr>
                        <div class="col-lg-8 col-md-12">
                            <input type="submit" name="register" class="btn black"> Register</button>
                            <h5>not Registered? <a href="login.php">Login here</a></h5>
                        </div>
                    
                </form>
            </div>
        </div>
    </section>
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




<?php 
if (isset($_POST['register'])) {
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_pass=$_POST['c_pass'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];
    $c_image=$_FILES['c_image']['name'];
    $c_image_temp =$_FILES['c_image']['tmp_name'];

    $c_ip = getRealIpAddr();

    move_uploaded_file($c_image_temp, "customers/customer_photos/$c_image");

    $insert_customer= "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip') ";


    $run_customer=mysqli_query($con,$insert_customer);

     

    $sel_cart = "select *from cart where ip_add='$c_ip' ";

    $run_cart = mysqli_query($con , $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart>0) {
        
        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('Account Created Successfully, Thanks You!') </script>";

        echo " <script>window.open('index.php','_self') </script> ";
    }
    else
    {
        $_SESSION['customer_email']=$c_email;

        echo " <script>window.open('index.php','_self') </script> ";

    }


}



?>
