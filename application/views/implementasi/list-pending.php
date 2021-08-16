<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover" style="width:100%" id="list-pending">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">From</th>
                        <th scope="col">Nama Entity</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Date Create</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($list as $l) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $l['name']; ?></td>
                            <td><?= $l['nama_entity']; ?></td>
                            <td><?= $l['produk']; ?></td>
                            <td><?= $l['date_create']; ?></td>
                            <td>
                                <a href="<?= base_url('implementasi/get_pipeline/' . $l['id_pipeline']) ?>" class="badge badge-success">get</a>
                                <a href="<?= base_url('implementasi/detail_pending/' . $l['id_pipeline']); ?>" class="badge badge-warning">detail</a>
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