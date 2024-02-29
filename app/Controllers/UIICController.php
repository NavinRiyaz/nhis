<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiseaseModel;
use App\Models\DistrictModel;
use App\Models\HospitalModel;
use App\Models\TreatmentModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class UIICController extends BaseController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        helper(['url', 'text', 'form']);
    }

    public function index()
    {
        return view('uiic/dashboard');
    }

    public function reimbursementEntry()
    {
        $data = [];

        return view('uiic/reimbursement');
    }

    public function paymentEntry()
    {
        $data = [];

        return view('uiic/payment');
    }

    //AJAX CALL
    public function getDistrict()
    {
        $data = [];
        $district = new DistrictModel();
        $data = $district->select('tocode, dt_name')
            ->like('tocode', '01', 'before')
            ->orderBy('dt_name')
            ->findAll();
        echo json_encode($data);
    }

    public function getHospital()
    {
        $data = [];
        $district = $this->request->getVar('district');
        $hospital = new HospitalModel();
        $data = $hospital->select('id, hospital_name')
            ->where('dist_code', $district)
            ->orderBy('hospital_name')
            ->findAll();
        echo json_encode($data);
    }

    public function getDisease()
    {
        $data = [];
        $disease = new DiseaseModel();
        $data = $disease->where('status', '0')
            ->where('emp_category', 'W')
            ->orderBy('disease_name')
            ->findAll();
        echo json_encode($data);
    }

    public function getTreatment()
    {
        $data = [];
        $disease = $this->request->getVar('disease');
        $treatment = new TreatmentModel();
        $data = $treatment->select('treatment_id, treatment_name')
            ->where('disease_id', $disease)
            ->where('status', '0')
            ->orderBy('treatment_name')
            ->findAll();
        echo json_encode($data);
    }
}
