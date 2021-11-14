<header>
    <div id="header">
        <h1>
            <div id="titre_page">&ensp;</div>
        </h1>
        <div id="barre">
            <ul id="menu">
                <a href="page_daccueil.php" target="_self">
                    <img id="logo" src="images/logo_border.png" alt="Logo L'Art Scène" style="max-width: 14vw;">
                </a>
                <li style="padding-left: 2.75vw;"><a href="boutique.php" target="_self">Boutique</a></li>
                <li><a href="evenements.php" target="_self">Évènements</a></li>
                <li><a href="instrument_a_disposition.php" target="_self">Instruments à disposition</a></li>
                <li><a href="playlist.php" target="_self">Playlist</a></li>
                <li><a href="passation.php" target="_self">Passation</a></li>
                <?php
                    global $get_user_role;
                    include 'includes/utilitaires/get_role.php';
                    extract($_POST);
                    if($get_user_role == "admin"){?>
                    <li><a href="includes/gestion_admin/admin.php" target="_self">Admin</a></li>
                    <?php } ?>
            </ul>
        </div>
        <span id="copyright">&#169; L'art Scène 2021</span>
    </div>
</header>