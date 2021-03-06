<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="<?= base_url('auth/registration'); ?>" class="user">
                            <div class="form-group">
                                <input type="text" class="form-control" id="npp" name="npp" placeholder="NPP" value="<?= set_value('npp') ?>">
                                <?= form_error('npp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?= set_value('phone') ?>">
                                <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class=" form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-block">
                                Register Account
                            </button>
                            <hr>
                        </form>
                        <div class="text-center">
                            <a class="small" href="<?= base_url(); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>