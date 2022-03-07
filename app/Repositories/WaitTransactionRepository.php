<?php

namespace App\Repositories;

use App\Models\PayTransaction;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

class WaitTransactionRepository extends EloquentRepository
{
    protected $entity = PayTransaction::class;


    function allData()
    {
        $data = PayTransaction::latest()->get();
        return $data;
    }
  
    function dataTable()
    {

        $data = [];
        $rowData = PayTransaction::with(['banks', 'companies', 'customers', 'currencies', 'results'])->latest()->get();

        if (count($rowData) > 0) {
            foreach ($rowData as $row) {
                if ($row->status == "2") {
                    $item = null;
                    if (isset($row->results->orderId)) {
                        $item = $row->results->orderId;
                    }
                    $data[] = [
                        'id' => $row->id,
                        'bank_id' => $row->banks->description,
                        'company_id' => $row->companies->name,
                        'customer_id' => $row->customers->fullName,
                        'eMail' => $row->customers->eMail,
                        'conversationId' => $row->conversationId,
                        'orderId' => $item,
                        'price' => $row->price . '' . $row->currencies->icon,
                        'description' => $row->description,
                        'paymentUrl' => $row->paymentUrl,
                        'status' => $row->status,
                        'created_at' => $row->created_at->toDateTimeString(),
                        'action' => '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btn showD btn-outline-warning btn-sm"><i class="bx bx-show"></i></a>
                                     <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn play btn-outline-success btn-sm"><i class="bx checkBtn bx-check"></i></a>
                                     <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn stop btn-outline-danger btn-sm"><i class="bx checkBtn bx-x"></i></a></a>'
                    ];
                }
            }
        }

        return $data;
    }
}
