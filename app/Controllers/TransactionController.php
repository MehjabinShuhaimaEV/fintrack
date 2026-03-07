<?php

namespace App\Controllers;
use App\Models\NewModel;


use App\Controllers\BaseController;
require_once APPPATH . '../vendor/autoload.php';
use TCPDF;
$uploadPath = FCPATH . 'assets/uploads';


class TransactionController extends BaseController
{
    protected $NewModel;
    public function __construct()
    {
        $db = db_connect();
        $this->NewModel = new NewModel($db);

    }

    public function index()
    {
        //
    }

    //TRANSACTION  FROM HERE
    public function transaction()
    {
        $paymentModes = $this->NewModel->select_data(
            'tbl_mop',
            'id, name',
            ['status' => 0]
        );

        return view('transaction/transaction', [
            'paymentModes' => $paymentModes
        ]);
    }

    //FETCHING CATEGORIES BASED ON TYPE
    public function get_categories()
    {
        $typeId = $this->request->getPost('type_id');
        $categories = $this->NewModel->select_data('tbl_categories', 'id,name', ['where' => ['type' => $typeId]]);
        // dd($categories);
        return $this->response->setJSON($categories);
    }

    //FORM SUBMISSION 
    public function save_transaction()
    {

        $form = $this->request->getPost();
        // dd($form);
        // print_r($form);
        $dates = $form['date'];

        // Count of dates
        $count = count($dates);

        for ($i = 0; $i < $count; $i++) {

            // Prepare data for this index
            $data = [
                'user_id' => 1,
                'transaction_date' => $dates[$i],
                'type' => $form['type'][$i],
                'category' => $form['category'][$i],
                'amount' => $form['amount'][$i],
                'description' => $form['remarks'][$i],
                'payment_mode' => $form['payment_mode'][$i],
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ];
            // dd($data);

            // Insert row
            $this->NewModel->insert_to_tb('tbl_transaction', $data);

        }
        session()->setFlashdata('success', 'Account created successfully!');
        return redirect()->back()->with('success', 'Transactions saved successfully!');
    }
    // INCOME LIST






    // Optional: You can create a similar method for expense
    public function expense_listfilter()
    {
        $filters = [
            'search' => $this->request->getGet('search') ?? '',
            'date_from' => $this->request->getGet('date_from') ?? '',
            'date_to' => $this->request->getGet('date_to') ?? '',
            'category' => $this->request->getGet('category') ?? '',
            'type' => 2 // 2 = expense
        ];

        $hasFilters = !empty($filters['search']) || !empty($filters['date_from']) ||
            !empty($filters['date_to']) || !empty($filters['category']);

        if ($hasFilters) {
            $expenseList = $this->NewModel->filterTransactions('tbl_transaction', $filters);
        } else {
            $expenseList = $this->NewModel->get_transactions(2); // 2 = expense
        }

        $categories = $this->NewModel->select_data(
            'tbl_categories',
            'id, name',
            ['where' => ['type' => 2]]
        );

        return view('transaction/expenselist', [
            'expenseList' => $expenseList,
            'categories' => $categories,
            'filters' => $filters
        ]);
    }



    public function income_list()
    {
        $transactions = $this->NewModel->get_totals(1);

        $categories = $this->NewModel->select_data(
            'tbl_categories',
            'id, name',
            ['where' => ['type' => 1]]
        );
        $incomeList = $this->NewModel->get_transactions(1);
        return view('transaction/incomelist', ['incomeList' => $incomeList, 'categories' => $categories, 'transactions' => $transactions]);
    }
    public function income_listfilter()
    {
        // Get POST values (MATCH FORM NAMES)
        $from_date = $this->request->getPost('from_date');
        $to_date = $this->request->getPost('to_date');
        $category = $this->request->getPost('category');

        // Optional search if you use it
        $search = $this->request->getPost('search');

        // For keeping values in form
        $data['filters'] = [
            'from_date' => $from_date,
            'to_date' => $to_date,
            'category' => $category,
            'search' => $search
        ];

        $data['categories'] = $this->NewModel->select_data(
            'tbl_categories',
            'id, name',
            ['where' => ['type' => 1]]
        );

        // ✅ CORRECT METHOD CALL
        $data['incomeList'] = $this->NewModel->get_filtered_transactions(
            1,          // type = income
            $from_date,
            $to_date,
            $category
        );

        return view('transaction/incomelist', $data);
    }




