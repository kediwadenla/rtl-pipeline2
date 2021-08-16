<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#adduser">Add New User</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NPP</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                        <th scope="col">Active</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($alluser as $au) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $au['npp']; ?></td>
                            <td><?= $au['name']; ?></td>
                            <td><?= $au['phone']; ?></td>
                            <td><?= $au['role']; ?></td>
                            <td><?= $au['is_active']; ?></td>
                            <td><?= $au['date_create']; ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#edituser" data-id="<?= $au['id']; ?>" data-npp="<?= $au['npp']; ?>" data-name="<?= $au['name']; ?>" data-phone="<?= $au['phone']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('user/userreset/' . $au['id']); ?>" class="badge badge-warning">reset</a>
                                <a href="<?= base_url('user/userdelete/' . $au['id']); ?>" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- modal add user -->

<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="adduserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adduserLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg">
                            <input type="text" class="form-control" id="npp" name="npp" placeholder="npp">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-lg">
                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg">
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg">
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">Select Role</option>
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg">
                            <select name="unit" id="unit" class="form-control">
                                <option value="">Select Unit</option>
                                <option value="SBA">SBA</option>
                                <option value="SBT">SBT</option>
                                <option value="SBD">SBD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="1" name="is_active" id="is_active" checked>
                            <label class="custom-control-label" for="is_active">Active?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit user -->

<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="edituserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edituserLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/userupdate') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg">
                            <input type="hidden" id="id" name="id">
                            <input type="text" class="form-control" id="npp" name="npp" placeholder="npp">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-lg">
                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg">
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg">
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">Select Role</option>
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="1" name="is_active" id="is_active" checked>
                            <label class="custom-control-label" for="is_active">Active?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>