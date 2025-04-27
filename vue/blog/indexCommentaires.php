<!DOCTYPE html>
<html>
<head>
    <title>Blog MVC - Commentaires</title>
    <meta charset="UTF-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php include('include/header.php'); ?>
    <section class="section">
        <article>
            <h2>Commentaires de l'article : <?php echo htmlspecialchars($article['titre']); ?></h2>
            
            <div class="article">
                <?php echo nl2br(htmlspecialchars($article['contenu'])); ?>
            </div>
            
            <h3>Commentaires :</h3>
            <?php if(empty($commentaires)): ?>
                <p>Aucun commentaire pour cet article.</p>
            <?php else: ?>
                <?php foreach($commentaires as $commentaire): ?>
                    <div class="commentaire">
                        <p><strong><?php echo htmlspecialchars($commentaire['auteur']); ?></strong> le <?php echo date('d/m/Y à H:i', strtotime($commentaire['dateCommentaire'])); ?></p>
                        <p><?php echo nl2br(htmlspecialchars($commentaire['commentaire'])); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <h3>Ajouter un commentaire</h3>
            <form method="post" action="indexSwitch.php?indexCommentaires=1&idArticle=<?php echo isset($article['id']) ? $article['id'] : $idArticle; ?>">
                <p>
                    <label for="auteur">Votre nom :</label><br />
                    <input type="text" name="auteur" id="auteur" required />
                </p>
                <p>
                    <label for="commentaire">Votre commentaire :</label><br />
                    <textarea name="commentaire" id="commentaire" rows="5" cols="50" required></textarea>
                </p>
                <input type="hidden" name="id_article" value="<?php echo isset($article['id']) ? $article['id'] : $idArticle; ?>" />
                <input type="hidden" name="ajoutCommentaire" value="1" />
                <input type="hidden" name="debut" value="<?php echo isset($_GET['debut']) ? $_GET['debut'] : 0; ?>" />
                <input type="hidden" name="tousLesArticles" value="<?php echo isset($_GET['tousLesArticles']) ? $_GET['tousLesArticles'] : 0; ?>" />
                <input type="submit" value="Envoyer" />
            </form>
            
            <p>
                <a href="indexSwitch.php?indexArticles=1&amp;debut=<?php echo isset($_GET['debut']) ? $_GET['debut'] : 0; ?>&amp;tousLesArticles=<?php echo isset($_GET['tousLesArticles']) ? $_GET['tousLesArticles'] : 0; ?>">Retour aux articles</a>
            </p>
        </article>
        <aside class="aside">
            Mon aside à remplir
        </aside>
    </section>
    <?php include("include/footer.php"); ?>
</body>
</html>