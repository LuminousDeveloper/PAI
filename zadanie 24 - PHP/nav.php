<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav>
    <a href="index.php" class="<?= $currentPage == 'index.php' ? 'active' : '' ?>">Start</a>
    <a href="utworz.php" class="<?= $currentPage == 'utworz.php' ? 'active' : '' ?>">Utwórz bazę</a>
    <a href="dodaj.php" class="<?= $currentPage == 'dodaj.php' ? 'active' : '' ?>">Dodaj grę</a>
    <a href="lista.php" class="<?= $currentPage == 'lista.php' ? 'active' : '' ?>">Lista gier</a>
    <a href="usun.php" class="<?= $currentPage == 'usun.php' ? 'active' : '' ?>">Usuń grę</a>
    <a href="edytuj.php" class="<?= $currentPage == 'edytuj.php' ? 'active' : '' ?>">Edytuj grę</a>
</nav>
