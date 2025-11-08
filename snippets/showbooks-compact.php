<div class="masonry">
<?php foreach ($books as $ub):
    $book = $ub['book'];
    $authors = array_map(fn($c) => $c['author']['name'], $book['contributions'] ?? []);
?>

    <div class="block block--boek">

        <?php if (!empty($book['default_cover_edition']['image']['url'])): ?>

            <a href="https://hardcover.app/books/<?= $book['slug'] ?>"
                title="<?= htmlspecialchars($book['title']) ?> - 
                    <?php if (!empty($authors)): ?><?= implode(', ', $authors) ?><?php endif ?>">
                <img class="block--img" width="300" height="450"
                    src="<?= htmlspecialchars($book['default_cover_edition']['image']['url']) ?>" alt="">
            </a>

        <?php else: ?>

            <a href="https://hardcover.app/books/<?= $book['slug'] ?>"
                class="block--fallback"
                title="<?= htmlspecialchars($book['title']) ?> - 
                    <?php if (!empty($authors)): ?><?= implode(', ', $authors) ?><?php endif ?>">
            </a>

        <?php endif ?>

    </div>

<?php endforeach ?>
</div>
