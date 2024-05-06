<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('Nuevo Usuario'), ['action' => 'add'], ['class' => 'button float-right']) ?> <!-- Se traduce el texto 'New User' a 'Nuevo Usuario' -->
    <h3><?= __('Usuarios') ?></h3> <!-- Se traduce el texto 'Users' a 'Usuarios' -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('apellido') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td><?= h($user->nombre) ?></td>
                    <td><?= h($user->apellido) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?> <!-- Se traduce el texto 'View' a 'Ver' -->
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?> <!-- Se traduce el texto 'Edit' a 'Editar' -->
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('¿Estás seguro de que deseas eliminar # {0}?', $user->id)]) ?> <!-- Se traduce el texto 'Delete' a 'Eliminar' y la confirmación a español -->
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
