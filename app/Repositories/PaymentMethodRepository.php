<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\CompanyPaymentMethod;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

class PaymentMethodRepository extends EloquentRepository
{
    protected $entity = CompanyPaymentMethod::class;

    function save($request)
    {
        // dd($request->all());
        $data = ['error', 'error'];

        if ($request->get('pId')) {
            $method = CompanyPaymentMethod::where('id', $request->get('pId'))->first();
            $action = 'updated';
        } else {
            $method = new CompanyPaymentMethod();
            // dd($request);

            $action = 'created';
        }
        // $method->bank_desc = $request->get('bank_desc');
        $method->company_id = $request->get('company_id');
        $method->bank_id = $request->input('bank_id');
        $method->percent = $request->get('percent');
        $method->maxValue = $request->get('maxValue');
        $method->minValue = $request->get('minValue');
        $method->controlValue = $request->get('controlValue');
        $method->isActive = $request->boolean('isActive');

        // dd($method);
        $method->save();
        
        if ($method) {
            $data = ['success' => 'Payment Method ' . $action . ' successfully.'];
        }
        return $data;
    }
    function allData()
    {
        $data = CompanyPaymentMethod::latest()->get();
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

    function dataTable($id)
    {
        $data = [];
        
        $rowData = CompanyPaymentMethod::where('company_id',$id)->with(['banks'])->get();
        if (count($rowData) > 0) {
          
            foreach ($rowData as $row) {
                // $item = null;
                // if(isset($row->paymentMethods->paymentMethod)){
                //     $item=$row->paymentMethods->paymentMethod;
                // }
                $data[] = [
                    'id' => $row->id,
                    'name' => $row->banks->name,
                    'description' => $row->banks->description,
                    'percent' => $row->percent,
                    'maxValue' => $row->maxValue,
                    'minValue' => $row->minValue,
                    'controlValue' => $row->controlValue,
                    'isActive' => $row->isActive,
                    'action' => '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn edit btn-outline-warning btn-sm"><i class="bx bx-edit"></i></a>
                                <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn delete btn-outline-danger btn-sm"><i class="bx bx-trash"></i></a>'
                ];
            }
        }
        return $data;
    }
}
