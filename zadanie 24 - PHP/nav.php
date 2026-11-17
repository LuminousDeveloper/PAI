<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav aria-label="Menu główne">
    <ul>
        <li><a href="index.php" class="<?= $currentPage == 'index.php' ? 'active' : '' ?>">Strona główna</a></li>
        <li><a href="utworz.php" class="<?= $currentPage == 'utworz.php' ? 'active' : '' ?>">Utwórz bazę</a></li>
        <li><a href="dodaj.php" class="<?= $currentPage == 'dodaj.php' ? 'active' : '' ?>">Dodaj grę</a></li>
        <li><a href="lista.php" class="<?= $currentPage == 'lista.php' ? 'active' : '' ?>">Lista gier</a></li>
        <li><a href="usun.php" class="<?= $currentPage == 'usun.php' ? 'active' : '' ?>">Usuń grę</a></li>
        <li><a href="edytuj.php" class="<?= $currentPage == 'edytuj.php' ? 'active' : '' ?>">Edytuj grę</a></li>
    </ul>
</nav>
