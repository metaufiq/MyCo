<?php

declare(strict_types=1);

namespace Index\Modules\MyCo\Presentation\Controllers\Web;

use Index\Modules\MyCo\Application\CreateManajer\CreateManajerRequest;
use Index\Modules\MyCo\Application\CreateTugas\CreateTugasRequest;
use Index\Modules\MyCo\Application\DeleteTugas\DeleteTugasRequest;
use Index\Modules\MyCo\Application\EditTugas\EditTugasRequest;
use Index\Modules\MyCo\Application\CreateTingkatPegawai\CreateTingkatPegawaiRequest;
use Index\Modules\MyCo\Application\EditTingkatPegawai\EditTingkatPegawaiRequest;
use Index\Modules\MyCo\Application\DeleteTingkatPegawai\DeleteTingkatPegawaiRequest;

class IndexController extends ControllerBase
{

    protected $createManajerService;

    protected $viewAllTugasService;
    protected $createTugasService;
    protected $editTugasService;
    protected $deleteTugasService;
    protected $viewAllTingkatPegawaiService;
    protected $createTingkatPegawaiService;
    protected $editTingkatPegawaiService;
    protected $deleteTingkatPegawaiService;


    public function initialize()
    {
        $this->viewAllTugasService = $this->di->get('viewAllTugasService');
        $this->createTugasService = $this->di->get('createTugasService');
        $this->editTugasService = $this->di->get('editTugasService');
        $this->deleteTugasService = $this->di->get('deleteTugasService');
        $this->createManajerService = $this->di->get('createManajerService');
        $this->viewAllTingkatPegawaiService = $this->di->get('viewAllTingkatPegawaiService');
        $this->createTingkatPegawaiService = $this->di->get('createTingkatPegawaiService');
        $this->editTingkatPegawaiService = $this->di->get('editTingkatPegawaiService');
        $this->deleteTingkatPegawaiService = $this->di->get('deleteTingkatPegawaiService');
    }

    public function indexAction()
    {
    }

    public function daftarAction()
    {
        $request = $this->request->get();


        $nama = $request['manajer_nama'];
        $email = $request['manajer_email'];
        $password = $request['manajer_password'];


        $request = new CreateManajerRequest($nama, $email, $password);
        $response = $this->createManajerService->handle($request);

        $this->response->redirect('index/beranda');
    }

    public function berandaAction()
    {
        $response = $this->viewAllTugasService->handle();
        $response2 = $this->viewAllTingkatPegawaiService->handle();

        $this->view->setVars(array(
            'allTugas' => $response->get(),
            'allTingkat' => $response2->get()
        ));
    }

    public function tambahTugasAction()
    {
        $request = $this->request->get();

        $tugas = $request["tugas_nama"];

        $pegawai = isset($request->tugas_pegawai) ? $request["tugas_pegawai"] : [1, 2, 3];
        $tenggatWaktu = $request["tugas_tenggat_waktu"] . ":00";


        $request = new CreateTugasRequest($tugas, $pegawai, $tenggatWaktu);
        $response = $this->createTugasService->handle($request);

        return $this->_redirectBack();
    }
    public function ubahTugasAction()
    {
        $request = $this->request->get();
        $id = $request["tugas_id"];
        $tugas = $request["tugas_nama"];
        $pegawai = isset($request->tugas_pegawai) ? $request["tugas_pegawai"] : [1, 2, 3];
        $tenggatWaktu = $request["tugas_tenggat_waktu"] . ":00";
        $status = $request["tugas_status"];

        $request = new EditTugasRequest($id, $tugas, $pegawai, $tenggatWaktu, $status);
        $response = $this->editTugasService->handle($request);
        

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
    public function tambahTingkatPegawaiAction()
    {
        $request = $this->request->get();
        
        $nama = $request["tingkat_nama"];
        $jenis = $request["tingkat_jenis"];
        $golongan = $request["tingkat_golongan"];
        $pendidikan = $request["tingkat_pendidikan"];
        $lamakerja = $request["tingkat_lamakerja"];
        $gaji_dasar = $request["tingkat_gaji"];

        $request = new CreateTingkatPegawaiRequest($nama, $jenis, $golongan, $pendidikan, $lamakerja, $gaji_dasar);
        $response = $this->createTingkatPegawaiService->handle($request);

        return $this->_redirectBack();
    }
    public function ubahTingkatPegawaiAction()
    {
        $request = $this->request->get();
        $id = $request["tingkat_id"];
        $tingkat = $request["tingkat_nama"];
        $jenis = $request["tingkat_jenis"];
        $golongan = $request["tingkat_golongan"];
        $pendidikan = $request["tingkat_pendidikan"];
        $lamakerja = $request["tingkat_lamakerja"];
        $gaji_dasar = $request["tingkat_gaji"];

        $request = new EditTingkatPegawaiRequest($id, $tingkat, $jenis, $golongan, $pendidikan, $lamakerja, $gaji_dasar);
        $response = $this->editTingkatPegawaiService->handle($request);
        
        return $this->_redirectBack();
    }
    protected function _redirectBack()
    {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }
    public function hapusTingkatPegawaiAction()
    {
        $request = $this->request->get();
        $id = $request["tingkat_id"];

        $request = new DeleteTingkatPegawaiRequest($id);

        $response = $this->deleteTingkatPegawaiService->handle($request);
        return $this->_redirectBack();
    }
}
