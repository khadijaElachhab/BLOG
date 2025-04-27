<nav>
    <ul>
        <li><a href="indexSwitch.php?accueil=1">Accueil</a></li>
        <li><a href="indexSwitch.php?indexQuiz=1">Quiz</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="indexSwitch.php?historique=1">Historique</a></li>
            <li><a href="indexSwitch.php?profil=1">Mon Profil</a></li>
            <li><a href="indexSwitch.php?deconnexion=1">Déconnexion</a></li>
        <?php else: ?>
            <li><a href="indexSwitch.php?connexion=1">Connexion</a></li>
            <li><a href="indexSwitch.php?inscription=1">Inscription</a></li>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1): ?>
            <li><a href="indexSwitch.php?admin=1" class="admin-link">Administration</a></li>
        <?php endif; ?>
    </ul>
</nav>