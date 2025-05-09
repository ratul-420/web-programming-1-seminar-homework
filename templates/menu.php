
<nav>
    <ul>
        <?php foreach ($menus as $key => $value): ?>
            <li>
                <a href="index.php?menu=<?= $key ?>" <?= ($menu == $key) ? 'class="active"' : '' ?>>
                    <?= htmlspecialchars($value) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav> 