    // EXPENSE LIST
    public function expense_list()
    {
        $incomeList = $this->NewModel->get_transactions(2);
        return view('transaction/expenselist', ['incomeList' => $incomeList]);
    }

    public function update_transaction()
    {
        // echo "here=-=-=--=-";
        // exit();
        // Check if form is submitted
        if ($this->request->getMethod() === 'post') {

            $form = $this->request->getPost();

            $data = [
                'transaction_date' => $form['date'],
                'type' => $form['type'],
                'category' => $form['category'],
                'amount' => $form['amount'],
                'payment_mode' => $form['payment_mode'],
                'description' => $form['remarks'],
            ];

            $id = $form['id'];

            // Update the transaction
            $this->NewModel->update_data('tbl_transaction', $data, ['id' => $id]);

            // Set flashdata for success message
            session()->setFlashdata('success', 'Transaction updated successfully!');

            // Redirect to transaction list page (or any page you want)
            return redirect()->to(base_url('income_list'));
        }
        $id = $this->request->getGet('id');

        // Get the transaction details
        $transaction = $this->NewModel->select_data(
            'tbl_transaction',
            '*',
            ['where' => ['id' => $id]]
        );

        if (empty($transaction)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Transaction not found");
        }

        $transaction = $transaction[0];

        // Get filtered categories
        $categories = $this->NewModel->select_data(
            'tbl_categories',
            'id, name',
            ['where' => ['type' => $transaction['type']]]
        );

        // Get payment modes
        $paymentModes = $this->NewModel->select_data(
            'tbl_mop',
            'id, name',
            ['where' => ['status' => 0]]
        );

        return view('transaction/edit', [
            'transaction' => $transaction,
            'categories' => $categories,
            'paymentModes' => $paymentModes
        ]);
    }
    // DELETE TRANSACTION
    public function delete_transaction()
    {
        $id = $this->request->getPost('id');
        $type = $this->request->getPost('type');
        // dd($id); 

        if (!$id) {
            return redirect()->back()->with('error', 'Invalid transaction ID');
        }


        $this->NewModel->update_data(
            'tbl_transaction',
            ['status' => 1],
            ['id' => $id]
        );
        // $type = $[0]['type']; // 1 or 2

        $redirect_url = ($type == 1) ? '/income_list' : '/expense_list';

        return redirect()->to($redirect_url)->with('success', 'Transaction deleted successfully');
    }

    public function view_transaction()
    {
        $id = $this->request->getGet('id');

        // Fetch transaction data
        $transaction = $this->NewModel->select_data(
            'tbl_transaction',
            '*',
            ['where' => ['id' => $id]]
        );

        if (empty($transaction)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Transaction not found");
        }

        $transaction = $transaction[0];

        // Fetch category name
        $category = $this->NewModel->select_data(
            'tbl_categories',
            'name',
            ['where' => ['id' => $transaction['category']]]
        );
        $transaction['category_name'] = $category[0]['name'] ?? '';

        // Fetch payment mode name
        $paymentMode = $this->NewModel->select_data(
            'tbl_mop',
            'name',
            ['where' => ['id' => $transaction['payment_mode']]]
        );
        $transaction['payment_mode_name'] = $paymentMode[0]['name'] ?? '';

        return view('transaction/view', [
            'transaction' => $transaction,
            'categories' => $category,
            'paymentModes' => $paymentMode,
        ]);
    }

