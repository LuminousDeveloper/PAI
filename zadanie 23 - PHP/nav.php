<?php
 $currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav>
        <a href="index.php" class="<?= $currentPage == 'index.php' ? 'active' : '' ?>">Start</a>li>
        <a href="about.php" class="<?= $currentPage == 'about.php' ? 'active' : '' ?>">About</a>
        <a href="contact.php" class="<?= $currentPage == 'contact.php' ? 'active' : '' ?>">Contact</a>
</nav>