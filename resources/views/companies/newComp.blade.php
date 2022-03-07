<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form class="custom-form" id="companyForm" name="companyForm" action="{{ route('companies.store') }}" method="POST">

                <div class="modal-header mb-2">
                    <h4 class="modal-title" id="modelHeading">{{ __('company.formHeading') }}</h4>
                </div>
                <div class="row modal-bottom" style="margin-right: 0; margin-left: 0;">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Kurum</button>
                            {{-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">API</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">IP</button> --}}
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    @csrf
                                    <div class="add-page col-lg-12 ">
                                        <div class="border border-top-0 p-3 rounded mb-2 mt-2">
                                            <div class="mb-0">
                                                <input type="hidden" name="id" class="form-control" id="id" required>
                                            </div>
                                            <div class="mb-5 row">
                                                <div class="col-lg-7">
                                                    <label for="name" class="form-label">{{ __('company.labelName') }}</label>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('company.labelName') }}" required>
                                                </div>
                                                {{-- <div class="col-lg-3">
                                                    <label for="balance_id" class="form-label">balance_id</label>
                                                    <input type="text" name="balance_id" class="form-control"
                                                        id="balance_id" placeholder="balance_id">
                                                </div> --}}
                                                <div class="form-check form-switch col-lg-2">
                                                    <label class="form-check-label row" for="isActive">{{ __('company.isActive') }}</label>
                                                    <div class="radio-custom col-lg-12">
                                                        <input class="checkbox" name="isActive" type="checkbox" id="isActive">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-5 row">
                                                {{-- <div class="col-lg-2">
                                                    <label for="name" class="form-label">name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        placeholder="name">
                                                </div> --}}
                                                <div class="col-lg-2">
                                                    <label for="image" class="form-label">{{ __('company.image') }}</label>
                                                    <input type="text" name="image" class="form-control" id="image" placeholder="{{ __('company.image') }}">
                                                </div>
                                                <div class="col-lg-2">
                                                    <label for="ipn" class="form-label">{{ __('company.ipn') }}</label>
                                                    <input type="text" name="ipn" class="form-control" id="ipn" placeholder="{{ __('company.ipn') }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="hostname" class="form-label">{{ __('company.hostname') }}</label>
                                                    <input type="text" name="hostname" class="form-control" id="hostname" placeholder="{{ __('company.hostname') }}"><br>
                                                </div>
                                                <div class="col-lg-2">
                                                    <label for="institutionType" class="form-label">{{ __('company.institutionType') }}</label>
                                                    <input type="text" name="institutionType" class="form-control" id="institutionType" placeholder="{{ __('company.institutionType') }}">
                                                </div>
                                                <div class="col-lg-2">
                                                    <label for="institutionCode" class="form-label">{{ __('company.institutionCode') }}</label>
                                                    <input type="text" name="institutionCode" class="form-control" id="institutionCode" placeholder="{{ __('company.institutionCode') }}">
                                                </div>
                                                <div class="col-lg-2">
                                                    <label for="apiKey" class="form-label">{{ __('company.apiKey') }}</label>
                                                    <input type="text" name="apiKey" class="form-control" id="apiKey" placeholder="{{ __('company.apiKey') }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="secretKey" class="form-label">{{ __('company.secretKey') }}</label>
                                                    <input type="text" name="secretKey" class="form-control" id="secretKey" placeholder="{{ __('company.secretKey') }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-light">{{ __('company.btnSave') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>