<?php

/** @var $params \app\models\RegistrationModel
 */

?>
<head>
    <meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Soft UI Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
    <script
            src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous"></script>
</head>
    <div id="formalogin">
        <form id="loginforma" action="/registrationProcess" method="post" role="form">
			<h2>REGISTRACIJA</h2>
            <label>Email</label>
            <div class="mb-3">
                <input name="email" aria-label="Email" aria-describedby="email-addon">
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
			<label>Username</label>
			<div class="mb-3">
					<input type="username" name="username" aria-label="Username" aria-describedby="username-addon">
                    <?php
                        if ($params !== null && $params->errors !== null)
                        {
                            foreach ($params->errors as $objectNum => $item) {
                                if ($objectNum == "username")
                                {
                                    echo "<span  class='text-danger'>$item[0]</span>";
                                }
                            }
                        }
                    ?>
			</div>
            <label>Password</label>
            <div class="mb-3">
                <input type="password" name="password" aria-label="Password" aria-describedby="password-addon">
                <?php
                    if ($params !== null && $params->errors !== null)
                    {
                        foreach ($params->errors as $objectNum => $item) {
                            if ($objectNum == "password")
                            {
                                echo "<span  class='text-danger'>$item[0]</span>";
                            }
                        }
                    }
                ?>
            </div>
			<label>Re-password</label>
			<div class="mb-3">
					<input type="password" name="re_password" aria-label="RePassword" aria-describedby="password-addon">
			</div>
			<button type="submit">REGISTER</button>
					<div class="para-2">
						Imate account? Login se <a href="/login">ovde</a>
			</div>		
        </form>
    </div>
</div>