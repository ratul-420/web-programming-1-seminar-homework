
<nav>
    <ul>
        <?php foreach ($menus as $key => $value): ?>
            <li>
                <a href="index.php?menu=<?= htmlspecialchars($key) ?>">
                    <?= htmlspecialchars($value) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>