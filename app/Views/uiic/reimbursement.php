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
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <form action="<?= base_url('uiic/reimbursement-entry') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="state" class="form-label">Employee Type</label>
                                <div class="form-selectgroup-boxes row">
                                    <div class="col-md-4">
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="employee_type" id="state" value="State" class="form-selectgroup-input" checked>
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
                                            <input type="radio" name="employee_type" id="board" value="Board" class="form-selectgroup-input">
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
                                            <input type="radio" name="employee_type" id="corporation" value="Corporation" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Corporation Employee</span>
                                            </span>
                                        </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="emp_details">
                                <div class="card-status-start bg-primary"></div>
                                <div class="card-header">
                                    <h3 class="card-title">Employee Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label" for="emp_id">IFHRMS EMP ID</label>
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                                </span>
                                                <input type="number" class="form-control" id="emp_id" name="emp_id">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="emp_name">Full Name</label>
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                            <div class="mb-3">
                                                <label class="form-label" for="emp_dob">Date of Birth (DD/MM/YYYY)</label>
                                                <input type="text" name="emp_dob" id="emp_dob" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="DD/MM/YYYY" autocomplete="off"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="emp_doj">Date of Joining (DD/MM/YYYY)</label>
                                                <input type="text" name="emp_doj" id="emp_doj" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="DD/MM/YYYY" autocomplete="off"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="emp_phone">Phone</label>
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                                                </span>
                                                <input type="text" class="form-control" id="emp_phone" name="emp_phone" data-mask="00000-00000" data-mask-visible="true" placeholder="00000-00000" autocomplete="off" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="district">Select District</label>
                                                <select type="text" class="form-select" placeholder="Select District" name="district" id="district">
                                                    <option value="HTML">HTML</option>
                                                    <option value="JavaScript">JavaScript</option>
                                                    <option value="CSS">CSS</option>
                                                    <option value="jQuery">jQuery</option>
                                                    <option value="Bootstrap">Bootstrap</option>
                                                    <option value="Ruby">Ruby</option>
                                                    <option value="Python">Python</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label" for="hospital">Select Hospital</label>
                                                <select type="text" class="form-select" placeholder="Select Hospital" name="hospital" id="hospital">
                                                    <option value="HTML">HTML</option>
                                                    <option value="JavaScript">JavaScript</option>
                                                    <option value="CSS">CSS</option>
                                                    <option value="jQuery">jQuery</option>
                                                    <option value="Bootstrap">Bootstrap</option>
                                                    <option value="Ruby">Ruby</option>
                                                    <option value="Python">Python</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="disease">Select Disease</label>
                                                <select type="text" class="form-select" placeholder="Select Disease" name="disease" id="disease">
                                                    <option value="HTML">HTML</option>
                                                    <option value="JavaScript">JavaScript</option>
                                                    <option value="CSS">CSS</option>
                                                    <option value="jQuery">jQuery</option>
                                                    <option value="Bootstrap">Bootstrap</option>
                                                    <option value="Ruby">Ruby</option>
                                                    <option value="Python">Python</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label" for="treatment">Select Treatment</label>
                                                <select type="text" class="form-select" placeholder="Select Treatment" name="treatment" id="treatment">
                                                    <option value="HTML">HTML</option>
                                                    <option value="JavaScript">JavaScript</option>
                                                    <option value="CSS">CSS</option>
                                                    <option value="jQuery">jQuery</option>
                                                    <option value="Bootstrap">Bootstrap</option>
                                                    <option value="Ruby">Ruby</option>
                                                    <option value="Python">Python</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label" for="diagnosis_entry">Diagnosis Entry</label>
                                            <textarea class="form-control" name="diagnosis_entry" id="diagnosis_entry" placeholder="Diagnosis Entry" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="admission_date">Date of Admission (DD/MM/YYYY)</label>
                                                <input type="text" name="admission_date" id="admission_date" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="DD/MM/YYYY" autocomplete="off"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="discharge_date">Date of Discharge (DD/MM/YYYY)</label>
                                                <input type="text" name="discharge_date" id="discharge_date" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="DD/MM/YYYY" autocomplete="off"/>
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
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-label">Insurance Card</div>
                                                    <input type="file" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-label">Treatment Summary</div>
                                                    <input type="file" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-label">Consolidate Bill</div>
                                                    <input type="file" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-label">Bank Passbook</div>
                                                    <input type="file" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="save" id="save" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg>
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
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('district'), {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>',
            render:{
                item: function(data,escape) {
                    if( data.customProperties ){
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function(data,escape){
                    if( data.customProperties ){
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
            },
        }));
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('hospital'), {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>',
            render:{
                item: function(data,escape) {
                    if( data.customProperties ){
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function(data,escape){
                    if( data.customProperties ){
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
            },
        }));
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('disease'), {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>',
            render:{
                item: function(data,escape) {
                    if( data.customProperties ){
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function(data,escape){
                    if( data.customProperties ){
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
            },
        }));
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('treatment'), {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>',
            render:{
                item: function(data,escape) {
                    if( data.customProperties ){
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function(data,escape){
                    if( data.customProperties ){
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
            },
        }));
    });
    // @formatter:on
</script>
