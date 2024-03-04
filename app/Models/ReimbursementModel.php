<?php

namespace App\Models;

use CodeIgniter\Model;

class ReimbursementModel extends Model
{
    protected $table            = 'reimbursement';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
          'id',
          'finyear',
          'emp_type',
          'emp_id',
          'emp_name',
          'emp_inital',
          'emp_dob',
          'emp_doj',
          'emp_phone',
          'tocode',
          'hospital_id',
          'disease_id',
          'treatment_id',
          'diagnosis_entry',
          'date_admission',
          'date_discharge',
          'treatment_type',
          'insurance_upload',
          'treatment_upload',
          'bill_upload',
          'passbook_upload',
          'actual_scenario',
          'update_scenario',
          'payment_status',
          'utr_no',
          'utr_date',
          'paid_amount',
          'remark',
          'remote_ip',
          'entry_by',
          'entry_date',
          'entry_datetime',
          'appeal_flag',
          'appeal_date',
          'appeal_entry_by',
          'chk_primary',
          'payment_status_update',
          'payment_statusupdate_date',
          'uiic_payment_entry_date',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
