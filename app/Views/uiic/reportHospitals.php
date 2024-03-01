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
                        List of Hospitals in &nbsp;<?= ucfirst($values['district_name']); ?>
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
                                    <th>Hospital Name</th>
                                    <th>Total Admission</th>
                                    <th>State</th>
                                    <th>Board</th>
                                    <th>Corporation</th>
                                    <th>Pensioners</th>
                                    <th>To Be Process</th>
                                    <th>Paid</th>
                                    <th>Return</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sn = 1; if (isset($data)): foreach ($data as $values): ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><a href="<?= base_url('uiic/admissions/'.$values['hospital_id']) ?>"><?= $values['hospital_name']; ?></a></td>
                                        <td><?= $values['total_count']; ?></td>
                                        <td><?= $values['state_employee']; ?></td>
                                        <td><?= $values['board_employee']; ?></td>
                                        <td><?= $values['corporation_employee']; ?></td>
                                        <td><?= $values['pensioner']; ?></td>
                                        <td><?= $values['to_be_process']; ?></td>
                                        <td><?= $values['paid']; ?></td>
                                        <td><?= $values['return']; ?></td>
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
</div>
<?= view('layouts/footer') ?>
