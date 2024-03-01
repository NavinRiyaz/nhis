<?php

namespace App\Models;

use CodeIgniter\Model;

class IndexModel extends Model
{
    protected $table            = 'empmaster_ifhrms';
//    protected $primaryKey       = 'id';
//    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
          'district',
          'treasury',
          'hod_code',
          'hod_name',
          'new_ddo_code',
          'ddo_name',
          'office_name',
          'emp_number',
          'cps_number',
          'emp_name',
          'post_name',
          'emp_status',
          'jdate',
          'dob',
          'element_name',
          'org_id',
          'grnno',
          'emp_dept',
          'match_flag_cpsnumber',
          'nic_element_name',
          'nic_empname',
          'nic_dob'
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
