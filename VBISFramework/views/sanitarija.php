<?php

@include "db_conn.php";

if(isset($_POST['kupi'])){
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_image = $_POST['product_image'];
	$product_quantity = 1;
	
   $select_cart = mysqli_query($conn, "SELECT * FROM `korpa` WHERE naziv = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'Proizvod vec postoji u korpi';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `korpa`(naziv, cena, slika, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'Uspesno ste dodali proizvod u korpu';
   }
}

?>
<!DOCTYPE html>
<html>
	<body>
	<?php
	
	if(isset($message)){
		foreach($message as $message){
			echo '<div class="message"><span>'.$message.'</span> <i id="iks" class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
		}
	}
	
	?>
		<section class="wrapper">
			<div class="box-container">
				<?php
							 
				$select_products = mysqli_query($conn, "SELECT * FROM `proizvod` WHERE proizvod.vrsta='sanitarija'");
					if(mysqli_num_rows($select_products) > 0){
						while($fetch_product = mysqli_fetch_assoc($select_products)){
				?>
				<form action="" method="post">
					<div class="okvir">
					<div class="kartica">
						<div class="img">
							<img src="assets/uploads/<?php echo $fetch_product['slika']; ?>" alt="">
						</div>
						<div class="nazivispod">
							<h3><?php echo $fetch_product['naziv']; ?></h3></br>
							<h2 class="cena"><?php echo $fetch_product['cena']; ?> rsd</h2></br>
							<input type="hidden" name="product_name" value="<?php echo $fetch_product['naziv']; ?>">
							<input type="hidden" name="product_price" value="<?php echo $fetch_product['cena']; ?>">
							<input type="hidden" name="product_image" value="<?php echo $fetch_product['slika']; ?>">
							<input class="kupi" type="submit" value="kupi" name="kupi">
						</div>
					</div>
					</div>
				</form>
				
				
				<?php
					};
				};
				?>
			</div>
		</section>		
	</body>
</html>