    // satement of account report
    public function soa_report()
    {
        // Get filters from GET
        $payment_mode = $this->request->getGet('payment_mode');
        $from_date = $this->request->getGet('from_date');
        $to_date = $this->request->getGet('to_date');

        // Fetch filtered transactions
        $transactions = $this->NewModel->get_soa_report($payment_mode, $from_date, $to_date);

        // Fetch payment modes for dropdown
        $paymentModes = $this->NewModel->get_payment_modes();

        // If no payment_mode selected, default to Bank
        if (empty($payment_mode)) {
            $bank = array_filter($paymentModes, function ($m) {
                return strtolower($m['name']) == 'bank transfer';
            });
            $payment_mode = !empty($bank) ? array_values($bank)[0]['id'] : null;
        }

        return view('transaction/soareport', [
            'transactions' => $transactions,
            'paymentModes' => $paymentModes,
            'selected_mode' => $payment_mode
        ]);
    }


//pdf generation for soa



public function soa_pdf()
{
    $payment_mode = $this->request->getGet('payment_mode');
    $from_date    = $this->request->getGet('from_date');
    $to_date      = $this->request->getGet('to_date');

    // Fetch filtered transactions
    $transactions = $this->NewModel->get_soa_report($payment_mode, $from_date, $to_date);
    $paymentModes = $this->NewModel->get_payment_modes();

    $mode_name = 'All';
    if ($payment_mode) {
        $mode = array_filter($paymentModes, fn($m) => $m['id'] == $payment_mode);
        $mode_name = !empty($mode) ? array_values($mode)[0]['name'] : 'All';
    }

    // Calculate totals
    $totalIncome = 0;
    $totalExpense = 0;
    foreach ($transactions as $trans) {
        if ($trans['type'] == 1) {
            $totalIncome += $trans['amount'];
        } else {
            $totalExpense += $trans['amount'];
        }
    }
    $netBalance = $totalIncome - $totalExpense;

    // Initialize TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator('FinTrack');
    $pdf->SetTitle('SOA Report');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(15, 15, 15);
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->AddPage();

    // Build HTML with Professional Styling
    $html = '
    <style>
        h2 {
            color: #1e40af;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 5px;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 10px;
        }
        .company-info {
            text-align: center;
            color: #648b7aff;
            font-size: 11px;
            margin-top: 15px;
            margin-bottom: 20px;
        }
       .info-section {
            
            width: 80%;
            margin: 10px auto 30px auto;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.15);
        }


