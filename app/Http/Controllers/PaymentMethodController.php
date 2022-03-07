<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodRequest;
use App\Models\Banks;
use App\Models\Company;
use App\Models\CompanyPaymentMethod;
use App\Repositories\PaymentMethodRepository;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function __construct(PaymentMethodRepository $paymentMethodRepository)
    {
        $this->paymentMethodRepo = $paymentMethodRepository;
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(PaymentMethodRequest $request)
    {
        $result = $this->paymentMethodRepo->save($request);
        return redirect()->back()->with($result);
    }
    public function showDetails($id)
    {

        $item = CompanyPaymentMethod::where('id', $id)->with(['banks'])->find($id);
        return response()->json($item);
    }


    public function show(Request $request)
    {

        $company = Company::where('id', $request->id)->with(['balances'])->first();

        // $companies = Company::all();
        $banks = Banks::all();

        $data = [

            'breadcrumb' => [
                'title' => __('company.mainTitle'),
            ],
            'dataTable' => [
                'id' => $request->id,
                'source' => 'CompanyPaymentMethod',
                'columnsTitles' => [
                    '#',
                    __('company.tableId'),
                    __('company.tableName'),
                    __('company.tableDescription'),
                    __('company.tablePercent'),
                    __('company.tableMax'),
                    __('company.tableMin'),
                    __('company.tableControl'),
                    __('company.tableStatus'),
                ],
                'columns' => [
                    'DT_RowIndex',
                    'id',
                    'name',
                    'description',
                    'percent',
                    'maxValue',
                    'minValue',
                    'controlValue',
                    'isActive',
                ],
                'route' => 'paymentMethods',
                'delete' => [
                    'titleField' => 'name'
                ],
                'popup' => true,
                'edit' => [
                    'columns' => [
                        'id',
                        'name',
                        'hostname',
                        'ipn',
                        // 'status',
                    ]
                ]
            ],

        ];

        return view('companies.details')->with('data', $data)->with('company', $company)->with('banks', $banks);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $data = CompanyPaymentMethod::find($id);
        $data->delete();
        return redirect()->route('paymentMethods.index')->with('success', 'Method is deleted successfully');
    }
}
