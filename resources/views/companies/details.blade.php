@extends("layouts.main")

@section('style')
<link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
<style>
    #DataTables_Table_0 {
        width: 100% !important;
    }

    #DataTables_Table_0_paginate {
        display: flex;
        justify-content: flex-end;
    }
</style>
@endsection

@section('wrapper')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ __('company.mainTitle') }} </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('company.details') }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title panelColor">{{ __('company.details') }}</h5>
                <hr />

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-body mt-4">
                    <div class="row add-page">
                        <div class="col-lg-12">
                            <form action="{{ route('companies.store') }}" name="form" method="POST" class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="row modal-bottom" style="margin-right: 0; margin-left: 0;">
                                    <div class="mb-3">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-details-tab" data-bs-toggle="tab" data-bs-target="#nav-details" type="button" role="tab" aria-controls="nav-details" aria-selected="true">Bilgiler</button>
                                                <button class="nav-link" id="nav-security-tab" data-bs-toggle="tab" data-bs-target="#nav-security" type="button" role="tab" aria-controls="nav-security" aria-selected="false">Güvenlik</button>
                                                <button class="nav-link" id="nav-pay-tab" data-bs-toggle="tab" data-bs-target="#nav-pay" type="button" role="tab" aria-controls="nav-pay" aria-selected="false">Ödeme
                                                    Metotları</button>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">{{ __('company.name') }}
                                                        </label>
                                                        <input type="text" name="name" class="form-control" id="title" placeholder="{{ __('company.name') }}" value="{{ $company->name ?? '' }}" required>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">{{ __('company.type') }}
                                                        </label><br>
                                                        <select id="institutionType" class="form-select" name="institutionType">
                                                            {{-- @foreach ($companies as $company) --}}
                                                            <option value="{{ $company->institutionType }}">
                                                                {{ $company->institutionType }}
                                                            </option>
                                                            {{-- @endforeach --}}
                                                        </select>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hostname" class="form-label">{{ __('company.hostname') }}
                                                        </label>
                                                        <input type="text" name="hostname" class="form-control" id="hostname" placeholder="{{ __('company.hostname') }}" value="{{ $company->hostname ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ipn" class="form-label">{{ __('company.ipn') }}
                                                        </label>
                                                        <input type="text" name="ipn" class="form-control" id="ipn" placeholder="{{ __('company.ipn') }}" value="{{ $company->ipn ?? '' }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">{{ __('company.image') }}
                                                        </label>
                                                        <input type="text" name="image" class="form-control" id="image" placeholder="{{ __('company.image') }}" value="{{ $company->image ?? '' }}">
                                                        <input type="hidden" name="institutionCode" class="form-control" id="institutionCode" value="{{ $company->institutionCode ?? '' }}">
                                                        <input type="hidden" name="apiKey" class="form-control" id="apiKey" value="{{ $company->apiKey ?? '' }}">
                                                        <input type="hidden" name="secretKey" class="form-control" id="secretKey" value="{{ $company->secretKey ?? '' }}">
                                                        <input type="hidden" name="id" class="form-control" id="id" value="{{ $company->id ?? '' }}">
                                                    </div>

                                                </div>
                                                <div class="col-lg-8 mt-3">
                                                    <div class="custom-box-root">
                                                        <div class="custom-box-item">
                                                            <div class="top-block">
                                                                <p>Bakiye</p>
                                                            </div>
                                                            <div class="bottom-block">
                                                                <p>{{ $company->balances->name ?? '' }}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="custom-box-root mt-5">
                                                        <div class="custom-box-item">
                                                            <div class="top-block">
                                                                <p>Aktif</p>
                                                            </div>
                                                            <div class="bottom-block">
                                                                <div class="form-check radio-custom-item">
                                                                    <input class="form-check-input inputCheck" name="isActive" {{ $company->isActive == 1 ? 'checked' : '' }} type="checkbox">

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-light" id="btnSubmit" name="btnSubmit">{{ __('company.btnSave') }}</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-security" role="tabpanel" aria-labelledby="nav-security-tab">
                                            <div class="row">

                                                <div class="custom-box-root mt-2">
                                                    <div class="custom-box-item">
                                                        <div class="top-block">
                                                            <p>Kurum Kodu</p>
                                                        </div>
                                                        <div class="bottom-block">
                                                            <p>{{ $company->institutionCode }}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="custom-box-root mt-2">
                                                    <div class="custom-box-item">
                                                        <div class="top-block">
                                                            <p>API KEY</p>
                                                        </div>
                                                        <div class="bottom-block">
                                                            <p>{{ $company->apiKey }}</p>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="custom-box-root mt-2">
                                                    <div class="custom-box-item">
                                                        <div class="top-block">
                                                            <p>SECRET KEY</p>
                                                        </div>
                                                        <div class="bottom-block">
                                                            <p>{{ $company->secretKey }}</p>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg mt-3">
                                                {{-- <div class="custom-box-root">
                                                            <div class="custom-box-item">
                                                                <div class="top-block">
                                                                    <p>API KEY</p>
                                                                </div>
                                                                <div class="bottom-block">
                                                                    <p>{{$company->apiKey}}</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="custom-box-root mt-5">
                                        <div class="custom-box-item">
                                            <div class="top-block">
                                                <p>Kurum Kodu</p>
                                            </div>
                                            <div class="bottom-block">
                                                <p>{{$company->institutionCode}}</p>


                                            </div>

                                        </div>
                                    </div>
                                </div> --}}
                        </div>
                        {{-- <div class="mb-3">
                                                    <button type="submit" class="btn btn-light" id="btnSubmit"
                                                        name="btnSubmit">{{ __('company.btnSave') }}</button>
                    </div> --}}
                </div>
                <div class="tab-pane fade" id="nav-pay" role="tabpanel" aria-labelledby="nav-pay-tab">
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-success btnNew" id="createNewMethod">Yeni Method Ekle</button>
                        </div>
                    </div>
                    <div class="row">
                        @include('common.dataTable') </div>
                </div>
            </div>
            {{-- <div class="mb-3">
                                            <button type="submit" class="btn btn-light" id="btnSubmit"
                                                name="btnSubmit">{{ __('company.btnSave') }}</button>
        </div> --}}
    </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="form-body mt-4">
                <div class="row add-page">
                    <div class="col-lg-12">
                        <form action="{{ route('paymentMethods.store') }}" name="form" method="POST" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="row modal-bottom" style="margin-right: 0; margin-left: 0;">
                                <div class="mb-3">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                            <button class="nav-link" id="nav-pay-tab" data-bs-toggle="tab" data-bs-target="#nav-pay" type="button" role="tab" aria-controls="nav-pay" aria-selected="false">Ödeme
                                                Metotları</button>
                                        </div>
                                    </nav>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">{{ __('company.name') }}
                                                    </label>
                                                    <input readonly type="text" name="name" class="form-control" id="name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">{{ __('company.description') }}
                                                    </label><br>
                                                    <input readonly type="text" name="description" id="description" class="form-control">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="percent" class="form-label">{{ __('company.percent') }}
                                                    </label>
                                                    <input type="text" name="percent" class="form-control" id="percent" placeholder="{{ __('company.percent') }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="minValue" class="form-label">{{ __('company.min') }}
                                                    </label>
                                                    <input type="text" name="minValue" class="form-control" id="minValue" placeholder="{{ __('company.min') }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="maxValue" class="form-label">{{ __('company.max') }}
                                                    </label>
                                                    <input type="text" name="maxValue" class="form-control" id="maxValue" placeholder="{{ __('company.max') }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="controlValue" class="form-label">{{ __('company.control') }}
                                                    </label>
                                                    <input type="text" name="controlValue" class="form-control" id="controlValue" placeholder="{{ __('company.control') }}" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <div class="custom-box-root">
                                                    <div class="custom-box-item">
                                                        <div class="top-block">
                                                            <p>Aktif</p>
                                                            <input type="hidden" name="bank_id" class="form-control" id="bank_id">
                                                        </div>
                                                        <div class="bottom-block">
                                                            <div class="form-check radio-custom-item">
                                                                <input class="form-check-input inputCheck" name="isActive" id="isActive" type="checkbox">
                                                            </div>
                                                            <input type="hidden" name="pId" class="form-control" id="pId">
                                                            <input type="hidden" name="company_id" class="form-control" id="company_id">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-light" id="btnSubmit" name="btnSubmit">{{ __('company.btnSave') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="form-body mt-4">
                <div class="row add-page">
                    <div class="col-lg-12">
                        <form action="{{ route('paymentMethods.store') }}" name="form" method="POST" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="row modal-bottom" style="margin-right: 0; margin-left: 0;">
                                <div class="mb-3">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                            <button class="nav-link" id="nav-pay-tab" data-bs-toggle="tab" data-bs-target="#nav-pay" type="button" role="tab" aria-controls="nav-pay" aria-selected="false">Ödeme
                                                Metotları</button>
                                        </div>
                                    </nav>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">{{ __('company.name') }}
                                                    </label>
                                                    <select id="bank_id" class="form-select" name="bank_id">
                                                        <option disabled selected>- Method -</option>
                                                        @foreach ($banks as $bank)
                                                        <option value="{{ $bank->id }}">
                                                            {{ $bank->description }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="percent" class="form-label">{{ __('company.percent') }}
                                                    </label>
                                                    <input type="text" name="percent" class="form-control" id="percent" placeholder="{{ __('company.percent') }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="minValue" class="form-label">{{ __('company.min') }}
                                                    </label>
                                                    <input type="text" name="minValue" class="form-control" id="minValue" placeholder="{{ __('company.min') }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="maxValue" class="form-label">{{ __('company.max') }}
                                                    </label>
                                                    <input type="text" name="maxValue" class="form-control" id="maxValue" placeholder="{{ __('company.max') }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="controlValue" class="form-label">{{ __('company.control') }}
                                                    </label>
                                                    <input type="text" name="controlValue" class="form-control" id="controlValue" placeholder="{{ __('company.control') }}" required>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <div class="custom-box-root">
                                                    <div class="custom-box-item">
                                                        <div class="top-block">
                                                            <p>Aktif</p>
                                                            {{-- <input type="hidden" name="bank_id" class="form-control" id="bank_id"> --}}
                                                        </div>
                                                        <div class="bottom-block">
                                                            <div class="form-check radio-custom-item">
                                                                <input class="form-check-input inputCheck" name="isActive" type="checkbox">
                                                            </div>
                                                            {{-- <input type="hidden" name="pId" class="form-control" id="pId"> --}}
                                                            <input type="hidden" name="company_id" class="form-control" id="company_id" value="{{$company->id ?? ""}}">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-light" id="btnSubmit" name="btnSubmit">{{ __('company.btnSave') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--end page wrapper -->
@endsection

@section('script')
{{-- <script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#image-uploadify').imageuploadify();
    })
</script> --}}

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    $('#bologna-list a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>

<script>
    $(function() {
        $('body').on('click', '.delete', function(event) {
            event.preventDefault();
            var name;
            var id = $(this).data('id');
            // alert(id);
            $.get("{{ url('/paymentMethods/showDetails') }}" + '/' + id, function(data) {
                // alert(id);
                swal({
                        title: "Are you sure?",
                        text: name,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            //var id = $(this).data("id");
                            var token = $("meta[name='csrf-token']").attr("content");
                            $.ajax({
                                url: "/paymentMethods/" + id,
                                type: 'DELETE',
                                data: {
                                    _token: token,
                                    id: id,
                                },
                            });
                            swal("Deleted!", {
                                icon: "info",

                            });
                            // location.reload();
                        }

                    });
            });
        })
    })
</script>
<script>
    $('body').on('click', '.edit', function(event) {
        event.preventDefault();
        var id = $(this).data('id');


        $.ajax({
            type: 'GET',
            url: "{{ url('/paymentMethods/showDetails') }}" + '/' + id,
            success: function(data) {
                $('#modal-id').modal('show');
                // alert(data.id);
                $('#pId').val(data.id);

                $('#company_id').val(data.company_id);
                $('#bank_id').val(data.bank_id);
                $('#name').val(data.banks.name);
                $('#description').val(data.banks.description);
                $('#percent').val(data.percent);
                $('#minValue').val(data.minValue);
                $('#maxValue').val(data.maxValue);
                $('#controlValue').val(data.controlValue);
                $('#isActive').prop('checked', data.isActive);



            }
        });
    });
</script>
<script>
    $('#createNewMethod').click(function(event) {
        event.preventDefault();
        // var id = $(this).data('id');

        $.ajax({
            type: 'GET',
            url: "{{ url('/paymentMethods/showDetails') }}" + '/' + id,
            success: function(data) {
                $('#modal-add').modal('show');

                $('#company_id').val(data.company_id);
            }
        });
    });
</script>
@endsection