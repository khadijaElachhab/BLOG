<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article - Mon Blog MVC</title>
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
    </style>
</head>
<body>
    <a href="indexSwitch.php?indexArticles=1" class="btn-retour">← Retour aux articles</a>

    <div class="form-container">
        <h2>Ajouter un nouvel article</h2>
        <form action="indexSwitch.php?action=ajoutArticle" method="post">
            <div class="form-group">
                <label for="titre">Titre de l'article</label>
                <input type="text" id="titre" name="titre" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu de l'article</label>
                <textarea id="contenu" name="contenu" required></textarea>
            </div>
            <button type="submit" class="btn-submit">Publier l'article</button>
        </form>
    </div>
</body>
</html> 