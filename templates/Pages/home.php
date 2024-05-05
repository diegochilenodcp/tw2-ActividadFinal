<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/4/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de Aduanas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Navbar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="logoupds.png"><img src="<?= $this->Url->webroot('img/logomio.jpeg') ?>" alt="Logo" style="max-height: 60px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
                <!-- Inicio de sesión / Cierre de sesión -->
                <div class="navbar-login">
                    <?php if ($this->getRequest()->getSession()->check('Auth.User')): ?>
                        <!-- Verificar si el usuario está autenticado -->
                        Bienvenido, <?= $this->getRequest()->getSession()->read('Auth.User.email'); ?> |
                        <!-- Mostrar saludo y enlace de deslogueo -->
                        <?= $this->Html->link('Cerrar Sesión', ['controller' => 'Users', 'action' => 'logout']); ?>
                    <?php else: ?>
                        <!-- Si el usuario no está autenticado -->
                        <?= $this->Html->link('Ingresar', ['controller' => 'Users', 'action' => 'login']); ?> |
                        <?= $this->Html->link('Registrarse', ['controller' => 'Users', 'action' => 'add']); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container text-center">
                    <h1>Bienvenido a Nuestra Agencia Despachante de Aduana</h1>
                    <p>Somos una agencia de despachante de aduanas con experiencia en el campo, comprometidos con la eficiencia y la excelencia en el servicio.</p>
                    <a href="#" class="btn btn-primary">Conócenos</a>
                    <br></br>
                </div>
            </div>
            <div class="col-md-6">
                <img src="<?= $this->Url->webroot('img/portada.png') ?>" alt="Hero Image" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $this->Url->webroot('img/equipo.jpg') ?>" alt="Portada2" class="img-fluid" style="max-height: 300px;">
            </div>
            <div class="col-md-6">
                <div class="container text-center">
                    <h2>Acerca de Nosotros</h2>
                    <p>Somos una agencia líder en el campo de despacho de aduanas, brindando servicios integrales y soluciones personalizadas para nuestros clientes.</p>
                    <p>Nuestro equipo altamente capacitado está comprometido con la satisfacción del cliente y la eficiencia en cada proceso aduanero.</p>
                    <a href="#" class="btn btn-primary">Más sobre nosotros</a>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services">
    <div class="container">
        <div class="container text-center">
            <h1>Nuestros Servicios</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= $this->Url->webroot('img/oficina1.jpg') ?>" class="card-img-top" alt="Service 1">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Despacho de Aduanas</strong></h5>
                        <p class="card-text">Ofrecemos servicios de despacho de aduanas para importaciones y exportaciones, asegurando un proceso rápido y eficiente.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= $this->Url->webroot('img/oficina2.jpg') ?>" class="card-img-top" alt="Service 2">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Consultoría Aduanera</strong></h5>
                        <p class="card-text">Brindamos asesoramiento especializado en temas aduaneros, ayudando a nuestros clientes a cumplir con las regulaciones y normativas vigentes.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= $this->Url->webroot('img/oficina3.jpg') ?>" class="card-img-top" alt="Service 3">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Gestión de Trámites</strong></h5>
                        <p class="card-text">Nos encargamos de la gestión completa de trámites aduaneros, facilitando el proceso para nuestros clientes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<br></br>
<footer class="footer">
    <div class="container text-center">
        <p>&copy; 2024 Agencia de Aduanas. Todos los derechos reservados.</p>
    </div>
</footer>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
