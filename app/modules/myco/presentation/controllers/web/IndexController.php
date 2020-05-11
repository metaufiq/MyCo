<?php
declare(strict_types=1);

namespace Index\Modules\MyCo\Presentation\Controllers\Web;

use Index\Modules\MyCo\Application\CreateTugas\CreateTugasRequest;
use Index\Modules\MyCo\Application\CreateTugas\CreateTugasService;
use Index\Modules\MyCo\Application\DeleteTugas\DeleteTugasRequest;

class IndexController extends ControllerBase
{
    protected $viewAllTugasService;
    protected $createTugasService;
    protected $deletTugasService;

    public function initialize()
    {
        $this->viewAllTugasService = $this->di->get('viewAllTugasService');
        $this->createTugasService = $this->di->get('createTugasService');
        $this->deleteTugasService = $this->di->get('deleteTugasService');

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
        $request = $this->request->get();

        $tugas = $request["tugas_nama"];

        $karyawan = isset($request->tugas_karyawan) ? $request["tugas_karyawan"] : [1,2,3];
        $tenggatWaktu = $request["tugas_tenggat_waktu"].":00";


        $request = new CreateTugasRequest($tugas, $karyawan, $tenggatWaktu);
        $response = $this->createTugasService->handle($request);

        return $this->_redirectBack();

    }

    public function hapusTugasAction()
    {
        $request = $this->request->get();
        $id = $request["tugas_id"];

        $request = new DeleteTugasRequest($id);

        $response = $this->deleteTugasService->handle($request);
        return $this->_redirectBack();

    }


    protected function _redirectBack() {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }



}

