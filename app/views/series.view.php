<?php require 'partials/head.php';?>

	<section id="series_content" class="clearfix">
		<div class="series_wrapper">
		<h1>Najnowsze seriale:</h1>
            <?php foreach ($articles as $article) : ?>
                <div class="series_description">
                    <h3><?= $article->title; ?></h3>
                    <p><?= $article->content; ?></p>
                    <img src="<?= $article->image; ?>" alt="miniaturka"><br>
                    <form method="POST" action="seriesController">
                        <input type="hidden" name="id" value="<?= $article->id; ?>">
                        <button type="submit" class="delete_button" name="delete">USUŃ</button>
                     <form>
                </div>
            <?php endforeach;?>
        </div>
	</section>

	<section id="add_article">
		<div class="article_wrapper">
		<h1>Dodaj nowy serial</h1>
				<form method="POST"  action="seriesController">

                    <?php require 'partials/formFields.php' ?>
		</div>
	</section>
	<!--Footer-->
<?php require 'partials/footer.php' ?>