<?php

namespace App\Repositories;

use App\Models\Teqpay;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

class TeqpayRepository extends EloquentRepository
{
    protected $entity = Teqpay::class;

   
    function allData()
    {
        $data = Teqpay::latest()->get();
        return $data;
    }
    function dataTable()
    {
        $data = [];
        $rowData = Teqpay::with(['customers'])->latest()->get();
        if (count($rowData) > 0) {
            foreach ($rowData as $row) {

                $data[] = [
                    'id' => $row->id,
                    'customer_id' => $row->customers->fullName,
                    'conversationId'=>$row->conversationId,
                    'resultCode' => $row->resultCode,
                    'orderId'=>$row->orderId,
                    'resultMessage' => $row->resultMessage,
                    'action' => '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn showD btn-outline-warning btn-sm"><i class="bx bx-show"></i></a>'
                ];
            }
        }
        return $data;
    }
}
