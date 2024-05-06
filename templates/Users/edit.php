<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4> <!-- Se traduce el texto 'Actions' a 'Acciones' -->
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('¿Estás seguro de que quieres eliminar # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?> <!-- Se traduce el texto 'Delete' a 'Eliminar' y la confirmación a español -->
            <?= $this->Html->link(__('Listar Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> <!-- Se traduce el texto 'List Users' a 'Listar Usuarios' -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Editar Usuario') ?></legend> <!-- Se traduce el texto 'Edit User' a 'Editar Usuario' -->
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?> <!-- Se traduce el texto 'Submit' a 'Enviar' -->
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
