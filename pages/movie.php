<?php
$title1 = '' ;
$content1= '';
$image1='';
$errorTitle = '';
$errorContent='';
$errorImage='';
 
 if (isset($_POST['add'])) {
 	$title1 = $_POST['title'];
 	$content1 = $_POST['content'];
 	$image1 = $_POST['image'];
 	if (! $title1) {
 		$errorTitle = 'Uzupełnij pole email';

 	}

 	if (! $content1) {
 		$errorContent='Uzupełnij treść';
 	}

 	if (! $image1) {
 		$errorImage='Wstaw odnośnik obrazka';
 	}
 }
?>
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
		<h1>Najnowsze seriale:</h1>
		<?php include('../database/db_connect.php'); 
			$result = $mysqli->query("SELECT * FROM articles ORDER BY id");
			while ($article = mysqli_fetch_array($result)) {
				echo '<div class="series_description">';
				echo '<h3>'. $article['title'].'</h3>';
				echo '<p>'.$article['content'] .'</p>';
				echo '<img src="'.$article['image'] .'" alt="">';
				echo '<a href="../resources/delete_article.php?id='.$article['id'] .'">';
				echo '<div class="delete_button"><p>Usun<p></div>';
				echo '</a>';
				echo '</div>';
			}

			/*adding new article */
			if (isset($_POST['add'])) {
				$title = strip_tags($_POST['title']);
				$content = strip_tags($_POST['content']);
				$image = strip_tags($_POST['image']);
				$statement = $mysqli->prepare("INSERT articles (title,content,image) VALUES (?,?,?)");
				$statement->bind_param("sss",$title, $content, $image);
				$statement->execute();
				$statement->close();
				header("Location:  movie.php");
			}



		?>
	</section>

	<section id="add_article">
		<div class="article_wrapper">
		<h1>Dodaj nowy serial</h1>
				<form method="post"  action="<?php echo $_SERVER['PHP_SELF'];  ?>">

					<?php if ($errorTitle != null) { ?>
							<span class="error">
								<?php echo $errorTitle; ?>
							</span>
					<?php } ?>

					<div class="add_components">
						<label>Tytuł <span>*</span></label><br/>
						<input type="text" name="title" id="title"></input>
					</div>

					<?php if ($errorContent != null) { ?>
							<span class="error">
								<?php echo $errorContent; ?>
							</span>
						<?php } ?>

					<div class="add_components">
						<label>Opis serialu<span>*</span></label>
						<textarea name="content" id="content" cols="30" rows="10" class="series_text_des"></textarea>
					</div>

					<?php if ($errorImage != null) { ?>
							<span class="error">
								<?php echo $errorImage; ?>
							</span>
					<?php } ?>

					<div class="add_components">
						<label>Miniaturka<span>*</span></label><br/>
						<input type="text" name="image" id="image"></input>
					</div>

					<input type="submit" class="add_button" id="add" name="add" value="Dodaj artykuł"></input>
				</form>
		</div>
	</section>

	<?php require '../includes/footer.php'; ?>

</body>
</html>
