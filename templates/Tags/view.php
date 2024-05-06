<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
            <?= $this->Html->link(__('Editar Etiqueta'), ['action' => 'edit', $tag->id], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'Edit Tag' a 'Editar Etiqueta' -->
            <?= $this->Form->postLink(__('Eliminar Etiqueta'), ['action' => 'delete', $tag->id], ['confirm' => __('¿Estás seguro de que quieres eliminar # {0}?', $tag->id), 'class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'Delete Tag' a 'Eliminar Etiqueta' y la confirmación a español -->
            <?= $this->Html->link(__('Listar Etiquetas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'List Tags' a 'Listar Etiquetas' -->
            <?= $this->Html->link(__('Nueva Etiqueta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'New Tag' a 'Nueva Etiqueta' -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tags view content">
            <h3><?= h($tag->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Título') ?></th> <!-- Se traduce el texto 'Title' a 'Título' -->
                    <td><?= h($tag->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tag->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th> <!-- Se traduce el texto 'Created' a 'Creado' -->
                    <td><?= h($tag->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th> <!-- Se traduce el texto 'Modified' a 'Modificado' -->
                    <td><?= h($tag->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Bookmarks Relacionados') ?></h4> <!-- Se traduce el texto 'Related Bookmarks' a 'Bookmarks Relacionados' -->
                <?php if (!empty($tag->bookmarks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Id de Usuario') ?></th> <!-- Se traduce el texto 'User Id' a 'Id de Usuario' -->
                            <th><?= __('Título') ?></th>
                            <th><?= __('Descripción') ?></th> <!-- Se traduce el texto 'Description' a 'Descripción' -->
                            <th><?= __('URL') ?></th> <!-- Se traduce el texto 'Url' a 'URL' -->
                            <th><?= __('Creado') ?></th>
                            <th><?= __('Modificado') ?></th>
                            <th class="actions"><?= __('Acciones') ?></th> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
                        </tr>
                        <?php foreach ($tag->bookmarks as $bookmarks) : ?>
                        <tr>
                            <td><?= h($bookmarks->id) ?></td>
                            <td><?= h($bookmarks->user_id) ?></td>
                            <td><?= h($bookmarks->title) ?></td>
                            <td><?= h($bookmarks->description) ?></td>
                            <td><?= h($bookmarks->url) ?></td>
                            <td><?= h($bookmarks->created) ?></td>
                            <td><?= h($bookmarks->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Bookmarks', 'action' => 'view', $bookmarks->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Bookmarks', 'action' => 'edit', $bookmarks->id]) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Bookmarks', 'action' => 'delete', $bookmarks->id], ['confirm' => __('¿Estás seguro de que quieres eliminar # {0}?', $bookmarks->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
