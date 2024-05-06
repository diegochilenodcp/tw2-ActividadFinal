<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 * @var string[]|\Cake\Collection\CollectionInterface $bookmarks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $tag->id],
                ['confirm' => __('¿Estás seguro de que quieres eliminar # {0}?', $tag->id), 'class' => 'side-nav-item']
            ) ?> <!-- Se traduce el texto 'Delete' a 'Eliminar' y la confirmación a español -->
            <?= $this->Html->link(__('Listar Etiquetas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'List Tags' a 'Listar Etiquetas' -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tags form content">
            <?= $this->Form->create($tag) ?>
            <fieldset>
                <legend><?= __('Editar Etiqueta') ?></legend> <!-- Se traduce el texto 'Edit Tag' a 'Editar Etiqueta' -->
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
