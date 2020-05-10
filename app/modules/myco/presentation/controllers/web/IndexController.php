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

    }

    public function berandaAction()
    {
        $response = $this->viewAllTugasService->handle();
        
        $this->view->setVars(array(
            'allTugas' => $response->get()
        ));
    }

    public function tambahTugasAction(){
        
        die(json_encode($this->request->get()));
    }



}

