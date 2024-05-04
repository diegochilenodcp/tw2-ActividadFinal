<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\Router;

Router::connect('/users/create', ['controller' => 'Users', 'action' => 'add']);




// ¡Definimos la clase de ruta predeterminada para que nuestra aplicación sea genial!
Router::defaultRouteClass(DashedRoute::class);

// ¡Agregamos una nueva ruta para la acción 'tags' del controlador 'Bookmarks'!
Router::scope(
    '/bookmarks',
    ['controller' => 'Bookmarks'],
    function ($routes) {
        // ¡Conectamos la ruta '/tagged/*' a la acción 'tags'!
        $routes->connect('/tagged/*', ['action' => 'tags']);
    }
);

Router::scope('/', function ($routes) {
    // ¡Conectamos la ruta de inicio predeterminada y las rutas de '/pages/*'!
    $routes->connect('/', [
        'controller' => 'Pages',
        'action' => 'display', 'home'
    ]);
    $routes->connect('/pages/*', [
        'controller' => 'Pages',
        'action' => 'display'
    ]);

    // ¡Conectamos las rutas convencionales basadas en convenciones!
    $routes->fallbacks();
});
