<?php

/** @var $params \app\models\LoginModel
 */
use app\core\Application;

?>
			<div id="formalogin">
				<form id="loginforma" action="/loginProcess" method="post" role="form">
					<h2>LOGIN</h2>
					<label>Email</label>
					<div class="mb-3">
						<input type="text" name="email" aria-label="Email" aria-describedby="email-addon">
						<?php
						if ($params !== null && $params->errors !== null)
						{
							foreach ($params->errors as $objectNum => $item) {
								if ($objectNum == "email")
								{
									echo "<span class='text-danger'>$item[0]</span>";
								}
							}
						}
						?>	
					</div>				
					<label>Password</label>
					<div class="mb-3">
						<input type="password" name="password" >
						<?php
						if ($params !== null && $params->errors !== null)
						{
							foreach ($params->errors as $objectNum => $item) {
								if ($objectNum == "password")
								{
									echo "<span class='text-danger'>$item[0]</span>";
								}
							}
						}
						?>
					</div>
					<button type="submit">LOGIN</button>
					<div class="para-2">
						Nemate account? Registrujte se <a href="/registration">ovde</a>
					</div>
				</form>
			</div>

