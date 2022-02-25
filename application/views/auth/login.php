<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    
                    <?php if($this->session->flashdata('pesan') == "Login Gagal"): ?>
                        <div class="alert alert-danger" role="alert">
                            Login gagal: password salah!
                        </div>
                    <?php endif ?>
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Minutes of Meetings</h1>
                                    </div>
                                    <form class="user" action="<?= base_url('auth/login'); ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nik" placeholder="Masukkan NIK..." name="nik" value="<?= set_value('nik'); ?>">
                                            <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password...">
                                            <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login_button">
                                            Login
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>