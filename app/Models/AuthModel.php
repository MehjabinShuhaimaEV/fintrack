<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

use CodeIgniter\Database\Query;

class AuthModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'auths';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    protected $db;

    public function __construct(Connectioninterface & $db)
    {
        $this->db=$db;
    }
    public function insert_to_tb($tbl_name,$data)
    {
        return $this->db
        ->table($tbl_name)
        ->insert($data);
    }

    // method for geting datas
    public function select_data($tbl_name,$colums='',$condition=[])
    {
        $query=$this->db->table($tbl_name);
        if($colums)
        {
            $query->select($colums);
        }else{
            $query->select('*');
        }
        
        if(!empty($condition))
        {
            if (!empty($condition['where'])) {
                foreach ($condition['where'] as $key => $value) {
                    $query->where($key, $value);
                }
            }
            
            if (!empty($condition['like'])) {
                foreach ($condition['like'] as $key => $value) {
                    $query->like($key, $value);
                }
            }
            
            if (!empty($condition['where_custom'])) {
                foreach ($condition['where_custom'] as $key => $value) {
                    $query->where($key, $value);
                }
            }
        }
        
        $result = $query->get()->getResultArray();
        return $result;
        
        
    }
}
