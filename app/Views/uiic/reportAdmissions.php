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
                        Reports
                    </div>
                    <?php if (isset($data)): foreach ($data as $values): ?>
                        <h2 class="page-title">
                            List of Admissions in &nbsp;<?= ucfirst($values['hospital_name']); ?>
                        </h2>
                    <?php endforeach; endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Reference No</th>
                                    <th>Name</th>
                                    <th>Date of Admission</th>
                                    <th>Date of Discharge</th>
                                    <th>Treatment Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sn = 1; if (isset($data)): foreach ($data as $values): ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><?= $values['finyear'].$values['id']; ?></td>
                                        <td><?= $values['emp_name']; ?></td>
                                        <td><?= $values['date_admission']; ?></td>
                                        <td><?= $values['date_discharge']; ?></td>
                                        <td>
                                            <?php if ($values['treatment_type'] === '108'): ?>
                                                <span class="badge badge-outline text-red">Emergency</span>
                                            <?php else: ?>
                                                <span class="badge badge-outline text-green">Non-Emergency</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="#"><span class="badge badge-outline text-blue">Edit</span></a>
                                            <a href="#"><span class="badge badge-outline text-blue">View Documents</span></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-payment"><span class="badge badge-outline text-blue">Payment</span></a>
                                        </td>
                                    </tr>
                                    <?php $sn++; endforeach; endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('layouts/bottom') ?>
    <!--In Page Modals-->
    <div class="modal modal-blur fade" id="modal-payment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Payment Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="payment_type" id="approved" value="1" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Approved</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="payment_type" id="rejected" value="0" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Rejected</span>
                                    </span>
                                </span>
                                </label>
                            </div>
                        </div>
                        <div id="approved" class="d-none">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label required" for="paid_amount">Paid Amount</label>
                                    <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" /><path d="M15 7h-6h1a3 3 0 0 1 0 6h-1l3 3" /><path d="M9 10h6" /></svg>
                                    </span>
                                        <input type="text" class="form-control" id="paid_amount" name="paid_amount">
                                    </div>
                                    <div class="invalid-feedback">Paid Amount</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required" for="paid_date">Paid Date</label>
                                    <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M16 3l0 4" /><path d="M8 3l0 4" /><path d="M4 11l16 0" /><path d="M8 15h2v2h-2z" /></svg>
                                    </span>
                                        <input type="text" class="form-control" id="paid_date" name="paid_date">
                                    </div>
                                    <div class="invalid-feedback">Paid Date</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label required" for="utr_no">UTR No</label>
                                    <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" /></svg>
                                    </span>
                                        <input type="text" class="form-control" id="utr_no" name="utr_no">
                                    </div>
                                    <div class="invalid-feedback">UTR No</div>
                                </div>
                            </div>
                        </div>
                        <div id="rejected" class="d-none">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3" id="rejected">
                                        <label class="form-label required" for="remarks">Reason for Rejection  <span class="text-danger" id="count"></span></label>
                                        <textarea class="form-control" maxlength="300" name="remarks" id="remarks" placeholder="Diagnosis Entry" rows="5"></textarea>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= view('layouts/footer') ?>
<script>
    $("#remarks").keyup(function(){
        $("#count").text("Characters left: " + (300 - $(this).val().length));
    });
    document.addEventListener("DOMContentLoaded", function () {
        window.Litepicker && (new Litepicker({
            element: document.getElementById('paid_date'),
            buttonText: {
                previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
            },
        }));
    });
</script>