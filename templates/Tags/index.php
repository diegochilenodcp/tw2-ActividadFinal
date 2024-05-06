<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tag> $tags
 */
?>
<div class="tags index content">
    <?= $this->Html->link(__('Nueva Etiqueta'), ['action' => 'add'], ['class' => 'button float-right']) ?> <!-- Se traduce el texto 'New Tag' a 'Nueva Etiqueta' -->
    <h3><?= __('Etiquetas') ?></h3> <!-- Se traduce el texto 'Tags' a 'Etiquetas' -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Título') ?></th> <!-- Se traduce el texto 'title' a 'Título' -->
                    <th><?= $this->Paginator->sort('Creado') ?></th> <!-- Se traduce el texto 'created' a 'Creado' -->
                    <th><?= $this->Paginator->sort('Modificado') ?></th> <!-- Se traduce el texto 'modified' a 'Modificado' -->
                    <th class="actions"><?= __('Acciones') ?></th> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tags as $tag): ?>
                <tr>
                    <td><?= $this->Number->format($tag->id) ?></td>
                    <td><?= h($tag->title) ?></td>
                    <td><?= h($tag->created) ?></td>
                    <td><?= h($tag->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $tag->id]) ?> <!-- Se traduce el texto 'View' a 'Ver' -->
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tag->id]) ?> <!-- Se traduce el texto 'Edit' a 'Editar' -->
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tag->id], ['confirm' => __('¿Estás seguro de que quieres eliminar # {0}?', $tag->id)]) ?> <!-- Se traduce el texto 'Delete' a 'Eliminar' y la confirmación a español -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?> <!-- Se traduce el texto 'first' a 'Primera' -->
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?> <!-- Se traduce el texto 'previous' a 'Anterior' -->
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?> <!-- Se traduce el texto 'next' a 'Siguiente' -->
            <?= $this->Paginator->last(__('Última') . ' >>') ?> <!-- Se traduce el texto 'last' a 'Última' -->
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de un total de {{count}}')) ?></p> <!-- Se traduce el texto 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total' a español -->
    </div>
</div>
