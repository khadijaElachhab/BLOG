<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires - Mon Blog MVC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .article {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .article-logo {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
            fill: #6a11cb;
        }
        .commentaire-form {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .commentaire-form textarea {
            width: 100%;
            min-height: 100px;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .commentaire-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn-commenter {
            background: #6a11cb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-retour {
            background: #6c757d;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .commentaire {
            background: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 4px solid #6a11cb;
            position: relative;
        }
        .commentaire-meta {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
        .commentaire-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
        }
        .btn-modifier-comm {
            background: #2575fc;
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
        }
        .btn-supprimer-comm {
            background: #dc3545;
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <a href="indexSwitch.php?indexArticles=1" class="btn-retour">← Retour aux articles</a>

    <div class="article">
        <svg class="article-logo" viewBox="0 0 24 24">
            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20M16,11V18H8V11H16M10,13V16H14V13H10Z"/>
        </svg>
        <h2><?= htmlspecialchars($article['titre']) ?></h2>
        <div class="article-meta">
            <?= $article['date_creation_fr'] ?> par Admin
        </div>
        <div class="contenu">
            <?= nl2br(htmlspecialchars($article['contenu'])) ?>
        </div>
    </div>

    <div class="commentaire-form">
        <h3>Ajouter un commentaire</h3>
        <form action="indexSwitch.php?action=ajoutCommentaire&id=<?= $article['id'] ?>" method="post">
            <div>
                <input type="text" name="auteur" placeholder="Votre nom..." required>
            </div>
            <div>
                <textarea name="commentaire" placeholder="Votre commentaire..." required></textarea>
            </div>
            <button type="submit" class="btn-commenter">Publier le commentaire</button>
        </form>
    </div>

    <h3>Commentaires</h3>
    <?php if(isset($commentaires) && !empty($commentaires)): ?>
        <?php foreach($commentaires as $commentaire): ?>
            <div class="commentaire">
                <div class="commentaire-actions">
                    <a href="indexSwitch.php?modifierCommentaire=<?= $commentaire['id'] ?>" class="btn-modifier-comm">Modifier</a>
                    <a href="indexSwitch.php?action=supprimerCommentaire&id=<?= $commentaire['id'] ?>" class="btn-supprimer-comm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">Supprimer</a>
                </div>
                <div class="commentaire-meta">
                    <?= htmlspecialchars($commentaire['auteur']) ?> - <?= $commentaire['date_creation_fr'] ?>
                </div>
                <div class="commentaire-contenu">
                    <?= nl2br(htmlspecialchars($commentaire['commentaire'])) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun commentaire pour le moment.</p>
    <?php endif; ?>
</body>
</html> 