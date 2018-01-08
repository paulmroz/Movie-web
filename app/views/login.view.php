<?php require 'partials/head.php';?>

	<section id="signin_section" class="clearfix">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<div class="signin_wrapper">
				<div class="signin_box">
					<h1>Zaloguj się:</h1>
					<h3>Email(login):</h3>
					<?php if($errorEmail != null ) {?>
						<span class="error">
							<?php echo $errorEmail; ?>
						</span>
					<?php } ?>
					<input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>"></input>	
					<h3>Hasło:</h3>
					<?php if($errorPassword != null ) {?>
						<span class="error">
							<?php echo $errorPassword; ?>
						</span>
					<?php } ?>
					<input type="password" name="password"	id="password" placeholder="Wpisz Hasło"value="<?php echo $password; ?>"></input>

					<input type="submit" id="send" name="send" value="Wyślij"></input>
				</div>
			</div>
		</form>
	</section>

	<!--footer-->
<?php require 'partials/footer.php' ?>