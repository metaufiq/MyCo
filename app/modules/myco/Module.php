<?php
declare(strict_types=1);

namespace Index\Modules\MyCo;

use Phalcon\Di\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Index\Modules\MyCo\Domain\Model' => __DIR__ . '/domain/model',
            'Index\Modules\MyCo\Domain\Repository' => __DIR__ . '/domain/repository',
            'Index\Modules\MyCo\Domain\Transport' => __DIR__ . '/domain/transport',
            'Index\Modules\MyCo\Domain\Exception' => __DIR__ . '/domain/exception',
            'Index\Modules\MyCo\Infrastructure\Persistence' => __DIR__ . '/infrastructure/persistence',
            'Index\Modules\MyCo\Infrastructure\Transport' => __DIR__ . '/infrastructure/transport',
            'Index\Modules\MyCo\Application' => __DIR__ . '/application',
            'Index\Modules\MyCo\Presentation\Controllers\Web' => __DIR__ . '/presentation/controllers/web',
            'Index\Modules\MyCo\Presentation\Controllers\Api' => __DIR__ . '/presentation/controllers/api',
            'Index\Modules\MyCo\Presentation\Controllers\Validators' => __DIR__ . '/presentation/controllers/validators',
        ]);

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $view = new View();
            $view->setDI($this);
            $view->setViewsDir(__DIR__ . '/views/');

            $view->registerEngines([
                '.volt'  => 'voltShared',
                '.phtml' => PhpEngine::class
            ]);

            return $view;
        });
    }
}
