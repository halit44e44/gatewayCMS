<?php

namespace App\Http\Controllers\PayTransaction;

use App\Http\Controllers\Controller;
use App\Models\Flag;
use App\Models\PayTransaction;
use App\Models\Products;
use App\Models\Result;
use App\Repositories\PayTransactionRepository;
use App\Repositories\WaitTransactionRepository;
use Illuminate\Http\Request;

class WaitTransactionController extends Controller
{
    public function __construct(WaitTransactionRepository $waitTransactionRepository)
    {
        $this->waitTransactionRepo = $waitTransactionRepository;
    }
    public function index()
    {


        $data = [
            'breadcrumb' => [
                'title' => __('waitTransaction.mainTitle'),
            ],
            'dataTable' => [
                'source' => 'WaitTransaction',
                'columnsTitles' => [
                    __('waitTransaction.tableId'),
                    __('waitTransaction.tableCustomer'),
                    __('waitTransaction.tablePrice'),
                    __('waitTransaction.tableOrderId'),
                    __('waitTransaction.tableConversation'),
                    __('waitTransaction.tableBank'),
                    __('waitTransaction.tableCompany'),
                    __('waitTransaction.tableDescription'),
                    __('waitTransaction.tableEmail'),
                    __('waitTransaction.tableCreated')
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
                'route' => 'waitTransactions',
                'delete' => [
                    'titleField' => 'conversationId'
                ],
                'popup' => true,

            ],

        ];
        return view('waitTransaction.index')->with('data', $data);
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
                'companyId' => $temp->company_id,

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
    public function flagStatus()
    {
        $flag = Flag::where('keys', 'transaction')->first();
        $data =  $flag->value;
        if ($flag->value == 1) {
            $flag->value = 0;
            $flag->save();
        }
        return $data;
    }

    public function pushData(Request $request)
    {
        $header = array(
            "Content-Type: application/json"
        );

        $body = '{
            "conversationId": "' . $request->conversationId . '",
            "value": "' . $request->value . '",
            "companyId": "' . $request->companyId . '"
          }';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('PUSH_DATA'),
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
        ));
        $response = curl_exec($curl);
        echo $response;
        curl_close($curl);
        $result = json_decode($response, true);
    }
}
