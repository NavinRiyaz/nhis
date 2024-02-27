<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>New Health Insurance Scheme | Government of TamilNadu | Government Data Centre</title>
    <!-- CSS files -->
    <link href="<?= base_url('assets/css/tabler.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/tabler-vendors.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/demo.min.css') ?>" rel="stylesheet"/>
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo.png') ?>" type="image/x-icon">
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body  class=" d-flex flex-column bg-white">
<div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
        <div class="container container-tight my-5 px-lg-5">
            <div class="text-center mb-4">
                <a href="#" class="navbar-brand"><img src="<?= base_url('assets/img/logo.png') ?>" height="100" alt=""></a>
            </div>
            <h2 class="h3 text-center mb-3">
                Login to your account
            </h2>
            <?php if (isset($validation)) { ?>
                <?php foreach ($validation->getErrors() as $field => $error) : ?>
                    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                <?= $error ?>
                            </div>
                        </div>
                        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                <?php endforeach; ?>
            <?php } ?>
            <form action="<?= base_url('') ?>" method="post" autocomplete="off" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Username" autocomplete="off" name="username" id="username" value="<?= set_value('username'); ?>">
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Password
                        <span class="form-label-description"></span>
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Your password"  autocomplete="off">
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                          </a>
                        </span>
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
        <!-- Photo -->
        <div class="bg-cover h-100 min-vh-100" style="background-image: url(<?= base_url('assets/img/background.jpeg') ?>)"></div>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="<?= base_url('assets/js/tabler.min.js') ?>"></script>
<script src="<?= base_url('assets/js/demo.min.js') ?>"></script>
</body>
</html>