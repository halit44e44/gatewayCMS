@extends("layouts.main")
@section('style')
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ __('company.mainTitle') }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    {{-- <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol> --}}
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-success btnNew" id="createNewCompany">{{ __('company.create') }}</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        @include('common.message')
        {{-- <h6 class="mb-0 text-uppercase">{{ __('company.mainTitle') }}</h6> --}}
        <hr />
        @include('common.dataTable')
        @include("companies.newComp")
    </div>
</div>
@endsection
@section('script')
<script>
    //insert
    $('#createNewCompany').click(function() {
        $('#id').val('');

        $('#companyForm').trigger("reset");
        $('#modal-id').modal('show');
    });
</script>
<script>
    // var routeUrl="<?php echo $data['dataTable']['route']; ?>";

    $('body').on('click', '.edit', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $.get(routeUrl + '/' + id, function(data) {
            $.each(data, function(index, item) {
                if (typeof item == 'object') {
                    if ($.isArray(item)) {
                        $.each(item, function(index, item) {
                            $('#' + index).empty();
                            $.each(item, function(index, item) {
                                if (index != 'id') {
                                    $('#' + index).append(item + '\n');
                                }
                            })
                        });

                    } else {
                        $.each(item, function(index, item) {
                            if ($('#' + index).is('input[type="checkbox"]' ||
                                    'input[type="radio"]')) {
                                item == true ? $('#' + index).prop('checked', item) &&
                                    $('#' + index).addClass('active') : $('#' + index)
                                    .prop('checked', item) && $('#' + index)
                                    .removeClass('active');
                            }
                            $('#' + index).val(item);
                        });
                    }
                } else if ($('#' + index).is('input[type="checkbox"]' ||
                        'input[type="radio"]')) {
                    item == true ? $('#' + index).prop('checked', item) && $('#' + index)
                        .addClass('active') : $('#' + index).prop('checked', item) && $('#' +
                            index).removeClass('active');
                } else {
                    $('#' + index).val(item);
                }
            });
            $('#submit').val("Edit Companies");
            $('#modal-id').modal('show');
            $('#id').val(data.id);
        });

        // $.get(routeUrl + '/' + id, function(data) {
        //     $('#modal-id').modal('show');
        //     $('#id').val(data.id);
        //     $('#name').val(data.name);
        //     $('#image').val(data.image);
        //     $('#ipn').val(data.ipn);
        //     $('#hostname').val(data.hostname);
        //     $('#institutionType').val(data.institutionType);
        //     $('#institutionCode').val(data.institutionCode);
        //     $('#apiKey').val(data.apiKey);
        //     $('#secretKey').val(data.secretKey);
        // })
    });
</script>

@endsection