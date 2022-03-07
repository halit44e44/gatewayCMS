@extends("layouts.main")
@section('style')
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ __('waitTransaction.mainTitle') }}</div>
        </div>
        <!--end breadcrumb-->

        @include('common.message')
        @include('common.dataTable')


        <div class="modal fade" id="modal-id">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header mb-2">
                        <h4 class="modal-title" id="modelHeading" id="conversationId"></h4>
                    </div>
                    <div class="row modal-bottom" style="margin-right: 0; margin-left: 0;">
                        <div class="add-page col-lg-6">
                            <div class="border border-1 border-top-0 p-2 rounded mb-2">
                                <div class="mb-2">
                                    <div class="mb-1">
                                        <b> {{ __('payTransaction.action') }}</b>
                                        <hr>
                                    </div>
                                    <input type="hidden" name="id" class="form-control" id="id" required>
                                </div>

                                <div>
                                    <b><label for="conversation" class="form-label">{{ __('payTransaction.conversation') }}
                                            :</label></b>
                                    <label for="conversationId" class="form-label" id="conversationId"></label><br>
                                    <b><label for="price" class="form-label">{{ __('payTransaction.price') }}
                                            :</label></b>
                                    <label for="price" class="form-label" id="price"></label><br>
                                    <b><label for="currenicy_id" class="form-label">{{ __('payTransaction.currenicy') }} :</label></b>
                                    <label for="currenicy_id" class="form-label" id="currenicy_id"></label><br>
                                    <b><label for="company_id" class="form-label">{{ __('payTransaction.company') }}
                                            :</label></b>
                                    <label for="company_id" id="company_id" class="form-label"></label><br>
                                    <b><label for="description" class="form-label">{{ __('payTransaction.description') }}
                                            :</label></b>
                                    <label for="description" class="form-label" id="description"></label><br>
                                    <b><label for="product_id" class="form-label">{{ __('payTransaction.product') }}
                                            :</label></b>
                                    <label for="product_id" class="form-label" id="product_id"></label><br>
                                    <b><label for="result" class="form-label">{{ __('payTransaction.result') }}
                                            :</label></b>
                                    <label for="result" class="form-label">12354</label><br>
                                    <b><label for="created_at" class="form-label">{{ __('payTransaction.created') }}
                                            :</label></b>
                                    <label for="created_at" class="form-label" id="created_at"></label><br>
                                    <b><label for="updated_at" class="form-label">{{ __('payTransaction.updated') }}
                                            :</label></b>
                                    <label for="updated_at" class="form-label" id="updated_at"></label><br>
                                    <b><label for="paymentUrl" class="form-label">{{ __('payTransaction.paymentUrl') }}
                                            :</label></b>
                                    <label for="paymentUrl" class="form-label" id="paymentUrl"></label><br>

                                    <b><label for="status" class="form-label">{{ __('payTransaction.status') }}
                                            :</label></b>
                                    <label for="status" class="form-label" id="status"></label><br>
                                    <b><label for="resultMessage" class="form-label">{{ __('payTransaction.resultMessage') }}
                                            :</label></b>
                                    <label for="resultMessage" id="resultMessage" class="form-label"></label><br>
                                    {{-- <b><label for="method" class="form-label">{{ __('payTransaction.method') }}
                                    :</label></b>
                                    <label for="method" class="form-label">Papara</label><br> --}}

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 border border-1 border-top-0 p-2  rounded mb-2">
                            <div class="mb-2">
                                <b> {{ __('payTransaction.customer') }}</b>
                                <hr>
                            </div>
                            <b><label for="customer_id" class="form-label">{{ __('payTransaction.customerId') }}
                                    :</label></b>
                            <label for="customer_id" id="customer_id" class="form-label"></label><br>
                            <b><label for="fullName" class="form-label">{{ __('payTransaction.fullName') }}
                                    :</label></b>
                            <label for="fullName" id="fullName" class="form-label"></label><br>
                            <b><label for="tcNo" class="form-label">{{ __('payTransaction.tcNo') }} :</label></b>
                            <label for="tcNo" id="tcNo" class="form-label"></label><br>
                            <b><label for="phone" class="form-label">{{ __('payTransaction.phone') }}
                                    :</label></b>
                            <label for="phone" id="phone" class="form-label"></label><br>
                            <b><label for="eMail" class="form-label">{{ __('payTransaction.eMail') }}
                                    :</label></b>
                            <label for="eMail" id="eMail" class="form-label"></label><br>
                            <b><label for="ip" class="form-label">{{ __('payTransaction.ip') }}
                                    :</label></b>
                            <label for="ip" id="ip" class="form-label"></label><br>
                            <b><label for="Cstatus" class="form-label">{{ __('payTransaction.status') }}
                                    :</label></b>
                            <label for="Cstatus" id="Cstatus" class="form-label"></label><br>
                            <b><label for="customerType" class="form-label">{{ __('payTransaction.customerType') }}
                                    :</label></b>
                            <label for="customerType" id="customerType" class="form-label"></label><br>
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
        $.get("{{ route('payTransactions.index') }}" + '/' + id, function(data) {
            $('#modal-id').modal('show');
            $('#id').text(data.id);
            $('#company_id').text(data.company_id);
            $('#currenicy_id').text(data.currenicy_id);
            $('#conversationId').text(data.conversationId);
            $('#description').text(data.description);
            $('#product_id').text(data.product_id);
            $('#created_at').text(data.created_at);
            $('#updated_at').text(data.updated_at);
            $('#paymentUrl').text(data.paymentUrl);
            $('#price').text(data.price);
            $('#status').text(data.status);
            $('#customer_id').text(data.customer_id);
            $('#fullName').text(data.fullName);
            $('#resultMessage').text(data.resultMessage);
            $('#phone').text(data.phone);
            $('#tcNo').text(data.tcNo);
            $('#eMail').text(data.eMail);
            $('#ip').text(data.ip);
            $('#status').text(data.status);
            $('#Cstatus').text(data.Cstatus);
            $('#customerType').text(data.customerType);
        })
    });
    $(function() {
        $('body').on('click', '.play', function(event) {
            event.preventDefault();
            var title;
            var id = $(this).data('id');
            var conversationId = $(this).data('conversationId');
            var titleField = "<?php echo $data['dataTable']['delete']['titleField']; ?>";

            $.get(routeUrl + '/' + id, function(data) {
                var companyId = data.companyId;
                var conversationId = data.conversationId;
                var value = 1;
                if (titleField == 'conversationId') {
                    title = data.conversationId;
                }
                swal({
                        title: "Onaylamak istediğinize emin misiniz?",
                        text: "İşlem Id : " + title,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var token = $("meta[name='csrf-token']").attr("content");
                            $.ajax({
                                url: "{{ route('waitTransactions.pushData') }}",
                                type: 'POST',
                                data: {
                                    _token: token,
                                    id: id,
                                    conversationId: conversationId,
                                    companyId: companyId,
                                    value: value
                                },
                            });
                            location.reload();
                            //$('.yajra-datatable').DataTable().ajax.reload();
                        }

                    });
            });
        })
    })
    $(function() {
        $('body').on('click', '.stop', function(event) {
            event.preventDefault();
            var title;
            var id = $(this).data('id');
            var titleField = "<?php echo $data['dataTable']['delete']['titleField']; ?>";

            $.get(routeUrl + '/' + id, function(data) {
                var companyId = data.companyId;
                var conversationId = data.conversationId;
                var value = 0;
                if (titleField == 'conversationId') {
                    title = data.conversationId;
                }
                swal({
                        title: "İptal etmek istediğinize emin misiniz?",
                        text: "İşlem Id : " + title,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var token = $("meta[name='csrf-token']").attr("content");
                            $.ajax({
                                url: "{{ route('waitTransactions.pushData') }}",
                                type: 'POST',
                                data: {
                                    _token: token,
                                    id: id,
                                    conversationId: conversationId,
                                    companyId: companyId,
                                    value: value
                                },
                            });
                            location.reload();
                            //$('.yajra-datatable').DataTable().ajax.reload();
                        }

                    });
            });
        })
    })

    var isPlayed = false;
    var audio = {};
    audio["pikachu"] = new Audio();
    audio["pikachu"].src = "panel-bildirim5.mpeg"
    setInterval(function() {
        var test = $.ajax({
            type: "GET",
            url: "{{ route('waitTransactions.flagStatus') }}",
            datatype: "json",
            success: function(data) {
                if (data == 1) {
                    $('.yajra-datatable').DataTable().ajax.reload();
                    $('#btnPika').trigger('click');
                } else {
                    console.log("flag not found");
                }
            }
        });

    }, 2000); //time in milliseconds 
    $('#btnPika').on('click', function() {
        $(audio["pikachu"]).muted = false;
        audio["pikachu"].play();
        $(audio["pikachu"]).muted = true;
        audio["pikachu"].play();
    });
</script>
@endsection