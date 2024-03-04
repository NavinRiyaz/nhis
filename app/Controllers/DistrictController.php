<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReimbursementModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;
use DateTime;
use Psr\Log\LoggerInterface;

class DistrictController extends BaseController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        helper(['url', 'text', 'form']);
    }

    public function index()
    {
        return view('district/dashboard');
    }

    public function reimbursementEntry()
    {
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
                'chk_primary' => $this->request->getVar('emp_id').'-'.$this->request->getVar('admission_date'),
            ];

            if ($insert->insert($data))
            {
                return redirect()->to(base_url('district/reimbursement-entry'))->with('success', 'Your Reimbursement entry has been saved!');
            } else {
                return redirect()->to(base_url('district/reimbursement-entry'))->with('error', 'Reimbursement Save Error!');
            }

        }

        return view('district/reimbursement');
    }

    public function reimbursementReport()
    {
        $connect = Database::connect();
        $query = $connect->table('district_master b')
            ->select('b.tocode, b.dt_name, COUNT(a.*) as total_count,
              SUM(CASE WHEN a.emp_type = 0 THEN 1 END) as state_employee,
              SUM(CASE WHEN a.emp_type = 1 THEN 1 END) as board_employee,
              SUM(CASE WHEN a.emp_type = 2 THEN 1 END) as corporation_employee,
              SUM(CASE WHEN a.emp_type = 3 THEN 1 END) as pensioner,
              SUM(CASE WHEN a.payment_status IS NULL THEN 1 ELSE 0 END) as to_be_process,
              SUM(CASE WHEN a.payment_status = 1 THEN 1 ELSE 0 END) as paid,
              SUM(CASE WHEN a.payment_status = 0 THEN 1 ELSE 0 END) as return')
            ->join('reimbursement a', 'a.tocode = b.tocode')
            ->where('a.payment_status', 0)
            ->groupBy('b.tocode, b.dt_name');
        $results = $query->get()->getResult();
        $fetchData = [];
        foreach ($results as $values) {
            $fetchData[] = [
                'tocode' => $values->tocode,
                'dt_name' => $values->dt_name,
                'total_count' => $values->total_count,
                'state_employee' => $values->state_employee,
                'board_employee' => $values->board_employee,
                'corporation_employee' => $values->corporation_employee,
                'pensioner' => $values->pensioner,
                'to_be_process' => $values->to_be_process,
                'paid' => $values->paid,
                'return' => $values->return
            ];
        }

        return view('district/reportReimbursement', [
            "data" => $fetchData,
        ]);
    }

    public function hospitals($id)
    {
        $connect = Database::connect();
        $query = $connect->table('reimbursement a')
            ->select('b.hospital_name, b.id as hospital_id, b.dist_code, d.dt_name as district_name,
                      COUNT(a.*) as tot_count,
                      SUM(CASE WHEN a.emp_type = 0 THEN 1 END) as state_employee,
                      SUM(CASE WHEN a.emp_type = 1 THEN 1 END) as board_employee,
                      SUM(CASE WHEN a.emp_type = 2 THEN 1 END) as corporation_employee,
                      SUM(CASE WHEN a.emp_type = 3 THEN 1 END) as pensioner,
                      SUM(CASE WHEN a.payment_status IS NULL THEN 1 ELSE 0 END) as to_be_process,
                      SUM(CASE WHEN a.payment_status = 1 THEN 1 ELSE 0 END) as paid,
                      SUM(CASE WHEN a.payment_status = 0 THEN 1 ELSE 0 END) as return')
            ->join('hospital_master b', 'a.tocode = b.dist_code and a.hospital_id = b.id')
            ->join('district_master d', 'b.dist_code = d.tocode')
            ->where('a.tocode', $id)
            ->groupBy('b.hospital_name, b.id, b.dist_code, d.dt_name');
        $results = $query->get()->getResult();
        $fetchData = [];
        foreach ($results as $values) {
            $fetchData[] = [
                'hospital_name' => $values->hospital_name,
                'hospital_id' => $values->hospital_id,
                'district_name' => $values->district_name,
                'dist_code' => $values->dist_code,
                'total_count' => $values->tot_count,
                'state_employee' => $values->state_employee,
                'board_employee' => $values->board_employee,
                'corporation_employee' => $values->corporation_employee,
                'pensioner' => $values->pensioner,
                'to_be_process' => $values->to_be_process,
                'paid' => $values->paid,
                'return' => $values->return
            ];
        }

        return view('district/reportHospitals', [
            "data" => $fetchData,
        ]);
    }

    public function admissions($id)
    {
        $data = [];
        $reimbursement = new ReimbursementModel();
        $data = $reimbursement->select('reimbursement.*, hospital_master.hospital_name')
            ->join('hospital_master', 'hospital_master.id = reimbursement.hospital_id')
            ->where('hospital_id', $id)
            ->orderBy('date_admission')
            ->findAll();

        return view('district/reportAdmissions', [
            "data" => $data,
        ]);
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
