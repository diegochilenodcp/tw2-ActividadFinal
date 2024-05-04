<div class="container text-right">
<div class="container text-right">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-primary shadow-lg rounded">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    <?= $this->Form->create(null, ['class' => 'form']) ?>
                    <div class="mb-3">
                        <?= $this->Form->control('email', ['class' => 'form-control', 'label' => ['text' => 'Email'], 'placeholder' => 'Ingresa tu email']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('password', ['class' => 'form-control', 'label' => ['text' => 'Contraseña'], 'placeholder' => 'Ingresa tu contraseña']) ?>
                    </div>
                    <div class="d-grid gap-2">
                        <?= $this->Form->button('Iniciar Sesión', ['class' => 'btn btn-lg btn-primary']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-grid gap-2">
                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>" class="btn btn-lg btn-success">Crear Cuenta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
