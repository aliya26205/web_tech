<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">
    <a href="index6.php" class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>">Home</a>
    <a href="students.php" class="<?= ($currentPage == 'students.php') ? 'active' : '' ?>">Students</a>
    <a href="companies.php" class="<?= ($currentPage == 'companies.php') ? 'active' : '' ?>">Companies</a>
    <a href="placements.php" class="<?= ($currentPage == 'placements.php') ? 'active' : '' ?>">Placements</a>
</div>