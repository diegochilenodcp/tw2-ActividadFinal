<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Bookmark> $bookmarks
 */
?>
<div class="bookmarks index content">
    <?= $this->Html->link(__('Nuevo Marcador'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Marcadores') ?></h3> <!-- Se traduce el texto 'Bookmarks' a 'Marcadores' -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('imagen') ?></th> <!-- ¿Se debería traducir 'imagen' a 'imagen'? -->
                    <th class="actions"><?= __('Acciones') ?></th> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookmarks as $bookmark): ?>
                <tr>
                    <td><?= $this->Number->format($bookmark->id) ?></td>
                    <td><?= $bookmark->has('user') ? $this->Html->link($bookmark->user->nombre, ['controller' => 'Users', 'action' => 'view', $bookmark->user->id]) : '' ?></td>
                    <td><?= h($bookmark->title) ?></td>
                    <td><?= h($bookmark->created) ?></td>
                    <td><?= h($bookmark->modified) ?></td>
                    <td>
                        <?php if (!empty($bookmark->imagen)): ?>
                            <img src="<?= $this->Url->webroot($bookmark->imagen) ?>" alt="Logo" style="max-height: 60px;">
                        <?php else: ?>
                            <?= __('Sin Imagen') ?> <!-- Se traduce el texto 'No Image' a 'Sin Imagen' -->
                        <?php endif; ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $bookmark->id]) ?> <!-- Se traduce el texto 'View' a 'Ver' -->
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $bookmark->id]) ?> <!-- Se traduce el texto 'Edit' a 'Editar' -->
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $bookmark->id], ['confirm' => __('¿Estás seguro de que quieres eliminar # {0}?', $bookmark->id)]) ?> <!-- Se traduce el texto 'Delete' a 'Eliminar' y la confirmación a español -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?> <!-- Se traduce el texto 'first' a 'primero' -->
            <?= $this->Paginator->prev('< ' . __('anterior')) ?> <!-- Se traduce el texto 'previous' a 'anterior' -->
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?> <!-- Se traduce el texto 'next' a 'siguiente' -->
            <?= $this->Paginator->last(__('último') . ' >>') ?> <!-- Se traduce el texto 'last' a 'último' -->
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de un total de {{count}}')) ?></p> <!-- Se traduce el texto 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total' a español -->
    </div>
</div>
