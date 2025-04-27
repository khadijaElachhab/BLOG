<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Blog MVC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .nav-links a {
            color: purple;
            text-decoration: none;
            margin-right: 20px;
            font-size: 18px;
        }
        .deconnexion {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 20px 0;
        }
        .article {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            position: relative;
        }
        .article-logo {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
            fill: #6a11cb;
        }
        .article h2 {
            margin: 10px 0;
            color: #333;
        }
        .article-meta {
            color: #666;
            margin: 10px 0;
        }
        .article-actions {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }
        .btn-modifier {
            background: #2575fc;
            color: white;
            text-decoration: none;
            padding: 5px 15px;
            border-radius: 5px;
        }
        .btn-supprimer {
            background: #dc3545;
            color: white;
            text-decoration: none;
            padding: 5px 15px;
            border-radius: 5px;
        }
        .commentaires {
            color: purple;
            text-decoration: none;
            margin-top: 15px;
            display: inline-block;
        }
        .btn-ajouter {
            background: #6a11cb;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
        .pagination a {
            background: #6a11cb;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .pagination a:hover {
            background: #2575fc;
        }
        .pagination .active {
            background: #2575fc;
        }
        .pagination .disabled {
            background: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Mon Blog MVC</h1>
    
    <div class="nav-links">
        <a href="indexSwitch.php?indexArticles=1">Articles</a>
    </div>

    <a href="indexSwitch.php?deconnexion=1" class="deconnexion">Déconnexion</a>

    <a href="indexSwitch.php?ajoutArticle=1" class="btn-ajouter">+ Ajouter un article</a>

    <?php if(isset($articles) && is_array($articles)): ?>
        <?php foreach($articles as $article): ?>
            <div class="article">
                <div class="article-actions">
                    <a href="indexSwitch.php?modifierArticle=<?= $article['id'] ?>" class="btn-modifier">Modifier</a>
                    <a href="indexSwitch.php?action=supprimerArticle&id=<?= $article['id'] ?>" class="btn-supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a>
                </div>
                <svg class="article-logo" viewBox="0 0 24 24">
                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20M16,11V18H8V11H16M10,13V16H14V13H10Z"/>
                </svg>
                <h2><?= htmlspecialchars($article['titre']) ?></h2>
                <div class="article-meta">
                     <?= $article['date_creation_fr'] ?>  Admin
                </div>
                <div class="contenu">
                    <?= nl2br(htmlspecialchars($article['contenu'])) ?>
                </div>
                <a href="indexSwitch.php?commentaires=<?= $article['id'] ?>" class="commentaires">
                💬Commentaires
                </a>
            </div>
        <?php endforeach; ?>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="indexSwitch.php?indexArticles=1&page=<?= $page-1 ?>">← Précédent</a>
            <?php endif; ?>

            <?php for($i = 1; $i <= $totalPages; $i++): ?>
                <a href="indexSwitch.php?indexArticles=1&page=<?= $i ?>" 
                   class="<?= $i == $page ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="indexSwitch.php?indexArticles=1&page=<?= $page+1 ?>">Suivant →</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>
</html>