<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\PayTransaction;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepo = $companyRepository;
    }

    public function index()
    {
        $data = [
            'breadcrumb' => [
                'title' => __('company.mainTitle'),
            ],
            'dataTable' => [
                'source' => 'Company',
                'columnsTitles' => [
                    __('company.tableId'),
                    __('company.tableName'),
                    __('company.tableHostname'),
                    __('company.tableIpn'),
                    __('company.tableBalance'),
                    __('company.tableisActive'),
                ],
                'columns' => [
                    'DT_RowIndex',
                    'name',
                    'hostname',
                    'ipn',
                    'balance',
                    'isActive',
                ],
                'route' => 'companies',
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
        return view('companies.index')->with('data', $data);
    }

    public function create()
    {
        //

    }
    public function details()
    {
    }

    public function store(CompanyRequest $request)
    {
        $result = $this->companyRepo->save($request);

        return redirect()->route('companies.index')->with($result);
    }

    public function show(Request $request)
    {
        $companies = Company::all();
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
                'route' => '/companies',
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
        // return view('companies.index')->with('data', $data);

        return view('companies.details')->with('companies', $companies)->with('data', $data);
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
        //  dd($id); 
        $companies = Company::find($id);
        $item = PayTransaction::where('company_id', $id)->first();
        if ($item) {
            return redirect()->route('companies.index')->withErrors(['errors', __('company.error1')]);
        }
        $companies->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
