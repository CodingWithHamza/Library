<?php

include ("includes/db.php");

// Get Real Ip Address
  function getRealIpAddr()
  {
    if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) )
    {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
    //to check ip passed from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }



//Getting the default for customers

function getDefault(){

  global $con;

  

  $c = $_SESSION['customer_email'];

  $get_c = "select * from customers where customer_email='$c' ";

  $run_c = mysqli_query($con, $get_c);

  $row_c = mysqli_fetch_array($run_c);
    
    $customer_id = $row_c['customer_id'];

    if (!isset($_GET['my_orders'])) {
      if (!isset($_GET['edit_account'])) {
        if (!isset($_GET['change_pass'])) {
          if (!isset($_GET['delete_account'])) {  

    

            $get_orders ="select * from customer_orders where customer_id='$customer_id' AND order_status='pending' ";

            $run_orders = mysqli_query($con , $get_orders);

            $count_orders = mysqli_num_rows($run_orders);

            if ($count_orders>0) {
              echo "

              <div style='padding:10px;'>
              <h1 Style = 'color:red; text-decoration:underline; '>Important! </h1>
              <h2>You have ($count_orders) Pending orders </h2>
              <h3>Please see your orders details by clicking this <a href='user_detail.php?my_orders'>Order Details</a><br>Or you can <a href='pay_offline.php' target='_blank'>Pay Offline Now</a></h3> 


              </div> ";

            }
            else
            {
              echo "

              <div style='padding:10px;'>
              <h1 Style = 'color:red; text-decoration:underline; '>Important! </h1>
              <h2>You have no pending orders! </h2>
              <h3>You can see your orders History by clicking this <a href='user_detail.php?my_orders'>Order Details</a><br>Or you can <a href='pay_offline.php'>Pay Offline Now</a></h3> 


              </div> ";

            }
          }
        }
      }
    }






}







  


//Getting the item function
function item_slider(){
  echo "<div class='slide'>
                        <img src='images/slide1.jpg' alt='slide1'>
                        <div class='content'>
                            <div class='title'>
                                <h3>welcome to Digital Library</h3>
                                <h5>Discover the best books online with us</h5>
                                <a href='shop.php' class='btn'>shop books</a>
                            </div>
                        </div>
                    </div>";

}

//Getting the item function
function item_slider1(){
  echo "<div class='slide'>
                        <img src='images/slide2.jpg' alt='slide1'>
                        <div class='content'>
                            <div class='title'>
                                <h3>welcome to Digital Library</h3>
                                <h5>Discover the best books online with us</h5>
                                <a href='shop.php' class='btn'>shop books</a>
                            </div>
                        </div>
                    </div>";

}

//Getting the item function
function item_slider2(){
  echo "<div class='slide'>
                        <img src='images/slide3.jpg' alt='slide1'>
                        <div class='content'>
                            <div class='title'>
                                <h3>welcome to Digital Library</h3>
                                <h5>Discover the best books online with us</h5>
                                <a href='shop.php' class='btn'>shop books</a>
                            </div>
                        </div>
                    </div>";

}

//Getting the item function
function item_slider3(){
  echo "<div class='slide'>
                        <img src='images/slide4.jpg' alt='slide1'>
                        <div class='content'>
                            <div class='title'>
                                <h3>welcome to Digital Library</h3>
                                <h5>Discover the best books online with us</h5>
                                <a href='shop.php' class='btn'>shop books</a>
                            </div>
                        </div>
                    </div>";

}


//Taking the item into the cart
function cart(){
    if (isset($_GET['add_cart'])) {

      global $con;


      $ip_add = getRealIpAddr();

      $b_id = $_GET['add_cart'];

      $check_pro ="select * from cart where ip_add='$ip_add' AND b_id='$b_id' ";

      $run_check =mysqli_query($con , $check_pro);

      if (mysqli_num_rows($run_check)>0) {
        echo "";
      }
      else{

        $q = "insert into cart (b_id,ip_add) values ('$b_id','$ip_add') ";

        $run_q = mysqli_query($con ,$q);

        echo "<script>window.open('product-single.php','_self') </script>";
      }

    }


  }


//Getting te number of items from the cart

  function items(){

    if (isset($_GET['add_cart'])) {
      global $con;

      $ip_add = getRealIpAddr();

      $get_items = "select * from cart where ip_add = '$ip_add' ";
       $run_items = mysqli_query($con , $get_items); 

       $count_items = mysqli_num_rows($run_items);


    }
    else{

      global $con;

      $ip_add = getRealIpAddr();

      $get_items = "select * from cart where ip_add = '$ip_add' ";
       $run_items = mysqli_query($con , $get_items); 

       $count_items = mysqli_num_rows($run_items);
  }

  echo "$count_items";


  }


//Getting the total price of items from the cart


function total_price(){

      $ip_add = getRealIpAddr();

      global $con;

      $total = 0;

      $sel_price = "select * from cart where ip_add='$ip_add' ";

      $run_price = mysqli_query($con, $sel_price);

      while ($record = mysqli_fetch_array($run_price)) {
        
        $pro_id = $record['b_id'];

        $pro_price = "select * from books where book_id= '$pro_id' ";

        $run_pro_price = mysqli_query($con,$pro_price);

        while ($p_price = mysqli_fetch_array($run_pro_price)){
          
          $book_price= array($p_price['book_price']);

          $values = array_sum($book_price);

          $total += $values;

        }
      }


      echo "$" .$total;


}

//Getting the Books

function get_books(){

  global $con;

      $get_books ="select * from books order by rand() LIMIT 0,4";
        $run_books =mysqli_query($con, $get_books);

        while ($row_books=mysqli_fetch_array($run_books)) {
          $b_id = $row_books['book_id'];
          $b_title = $row_books['book_title'];
          $b_desc = $row_books['book_desc'];
          $b_price = $row_books['book_price'];
          $b_image1 = $row_books['book_img1'];
          $b_image2 = $row_books['book_img2'];
          $b_image3 = $row_books['book_img3'];
          $b_file = $row_books['book_file'];

          echo " 
          <div class='item'>
                        <img src='admin_area/book_images/$b_image1' alt='img'>
                        <h3>$b_title</h3>
                        <h6><span class='price'>$ $b_price</span> / <a href='#'>Buy Now</a></h6>
                        <div class='hover'>
                            <a href='product-single.php?b_id=$b_id'>
                            <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                            </a>
                        </div>
                    </div>

          ";
        }


}




//Getting the Book detail

function get_bookDetail(){

  global $con;

      $get_books ="select * from books order by rand() LIMIT 0,10";
        $run_books =mysqli_query($con, $get_books);

        while ($row_books=mysqli_fetch_array($run_books)) {
          $b_id = $row_books['book_id'];
          $b_title = $row_books['book_title'];
          $b_desc = $row_books['book_desc'];
          $b_price = $row_books['book_price'];
          $b_image1 = $row_books['book_img1'];
          $b_image2 = $row_books['book_img2'];
          $b_image3 = $row_books['book_img3'];
          $b_file = $row_books['book_file'];

          echo " 
          <div class='item'>
                        <a href='product-single.php?b_id=$b_id'><img src='admin_area/book_images/$b_image1' alt='img'></a>
                        <div class='hover'>
                        <h3><a href='#''></a>$b_title</h3>
                        <h6><span class='price'>$b_price</span> / <a href='product-single.php?b_id=$b_id'>Buy Now</a></h6>
                    </div>

          ";
        }


}












?>

