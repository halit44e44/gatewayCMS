<?php

namespace App\Http\Controllers\Teqpay;

use App\Http\Controllers\Controller;
use App\Models\Teqpay;
use App\Repositories\TeqpayRepository;
use Illuminate\Http\Request;

class TeqpayController extends Controller
{
    public function __construct(TeqpayRepository $teqpayRepository)
    {
        $this->teqpayRepo = $teqpayRepository;
    }

    public function index()
    {


        $data = [
            'breadcrumb' => [
                'title' => __('teqpay.mainTitle'),
            ],
            'dataTable' => [
                'source' => 'Teqpay',
                'columnsTitles' => [
                    __('teqpay.tableId'),
                    __('teqpay.tableCustomer'),
                    __('teqpay.tableConversation'),
                    __('teqpay.tableOrderId'),
                    __('teqpay.tableResultCode'),
                    __('teqpay.tableResultMessage'),


                ],
                'columns' => [
                    'DT_RowIndex',
                    'customer_id',
                    'conversationId',
                    'orderId',
                    'resultCode',
                    'resultMessage',

                ],
                'route' => 'teqpays',
                'delete' => [
                    'titleField' => 'title'
                ],
                'popup' => true,

            ],

        ];
        return view('teqpays.index')->with('data', $data);
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
        $temp =  Teqpay::whereId($id)->with(['customers'])->first();
        $json = $temp->paymentDetail;
        $paymentDetails = json_decode($json, false);

        $json2 = $temp->productDetail;
        $productDetails = json_decode($json2, false);

        if ($temp) {

            $data = [
                'fullName' => $temp->customers->fullName,
                'conversationId' => $temp->conversationId,
                'resultCode' => $temp->resultCode,
                'resultMessage' => $temp->resultMessage,
                'merchant' => $temp->merchant,
                'orderId' => $temp->orderId,
                'totalAmount' => $temp->totalAmount,
                'transactionDateTime' => $temp->transactionDateTime,
                'paymentDetail' => $paymentDetails,
                'productDetail' => $productDetails,
                'transactionDateTime' => $temp->transactionDateTime,


            ];
        }
        return response()->json($data);
    }


    public function edit(Teqpay $teqpay)
    {
        //
    }


    public function update(Request $request, Teqpay $teqpay)
    {
        //
    }

    public function destroy(Teqpay $teqpay)
    {
        //
    }
}
