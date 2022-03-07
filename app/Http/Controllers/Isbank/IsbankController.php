<?php

namespace App\Http\Controllers\Isbank;

use App\Http\Controllers\Controller;
use App\Models\Isbank;
use Illuminate\Http\Request;

class IsbankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'breadcrumb' => [
                'title' => __('isbank.mainTitle'),
            ],
            'dataTable' => [
                'source' => 'Isbank',
                'columnsTitles' => [
                    __('isbank.tableId'),
                    __('isbank.tableCustomer'),
                    __('isbank.tableConversation'),
                    __('isbank.tableOrderId'),
                    __('isbank.tableResultCode'),
                    __('isbank.tableResultMessage'),


                ],
                'columns' => [
                    'DT_RowIndex',
                    'customer_id',
                    'conversationId',
                    'orderId',
                    'resultCode',
                    'resultMessage',

                ],
                'route' => 'isbank',
                'delete' => [
                    'titleField' => 'title'
                ],
                'popup' => true,

            ],

        ];
        return view('isbank.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $temp =  Isbank::whereId($id)->with(['customers'])->first();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
