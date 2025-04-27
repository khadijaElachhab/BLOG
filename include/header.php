<header>
    <h1>Mon Blog MVC</h1>
    <nav>
        <ul>
            <li><a href="indexSwitch.php?indexArticles=1">Articles</a></li>
            <li><a href="indexSwitch.php?indexQuiz=1">Quiz</a></li>
            <?php if(isset($_SESSION['admin'])): ?>
                <li>
                    <form method="post" action="">
                        <input type="hidden" name="deconnexion" value="1" />
                        <input type="submit" value="Déconnexion" />
                    </form>
                </li>
            <?php else: ?>
                <li><a href="indexSwitch.php?connexion=1">Administration</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>