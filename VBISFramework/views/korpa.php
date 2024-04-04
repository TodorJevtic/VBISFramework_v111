<?php

@include "db_conn.php";

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `korpa` SET quantity = '$update_value' WHERE korpa_id = '$update_id'");
   if($update_quantity_query){
      header('location:/korpa');
   };
};
if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `korpa` WHERE korpa_id = '$remove_id'");
   header('location:/korpa');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `korpa`");
   header('location:/korpa');
}

?>
<!DOCTYPE html>
<html>
	<body>
		<section class="wrapper">
			<div id="korpaa">
				<div class="shopping-cart">
					<table>
						<thead>
							<th>slika</th>
							<th>naziv</th>
							<th>cena</th>
							<th>quantity</th>
							<th>konacno</th>
							<th>-</th>
						</thead>
						<tbody>
							<?php
							
							$select_cart = mysqli_query($conn, "SELECT * FROM `korpa`");
							$grand_total = 0;
							
							if(mysqli_num_rows($select_cart) > 0){
							   while($fetch_cart = mysqli_fetch_assoc($select_cart)){
							?>
							
							<tr>
								<td><img src="assets/uploads/<?php echo $fetch_cart['slika']; ?>" height="80" alt=""></td>
								<td><?php echo $fetch_cart['naziv']; ?></td>
								<td><?php echo $fetch_cart['cena']; ?> rsd</td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['korpa_id']; ?>">
										<input type="number" min="1" name="update_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
										<input type="submit" value="osvezi" name="update_update_btn">
									</form>
								</td>
								<td><?php echo $sub_total =$fetch_cart['cena'] * $fetch_cart['quantity']; ?> rsd</td>
								<td><a href="korpa.php?remove=<?php echo $fetch_cart['korpa_id']; ?>" onclick="return confirm('Da li zelite da uklonite proizvod?')" class="delete-btn"><i class="fas fa-trash"></i>izbrisati</a></td>
							</tr>
							<?php
								$grand_total += (int)$sub_total;
							   };
							};
							?>
							<tr class="table-bottom">
								<td><a href="/alati" class="option-btn" style="margin-top:0px;">nastaviti kupovinu</a> </td>
								<td colspan="3">UKUPNO</td>
								<td><?php echo $grand_total; ?> rsd</td>
								<td><a href="korpa.php?delete_all" onclick="return confirm('Da li ste sigurni da hocete da izbrisete sve iz korpe?');" class="delete-btn"><i class="fas fa-trash"></i>izbrisati sve</a></td>
						</tbody>
					</table>
					<div class="checkout-btn">
						<a href="/porucivanje" class="checkout_btn">Poruciti ovde</a>
					</div>
				</div>
			</div>
		</section>		
	</body>
</html>