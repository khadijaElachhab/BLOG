<header class="admin-header">
    <div class="header-container">
        <h1>Administration Quiz MVC</h1>
        <div class="admin-banner">Mode Administrateur</div>
        <?php include_once('include/nav.php'); ?>
        <div class="admin-actions">
            <form action="indexSwitch.php" method="POST">
                <input type="hidden" name="deconnexion" value="1">
                <input type="submit" value="Déconnexion" class="btn-deconnexion">
            </form>
        </div>
    </div>
</header>