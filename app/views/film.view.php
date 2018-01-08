<?php require 'partials/head.php';?>
    <!--Content-->
	<section id="series_content" class="clearfix">
		<div class="series_wrapper">
		<h1>Najnowsze filmy:</h1>
            <?php foreach ($articles as $article) : ?>
                <div class="series_description">
                    <h3><?= $article->title; ?></h3>
                    <p><?= $article->content; ?></p>
                    <img src="<?= $article->image; ?>" alt="miniaturka"><br>
                    <form method="POST" action="movieController">
                        <input type="hidden" name="id" value="<?= $article->id; ?>">
                        <button type="submit" class="delete_button" name="delete">USUŃ</button>
                    <form>
                </div>
            <?php endforeach;?>

	</section>

	<section id="add_article">
		<div class="article_wrapper">
		<h1>Dodaj nowy serial</h1>
				<form method="POST"  action="movieController">

                    <?php require 'partials/formFields.php' ?>

				</form>
		</div>
	</section>
	<!--Footer-->
<?php require 'partials/footer.php' ?>