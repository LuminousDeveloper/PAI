    <footer>
        <p>&copy; <?= date('Y') ?> Baza gier komputerowych &ndash; PAI</p>
    </footer>

    <?php
    if (isset($conn) && $conn instanceof mysqli) {
        mysqli_close($conn);
    }
    ?>
</body>
</html>