        .info-section p {
            
            margin: 5px 0;
            font-size: 11px;
            color: #334155;
            padding: 10px 0;
        }
        .info-label {
         
            font-weight: bold;
            color: #1e293b;
        }
        .summary-box {
            margin: 20px 0;
            background: linear-gradient(to right, #eff6ff, #dbeafe);
            padding: 15px;
            border-radius: 8px;
            border: 2px solid #3b82f6;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            font-size: 12px;
        }
        .summary-label {
            font-weight: bold;
            color: #1e293b;
        }
        .summary-income {
            color: #16a34a;
            font-weight: bold;
            font-size: 13px;
        }
        .summary-expense {
            color: #dc2626;
            font-weight: bold;
            font-size: 13px;
        }
        .summary-balance {
            color: #2563eb;
            font-weight: bold;
            font-size: 14px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
            
        }
        thead {
            background: linear-gradient(to bottom, #1e40af, #2563eb);
            color: white;
        }
        th {
            padding: 10px 8px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid #1e40af;
        }
        td {
            padding: 8px;
            font-size: 10px;
            border: 1px solid #cbd5e1;
            color: #334155;
        }
        tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }
        tbody tr:hover {
            background-color: #f1f5f9;
        }
        .type-income {
            background-color: #dcfce7;
            color: #16a34a;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 9px;
        }
        .type-expense {
            background-color: #fee2e2;
            color: #dc2626;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 9px;
        }
        .amount-credit {
            color: #16a34a;
            font-weight: bold;
        }
        .amount-debit {
            color: #dc2626;
            font-weight: bold;
        }
        .amount-balance {
            color: #2563eb;
            font-weight: bold;
        }
        .total-row {
        
            background: linear-gradient(to right, #e0f2fe, #bae6fd) !important;
            font-weight: bold;
            
     

        }
        .total-row td {
            padding: 12px 8px;
            font-size: 11px;
          
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #94a3b8;
            font-style: italic;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 9px;
            color: #94a3b8;
            padding-top: 10px;
            margin: 10px auto 30px auto;
        }
        .footer h1{
           border-top: 2px solid #000000ff;
        }
        
    </style>
    
    <h2>STATEMENT OF ACCOUNTS</h2>
    <div class="company-info"></div>
    <div class="company-info">FinTrack - Financial Management System</div>
    
    <div class="info-section">
        <p><span class="info-label">Generated Date:</span> '.date('d M Y, h:i A').'</p>
        <p><span class="info-label">Payment Mode:</span> '.$mode_name.'</p>
        <p><span class="info-label">Date Range:</span> '.($from_date && $to_date ? "$from_date to $to_date" : "All Periods").'</p>
        <p><span class="info-label">Total Transactions:</span> '.count($transactions).'</p>
    </div>
    
    <div class="summary-box">
        <table style="border:none; width:100%;">
            <tr>
                <td style="border:none; width:33%; text-align:center;">
                    <div class="summary-label">Total Income</div>
                    <div class="summary-income"> '.number_format($totalIncome, 2).'</div>
                </td>
                <td style="border:none; width:33%; text-align:center;">
                    <div class="summary-label">Total Expenses</div>
                    <div class="summary-expense"> '.number_format($totalExpense, 2).'</div>
                </td>
                <td style="border:none; width:33%; text-align:center;">
                    <div class="summary-label">Net Balance</div>
                    <div class="summary-balance"> '.number_format($netBalance, 2).'</div>
                </td>
            </tr>
        </table>
    </div>
    
    <table cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th style="text-align:left; width:12%;">Date</th>
                <th style="text-align:center; width:12%;">Type</th>
                <th style="text-align:left; width:28%;">Category</th>
                <th style="text-align:right; width:16%;">Credited ()</th>
                <th style="text-align:right; width:16%;">Debited ()</th>
                <th style="text-align:right; width:16%;">Balance ()</th>
            </tr>
        </thead>
        <tbody>';

    $balance = 0;

    if (!empty($transactions)) {
        foreach ($transactions as $row) {
            $date     = date('d-m-Y', strtotime($row['date']));
            $type     = $row['type'] == 1 ? '<span class="type-income">INCOME</span>' : '<span class="type-expense">EXPENSE</span>';
            $category = $row['category_name'] ?? '';
            
            if ($row['type'] == 1) {
                $credited = '<span class="amount-credit">+ '.number_format($row['amount'], 2).'</span>';
                $debited = '—';
            } else {
                $credited = '—';
                $debited = '<span class="amount-debit">− '.number_format($row['amount'], 2).'</span>';
            }

            $balance += ($row['type'] == 1 ? $row['amount'] : -$row['amount']);

            $html .= '<tr>
                    <td style="text-align:left;">'.$date.'</td>
                    <td style="text-align:center;">'.$type.'</td>
                    <td style="text-align:left;">'.$category.'</td>
                    <td style="text-align:right;">'.$credited.'</td>
                    <td style="text-align:right;">'.$debited.'</td>
                    <td style="text-align:right;"><span class="amount-balance">'.number_format($balance, 2).'</span></td>
                  </tr>';
        }
        
        // Total Row
        $html .= '<tr class="total-row">
        
                <td colspan="3" style="text-align:right;"><strong>GRAND TOTAL</strong></td>
                <td style="text-align:right;"><span class="amount-credit"> '.number_format($totalIncome, 2).'</span></td>
                <td style="text-align:right;"><span class="amount-debit"> '.number_format($totalExpense, 2).'</span></td>
                <td style="text-align:right;"><span class="amount-balance"> '.number_format($balance, 2).'</span></td>
              </tr>';
    } else {
        $html .= '<tr><td colspan="6" class="no-data">No Transactions Found</td></tr>';
    }

    $html .= '</tbody>
    </table>
    
    <div class="footer">
        <h1></h1>
        <p>This is a computer-generated document and does not require a signature.</p>
        <p>© '.date('Y').' FinTrack - All Rights Reserved | Generated on '.date('d-M-Y H:i:s').'</p>
    </div>';

    // Output PDF
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('SOA_Report.pdf', 'I');
    // $pdf->Output('SOA_Report.pdf', 'D'); not importanttt auto download
    exit;
}

    //upload files

 public function uploadFiles()
    {
        return view('transaction/fileuplaod'); // create this view
    }
    public function upload()
{
    $file = $this->request->getFile('file');
    


    if (!$file || !$file->isValid()) {
        return redirect()->back()->with('error', 'Invalid file');
    }

    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];

    if (!in_array($file->getExtension(), $allowedTypes)) {
        return redirect()->back()->with('error', 'Invalid file type');
    }

    $uploadPath = FCPATH . 'assets/uploads';

  
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $newName = $file->getRandomName();

    
    $file->move($uploadPath, $newName);

    
    $data = [
        'bill_no'     => $this->request->getPost('bill_no'),
        'upload_file' =>  $newName, // store relative path
        'status'      => 0,
        'created_at'  => date('Y-m-d H:i:s')
    ];

    $this->NewModel->insert_to_tb('tbl_uploads', $data);

    return redirect()->to(base_url('upload-list'))
                         ->with('success', 'File uploaded successfully');
}

