<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC PHP</title>
</head>
<body>
    <header>
        <a href="?c=stranky&a=domu">Domů</a>&nbsp;
        <a href="?c=prispevky&a=pridani">Nový příspěvěk</a>&nbsp;
        <a href="?c=prispevky&a=edit">Editovat příspěvěk</a>&nbsp;
        <a href="?c=prispevky&a=vymazat">Vymazat příspěvěk</a>&nbsp;
        <a href="?c=prispevky&a=prehled">Přehled příspěvků</a>&nbsp;
    </header>
    <?php require_once "router.php"; ?>
    <footer>
        <p>&copy; 2020 Jakub Šenkýř</p>
    </footer>
</body>
</html>
