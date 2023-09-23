<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JController extends BaseController
{
    private $lab1;
    public function __construct()
    {
       $this->lab1 = new \App\Models\JModel();
    }

    public function index()
    {
        //nah
    }

    public function insert()
    {
        $ID = $_POST['ID'];
        $data = [
            'ProductName' => $this->request->getVar('ProdName'),
            'ProductDescription'=> $this->request->getVar('ProdDesc'),
            'ProductCategory'=> $this->request->getVar('ProdCat'),
            'ProductQuantity'=> $this->request->getVar('ProdQuan'),
            'ProductPrice'=> $this->request->getVar('ProdPr'),
        ];
        if ($ID!= null) {
            $this->lab1->set($data)->where('ID', $ID)->update();
        } else {
               $this->lab1->save($data);
        }

        return redirect()->to('/lab1');
    }

    public function edit($ID)
        {
            $data = [
                'lab1' => $this->lab1->findAll(),
                'user' => $this->lab1->where('ID', $ID)->first(),
            ];
            return view('jhome', $data);
        }

    public function getCategories()
    {
        // Fetch distinct ProductCategory values from your database
        $query = $this->distinct()
                      ->select('ProductCategory') // Select the ProductCategory column
                      ->get($this->table);

        return $query->getResultArray();
    }


    public function delete($ID)
    {
        $this->lab1->delete($ID);
        return redirect()->to('/lab1');
    }

    public function lab1($lab1)
    {
        echo $lab1;
    }

    public function jhome()
    {
       $data['lab1'] = $this->lab1->findAll();
       return view('jhome', $data);
    }
}
