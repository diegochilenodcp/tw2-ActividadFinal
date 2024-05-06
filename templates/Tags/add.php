<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 * @var \Cake\Collection\CollectionInterface|string[] $bookmarks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
            <?= $this->Html->link(__('Listar Etiquetas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'List Tags' a 'Listar Etiquetas' -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tags form content">
            <?= $this->Form->create($tag) ?>
            <fieldset>
                <legend><?= __('Agregar Etiqueta') ?></legend> <!-- Se traduce el texto 'Add Tag' a 'Agregar Etiqueta' -->
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('bookmarks._ids', ['options' => $bookmarks]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?> <!-- Se traduce el texto 'Submit' a 'Enviar' -->
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
