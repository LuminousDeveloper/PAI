<?php
// nav.php - Wspólne menu nawigacyjne z wykorzystaniem basename($_SERVER['PHP_SELF'])
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav>
        <a href="index.php"<?php if($current_page == 'index.php') echo ' style="font-weight: bold;"'; ?>>Strona główna</a>
        <a href="dodaj.php"<?php if($current_page == 'dodaj.php') echo ' style="font-weight: bold;"'; ?>>Dodaj grę</a>
        <a href="lista.php"<?php if($current_page == 'lista.php') echo ' style="font-weight: bold;"'; ?>>Lista gier</a>
        <a href="edytuj.php"<?php if($current_page == 'edytuj.php') echo ' style="font-weight: bold;"'; ?>>Edytuj grę</a>
        <a href="usun.php"<?php if($current_page == 'usun.php') echo ' style="font-weight: bold;"'; ?>>Usuń grę</a>
</nav>
<hr>