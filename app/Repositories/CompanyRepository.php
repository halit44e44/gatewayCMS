<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\CompanyPaymentMethod;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

class CompanyRepository extends EloquentRepository
{
    protected $entity = Company::class;

    function save($request)
    {
        //dd($request->all());
        $data = ['error', 'error'];

        if ($request->get('id')) {
            $company = Company::where('id', $request->get('id'))->first();
            $action = 'updated';
        } else {
            $company = new Company();
            $action = 'created';
        }
        //$company->company_payment_id =null;
        $company->name = $request->get('name');
        $company->balance_id = $request->get('balance_id');
        $company->hostname = $request->get('hostname');
        $company->ipn = $request->get('ipn');
        $company->image = $request->get('image');
        $company->institutionType = $request->get('institutionType');
        $company->institutionCode = $request->get('institutionCode');
        $company->apiKey = $request->get('apiKey');
        $company->secretKey = $request->get('secretKey');
        $company->isActive = $request->boolean('isActive');
        // dd($company);
        $company->save();
        
        if ($company) {
            $data = ['success' => 'Company ' . $action . ' successfully.'];
        }
        return $data;
    }
    function allData()
    {
        $data = Company::latest()->get();
        return $data;
    }
    function dataTableDetails($id)
    {  
    
        // $data = [];
        
        // $rowData = CompanyPaymentMethod::where('company_id',$id)->with(['banks'])->get();
        // if (count($rowData) > 0) {
          
        //     foreach ($rowData as $row) {
        //         // $item = null;
        //         // if(isset($row->paymentMethods->paymentMethod)){
        //         //     $item=$row->paymentMethods->paymentMethod;
        //         // }
        //         $data[] = [
        //             'id' => $row->id,
        //             'name' => $row->banks->name,
        //             'description' => $row->banks->description,
        //             'percent' => $row->percent,
        //             'maxValue' => $row->maxValue,
        //             'minValue' => $row->minValue,
        //             'controlValue' => $row->controlValue,
        //             'isActive' => $row->isActive,
        //             'action' => '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn edit btn-outline-warning btn-sm"><i class="bx bx-edit"></i></a>
        //                         <a href="javascript:void(0)" id="delete" data-id="' . $row->id . '" class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></a>'
        //         ];
        //     }
        // }
        // return $data;
    }

    function dataTable()
    {
        $data = [];
        $url = "paymentMethods/id";

        $rowData = Company::with(['balances'])->latest()->get();

        if (count($rowData) > 0) {
          
            foreach ($rowData as $row) {
                $item = null;
                if(isset($row->balances->balance)){
                    $item=$row->balances->balance;
                }
                $data[] = [
                    'id' => $row->id,
                    'name' => $row->name,
                    'description' => $row->description,
                    'hostname' => $row->hostname,
                    'ipn' => $row->ipn,
                    'balance' => $item,
                    'isActive' => $row->isActive,
                    'action' => '<form action="' . $url . '"id="form" method="GET" enctype="multipart/form-data">  
                                <input type="hidden" name="id" value="' . $row->id . '">      
                                <button class="btn btn-outline-warning btn-sm"><i class="bx bx-edit"></i></button>                               
                                </form>
                                <a href="javascript:void(0)" id="delete" data-id="' . $row->id . '" class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></a>'
                ];
            }
        }
        return $data;
    }
}
