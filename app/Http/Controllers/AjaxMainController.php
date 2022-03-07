<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\MainCategory;

use App\Repositories\CategoryRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\IsbankRepository;
use App\Repositories\PaymentMethodRepository;
use App\Repositories\PayTransactionRepository;

use App\Repositories\TeqpayRepository;
use App\Repositories\WaitTransactionRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AjaxMainController extends Controller
{

    public function __construct(
        CompanyRepository $companyRepository,
        PayTransactionRepository $payTransactionRepository,
        TeqpayRepository $teqpayRepository,
        WaitTransactionRepository $waitTransactionRepository,
        PaymentMethodRepository $paymentMethodRepository,
        IsbankRepository $isbankRepository

    ) {
        $this->companyRepo = $companyRepository;
        $this->payTransactionRepo = $payTransactionRepository;
        $this->teqpayRepo = $teqpayRepository;
        $this->waitTransactionRepo = $waitTransactionRepository;
        $this->paymentMethodRepo = $paymentMethodRepository;
        $this->isbankRepo = $isbankRepository;
    }

    public function getAjaxData(Request $request)
    {

        $data = [];
        $model = ($request->get('model')) ? $request->get('model') : null;
        if ($request->ajax()) {
            if ($model) {

                if ($model == 'Company') {
                    $data = $this->companyRepo->dataTable();
                }
                if ($model == 'CompanyPaymentMethod') {
                    $data = $this->paymentMethodRepo->dataTable($request->get('id'));
                }

                if ($model == 'PayTransaction') {
                    $data = $this->payTransactionRepo->dataTable();
                }
                if ($model == 'WaitTransaction') {
                    $data = $this->waitTransactionRepo->dataTable();
                }
                if ($model == 'Teqpay') {
                    $data = $this->teqpayRepo->dataTable();
                }
                if ($model == 'Isbank') {
                    $data = $this->isbankRepo->dataTable();
                }

                //$data = $this->genbaProductRepo->dataTable();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
    }
}
