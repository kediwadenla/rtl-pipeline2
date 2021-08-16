<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover" style="width:100%" id="list-pipeline">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Entity</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Counterpart</th>
                        <th scope="col">Progress Status</th>
                        <th scope="col">Date Upadate</th>
                        <th scope="col">SLA</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($list as $l) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $l['nama_entity']; ?></td>
                            <td><?= $l['produk']; ?></td>
                            <td><?= $l['counterpart']; ?></td>
                            <td><?= $l['progress_status']; ?></td>
                            <td><?= $l['date_create']; ?></td>
                            <td>2</td>
                            <td>
                                <a href="<?= base_url('implementasi/detail/' . $l['id_pipeline']); ?>" class="badge badge-success">detail</a>
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