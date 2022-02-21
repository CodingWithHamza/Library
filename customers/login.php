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
     

    <section class="static about-sec">
        <div class="container">
            <h1>My Account / Login</h1>
            
            <div class="form">
                <form method="post" action="">
                    
                        <tr>
                        <div class="col-md-5">
                            
                                <td>
                                    <input type="text" name="c_email" placeholder="Enter User Email" required>
                                    <span class="required-star">*</span>
                                </td>
                            
                        </div>
                        </tr>
                        <tr>
                        <div class="col-md-5">
                            
                                <td>
                                    <input type="password" name="c_pass" placeholder="Enter Password" required>
                                    <span class="required-star">*</span>
                                </td>
                            
                        </div>
                        </tr>
                        <div class="col-lg-8 col-md-12">
                            <input type="submit" name="c_login" value="Login" class="btn black" >
                            <h5>not Registered? <a href="register.php">REgister here</a></h5>
                        </div>
                    
                </form>
            </div>
        </div>
    </section>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>





<?php
if (isset($_POST['c_login'])) {
    $customer_email =$_POST['c_email'];
    $customer_pass = $_POST['c_pass'];

    $sel_customer ="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass' ";

    $run_customer =mysqli_query($con , $sel_customer);

    $check_customer =mysqli_num_rows($run_customer);

    $get_ip =getRealIpAddr();

    $sel_cart = "select * from cart where ip_add='$get_ip' ";

    $run_cart = mysqli_query($con , $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if ($check_customer == 0) {

        echo "<script>alert('Password or Email address is not correct,try again! ') </script> ";
        exit();
    }
    if ($check_customer==1 AND $check_cart==0) {

        $_SESSION['customer_email']=$customer_email;

        echo "<script>window.open('index.php','_self') </script>";
    }
    else
    {
        $_SESSION['customer_email']=$customer_email;

        echo "<script>alert('You successfully logged in, you can order now!')</script> ";

        
        echo "<script>window.open('checkout.php','_self') </script>";

    }
    

    
}



?>