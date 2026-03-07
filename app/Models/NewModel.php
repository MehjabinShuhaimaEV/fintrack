<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

use CodeIgniter\Database\Query;
class NewModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = $db;
    }

    public function insert_to_tb($tbl_name, $data)
    {
        return $this->db
            ->table($tbl_name)
            ->insert($data);
    }

    public function select_data($tbl_name, $colums = '', $condition = [])
    {
        $query = $this->db->table($tbl_name);
        if ($colums) {
            $query->select($colums);
        } else {
            $query->select('*');
        }


        if (!empty($condition)) {
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

    //update m
    public function update_data($tbl_name, $data, $condition)
    {
        return $this->db
            ->table($tbl_name)
            ->where($condition)
            ->update($data);

    }
    public function get_products_data()
    {
        $query = $this->db->table('tbl_products p');
        $query->select('p.id,p.product_name,p.brand,p.stockqty,p.price,p.discount,p.tax,p.weight,p.image,p.discription ,p.status,c.name as category_name');
        $query->join('tbl_categories c', 'p.category = c.id', 'left');
        $query->where('p.delet_status', 0);
        return $query->get()->getResultArray();
    }
    public function get_transactions($type)
    {
        $query = $this->db->table('tbl_transaction t');

        $query->select('
        t.id,
        t.transaction_date,
        t.voucher_no,
        t.type,
        t.category,
        t.amount,
        t.remarks,
        t.payment_mode,
        t.status,
        t.created_at,
        c.name as category_name,
        m.name as payment_mode_name,
    ');

        $query->join('tbl_categories c', 't.category = c.id', 'left');
        $query->join('tbl_mop m', 't.payment_mode = m.id', 'left');
        $query->where('t.type', $type);
        $query->where('t.status', 0);
        $query->orderBy('t.transaction_date', 'DESC');
        return $query->get()->getResultArray();
    }

    // modeof pay
    public function get_payment_modes()
    {
        $query = $this->db->table('tbl_mop');
        $query->select('id,name');
        $query->where('status', 0);
        return $query->get()->getResultArray();
    }
    
    //total amounts.

    // ========================
// TOTAL INCOME & EXPENSE
// ========================
public function get_totals()
{
    $builder = $this->db->table('tbl_transaction');

    // Total Income (type = 1)
    $income = $builder->selectSum('amount')
        ->where(['type' => 1, 'status' => 0])
        ->get()
        ->getRowArray()['amount'] ?? 0;

    // Total Expense (type = 2)
    $expense = $builder->selectSum('amount')
        ->where(['type' => 2, 'status' => 0])
        ->get()
        ->getRowArray()['amount'] ?? 0;

    return [
        'total_income'  => floatval($income),
        'total_expense' => floatval($expense),
        'balance'       => floatval($income - $expense)
    ];
}



// ========================
// DASHBOARD SUMMARY
// ========================
public function get_dashboard_summary()
{
    // TODAY
    $today = date('Y-m-d');

    $today_income = $this->db->table('tbl_transaction')
        ->selectSum('amount')
        ->where(['type'=>1,'status'=>0,'transaction_date'=>$today])
        ->get()
        ->getRowArray()['amount'] ?? 0;

    $today_expense = $this->db->table('tbl_transaction')
        ->selectSum('amount')
        ->where(['type'=>2,'status'=>0,'transaction_date'=>$today])
        ->get()
        ->getRowArray()['amount'] ?? 0;

    // MONTH
    $month = date('m');
    $year  = date('Y');

    $month_income = $this->db->table('tbl_transaction')
        ->selectSum('amount')
        ->where('type',1)
        ->where('status',0)
        ->where('MONTH(transaction_date)',$month)
        ->where('YEAR(transaction_date)',$year)
        ->get()
        ->getRowArray()['amount'] ?? 0;

    $month_expense = $this->db->table('tbl_transaction')
        ->selectSum('amount')
        ->where('type',2)
        ->where('status',0)
        ->where('MONTH(transaction_date)',$month)
        ->where('YEAR(transaction_date)',$year)
        ->get()
        ->getRowArray()['amount'] ?? 0;

    // Last 5 transactions
    $last5 = $this->db->table('tbl_transaction')
        ->select('*')
        ->where('status',0)
        ->orderBy('transaction_date','DESC')
        ->limit(5)
        ->get()
        ->getResultArray();

    return [
        'today_income'  => floatval($today_income),
        'today_expense' => floatval($today_expense),
        'month_income'  => floatval($month_income),
        'month_expense' => floatval($month_expense),
        'last_transactions' => $last5
    ];
}


public function get_monthly_totals()
{
    $builder = $this->db->table('tbl_transaction');

    $results = $builder
        ->select("
            MONTH(transaction_date) as month,
            SUM(CASE WHEN type = 1 THEN amount ELSE 0 END) as income,
            SUM(CASE WHEN type = 2 THEN amount ELSE 0 END) as expense
        ")
        ->where('status', 0)
        ->groupBy("YEAR(transaction_date), MONTH(transaction_date)")
        ->orderBy("YEAR(transaction_date), MONTH(transaction_date)")
        ->limit(12)
        ->get()
        ->getResultArray();

    $months = [];
    $income = [];
    $expense = [];

    foreach ($results as $row) {
        $months[]  = date("M", mktime(0, 0, 0, $row['month'], 1));
        $income[]  = floatval($row['income']);
        $expense[] = floatval($row['expense']);
    }

    return [
        'months'  => $months,
        'income'  => $income,
        'expense' => $expense
    ];
}
// categoryExpenseTotals
public function get_category_expense_totals()
{
    $builder = $this->db->table('tbl_transaction t');

    $results = $builder
        ->select("c.name as category, SUM(t.amount) as total")
        ->join('tbl_categories c', 'c.id = t.category', 'left')
        ->where('t.type', 2)
        ->where('t.status', 0)
        ->groupBy('t.category')
        ->get()
        ->getResultArray();

    $labels = [];
    $values = [];

    foreach ($results as $row) {
        $labels[] = $row['category'] ?? 'Unknown';
        $values[] = floatval($row['total']);
    }

    return [
        'labels' => $labels,
        'values' => $values
    ];
}
// recent 5 treansactions
public function get_recent_transactions($limit = 5)
{
    $query = $this->db->table('tbl_transaction t');

    $query->select('
        t.id,
        t.transaction_date,
        t.voucher_no,
        t.type,
        t.category,
        t.amount,
        t.remarks,
        t.payment_mode,
        t.status,
        t.created_at,
        c.name as category_name,
        m.name as payment_mode_name
    ');

    $query->join('tbl_categories c', 't.category = c.id', 'left');
    $query->join('tbl_mop m', 't.payment_mode = m.id', 'left');

    $query->where('t.status', 0);
    $query->orderBy('t.transaction_date', 'DESC');
    $query->limit($limit);

    return $query->get()->getResultArray();
}


//filter transactions
// filter income transactions
public function get_filtered_transactions($type, $from_date = null, $to_date = null, $category = null)
{
    $query = $this->db->table('tbl_transaction t');
    

    $query->select('
        t.id,
        t.transaction_date,
        t.voucher_no,
        t.type,
        t.category,
        t.amount,
        t.remarks,
        t.payment_mode,
        t.status,
        t.created_at,
        c.name as category_name,
        pm.name as payment_mode_name
    ');

    $query->join('tbl_categories c', 'c.id = t.category', 'left');
    $query->join('tbl_mop pm', 'pm.id = t.payment_mode', 'left');


    // Mandatory filters
    $query->where('t.type', $type);
    $query->where('t.status', 0);

    // ✅ DATE FILTER (FIXED)
    if (!empty($from_date)) {
        $query->where('t.transaction_date >=', $from_date . ' 00:00:00');
    }

    if (!empty($to_date)) {
        $query->where('t.transaction_date <=', $to_date . ' 23:59:59');
    }

    // Category (already working)
    if (!empty($category)) {
        $query->where('t.category', $category);
    }

    $query->orderBy('t.transaction_date', 'DESC');

    return $query->get()->getResultArray();
}


// category totals
public function get_category_totals($type)
{
    $query = $this->db->table('tbl_transaction t');

    $query->select('c.name as category_name, SUM(t.amount) as total_amount');
    $query->join('tbl_categories c', 't.category = c.id', 'left');

    // Dynamic type
    $query->where(['t.type' => $type, 't.status' => 0]);

    $query->groupBy('t.category');
    $query->orderBy('total_amount', 'DESC');

    return $query->get()->getResultArray();
}
    

//statement of account report


public function get_soa_report($payment_mode = null, $from_date = null, $to_date = null)
{
    $query = $this->db->table('tbl_transaction t');

    // Select fields including category name
    $query->select('
        t.id,
        t.transaction_date,
        t.type,
        t.amount,
        t.payment_mode,
        c.name AS category_name
    ');

    // Join category table
    $query->join('tbl_categories c', 't.category = c.id', 'left');

    // Only active transactions
    $query->where('t.status', 0);

    // Payment mode filter
    if (!empty($payment_mode)) {
        $query->where('t.payment_mode', $payment_mode);
    } else {
        // Default to "Bank Transfer" if payment_mode is not set
        $bank = $this->db->table('tbl_mop')
            ->select('id')
            ->where('LOWER(name)', 'bank transfer')
            ->get()
            ->getRowArray();

        if ($bank) {
            $query->where('t.payment_mode', $bank['id']);
        }
    }

    // Date range filter (DATETIME)
    if (!empty($from_date)) {
        $query->where('t.transaction_date >=', $from_date . ' 00:00:00');
    }

    if (!empty($to_date)) {
        $query->where('t.transaction_date <=', $to_date . ' 23:59:59');
    }

    // Order by date ascending
    $query->orderBy('t.transaction_date', 'ASC');

    // Execute and return result
    return $query->get()->getResultArray();
}

//file upload






// public function get_soa_report($payment_mode = null,$from_date = null, $to_date = null)
// {
//     $query = $this->db->table('tbl_transaction t');

//     $query->select('
//     t.id,
//         t.transaction_date,
//         t.type,
//         t.amount,
//         t.payment_mode,
//         c.name AS category_name
//     ');

//     $query->join('tbl_categories c', 't.category = c.id', 'left');

//     $query->where('t.status', 0);

 

//     // Optional payment mode filter
//     if (!empty($payment_mode)) {
//         $query->where('t.payment_mode', $payment_mode);
//     }
//     if (!empty($from_date)) {
//         $query->where('t.transaction_date >=', $from_date . ' 00:00:00');
//     }

//     if (!empty($to_date)) {
//         $query->where('t.transaction_date <=', $to_date . ' 23:59:59');
//     }

//     // Important for running balance
//     $query->orderBy('t.transaction_date', 'ASC');

//     return $query->get()->getResultArray();
// }







//=========    
}




