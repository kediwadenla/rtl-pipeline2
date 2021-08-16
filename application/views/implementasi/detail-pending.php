<!-- Begin Page Content -->
<style>
    td {
        font-size: 13px;
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
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <form method="POST" action="<?= base_url('implementasi/get_pipeline/' . $detail['id_pipeline']) ?>">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-6 border-0 shadow-sm bg-white rounded">
                <table class="table table-striped" style="margin-top: 10px;">
                    <tbody>
                        <tr>
                            <td style="color: black; font-weight:bold">Id Pipeline</td>
                            <td>:</td>
                            <td><?= $detail['id_pipeline'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Nama RM</td>
                            <td>:</td>
                            <td><?= $user['name'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Nama Entity</td>
                            <td>:</td>
                            <td><?= $detail['nama_entity'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Produk</td>
                            <td>:</td>
                            <td><?= $detail['produk'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Sektor Industri</td>
                            <td>:</td>
                            <td><?= $detail['sektor_industri'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">PIC</td>
                            <td>:</td>
                            <td> <?= $detail['nama_pic'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Phone PIC</td>
                            <td>:</td>
                            <td><?= $detail['phone_pic'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Email PIC</td>
                            <td>:</td>
                            <td><?= $detail['email_pic'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 border-0 shadow-sm bg-white rounded">
                <table class="table table-striped" style="margin-top: 10px;">
                    <tbody>
                        <tr>
                            <td style="color: black; font-weight:bold">Expected Balance</td>
                            <td>:</td>
                            <td><?php
                                $balance = "Rp " . number_format($detail['expect_balance'], 2, ',', '.');
                                echo $balance;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Expected Transaction</td>
                            <td>:</td>
                            <td><?php
                                $balance = "Rp " . number_format($detail['expect_transaction'], 2, ',', '.');
                                echo $balance;
                                ?>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Expected SV</td>
                            <td>:</td>
                            <td><?php
                                $balance = "Rp " . number_format($detail['expect_sv'], 2, ',', '.');
                                echo $balance;
                                ?>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Expected Fee</td>
                            <td>:</td>
                            <td><?php
                                $balance = "Rp " . number_format($detail['expect_fee'], 2, ',', '.');
                                echo $balance;
                                ?>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Wilayah</td>
                            <td>:</td>
                            <td><?= $detail['wilayah'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Cabang</td>
                            <td>:</td>
                            <td><?= $detail['cabang'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Date Create</td>
                            <td>:</td>
                            <td><?= $detail['date_create'] ?></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Note</td>
                            <td>:</td>
                            <td><?= $detail['note'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-block">Take this Pipeline</button>

    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->