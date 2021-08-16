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
    <form method="POST" action="<?= base_url('implementasi/update'); ?>">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-7 border-0 shadow-sm bg-white rounded">
                <table class="table table-striped" style="margin-top: 10px;">
                    <tbody>
                        <tr>
                            <td style="color: black; font-weight:bold">Id Pipeline</td>
                            <td>:</td>
                            <td><?= $detail['id'] ?></td>
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
                            <td>
                                <?= $detail['nama_pic']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Phone PIC</td>
                            <td>:</td>
                            <td>
                                <?= $detail['phone_pic']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Email PIC</td>
                            <td>:</td>
                            <td>
                                <?= $detail['email_pic']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Balance</td>
                            <td>:</td>
                            <td>
                                <?php
                                $balance = "Rp " . number_format($detail['expect_balance'], 0, ',', '.');
                                echo $balance;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Transaction</td>
                            <td>:</td>
                            <td>
                                <?php
                                $transaksi = "Rp " . number_format($detail['expect_transaction'], 0, ',', '.');
                                echo $transaksi;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">SV</td>
                            <td>:</td>
                            <td>
                                <?php
                                $sv = "Rp " . number_format($detail['expect_sv'], 0, ',', '.');
                                echo $sv;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Fee</td>
                            <td>:</td>
                            <td>
                                <?php
                                $fee = "Rp " . number_format($detail['expect_fee'], 0, ',', '.');
                                echo $fee;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Counterpart</td>
                            <td>:</td>
                            <td><?= $detail['counterpart'] ?></td>
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
                            <td style="color: black; font-weight:bold">Progress Status</td>
                            <td>:</td>
                            <td>
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" value="<?= $detail['id_pipeline'] ?>">
                                    <select name="progress_status" id="progress_status" class="form-control border-0 shadow-sm bg-white rounded">
                                        <option value="<?= $detail['id_progress_status_implementasi'] ?>"> <?= $detail['progress_status'] ?> </option>
                                        <?php foreach ($status as $s) : ?>
                                            <option value="<?= $s['id'] ?>"><?= $s['progress_status'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="uic" id="auto" class="form-control border-0 shadow-sm bg-white rounded">
                                        <option value=""> -Pilih- </option>
                                        <?php foreach ($uic as $u) : ?>
                                            <option value="<?= $u['id'] ?>"><?= $u['uic'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: black; font-weight:bold">Date Create</td>
                            <td>:</td>
                            <td><?= $detail['date_create'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <div class=" container-fluid border-0 shadow-sm bg-white rounded" style="height: 65.5%;">
                    <div style="padding-top: 10px; font-weight:bold; color:black">Track History :</div>
                    <hr>
                    <div class="d-flex flex-column-reverse align-items-center" style="max-height: 430px; overflow-y: scroll;">
                        <div>----------</div>
                        <?php foreach ($log as $l) : ?>
                            <div>|</div>
                            <div>O</div>
                            <div>|</div>
                            <div><?= $l['date_update'] ?></div>
                            <div><?= $l['note'] ?></div>
                            <div style="font-weight: bold;"><?= $l['progress_status'] ?></div>
                            <?= $l['status'] ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <hr>
                <div class="d-flex border-0 shadow-sm bg-white rounded" style="height: 30%;">
                    <div class="container-fluid">
                        <div class="form-group" style="margin-top: 10px;">
                            <label for="note" style="font-size: 12px; font-weight:bold; color:black">Note :</label>
                            <textarea name="note" id="note" rows="6" class="form-control border-1" id="product" name="product" type="text"><?= $detail['note'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-block">Update</button>

    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    var rupiah = document.getElementById('expect_balance');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    };

    var transaction = document.getElementById('expect_transaction');
    transaction.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formattransaction() untuk mengubah angka yang di ketik menjadi format angka
        transaction.value = formattransaction(this.value, 'Rp. ');
    });

    /* Fungsi formattransaction */
    function formattransaction(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            transaction = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            transaction += separator + ribuan.join('.');
        }

        transaction = split[1] != undefined ? transaction + ',' + split[1] : transaction;
        return prefix == undefined ? transaction : (transaction ? 'Rp. ' + transaction : '');
    };

    var sv = document.getElementById('expect_sv');
    sv.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatsv() untuk mengubah angka yang di ketik menjadi format angka
        sv.value = formatsv(this.value, 'Rp. ');
    });

    /* Fungsi formatsv */
    function formatsv(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            sv = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            sv += separator + ribuan.join('.');
        }

        sv = split[1] != undefined ? sv + ',' + split[1] : sv;
        return prefix == undefined ? sv : (sv ? 'Rp. ' + sv : '');
    };

    var fee = document.getElementById('expect_fee');
    fee.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatfee() untuk mengubah angka yang di ketik menjadi format angka
        fee.value = formatfee(this.value, 'Rp. ');
    });

    /* Fungsi formatfee */
    function formatfee(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            fee = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            fee += separator + ribuan.join('.');
        }

        fee = split[1] != undefined ? fee + ',' + split[1] : fee;
        return prefix == undefined ? fee : (fee ? 'Rp. ' + fee : '');
    };
</script>