<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
            <?= $this->Html->link(__('Editar Marcador'), ['action' => 'edit', $bookmark->id], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'Edit Bookmark' a 'Editar Marcador' -->
            <?= $this->Form->postLink(__('Eliminar Marcador'), ['action' => 'delete', $bookmark->id], ['confirm' => __('¿Estás seguro de que quieres eliminar # {0}?', $bookmark->id), 'class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'Delete Bookmark' a 'Eliminar Marcador' y la confirmación a español -->
            <?= $this->Html->link(__('Listar Marcadores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'List Bookmarks' a 'Listar Marcadores' -->
            <?= $this->Html->link(__('Nuevo Marcador'), ['action' => 'add'], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'New Bookmark' a 'Nuevo Marcador' -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookmarks view content">
            <h3><?= h($bookmark->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th> <!-- Se traduce el texto 'User' a 'Usuario' -->
                    <td><?= $bookmark->has('user') ? $this->Html->link($bookmark->user->nombre, ['controller' => 'Users', 'action' => 'view', $bookmark->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Título') ?></th> <!-- Se traduce el texto 'Title' a 'Título' -->
                    <td><?= h($bookmark->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imagen') ?></th> <!-- Se traduce el texto 'Imagen' a 'Imagen' -->
                    <td><?= h($bookmark->imagen) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bookmark->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th> <!-- Se traduce el texto 'Created' a 'Creado' -->
                    <td><?= h($bookmark->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th> <!-- Se traduce el texto 'Modified' a 'Modificado' -->
                    <td><?= h($bookmark->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripción') ?></strong> <!-- Se traduce el texto 'Description' a 'Descripción' -->
                <blockquote>
                    <?= $this->Text->autoParagraph(h($bookmark->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('URL') ?></strong> <!-- Se traduce el texto 'Url' a 'URL' -->
                <blockquote>
                    <?= $this->Text->autoParagraph(h($bookmark->url)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Imagen') ?></strong> <!-- Se traduce el texto 'Imagen' a 'Imagen' -->
                <blockquote>
                    <img src="<?= $this->Url->webroot($bookmark->imagen) ?>" alt="Logo" style="max-height: 60px;">
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Etiquetas Relacionadas') ?></h4> <!-- Se traduce el texto 'Related Tags' a 'Etiquetas Relacionadas' -->
                <?php if (!empty($bookmark->tags)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Título') ?></th> <!-- Se traduce el texto 'Title' a 'Título' -->
                            <th><?= __('Creado') ?></th> <!-- Se traduce el texto 'Created' a 'Creado' -->
                            <th><?= __('Modificado') ?></th> <!-- Se traduce el texto 'Modified' a 'Modificado' -->
                            <th class="actions"><?= __('Acciones') ?></th> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
                        </tr>
                        <?php foreach ($bookmark->tags as $tags) : ?>
                        <tr>
                            <td><?= h($tags->id) ?></td>
                            <td><?= h($tags->title) ?></td>
                            <td><?= h($tags->created) ?></td>
                            <td><?= h($tags->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?> <!-- Se traduce el texto 'View' a 'Ver' -->
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?> <!-- Se traduce el texto 'Edit' a 'Editar' -->
                                <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('¿Estás seguro de que quieres eliminar # {0}?', $tags->id)]) ?> <!-- Se traduce el texto 'Delete' a 'Eliminar' y la confirmación a español -->
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
