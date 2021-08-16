<!-- Begin Page Content -->
<div class="container-fluid">

    <style>
        .card-header {
            font-size: 12px;
            text-align: center;
            font-weight: bold;
        }

        .card-body::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .card-body {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .d-flex::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .d-flex {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <h6>
        <?php
        date_default_timezone_set("Asia/Bangkok");
        echo $user['name'] . ", " . date("Y-m-d h:i:sa"); ?>
    </h6>
    <hr>
    <form>
        <div class="d-flex flex-row" style="overflow-x:auto;">
            <div class="col-sm-3">
                <div class="card border-0 shadow-sm bg-white rounded">
                    <h5 class="card-header bg-light">OFFERING</h5>
                    <div class="card-body" style="max-height: 430px; overflow-y: scroll;">
                        <?php foreach ($offering as $o) : ?>
                            <div class="card">
                                <h5 class="card-header bg-light"><?= $o['nama_entity'] ?></h5>
                                <div class="card-body">
                                    <p class="card-title" style="font-weight: bold; font-size:12px"><?= $o['produk'] ?></p>
                                    <p class="card-text" style="font-size:12px"><?= $o['note'] ?></p>
                                    <a style="font-size:12px; font-weight: bold" href="<?= base_url('bisnis/detail_pipeline/' . $o['id']) ?>" class="btn btn-light btn-block border-0 shadow-sm bg-white rounded">Detail</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-0 shadow-sm bg-white rounded">
                    <h5 class="card-header text-white bg-secondary">NEGOTIATION / PROPOSAL</h5>
                    <div class="card-body bg-secondary" style="max-height: 430px; overflow:auto">
                        <?php foreach ($negotiation as $n) : ?>
                            <div href="<?= base_url('bisnis/detail_pipeline/' . $n['id']) ?>" class="card">
                                <h5 class="card-header bg-light"><?= $n['nama_entity'] ?></h5>
                                <div class="card-body">
                                    <p class="card-text" style="font-weight: bold; font-size:12px"><?= $n['produk'] ?></p>
                                    <p class="card-text"><?= $n['note'] ?></p>
                                    <a href="<?= base_url('bisnis/detail_pipeline/' . $n['id']) ?>" class="btn btn-secondary btn-block">Detail</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-0 shadow-sm bg-white rounded">
                    <h5 class="card-header text-white bg-primary">SUBMISSION FORM</h5>
                    <div class="card-body bg-primary" style="max-height: 430px; overflow:auto">
                        <?php foreach ($submission as $o) : ?>
                            <div class="card">
                                <h5 class="card-header bg-light"><?= $o['nama_entity'] ?></h5>
                                <div class="card-body">
                                    <p class="card-text" style="font-weight: bold; font-size:12px"><?= $o['produk'] ?></p>
                                    <p class="card-text" style="font-size:12px"><?= $o['note'] ?></p>
                                    <a style="font-size:12px; font-weight: bold" href="<?= base_url('bisnis/detail_pipeline/' . $o['id']) ?>" class="btn btn-primary btn-block">Detail</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-0 shadow-sm bg-white rounded">
                    <h5 class="card-header text-white bg-info">NDA</h5>
                    <div class="card-body bg-info" style="max-height: 430px; overflow:auto">
                        <?php foreach ($nda as $o) : ?>
                            <div class="card">
                                <h5 class="card-header bg-light"><?= $o['nama_entity'] ?></h5>
                                <div class="card-body">
                                    <p class="card-text" style="font-weight: bold; font-size:12px"><?= $o['produk'] ?></p>
                                    <p class="card-text" style="font-size:12px"><?= $o['note'] ?></p>
                                    <a style="font-size:12px; font-weight: bold" href="<?= base_url('bisnis/detail_pipeline/' . $o['id']) ?>" class="btn btn-info btn-block">Detail</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-0 shadow-sm bg-white rounded">
                    <h5 class="card-header text-white bg-warning">BUSINESS DEAL</h5>
                    <div class="card-body bg-warning" style="max-height: 430px; overflow:auto">
                        <?php foreach ($bussiness_deal as $o) : ?>
                            <div class="card">
                                <h5 class="card-header bg-light"><?= $o['nama_entity'] ?></h5>
                                <div class="card-body">
                                    <p class="card-text" style="font-weight: bold; font-size:12px"><?= $o['produk'] ?></p>
                                    <p class="card-text" style="font-size:12px"><?= $o['note'] ?></p>
                                    <a style="font-size:12px; font-weight: bold" href="<?= base_url('bisnis/detail_pipeline/' . $o['id']) ?>" class="btn btn-warning btn-block">Detail</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-0 shadow-sm bg-white rounded">
                    <h5 class="card-header text-white bg-dark">PKS</h5>
                    <div class="card-body bg-dark" style="max-height: 430px; overflow:auto">
                        <?php foreach ($pks as $o) : ?>
                            <div class="card">
                                <h5 class="card-header bg-light"><?= $o['nama_entity'] ?></h5>
                                <div class="card-body">
                                    <p class="card-text" style="font-weight: bold; font-size:12px"><?= $o['produk'] ?></p>
                                    <p class="card-text" style="font-size:12px"><?= $o['note'] ?></p>
                                    <a style="font-size:12px; font-weight: bold" href="<?= base_url('bisnis/detail_pipeline/' . $o['id']) ?>" class="btn btn-light btn-block border-0 shadow-sm bg-white rounded">Detail</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-0 shadow-sm bg-white rounded">
                    <h5 class="card-header" style="background-color: blanchedalmond;">Card Production</h5>
                    <div class="card-body" style="max-height: 430px; overflow:auto; background-color: blanchedalmond;">
                        <?php foreach ($card_production as $o) : ?>
                            <div class="card">
                                <h5 class="card-header bg-light"><?= $o['nama_entity'] ?></h5>
                                <div class="card-body">
                                    <p class="card-text" style="font-weight: bold; font-size:12px"><?= $o['produk'] ?></p>
                                    <p class="card-text" style="font-size:12px"><?= $o['note'] ?></p>
                                    <a style="font-size:12px; font-weight: bold" href="<?= base_url('bisnis/detail_pipeline/' . $o['id']) ?>" class="btn btn-light btn-block">Detail</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-0 shadow-sm bg-white rounded">
                    <h5 class="card-header text-white bg-success">DONE</h5>
                    <div class="card-body bg-success" style="max-height: 430px; overflow:auto">
                        <?php foreach ($success as $o) : ?>
                            <div class="card">
                                <h5 class="card-header bg-light"><?= $o['nama_entity'] ?></h5>
                                <div class="card-body">
                                    <p class="card-text" style="font-weight: bold; font-size:12px"><?= $o['produk'] ?></p>
                                    <p class="card-text" style="font-size:12px"><?= $o['note'] ?></p>
                                    <a style="font-size:12px; font-weight: bold" href="<?= base_url('bisnis/detail_pipeline/' . $o['id']) ?>" class="btn btn-success btn-block">Detail</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-0 shadow-sm bg-white rounded">
                    <h5 class="card-header text-white bg-danger">FAILED</h5>
                    <div class="card-body bg-danger" style="max-height: 430px; overflow:auto">
                        <?php foreach ($failed as $o) : ?>
                            <div class="card">
                                <h5 class="card-header bg-light"><?= $o['nama_entity'] ?></h5>
                                <div class="card-body">
                                    <p class="card-text" style="font-weight: bold; font-size:12px"><?= $o['produk'] ?></p>
                                    <p class="card-text" style="font-size:12px"><?= $o['note'] ?></p>
                                    <a style="font-size:12px; font-weight: bold" href="<?= base_url('bisnis/detail_pipeline/' . $o['id']) ?>" class="btn btn-danger btn-block">Detail</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->