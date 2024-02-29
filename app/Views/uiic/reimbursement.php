<?= view('layouts/header') ?>
<?= view('layouts/menu') ?>
<?= view('layouts/nav') ?>
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Add Entry
                    </div>
                    <h2 class="page-title">
                        Reimbursement Entry
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xl d-print-none">
        <ul class="steps steps-primary steps-counter my-4">
            <li class="step-item active">Employee Type</li>
            <li class="step-item">Employee Details</li>
            <li class="step-item">File Uploads</li>
        </ul>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <form action="<?= base_url('uiic/reimbursement-entry') ?>" method="post" autocomplete="off"
                  enctype="multipart/form-data">
                <div class="card step-pane">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="state" class="form-label">Employee Type</label>
                            <div class="form-selectgroup-boxes row">
                                <div class="col-md-4">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="employee_type" id="state" value="State"
                                               class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">State Employee</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="employee_type" id="board" value="Board"
                                               class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Board Employee</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="employee_type" id="corporation" value="Corporation"
                                               class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Corporation
                                                    Employee</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary next-step">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M15 16l4 -4" /><path d="M15 8l4 4" /></svg>
                            Next
                        </button>
                    </div>
                </div>
                <div class="card step-pane" id="emp_details">
                    <div class="card-header">
                        <h3 class="card-title">Employee Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label" for="emp_id">IFHRMS EMP ID</label>
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-search" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                            <path d="M21 21l-6 -6" />
                                        </svg>
                                    </span>
                                    <input type="number" class="form-control" id="emp_id" name="emp_id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="emp_name">Full Name</label>
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="7" r="4" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" id="emp_name" name="emp_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="emp_initial">Initial</label>
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="7" r="4" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        </svg>
                                    </span>
                                    <input type="number" class="form-control" id="emp_initial" name="emp_initial">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label" for="emp_dob">Date of Birth (DD/MM/YYYY)</label>
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-calendar-due" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        </svg>
                                    </span>
                                    <input type="text" name="emp_dob" id="emp_dob" class="form-control"
                                           data-mask="00/00/0000" data-mask-visible="true" placeholder="DD/MM/YYYY"
                                           autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="emp_doj">Date of Joining (DD/MM/YYYY)</label>
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-calendar-due" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        </svg>
                                    </span>
                                    <input type="text" name="emp_doj" id="emp_doj" class="form-control"
                                           data-mask="00/00/0000" data-mask-visible="true" placeholder="DD/MM/YYYY"
                                           autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="emp_phone">Phone</label>
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-phone" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" id="emp_phone" name="emp_phone"
                                           data-mask="00000-00000" data-mask-visible="true" placeholder="00000-00000"
                                           autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="district">Select District</label>
                                    <select type="text" class="form-select" placeholder="Select District"
                                            name="district" id="district"></select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="hospital">Select Hospital</label>
                                    <select type="text" class="form-select" placeholder="Select Hospital"
                                            name="hospital" id="hospital"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="disease">Select Disease</label>
                                    <select type="text" class="form-select" placeholder="Select Disease" name="disease"
                                            id="disease"></select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="treatment">Select Treatment</label>
                                    <select type="text" class="form-select" placeholder="Select Treatment"
                                            name="treatment" id="treatment"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="diagnosis_entry">Diagnosis Entry</label>
                                <textarea class="form-control" name="diagnosis_entry" id="diagnosis_entry"
                                          placeholder="Diagnosis Entry" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="admission_date">Date of Admission (DD/MM/YYYY)</label>
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-calendar-due" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        </svg>
                                    </span>
                                    <input type="text" name="admission_date" id="admission_date" class="form-control"
                                           data-mask="00/00/0000" data-mask-visible="true" placeholder="DD/MM/YYYY"
                                           autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="discharge_date">Date of Discharge (DD/MM/YYYY)</label>
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-calendar-due" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        </svg>
                                    </span>
                                    <input type="text" name="discharge_date" id="discharge_date" class="form-control"
                                           data-mask="00/00/0000" data-mask-visible="true" placeholder="DD/MM/YYYY"
                                           autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="state" class="form-label">Treatment Type</label>
                                    <div class="form-selectgroup-boxes row">
                                        <div class="col-md-6">
                                            <label class="form-selectgroup-item">
                                                <input type="radio" name="treatment_type" id="emergency" value="State" class="form-selectgroup-input">
                                                <span class="form-selectgroup-label d-flex align-items-center p-2">
                                                    <span class="me-3">
                                                        <span class="form-selectgroup-check"></span>
                                                    </span>
                                                    <span class="form-selectgroup-label-content">
                                                        <span class="form-selectgroup-title strong mb-1">Emergency</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-selectgroup-item">
                                                <input type="radio" name="treatment_type" id="nonemergency" value="Board" class="form-selectgroup-input">
                                                <span class="form-selectgroup-label d-flex align-items-center p-2">
                                                    <span class="me-3">
                                                        <span class="form-selectgroup-check"></span>
                                                    </span>
                                                    <span class="form-selectgroup-label-content">
                                                        <span class="form-selectgroup-title strong mb-1">Non Emergency</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary previous-step">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l4 4" /><path d="M5 12l4 -4" /></svg>
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next-step">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M15 16l4 -4" /><path d="M15 8l4 4" /></svg>
                            Next
                        </button>
                    </div>
                </div>
                <div class="card step-pane">
                    <div class="card-header">
                        <h3 class="card-title">File Uploads</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-label">Insurance Card</div>
                                    <div class="dropzone" id="insuranceDropzone"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-label">Treatment Summary</div>
                                    <div class="dropzone" id="treatmentDropzone"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-label">Consolidate Bill</div>
                                    <div class="dropzone" id="billDropzone"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-label">Bank Passbook</div>
                                    <div class="dropzone" id="passbookDropzone"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary previous-step">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l4 4" /><path d="M5 12l4 -4" /></svg>
                                    Previous
                                </button>
                                <button type="submit" name="save" id="save" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                                d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                        <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M14 4l0 4l-6 0l0 -4" />
                                    </svg>
                                    Save Reimbursement Entry
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?= view('layouts/bottom') ?>
</div>
<?= view('layouts/footer') ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let districtEl = document.getElementById('district');
        let hospitalEl = document.getElementById('hospital');

        let districtSelect = new TomSelect(districtEl, {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>'
        });

        let hospitalSelect = new TomSelect(hospitalEl, {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>'
        });

        $.ajax({
            url: '<?= base_url('uiic/get-district'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                var options = response.map(function(district) {
                    return {
                        value: district.tocode,
                        text: district.dt_name
                    };
                });
                districtSelect.clearOptions();
                districtSelect.addOption(options);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        districtSelect.on('change', function() {
            var selectedDistrict = districtSelect.getValue();
            $.ajax({
                url: '<?= base_url('uiic/get-hospital'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    district: selectedDistrict
                },
                success: function(response) {
                    var options = response.map(function(hospital) {
                        return {
                            value: hospital.id,
                            text: hospital.hospital_name
                        };
                    });
                    hospitalSelect.clearOptions();
                    hospitalSelect.addOption(options);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let disease = document.getElementById('disease');
        let treatment = document.getElementById('treatment');

        let diseaseSelect = new TomSelect(disease, {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>'
        });

        let treatmentSelect = new TomSelect(treatment, {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>'
        });

        $.ajax({
            url: '<?= base_url('uiic/get-disease'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                var options = response.map(function(disease) {
                    return {
                        value: disease.disease_id,
                        text: disease.disease_name
                    };
                });
                diseaseSelect.clearOptions();
                diseaseSelect.addOption(options);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        diseaseSelect.on('change', function() {
            var selectedDisease = diseaseSelect.getValue();
            $.ajax({
                url: '<?= base_url('uiic/get-treatment'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    disease: selectedDisease
                },
                success: function(response) {
                    var options = response.map(function(treatment) {
                        return {
                            value: treatment.treatment_id,
                            text: treatment.treatment_name
                        };
                    });
                    treatmentSelect.clearOptions();
                    treatmentSelect.addOption(options);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var insuranceDropzone = new Dropzone("#insuranceDropzone", {
            url: "your_upload_url",
            paramName: "file",
            maxFilesize: 5,
            addRemoveLinks: true,
            acceptedFiles: 'image/*,application/pdf',
            init: function() {
                this.on("success", function(file, response) {
                    console.log(response);
                });
            }
        });

        // Repeat the above process for other Dropzone instances
        // (treatmentDropzone, billDropzone, passbookDropzone)
    });
</script>
<script>
    $(document).ready(function() {
        $('.step-pane').not(':first').hide();
        $('.next-step').click(function(){
            let currentStepPane = $(this).closest('.step-pane');
            let nextStepPane = currentStepPane.next('.step-pane');

            if (validateStep(currentStepPane)) {
                $('.step-item').removeClass('active');
                $('.step-item').eq(nextStepPane.index()).addClass('active');
                currentStepPane.hide();
                nextStepPane.show();
            }
        });

        $('.previous-step').click(function(){
            var currentStepPane = $(this).closest('.step-pane');
            var prevStepPane = currentStepPane.prev('.step-pane');
            $('.step-item').removeClass('active');
            $('.step-item').eq(prevStepPane.index()).addClass('active');
            currentStepPane.hide();
            prevStepPane.show();
        });

        function validateStep(stepPane) {
            let inputs = stepPane.find('input[type="text"], input[type="number"], input[type="radio"], textarea');
            let isValid = true;
            inputs.each(function(){
                if ($(this).val() === '') {
                    isValid = false;
                    $(this).addClass('invalid-field');
                } else {
                    $(this).removeClass('invalid-field');
                }
            });
            return isValid;
        }
    });
</script>