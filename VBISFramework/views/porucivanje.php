<?php

@include "db_conn.php";

if(isset($_POST['order_btn'])){
	
	$name = $_POST['ime'];
    $lname = $_POST['prezime'];	
	$number = $_POST['telefon'];   
	$email = $_POST['email'];    
	$address = $_POST['adresa'];
	$state = $_POST['opstina'];
	$city = $_POST['grad'];
    $method = $_POST['method'];
	$price_total=0;
	
	$cart_query = mysqli_query($conn, "SELECT * FROM `korpa`");
	if(mysqli_num_rows($cart_query) > 0){
		while($product_item = mysqli_fetch_assoc($cart_query)){
			$product_name[] = $product_item['naziv'] .' ('. $product_item['quantity'] .') ';
			$product_price = ($product_item['cena'] * $product_item['quantity']);
			$price_total += (int)$product_price;
        };
    };
	
	$total_product = implode(', ',$product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `porudzbenica`(ime, prezime, email, telefon, adresa, opstina, grad, nacin_placanja, ukupno_proizvoda, ukupna_cena) VALUES('$name','$lname','$email','$number','$address','$state','$city','$method','$total_product','$price_total')") or die('query failed');
	
	if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Hvala na saradnji</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Ukupno : ".$price_total." rsd  </span>
         </div>
         <div class='customer-details'>
            <p> Vase ime : <span>".$name."</span> </p>
			<p> Vase prezime : <span>".$lname."</span> </p>
            <p> Vas broj : <span>".$number."</span> </p>
            <p> Vas email : <span>".$email."</span> </p>
            <p> Vasa adresa : <span>".$address."</span> </p>
            <p> Nacin placanja : <span>".$method."</span> </p>
         </div>
            <a href='alati.php' class='option-btn'>nastaviti kupovinu</a>
         </div>
      </div>
      ";
   }
}

?>
<!DOCTYPE html>
<html>
	<body>
		<section class="wrapper">
			<section id="checkout-form">
				<h2>Popunite podatke</h2>
				<form action="" method="post">
					<div class="flex">
						<div class="inputBox">
							<span>Vase ime</span>
							<input type="text" placeholder="Unesite vase ime" name="ime" required>
						</div>
						<div class="inputBox">
							<span>Vase prezime</span>
							<input type="text" placeholder="Unesite vase prezime" name="prezime" required>
						</div>
						<div class="inputBox">
							<span>Vas e-mail</span>
							<input type="email" placeholder="Unesite vas e-mail" name="email" required>
						</div>
						<div class="inputBox">
							<span>Vas telefon</span>
							<input type="number" placeholder="Unesite vas broj telefona" name="telefon" required>
						</div>	
						<div class="inputBox">
							<span>Adresa</span>
							<input type="text" placeholder="Unesite vasu adresu" name="adresa" required>
						</div>
						<div class="inputBox">
							<span>Opstina</span>
							<input type="text" placeholder="Unesite opstinu" name="opstina" required>
						</div>
						<div class="inputBox">
							<span>Grad</span>
							<input type="text" placeholder="Unesite grad" name="grad" required>
						</div>
						<div class="inputBox">
							<span>Opcije placanja</span>
							<select name="method">
								<option value="visa">Visa</option>
								<option value="master">Master card</option>
								<option value="paypal">Paypal</option>
								<option value="pouzecem">Pouzecem</option>
							</select>
						</div>
					</div>
					<input type="submit" value="narucite" name="order_btn" class="checkout_btn">
				</form>
			</section>
		</section>		
	</body>
</html>