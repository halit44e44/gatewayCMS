@extends("layouts.main")
@section('style')
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ __('teqpay.mainTitle') }}</div>

        </div>
        <!--end breadcrumb-->
        @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
        @endif
        <hr />
        @include('common.dataTable')


        <div class="modal fade" id="modal-id">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header mb-2">
                        <h4 class="modal-title" id="modelHeading" id="conversationId"></h4>
                    </div>
                    <div class="row modal-bottom" style="margin-right: 0; margin-left: 0;">
                        <div class="add-page col-6">
                            <div class="border border-1 border-top-0 p-2 rounded mb-2">
                                <div class="mb-2">
                                    <div class="mb-1">
                                        <b> {{ __('teqpay.action') }}</b>
                                        <hr>
                                    </div>
                                    <input type="hidden" name="id" class="form-control" id="id" required>
                                </div>

                                <div>
                                    <b><label for="conversation" class="form-label">{{ __('teqpay.conversation') }}
                                            :</label></b>
                                    <label for="conversationId" class="form-label" id="conversationId"></label><br>
                                    <b><label for="fullName" class="form-label">{{ __('teqpay.fullName') }}
                                            :</label></b>
                                    <label for="fullName" class="form-label" id="fullName"></label><br>
                                    <b><label for="resultCode" class="form-label">{{ __('teqpay.resultCode') }}
                                            :</label></b>
                                    <label for="resultCode" class="form-label" id="resultCode"></label><br>
                                    <b><label for="resultMessage" class="form-label">{{ __('teqpay.resultMessage') }}
                                            :</label></b>
                                    <label for="resultMessage" id="resultMessage" class="form-label"></label><br>
                                    <b><label for="merchant" class="form-label">{{ __('teqpay.merchant') }}
                                            :</label></b>
                                    <label for="merchant" class="form-label" id="merchant"></label><br>
                                    <b><label for="orderId" class="form-label">{{ __('teqpay.orderId') }}
                                            :</label></b>
                                    <label for="orderId" class="form-label" id="orderId"></label><br>
                                    <b><label for="totalAmount" class="form-label">{{ __('teqpay.totalAmount') }}
                                            :</label></b>
                                    <label for="totalAmount" class="form-label" id="totalAmount"></label><br>
                                    <b><label for="transactionDateTime" class="form-label">{{ __('teqpay.transactionDateTime') }}
                                            :</label></b>
                                    <label for="transactionDateTime" class="form-label" id="transactionDateTime"></label><br>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 border border-1 border-top-0 p-2  rounded mb-2">
                            <div class="mb-2">
                                <b> {{ __('teqpay.paymentDetail') }}</b>
                                <hr>
                            </div>
                            <b><label for="paymentDetailPaymentType" class="form-label">{{ __('teqpay.paymentType') }}
                                    :</label></b>
                            <label for="paymentDetailPaymentType" id="paymentDetailPaymentType" class="form-label"></label><br>
                            <b><label for="paymentDetailPaymentMethod" class="form-label">{{ __('teqpay.paymentDetailPaymentMethod') }}
                                    :</label></b>
                            <label for="paymentDetailPaymentMethod" id="paymentDetailPaymentMethod" class="form-label"></label><br>
                            <b><label for="paymentDetailAccountNo" class="form-label">{{ __('teqpay.paymentDetailAccountNo') }} :</label></b>
                            <label for="paymentDetailAccountNo" id="paymentDetailAccountNo" class="form-label"></label><br>
                            <b><label for="paymentDetailValorDate" class="form-label">{{ __('teqpay.paymentDetailValorDate') }}
                                    :</label></b>
                            <label for="paymentDetailValorDate" id="paymentDetailValorDate" class="form-label"></label><br>
                            <b><label for="paymentDetailPaymentStatus" class="form-label">{{ __('teqpay.paymentDetailPaymentStatus') }}
                                    :</label></b>
                            <label for="paymentDetailPaymentStatus" id="paymentDetailPaymentStatus" class="form-label"></label><br>
                            <b><label for="productDetailProductType" class="form-label">{{ __('teqpay.productDetailProductType') }}
                                    :</label></b>
                            <label for="productDetailProductType" id="productDetailProductType" class="form-label"></label><br>
                            <b><label for="productDetailProductCategory" class="form-label">{{ __('teqpay.productDetailProductCategory') }}
                                    :</label></b>
                            <label for="productDetailProductCategory" id="productDetailProductCategory" class="form-label"></label><br>
                            <b><label for="productDetailProductName" class="form-label">{{ __('teqpay.productDetailProductName') }}
                                    :</label></b>
                            <label for="productDetailProductName" id="productDetailProductName" class="form-label"></label><br>

                            <b><label for="productDetailProductQuantity" class="form-label">{{ __('teqpay.productDetailProductQuantity') }}
                                    :</label></b>
                            <label for="productDetailProductQuantity" id="productDetailProductQuantity" class="form-label"></label><br>

                            <b><label for="productDetailProductAmount" class="form-label">{{ __('teqpay.productDetailProductAmount') }}
                                    :</label></b>
                            <label for="productDetailProductAmount" id="productDetailProductAmount" class="form-label"></label><br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $('body').on('click', '.showD', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $.get("{{ route('teqpays.index') }}" + '/' + id, function(data) {
            $('#modal-id').modal('show');
            $('#id').text(data.id);
            $('#fullName').text(data.fullName);
            $('#conversationId').text(data.conversationId);
            $('#resultCode').text(data.resultCode);
            $('#resultMessage').text(data.resultMessage);
            $('#merchant').text(data.merchant);
            $('#orderId').text(data.orderId);
            $('#totalAmount').text(data.totalAmount);
            $('#transactionDateTime').text(data.transactionDateTime);
            $('#paymentDetailPaymentType').text(data.paymentDetail.PaymentType);
            $('#paymentDetailPaymentMethod').text(data.paymentDetail.PaymentMethod);
            $('#paymentDetailAccountNo').text(data.paymentDetail.AccountNo);
            $('#paymentDetailValorDate').text(data.paymentDetail.ValorDate);
            $('#paymentDetailPaymentStatus').text(data.paymentDetail.PaymentStatus);


            $.each(data.productDetail, function(index, item) {
                $('#productDetailProductType').text(item.ProductType);
                $('#productDetailProductCategory').text(item.ProductCategory);
                $('#productDetailProductName').text(item.ProductName);
                $('#productDetailProductQuantity').text(item.ProductQuantity);
                $('#productDetailProductAmount').text(item.ProductAmount);
            });
        })
    });
</script>
@endsection