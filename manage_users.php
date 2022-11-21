<?php include_once 'includes/header.php'; ?>
<?php if ($isAdmin) : ?>
    <?php include_once 'includes/footer.php'; ?>
    </body>

    </html>
<?php endif; ?>
<?php if (!$isAdmin) {
    header('Location: login.php');
}