    public function listUploads()
    {
        $uploads = $this->NewModel->select_data('tbl_uploads', '*', ['where' => ['status' => 0]]);
        return view('transaction/list_uploads', ['uploads' => $uploads]);
    }







    
    //pdf generation for soa

    

//    public function soa_pdf()
// {
//     $payment_mode = $this->request->getGet('payment_mode');
//     $from_date    = $this->request->getGet('from_date');
//     $to_date      = $this->request->getGet('to_date');

//     // Fetch filtered transactions
//     $transactions = $this->NewModel->get_soa_report($payment_mode, $from_date, $to_date);
//     $paymentModes = $this->NewModel->get_payment_modes();

//     $mode_name = 'All';
//     if ($payment_mode) {
//         $mode = array_filter($paymentModes, fn($m) => $m['id'] == $payment_mode);
//         $mode_name = !empty($mode) ? array_values($mode)[0]['name'] : 'All';
//     }

//     // Initialize TCPDF
//     $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
//     $pdf->SetCreator('FinTrack');
//     $pdf->SetTitle('SOA Report');
//     $pdf->SetHeaderMargin(5);
//     $pdf->SetMargins(10, 10, 10, true);
//     $pdf->AddPage();

//     // Table Styles
//     $tableStyle = 'border:1px solid #dee2e6; border-collapse: collapse;';
//     $theadStyle = 'background-color:#f8f9fa; font-weight:bold;';

//     // Build HTML table
//     $html = '<h2>Statement of Accounts</h2>';
//     $html .= "<p>Payment Mode: <strong>$mode_name</strong></p>";
//     $html .= "<p>Date Range: <strong>{$from_date} to {$to_date}</strong></p>";

//     $html .= '<table cellpadding="6" cellspacing="0" style="'.$tableStyle.' width:100%;">';

//     // Table Header
//     $html .= '<thead style="'.$theadStyle.'">
//                 <tr>
//                     <th style="text-align:left;">Date</th>
//                     <th style="text-align:left;">Type</th>
//                     <th style="text-align:left;">Category</th>
//                     <th style="text-align:right;">Credited</th>
//                     <th style="text-align:right;">Debited</th>
//                     <th style="text-align:right;">Balance</th>
//                 </tr>
//               </thead><tbody>';

//     $balance = 0;

//     if (!empty($transactions)) {
//         foreach ($transactions as $row) {
//             $date     = date('d-m-Y', strtotime($row['date']));
//             $type     = $row['type'] == 1 ? 'Income' : 'Expense';
//             $category = $row['category_name'] ?? '';
//             $credited = $row['type'] == 1 ? number_format($row['amount'], 2) : '';
//             $debited  = $row['type'] == 2 ? number_format($row['amount'], 2) : '';

//             $balance += ($row['type'] == 1 ? $row['amount'] : -$row['amount']);

//             $html .= '<tr>
//                         <td style="text-align:left;">'.$date.'</td>
//                         <td style="text-align:left;">'.$type.'</td>
//                         <td style="text-align:left;">'.$category.'</td>
//                         <td style="text-align:right;">'.$credited.'</td>
//                         <td style="text-align:right;">'.$debited.'</td>
//                         <td style="text-align:right;">'.number_format($balance, 2).'</td>
//                       </tr>';
//         }
//     } else {
//         $html .= '<tr><td colspan="6" align="center">No Transactions Found</td></tr>';
//     }

//     $html .= '</tbody></table>';

//     // Output PDF
//     $pdf->writeHTML($html, true, false, true, false, '');
//     $pdf->Output('SOA_Report.pdf', 'I');
//     // $pdf->Output('SOA_Report.pdf', 'D'); // 'D' = download
//     exit;
// }











    //--
}
