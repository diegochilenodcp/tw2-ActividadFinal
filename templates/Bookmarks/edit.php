<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $bookmark->id],
                ['confirm' => __('¿Estás seguro de que quieres eliminar # {0}?', $bookmark->id), 'class' => 'side-nav-item']
            ) ?> <!-- Se traduce el texto 'Delete' a 'Eliminar' y la confirmación a español -->
            <?= $this->Html->link(__('Listar Marcadores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'List Bookmarks' a 'Listar Marcadores' -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookmarks form content">
            <?= $this->Form->create($bookmark) ?>
            <fieldset>
                <legend><?= __('Editar Marcador') ?></legend> <!-- Se traduce el texto 'Edit Bookmark' a 'Editar Marcador' -->
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]); // No requiere traducción, es un campo de selección de usuario
                    echo $this->Form->control('title'); // No requiere traducción, es un campo de título
                    echo $this->Form->control('description'); // No requiere traducción, es un campo de descripción
                    echo $this->Form->control('url'); // No requiere traducción, es un campo de URL
                    echo $this->Form->control('image', ['type' => 'file']); // Campo de carga de imagen
                    echo $this->Form->control('tags._ids', ['options' => $tags]); // No requiere traducción, es un campo de selección de etiquetas
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?> <!-- Se traduce el texto 'Submit' a 'Enviar' -->
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
