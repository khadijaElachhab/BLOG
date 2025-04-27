<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Article - Mon Blog MVC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .header-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .article-logo {
            width: 50px;
            height: 50px;
            fill: #6a11cb;
            margin-right: 15px;
        }
        h2 {
            margin: 0;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            min-height: 200px;
        }
        .btn-submit {
            background: #2575fc;
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
    </style>
</head>
<body>
    <a href="indexSwitch.php?indexArticles=1" class="btn-retour">← Retour aux articles</a>

    <div class="form-container">
        <div class="header-container">
            <svg class="article-logo" viewBox="0 0 24 24">
                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20M16,11V18H8V11H16M10,13V16H14V13H10Z"/>
            </svg>
            <h2>Modifier l'article</h2>
        </div>
        <form action="indexSwitch.php?action=modifierArticle&id=<?= $article['id'] ?>" method="post">
            <div class="form-group">
                <label for="titre">Titre de l'article</label>
                <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($article['titre']) ?>" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu de l'article</label>
                <textarea id="contenu" name="contenu" required><?= htmlspecialchars($article['contenu']) ?></textarea>
            </div>
            <button type="submit" class="btn-submit">Enregistrer les modifications</button>
        </form>
    </div>
</body>
</html> 