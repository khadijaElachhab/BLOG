<?php $titre = "Article"; ?>

<?php ob_start(); ?>

<div class="container mt-4">
    <article>
        <h1><?php echo htmlspecialchars($article['titre']); ?></h1>
        <p class="text-muted">Publié le <?php echo $article['date_creation_fr']; ?></p>
        <div class="article-content">
            <?php echo nl2br(htmlspecialchars($article['contenu'])); ?>
        </div>
    </article>

    <section class="mt-5">
        <h2>Commentaires</h2>
        
        <form action="indexSwitch.php?action=ajoutCommentaire&id=<?php echo $article['id']; ?>" method="post" class="mb-4">
            <div class="form-group mb-3">
                <label for="auteur">Votre nom :</label>
                <input type="text" class="form-control" id="auteur" name="auteur" required>
            </div>
            <div class="form-group mb-3">
                <label for="commentaire">Votre commentaire :</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publier le commentaire</button>
        </form>

        <?php if (!empty($commentaires)): ?>
            <?php foreach ($commentaires as $commentaire): ?>
                <div class="comment border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong><?php echo htmlspecialchars($commentaire['auteur']); ?></strong>
                            <small class="text-muted"> - <?php echo $commentaire['date_commentaire_fr']; ?></small>
                        </div>
                    </div>
                    <p class="mt-2 mb-0"><?php echo nl2br(htmlspecialchars($commentaire['commentaire'])); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Aucun commentaire pour le moment.</p>
        <?php endif; ?>
    </section>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'vue/gabarit.php'; ?> 