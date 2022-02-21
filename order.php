<?php 
 

session_start();
include ("includes/db.php");
include ("functions/function.php");




// Getting cudtomer ID

if (isset($_GET['c_id'])) {
	$customer_id = $_GET['c_id'];

  $c_email="select * from customers where customer_id='$customer_id' "; 

  $run_email =mysqli_query($con, $c_email);

  $row_email=mysqli_fetch_array($run_email);

  $customer_email=$row_email['customer_email'];

  $customer_name=$row_email['customer_name'];

}

// Geting product price and number of items

$ip_add = getRealIpAddr();

  		$total = 0;

  		$sel_price = "select * from cart where ip_add='$ip_add' ";

  		$run_price = mysqli_query($con, $sel_price);

  		$status ='Pending';

  		$invoice_no = mt_rand();

      $i= 0;

      $count_pro =mysqli_num_rows($run_price); 

  		while ($record = mysqli_fetch_array($run_price)) {
  			
  			$book_id = $record['b_id'];

  			$b_price = "select * from books where book_id= '$book_id' ";

  			$run_b_price = mysqli_query($con,$b_price);

  			while ($p_price = mysqli_fetch_array($run_b_price)){

          $book_name=$p_price['book_title'];
  				
  				$book_price= array($p_price['book_price']);

  				$values = array_sum($book_price);

  				$total += $values;

          $i++;

  			}
  		}


      //Getting Quantity from the cart

$get_cart = "select * from cart where ip_add='$ip_add' ";

$run_cart = mysqli_query($con ,$get_cart);

$get_qty = mysqli_fetch_array($run_cart);

$qty = $get_qty['qty'];

if ($qty==0) {
  
  $qty=1;

  $sub_total =$total;

}
else
{
  $qty = $qty;

  $sub_total = $total * $qty;
}

$insert_order ="insert into customer_orders (customer_id, due_amount, invoice_no, total_books, order_date, order_status ) values ( '$customer_id','$sub_total', '$invoice_no', '$count_pro',NOW(), '$status' ) ";

$run_order =mysqli_query($con ,$insert_order);


  echo "<script>alert('Order Successfully Submitted, Thanks!') </script>  ";

  echo "<script>window.open('customers/user_detail.php','_self') </script>  ";

  $insert_to_pending_orders ="insert into pending_orders (customer_id, invoice_no, book_id, qty, order_status) values('$customer_id', '$invoice_no', '$book_id', '$qty', '$status') ";

  $run_pending_order = mysqli_query($con , $insert_to_pending_orders);

  $empty_cart="delete from cart where ip_add='$ip_add' ";

  $run_empty =mysqli_query($con, $empty_cart);



  $from = 'safbrothers@gmail.com';

        $subject = 'Order Details';

        $message = "
        <html>

        <p>Hello Dear <b style='color:blue;'>$customer_name</b> you have ordered some products on our website my.mysite.com,please find your orde details below and pay the dues as soon as possible, so we can proceed your order. Thank You!</p>

        <table width='600' align='center' bgcolor='#FFCC99' border='2'>

        <tr>
        <td><h2>Your Order Details from safbrothers.com </h2></td></tr>

        <tr>
        <th><b>S.N</b></th>
        <th><b>Book Name</b></th>
        <th><b>Quantity</b></th>
        <th><b>Total Price</b></th>
        <th>Invoice No</th>
        </tr>

        <tr>
        <td> $i; </td>
        <td> $book_name; </td>
        <td> $qty; </td>
        <td>$sub_total; </td>
        <td>$invoice_no; </td>
        </tr>



        </table>

        <h3>Please go to your account and pay the dues</h3>

        <h2><a href='safbrothers.com' > Click here</a> to login your account</h2>
         <h3>Thank You for Order on - www.safbrothers.com </h3>


        </html


        ";

        mail($customer_email, $subject, $message, $from);



?>