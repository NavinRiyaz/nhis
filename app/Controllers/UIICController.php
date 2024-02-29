<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiseaseModel;
use App\Models\DistrictModel;
use App\Models\HospitalModel;
use App\Models\ReimbursementModel;
use App\Models\TreatmentModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;
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
        
        if($this->request->getMethod() == 'post')
        {
            $insert = new ReimbursementModel();
            $data = [
                  'finyear' => $this->getFinancialYear($this->request->getVar('admission_date')),
                  'emp_type' => (int) $this->request->getVar('employee_type'),
                  'emp_id' => $this->request->getVar('emp_id'),
                  'emp_name' => $this->request->getVar('emp_name'),
                  'emp_inital' => $this->request->getVar('emp_initial'),
                  'emp_dob' => $this->request->getVar('emp_dob'),
                  'emp_doj' => $this->request->getVar('emp_doj'),
                  'emp_phone' => $this->request->getVar('emp_phone'),
                  'tocode' => $this->request->getVar('district'),
                  'hospital_id' => $this->request->getVar('hospital'),
                  'disease_id' => $this->request->getVar('disease'),
                  'treatment_id' => $this->request->getVar('treatment'),
                  'diagnosis_entry' => $this->request->getVar('diagnosis_entry'),
                  'date_admission' => $this->request->getVar('admission_date'),
                  'date_discharge' => $this->request->getVar('discharge_date'),
                  'treatment_type' => (int) $this->request->getVar('treatment_type'),
                  'insurance_upload' => $this->request->getVar('insurancePath'),
                  'treatment_upload' => $this->request->getVar('treatmentPath'),
                  'bill_upload' => $this->request->getVar('billPath'),
                  'passbook_upload' => $this->request->getVar('passbookPath'),
                  'actual_scenario' => $this->request->getVar(''),
                  'update_scenario' => $this->request->getVar(''),
                  'payment_status' => $this->request->getVar(''),
                  'utr_no' => $this->request->getVar(''),
                  'utr_date' => $this->request->getVar(''),
                  'paid_amount' => $this->request->getVar(''),
                  'remark' => $this->request->getVar(''),
                  'remote_ip' => $this->getIPAddress(),
                  'entry_by' => session()->get('id'),
                  'entry_date' => date('Y-m-d'),
                  'entry_datetime' => date('Y-m-d'),
                  'appeal_flag' => $this->request->getVar(''),
                  'appeal_date' => $this->request->getVar(''),
                  'appeal_entry_by' => $this->request->getVar(''),
                  'chk_prmary' => $this->request->getVar('emp_id').'-'.$this->request->getVar('admission_date'),
            ];

            if ($insert->insert($data))
            {
                return redirect()->to(base_url('uiic/reimbursement-entry'))->with('success', 'Your Reimbursement entry has been saved!');
            } else {
                return redirect()->to(base_url('uiic/reimbursement-entry'))->with('error', 'Reimbursement Save Error!');
            }

        }
        
        return view('uiic/reimbursement');
    }

    public function upload()
    {
        $category = $this->request->getVar('category');
        $empId = $this->request->getPost('emp_id');
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
        $uploadDir = ROOTPATH . 'public/uploads/' . $empId;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if ($this->request->getFile('file')) {
            $file = $this->request->getFile('file');

            if ($file->isValid() && $file->getSize() < 5 * 1024 * 1024 && in_array($file->getClientMimeType(), $allowedMimeTypes)) {
                $newName = $category.'-'.$file->getRandomName();
                $file->move($uploadDir, $newName);
                return json_encode(['success' => true, 'message' => 'File uploaded successfully.', 'file_path' => '/uploads/' . $empId . '/' . $newName]);
            } else {
                return json_encode(['success' => false, 'message' => 'Invalid file. Please upload an image or PDF file less than 5MB.']);
            }
        } else {
            return json_encode(['success' => false, 'message' => 'No file uploaded.']);
        }
    }

    public function reimbursementReport()
    {
        return view('uiic/reportReimbursement');
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

    private function getFinancialYear($admissionDate) {
        $admissionDateTime = new DateTime($admissionDate);
        $admissionYear = (int)$admissionDateTime->format('Y');
        $admissionMonth = (int)$admissionDateTime->format('n');
        if ($admissionMonth < 3) {
            $financialYearStart = ($admissionYear - 1) % 100 . ($admissionYear % 100);
        } else {
            $financialYearStart = ($admissionYear) % 100 . (($admissionYear + 1) % 100);
        }
        return $financialYearStart;
    }


    private function getIPAddress()
    {
        $request = service('request');
        return $request->getIPAddress();
    }
}
