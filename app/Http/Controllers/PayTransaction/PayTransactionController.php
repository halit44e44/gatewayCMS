<?php

namespace App\Http\Controllers\PayTransaction;

use App\Http\Controllers\Controller;
use App\Models\PayTransaction;
use App\Models\Products;
use App\Models\Result;
use App\Repositories\PayTransactionRepository;
use Illuminate\Http\Request;

class PayTransactionController extends Controller
{
    public function __construct(PayTransactionRepository $payTransactionRepository)
    {
        $this->payTransactionRepo = $payTransactionRepository;
    }
    public function index()
    {
        $data = [
            'breadcrumb' => [
                'title' => __('payTransaction.mainTitle'),
            ],
            'dataTable' => [
                'source' => 'PayTransaction',
                'columnsTitles' => [
                    __('payTransaction.tableId'),
                    __('payTransaction.tableCustomer'),
                    __('payTransaction.tablePrice'),
                    __('payTransaction.tableOrderId'),
                    __('payTransaction.tableConversation'),
                    __('payTransaction.tableBank'),
                    __('payTransaction.tableCompany'),
                    __('payTransaction.tableDescription'),
                    __('payTransaction.tableEmail'),
                    __('payTransaction.tableCreated')
                ],
                // 'value'=>'status',
                'columns' => [
                    'DT_RowIndex',
                    'customer_id',
                    'price',
                    'orderId',
                    'conversationId',
                    'bank_id',
                    'company_id',
                    'description',
                    'eMail',
                    'created_at'
                ],
                'route' => 'payTransactions',
                'delete' => [
                    'titleField' => 'title'
                ],
                'popup' => true,

            ],

        ];
        return view('payTransactions.index')->with('data', $data);
    }

    public function list()
    {
        $data = [
            'breadcrumb' => [
                'title' => __('payTransaction.mainTitle'),
            ],
            'dataTable' => [
                'source' => 'PayTransaction',
                'columnsTitles' => [
                    __('payTransaction.tableId'),
                    __('payTransaction.tableCustomer'),
                    __('payTransaction.tablePrice'),
                    __('payTransaction.tableOrderId'),
                    __('payTransaction.tableConversation'),
                    __('payTransaction.tableBank'),
                    __('payTransaction.tableCompany'),
                    __('payTransaction.tableDescription'),
                    __('payTransaction.tableEmail'),
                    __('payTransaction.tableCreated')
                ],

                'columns' => [
                    'DT_RowIndex',
                    'customer_id',
                    'price',
                    'orderId',
                    'conversationId',
                    'bank_id',
                    'company_id',
                    'description',
                    'eMail',
                    'created_at'
                ],
                'route' => 'payTransactions',
                'delete' => [
                    'titleField' => 'title'
                ],
                'popup' => true,

            ],

        ];
        return view('payTransactions.index')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $data = [];
        $temp =  PayTransaction::whereId($id)->with(['banks', 'companies', 'currencies', 'customers', 'results'])->first();

        if ($temp) {
            $productsNames = Products::whereIn('id', json_decode($temp->product_id))->pluck('itemName');
            $resultMessage = Result::whereId($temp->result_id)->pluck('resultMessage');

            $data = [
                'product_id' => $productsNames,
                'bank_id' => $temp->banks->name,
                'company_id' => $temp->companies->name,
                'currenicy_id' => $temp->currencies->name,
                'customer_id' => $temp->customer_id,
                'fullName' => $temp->customers->fullName,
                'conversationId' => $temp->conversationId,
                'price' => $temp->price,
                'description' => $temp->description,
                'paymentUrl' => $temp->paymentUrl,
                'status' => $temp->status,
                'tcNo' => $temp->customers->tcNo,
                'phone' => $temp->customers->phone,
                'eMail' => $temp->customers->eMail,
                'ip' => $temp->customers->ip,
                'created_at' => $temp->created_at,
                'updated_at' => $temp->updated_at,
                'status' => $temp->status,
                'Cstatus' => $temp->customers->status,
                'customerType' => $temp->customers->customerType,
                'resultMessage' => $resultMessage,

            ];
        }
        return response()->json($data);
    }

    public function getData()
    {
        $allList = PayTransaction::with('companies')->get();
        return response()->json($allList);
    }

    public function edit(PayTransaction $payTransaction)
    {
        //
    }


    public function update(Request $request, PayTransaction $payTransaction)
    {
        //
    }


    public function destroy(PayTransaction $payTransaction)
    {
        //
    }
}
