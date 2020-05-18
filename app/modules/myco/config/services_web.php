<?php

declare(strict_types=1);

use Index\Modules\MyCo\Application\CreateManajer\CreateManajerService;
use Index\Modules\MyCo\Application\CreateTugas\CreateTugasService;
use Index\Modules\MyCo\Application\DeleteTugas\DeleteTugasService;
use Index\Modules\MyCo\Application\EditTugas\EditTugasService;
use Index\Modules\MyCo\Application\ViewAllTugas\ViewAllTugasService;
use Index\Modules\MyCo\Application\CreateTingkatPegawai\CreateTingkatPegawaiService;
use Index\Modules\MyCo\Infrastructure\Persistence\SqlManajerRepository;
use Index\Modules\MyCo\Infrastructure\Persistence\SqlTugasRepository;
use Index\Modules\MyCo\Infrastructure\Persistence\SqlTingkatPegawaiRepository;
use Phalcon\Escaper;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
use Phalcon\Session\Adapter\Stream as SessionAdapter;
use Phalcon\Session\Manager as SessionManager;
use Phalcon\Url as UrlResolver;

/**
 * Registering a router
 */
$di->setShared('router', function () {
    $router = new Router();
    $router->setDefaultModule('myco');

    return $router;
});

/**
 * The URL component is used to generate all kinds of URLs in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    // die($url);
    return $url;
});

/**
 * Starts the session the first time some component requests the session service
 */
$di->setShared('session', function () {
    $session = new SessionManager();
    $files = new SessionAdapter([
        'savePath' => sys_get_temp_dir(),
    ]);
    $session->setAdapter($files);
    $session->start();

    return $session;
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    $escaper = new Escaper();
    $flash = new Flash($escaper);
    $flash->setImplicitFlush(false);
    $flash->setCssClasses([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
 * Set the default namespace for dispatcher
 */
$di->setShared('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('Index\Modules\MyCo\Presentation\Controllers\Web');

    return $dispatcher;
});


$di->set('tugasRepository', function () use ($di) {
    return new SqlTugasRepository($di->get('db'));
});

$di->set('manajerRepository', function () use ($di) {
    return new SqlManajerRepository($di->get('db'));
});

$di->set('tingkatPegawaiRepository', function () use ($di) {
    return new SqlTingkatPegawaiRepository($di->get('db'));
});

$di->set('createManajerService', function () use ($di) {
    return new CreateManajerService($di->get('manajerRepository'));
});

$di->set('viewAllTugasService', function () use ($di) {
    return new ViewAllTugasService($di->get('tugasRepository'));
});

$di->set('createTugasService', function () use ($di) {
    return new CreateTugasService($di->get('tugasRepository'));
});


$di->set('editTugasService', function () use ($di) {
    return new EditTugasService($di->get('tugasRepository'));
});

$di->set('deleteTugasService', function () use ($di) {
    return new DeleteTugasService($di->get('tugasRepository'));
});

$di->set('createTingkatPegawaiService', function () use ($di) {
    return new CreateTingkatPegawaiService($di->get('tingkatPegawaiRepository'));
});
