<?php
declare(strict_types=1);

namespace Index\Modules\MyCo\Presentation\Controllers\Web;

class IndexController extends ControllerBase
{
    protected $viewAllTugasService;

    public function initialize()
    {
        $this->viewAllTugasService = $this->di->get('viewAllTugasService');
    }

    public function indexAction()
    {
        $response = $this->viewAllTugasService->handle();
        return $response;
    }

    public function berandaAction()
    {

    }



}

