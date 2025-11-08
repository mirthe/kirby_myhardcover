<div class="masonry">
<?php foreach ($books as $ub):
    $book = $ub['book'];
    $authors = array_map(fn($c) => $c['author']['name'], $book['contributions'] ?? []);
?>
    
<div class="block block--boek">
      
    <?php if (!empty($book['default_cover_edition']['image']['url'])): ?>
        <a href="https://hardcover.app/books/<?= $book['slug'] ?>"><img class="block--img" 
            src="<?= htmlspecialchars($book['default_cover_edition']['image']['url']) ?>" 
            alt="<?= htmlspecialchars($book['title']) ?>" 
            
        ></a>
    <?php else: ?>
        <a href="https://hardcover.app/books/<?= $book['slug'] ?>" 
            class="block--fallback"></a>
    <?php endif ?>
        
    <div class="block--body">
        <p><a href="https://hardcover.app/books/<?= $book['slug'] ?>"><?= htmlspecialchars($book['title']) ?></a> - 
            <?php if (!empty($authors)): ?>
                <?= implode(', ', $authors) ?>
            <?php endif; ?><br>
        <small><?= $book['release_date'] ?>
        <?php if((!empty($book['pages']))): ?>
            &bull; <?= intval($book['pages']) ?> bladzijden
        <?php endif ?></small></p>
    </div>

</div>

<?php endforeach ?>
</div>
