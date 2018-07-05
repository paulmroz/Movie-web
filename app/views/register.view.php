<?php
$email = '';
$password = '';
$terms = '';
$errorEmail = '';
$errorPassword = '';
$errorTerms = '' ;
if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $terms = $_POST['terms'];

    if (!$email) {
        $errorEmail = 'Uzupełnij pole email';
    } elseif ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = 'Nieprawidłowy adres email';
    }
    if (!$password) {
        $errorPassword = 'Uzupełnij pole hasło';
    } elseif ($password && strlen($password) < 6) {
        $errorPassword = 'Hasło musi zawierać minimum 6 znaków ';
    }
    if ($terms != 'on') {
        $errorTerms = 'Zaakceptuj regulamin';
    }
    /*Wysyłanie danych do bazy*/
    if (!$errorEmail && !$errorPassword && !$errorTerms) {
        include('../database/Connection.php');
        if (isset($_POST['send'])) {
            $database_email = strip_tags($_POST['email']);
            $database_password = strip_tags($_POST['password']);

            $statment = $mysqli->prepare("INSERT user_database (email, password) VALUES (?,?)");
            $statment ->bind_param("ss", $database_email, $database_password);
            $statment ->execute();
            $statment ->close();
            header("Location:  register.view.php");
        }
    }
    /*Wysylanie email */
    /*if (!$errorEmail && !$errorPassword && !$errorTerms ) {
        $to = 'test@test.pl';
        $subject = 'Rejestrecja w serwisie';
        $message = 'Nowy użytkownik na stronie';
        $emailSent = mail($to, $subject, $message);
    }*/
}

?>
<!DOCTYPE html>

<?php require 'partials/head.php';?>
	<!--Content-->

	<section id="signin_section" class="clearfix">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<!--<?php if ($emailSent == 1) {
    ?>
				<div class="pass">
					<h2>Wiadmość Wysłana</h2>
					<p>Na podany przez ciebie adres email została wysłana wiadomośc z instrukcjami, które pozwolą ci dokończyć rejestracje </p>
				</div>
			 <?php
} ?> -->
			<div class="signin_wrapper">
				<div class="signin_box">
					<h1>Rejestrecja:</h1>
					<h3>Email(login):</h3>
					<?php if ($errorEmail != null) {
        ?>
						<span class="error">
							<?php echo $errorEmail; ?>
						</span>
					<?php
    } ?>
					<input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>"></input>	
					<h3>Hasło:</h3>
					<?php if ($errorPassword != null) {
        ?>
						<span class="error">
							<?php echo $errorPassword; ?>
						</span>
					<?php
    } ?>
					<input type="password" name="password"	id="password" placeholder="Wpisz Hasło"value="<?php echo $password; ?>"></input>
					<h4>Zaakceptuj warunki regulaminu:</h4>
					<?php if ($errorTerms != null) {
        ?>
						<span class="error">
							<?php echo $errorTerms; ?>
						</span>
					<?php
    } ?>
					<input type="checkbox" tabindex="0" name="terms" id="terms" <?php echo(isset($_POST['terms'])?'checked="checked"':'');?>> </input>
					<label>Zapoznałem się z regulaminem!</label></br>
					<input type="submit" id="send" name="send" value="Wyślij"></input>
				</div>
			</div>
		</form>
	</section>
	<!--Footer-->
	<?php require 'partials/footer.php'; ?>

</body>
</html>
