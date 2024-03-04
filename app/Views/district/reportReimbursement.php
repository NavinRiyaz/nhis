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
                    <h2 class="page-title">
                        Reimbursement Entry Report
                    </h2>
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
                                    <th>District Name</th>
                                    <th>Total Entries</th>
                                    <th>State</th>
                                    <th>Board</th>
                                    <th>Corporation</th>
                                    <th>Pensioners</th>
                                    <th>To Be Process</th>
                                    <th>Return</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sn = 1; if (isset($data)): foreach ($data as $values): ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><a href="<?= base_url('district/hospitals/'.$values['tocode']) ?>"><?= $values['dt_name']; ?></a></td>
                                        <td><?= $values['total_count']; ?></td>
                                        <td><?= $values['state_employee']; ?></td>
                                        <td><?= $values['board_employee']; ?></td>
                                        <td><?= $values['corporation_employee']; ?></td>
                                        <td><?= $values['pensioner']; ?></td>
                                        <td><?= $values['to_be_process']; ?></td>
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
