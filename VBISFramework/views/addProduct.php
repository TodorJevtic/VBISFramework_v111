<?php

/** @var $params \app\models\ProductModel
 */

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
			<div id="aforma">
				<form action="/createProductProcess" method="post" class="add-product-form" enctype="multipart/form-data" role="form">
					<h3>DODAJTE NOVI PROIZVOD</h3>
					<input type="text" name="naziv" placeholder="Unesite ime prozvoda"  class="box" aria-describedby="naziv-addon" required>
					<?php
                	if ($params !== null && $params->errors !== null)
                	{
                   		foreach ($params->errors as $objectNum => $item) {
                        	if ($objectNum == "name")
                        	{
                            	echo "<span class='text-danger'>$item[0]</span>";
                        	}
                    	}
                	}
                	?>
					<input type="number" name="cena" min="0" placeholder="Unesite cenu prozvoda" class="box" aria-describedby="cena-addon" required>
					<?php
                	if ($params !== null && $params->errors !== null)
                	{
                    	foreach ($params->errors as $objectNum => $item) {
                        	if ($objectNum == "price")
                        	{
                            	echo "<span class='text-danger'>$item[0]</span>";
                        	}
                    	}
                	}
                	?>
					<input type="text" name="slika" placeholder="Unesite url slike"  class="box" aria-describedby="slika-addon">
					<input type="text" name="vrsta" placeholder="Unesite vrstu prozvoda" class="box" aria-describedby="vrsta-addon" required>
					<div class="mb-3">
                <select name="category_id" id="category_id" class="select-custom">
                    <?php
                        if ($params !== null && $params->categories !== null){
                            foreach ($params->categories as $category)
                            {
                                $id = $category["id"];
                                $name = $category["name"];
                                if ($params->category_id == $id)
                                {
                                    echo "<option value='$id' selected='selected'>$name</option>";
                                }else
                                {
                                    echo "<option value='$id'>$name</option>";
                                }
                            }
                        }
                    ?>
                </select>
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "category_id")
                        {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
					<input type="submit" value="DODAJ" name="add_product" class="btn">
				</form>
			</div>
		</section>		
	</body>
</html>
