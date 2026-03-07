<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\NewModel;
class Product extends BaseController
{
    protected $NewModel;
    public function __construct()
    {
        $db = db_connect();
        $this->NewModel = new NewModel($db);

    }
    //product list

    public function index()
     {
    
        $products2 = $this->NewModel->get_products_data();
        // dd($products2);

        return view('product/list', ['products' => $products2]);
    }

       public function products()
    {
        $product_name = $this->request->getGet('product_name');
        $product_category = $this->request->getGet('product_category');
        $product_brand = $this->request->getGet('product_brand');
        $product_stock = $this->request->getGet('product_stock');
        $product_status = $this->request->getGet('product_status');

        $filters = [
            'where' => [],
            'like' => [],
            'where_custom' => [],
        ];


        if (!empty($product_category)) {
            $filters['where']['category'] = $product_category;
        }

        if ($product_status !== null && $product_status !== '') {
            $filters['where']['status'] = $product_status;
        }


        if (!empty($product_stock)) {
            $filters['where_custom']['stockqty >='] = $product_stock;
            // dd($filters);
        }


        if (!empty($product_name)) {
            $filters['like']['product_name'] = $product_name;
            // dd($filters);
        }

        if (!empty($product_brand)) {
            $filters['like']['brand'] = $product_brand;
            // dd($filters);
        }


        $products = $this->NewModel->select_data('tbl_products', '*', $filters);
        dd($products);
        return view('product/list', [
            'products' => $products,
            'page_title' => 'Product List',
            'filters' => [
                'product_name' => $product_name,
                'product_category' => $product_category,
                'product_brand' => $product_brand,
                'product_stock' => $product_stock,
                'product_status' => $product_status,
            ]
        ]);
    }


    public function update()
    {
        // POST request = update data
        if ($this->request->getMethod() == 'post') {

            $formdatas = $this->request->getPost();

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
                'discription' => $formdatas['product_description'],
            ];

            $this->NewModel->update_data('tbl_products', $productdatas, ['id' => $formdatas['product_id']]);

            return redirect()->to('/products')->with('success', 'Product updated successfully');
        }
        $id = $this->request->getGet('id');
        $product = $this->NewModel->select_data(
            'tbl_products',
            '*',
            ['where' => ['id' => $id]]
        );

        if (empty($product)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Product not found");
        }

        return view('product/update', [
            'product' => $product[0]
        ]);
    }

    public function delete()
    {
        $id = $this->request->getGet('id');
        // dd($id);
        $this->NewModel->update_data(
            'tbl_products',
            ['delet_status' => 1],
            ['id' => $id]
        );
       // $this->NewModel->update('tbl_products', ['id' => $id]);

        return redirect()->to('/products')->with('success', 'Product deleted successfully');
    }

}
