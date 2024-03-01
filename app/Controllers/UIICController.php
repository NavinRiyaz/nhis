<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiseaseModel;
use App\Models\DistrictModel;
use App\Models\HospitalModel;
use App\Models\IndexModel;
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
                  'remote_ip' => $this->getIPAddress(),
                  'entry_by' => session()->get('id'),
                  'entry_date' => date('Y-m-d'),
                  'entry_datetime' => date('Y-m-d H:i:s'),
                  'chk_primary' => $this->request->getVar('emp_id').'-'.$this->request->getVar('admission_date'),
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
        $connect = Database::connect();

        $sql = "select b.tocode,b.dt_name,count(a.*) as total_count,
                    sum(case when a.emp_type =0 then 1  end) as state_employee,
                    sum(case when a.emp_type =1 then 1  end) as board_employee,
                    sum(case when a.emp_type =2 then 1  end) as corporation_employee,
                    sum(case when a.emp_type =3 then 1  end) as pensioner,
                    sum(case when a.payment_status is null then 1 else 0 end) as to_be_process,
                    sum(case when a.payment_status =1 then 1 else 0 end) as paid,
                    sum(case when a.payment_status =0 then 1 else 0 end) as return
		        from reimbursement a,district_master b where a.tocode=b.tocode  group by 1,2";
        $execute = $connect->query($sql);
        $data = $execute->getResultArray();
        $fetchData = [];
        foreach ($data as $values) {
            $fetchData[] = [
                'tocode' => $values['tocode'],
                'dt_name' => $values['dt_name'],
                'total_count' => $values['total_count'],
                'state_employee' => $values['state_employee'],
                'board_employee' => $values['board_employee'],
                'corporation_employee' => $values['corporation_employee'],
                'pensioner' => $values['pensioner'],
                'to_be_process' => $values['to_be_process'],
                'paid' => $values['paid'],
                'return' => $values['return']
            ];
        }
        return view('uiic/reportReimbursement', [
            "data" => $fetchData,
        ]);
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

    public function getUser()
    {
        $data = [];
        $id = $this->request->getVar('id');
        $index = new IndexModel();
        $data = $index->select('emp_name, jdate, dob')
            ->where('emp_number', $id)
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
