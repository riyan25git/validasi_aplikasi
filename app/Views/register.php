<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="javascript:void(0)"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Buat Akun</h1>
                <p class="auth-subtitle mb-5">Masukkan data diri anda untuk dapat mengakses aplikasi.</p>

                <form action="/daftar/verifikasi" method="POST" enctype="multipart/form-data">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" name="nama" id="nama" class="form-control form-control-xl <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Nama" value="<?= old('nama'); ?>">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" name="email" id="email" class="form-control form-control-xl <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?= old('email'); ?>">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" name="username" id="username" class="form-control form-control-xl <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Username" value="<?= old('username'); ?>">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" id="password" class="form-control form-control-xl <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="ulangi_password" id="ulangi_password" class="form-control form-control-xl <?= ($validation->hasError('ulangi_password')) ? 'is-invalid' : ''; ?>" placeholder="Confirm Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ulangi_password'); ?>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Kirim Data</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Sudah punya akun? Klik <a href="/" class="font-bold">Log
                            in</a> untuk masuk ke dalam aplikasi.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>