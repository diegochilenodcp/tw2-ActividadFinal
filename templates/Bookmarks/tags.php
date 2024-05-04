<h1>
    <!-- ¡Mostramos el título de la página con un toque divertido! -->
    Bookmarks tagged with <?= $this->Text->toList(h($tags)) ?>
</h1>

<section>
    <!-- Iteramos sobre los bookmarks y los mostramos con estilo -->
    <?php foreach ($bookmarks as $bookmark): ?>
        <article>
            <!-- ¡Usamos el HtmlHelper para crear un enlace bonito! -->
            <h4><?= $this->Html->link($bookmark->title, $bookmark->url) ?></h4>
            <small><?= h($bookmark->url) ?></small>

            <!-- ¡Usamos el TextHelper para dar estilo al texto! -->
            <?= $this->Text->autoParagraph(h($bookmark->description)) ?>
        </article>
    <?php endforeach; ?>
</section>
