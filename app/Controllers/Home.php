<?php

namespace App\Controllers;

use App\Controllers\BaseController;



use App\Models\NewModel;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class Home extends BaseController
{

    public function __construct()
    {
        $db = db_connect();
        $this->NewModel = new NewModel($db);

    }
    public function index()
    {
        return view('dahsboard');
    }

    public function register()
    {

        return view('auth/register');
    }
//    public function dashboard()
// {
//     // Use the existing model instance
//     $model = $this->NewModel;

//     // Get totals (income, expense, balance)
//     $totals = $model->get_totals();

//     // Get dashboard summary (today, this month, etc.)
//     $summary = $model->get_dashboard_summary();

//     // Send data to view
//     return view('dashboard', [
//         'totals'  => $totals,
//         'summary' => $summary
//     ]);
// }
public function dashboard()
{
    $totals   = $this->NewModel->get_totals();
    $summary  = $this->NewModel->get_dashboard_summary();
    $monthly  = $this->NewModel->get_monthly_totals();
    $categoryExpense = $this->NewModel->get_category_expense_totals();
    $last    = $this->NewModel->get_recent_transactions(5);
    $incomeCategoryTotals = $this->NewModel->get_category_totals(1);
    $expenseCategoryTotals = $this->NewModel->get_category_totals(2);

    return view('dashboard', [
         'totals'  => $totals,
        'summary'         => $summary,
        'monthly'         => $monthly,
        'categoryExpense' => $categoryExpense,
        'last'           => $last,
        'incomeCategoryTotals'   => $incomeCategoryTotals,
        'expenseCategoryTotals'  => $expenseCategoryTotals,
    ]);
}

//soa reposrt====





    // public function dashboard()
    // {
    //     // if(!session()->get('isloggedIn')){
    //     //     return redirect()->to('/');
    //     // }else{
    //     return view('dashboard');
    //     // }
    // }

    // public function transaction()
    // {
    //     $paymentModes = $this->NewModel->select_data(
    //         'tbl_mop',
    //         'id, name',
    //         ['status' => 0]
    //     );

    //     return view('transaction/transaction', [
    //         'paymentModes' => $paymentModes
    //     ]);
    // }


    // public function get_categories()
    // {
    //     $typeId = $this->request->getPost('type_id');
    //     $categories = $this->NewModel->select_data('tbl_categories', 'id,name', ['where' => ['type' => $typeId]]);
    //     // dd($categories);
    //     return $this->response->setJSON($categories);
    // }

    // public function save_transaction()
    // {

    //     $form = $this->request->getPost();
    //     // dd($form);
    //     // print_r($form);
    //     $dates = $form['date'];

    //     // Count of dates
    //     $count = count($dates);

    //     for ($i = 0; $i < $count; $i++) {

    //         // Prepare data for this index
    //         $data = [
    //             'date' => $dates[$i],
    //             'voucher_no' => $form['voucher_no'][$i],
    //             'type' => $form['type'][$i],
    //             'category' => $form['category'][$i],
    //             'amount' => $form['amount'][$i],
    //             'remarks' => $form['remarks'][$i],
    //             'payment_mode' => $form['payment_mode'][$i],
    //             'status' => 0,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'added_by' => 1,
    //         ];
    //         // dd($data);

    //         // Insert row
    //         $this->NewModel->insert_to_tb('tbl_transaction', $data);
    //     }

    //     return redirect()->back()->with('success', 'Transactions saved successfully!');
    // }

    // public function income_list()
    // {
    //     $incomeList = $this->NewModel->get_transactions(1);
    //     // dd($incomeList);   
    //     return view('transaction/incomelist', ['incomeList' => $incomeList]);
    // }
    public function expense_list()
    {
        $incomeList = $this->NewModel->get_transactions(2);
        // dd($incomeList);   
        return view('transaction/expenselist', ['incomeList' => $incomeList]);
    }


    // UPDATE TRANSACTION
//    public function update_transaction()
// {
//     // If form submitted (POST) → update transaction
//     if ($this->request->getMethod() == 'post') {

//         $id = $this->request->getPost('id'); // GET ID FROM POST

//         $form = $this->request->getPost();

//         $data = [
//             'date'          => $form['date'],
//             'voucher_no'    => $form['voucher_no'],
//             'type'          => $form['type'],
//             'category'      => $form['category'],
//             'amount'        => $form['amount'],
//             'remarks'       => $form['remarks'],
//             'payment_mode'  => $form['payment_mode'],
//             'updated_at'    => date('Y-m-d H:i:s')
//         ];

//         $this->NewModel->update_tb('tbl_transaction', $data, ['id' => $id]);

//         return redirect()->back()->with('success', 'Transaction updated successfully!');
//     }

//     // If GET → load the update form
//     $id = $this->request->getGet('id');

//     $transaction = $this->NewModel->select_data(
//         'tbl_transaction',
//         '*',
//         ['where' => ['id' => $id]]
//     );

//     if (empty($transaction)) {
//         throw new \CodeIgniter\Exceptions\PageNotFoundException("Transaction not found");
//     }

//     return view('transaction/updatetransation', [
//         'transaction' => $transaction[0]
//     ]);
// }
















    public function add()
    {
        if ($this->request->getMethod() == 'post')  //check if the method is post or get
        {
            $formdatas = $this->request->getPost(); //fetching all datas form the post and storing in formdata variable
            //   print_r($formdatas);
            $productdatas = [
                'added_by' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'status' => $formdatas['product_status'],
                'product_name' => $formdatas['product_name'],
                'category' => $formdatas['product_category'],
                'brand' => $formdatas['product_brand'],
                'stockqty' => $formdatas['product_stock'],
                'price' => $formdatas['product_price'],
                'discount' => $formdatas['product_discount'],
                'tax' => $formdatas['product_tax'],
                'weight' => $formdatas['product_weight'],
                // 'image'=>$formdatas['product_image'],
                'discription' => $formdatas['product_description'],
            ];
            // print_r($productdatas);
            $this->NewModel->insert_to_tb('tbl_products', $productdatas);

            return redirect()->to('/dashboard');
        } else {
            $categories = $this->NewModel->select_data('tbl_categories', 'id,name', ['where' => ['status' => 0]]);
            return view('product/add', ['categories' => $categories]);
        }
    }
}
