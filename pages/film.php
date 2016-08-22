<!DOCTYPE html>
<html>
<head>
	<title>rateFilms</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<!--Navbar-->
	<?php require '../includes/header.php';?>
	<!--Content-->
	<section id="series_content" class="clearfix">
		<div class="series_wrapper">
		<h1>Najnowsze filmy:</h1>
		<?php include('../database/db_connect.php');
		//Zapytanie bazy danych(wyciganie elementów)
		$result = $mysqli->query("SELECT * FROM articles_film ORDER BY id");
		while ($article = mysqli_fetch_array($result)) {
			echo '<div class="series_description">';
			echo '<h3>'.$article['title'] . '</h3>';
			echo '<p>'.$article['content'] .'</p>';
			echo '<img src="'.$article['image'] .'" alt="">';
			echo '<a href="../resources/delete_article_film.php?id='.$article['id'] .'">';
			echo '<div class="delete_button"><p>Usun<p></div>';
			echo '</a>';
			echo '</div>';
		}

		//Dodawanie nowego artykułu
		if (isset($_POST['addsec'])) {
			$title=strip_tags($_POST['titlesec']);
			$content=strip_tags($_POST['contentsec']);
			$image=strip_tags($_POST['imagesec']);

			$statement = $mysqli->prepare("INSERT articles_film (title, content, image) VALUES (?,?,?)");
			$statement->bind_param("sss", $title, $content, $image);
			$statement->execute();
			$statement->close();
			header("Location:  film.php");
		}

		 ?>
			<!-- 
			<div class="series_description">
				<h3>Game of Thrones</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis error, ipsam. Adipisci, incidunt dicta, consectetur sit illum doloremque, dolorum esse dolore nostrum labore iusto rem dolores iste pariatur hic. Quibusdam neque nisi molestias autem sunt alias mollitia earum ad.</p>
				<img src="http://www.hercampus.com/sites/default/files/2013/02/27/topic-1350661050.jpg">
			</div>
			<div class="series_description">
				<h3>Band of brothers</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis error, ipsam. Adipisci, incidunt dicta, consectetur sit illum doloremque, dolorum esse dolore nostrum labore iusto rem dolores iste pariatur hic. Quibusdam neque nisi molestias autem sunt alias mollitia earum ad.</p>
				<img src="http://www.hercampus.com/sites/default/files/2013/02/27/topic-1350661050.jpg">
			</div>
		</div>
		-->
	</section>

	<section id="add_article">
		<div class="article_wrapper">
		<h1>Dodaj nowy serial</h1>
				<form method="post"  action="<?php echo $_SERVER['PHP_SELF'];  ?>">
					<div class="add_components">
						<label>Tytuł <span>*</span></label><br/>
						<input type="text" name="titlesec" id="titlesec"></input>
					</div>
					<div class="add_components">
						<label>Opis serialu<span>*</span></label>
						<textarea name="contentsec" id="contentsec" cols="30" rows="10" class="series_text_des"></textarea>
					</div>
					<div class="add_components">
						<label>Miniaturka<span>*</span></label><br/>
						<input type="text" name="imagesec" id="imagesec"></input>
					</div>

					<input type="submit" class="add_button" id="addsec" name="addsec" value="Dodaj artykuł"></input>
				</form>
		</div>
	</section>

	<?php require '../includes/footer.php'; ?>

</body>
</html>
