<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <h6>
        <?php
        date_default_timezone_set("Asia/Bangkok");
        echo $user['name'] . ", " . date("Y-m-d h:i:sa"); ?>
    </h6>
    <hr>
    <form method="POST" action="<?= base_url('bisnis'); ?>">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="inputEmail3" style="font-size: 12px; font-weight:bold">Nama Entity</label>
                    <input class="form-control border-0 shadow-sm bg-white rounded" id="nama_entity" name="nama_entity" type="text" value="<?= set_value('nama_entity'); ?>">
                    <?= form_error('nama_entity', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" style="font-size: 12px; font-weight:bold">Nama PIC</label>
                    <input class="form-control border-0 shadow-sm bg-white rounded" id="nama_pic" name="nama_pic" type="text" value="<?= set_value('nama_pic'); ?>">
                    <?= form_error('nama_pic', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" style="font-size: 12px; font-weight:bold">Phone PIC</label>
                    <input class="form-control border-0 shadow-sm bg-white rounded" id="phone_pic" name="phone_pic" type="number" value="<?= set_value('phone_pic'); ?>">
                    <?= form_error('phone_pic', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" style="font-size: 12px; font-weight:bold">Email PIC</label>
                    <input class="form-control border-0 shadow-sm bg-white rounded" id="email_pic" name="email_pic" type="text" value="<?= set_value('email_pic'); ?>">
                    <?= form_error('email_pic', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" style="font-size: 12px; font-weight:bold">Expected Balance</label>
                    <input class="form-control border-0 shadow-sm bg-white rounded" id="expect_balance" name="expect_balance" type="text" value="<?= set_value('expect_balance'); ?>">
                    <?= form_error('expect_balance', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" style="font-size: 12px; font-weight:bold">Expected transaction</label>
                    <input class="form-control border-0 shadow-sm bg-white rounded" id="expect_transaction" name="expect_transaction" type="text" value="<?= set_value('expect_transaction'); ?>">
                    <?= form_error('expect_transaction', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="inputEmail3" style="font-size: 12px; font-weight:bold">Expected SV/Years</label>
                    <input class="form-control border-0 shadow-sm bg-white rounded" id="expect_sv" name="expect_sv" type="text" value="<?= set_value('expect_sv'); ?>">
                    <?= form_error('expect_sv', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" style="font-size: 12px; font-weight:bold">Expected Fee/Years</label>
                    <input class="form-control border-0 shadow-sm bg-white rounded" id="expect_fee" name="expect_fee" type="text" value="<?= set_value('expect_fee'); ?>">
                    <?= form_error('expect_fee', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="counterpart" style="font-size: 12px; font-weight:bold">Counterpart</label>
                    <select name="counterpart" id="counterpart" class="form-control border-0 shadow-sm bg-white rounded">
                        <option value=""> -Select- </option>
                        <?php foreach ($counterpart as $cp) : ?>
                            <option value="<?= $cp['id'] ?>"><?= $cp['counterpart'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('counterpart', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="sektor_industri" style="font-size: 12px; font-weight:bold">Sektor industri</label>
                    <select name="sektor_industri" id="sektor_industri" class="form-control border-0 shadow-sm bg-white rounded">
                        <option value=""> -Select- </option>
                        <?php foreach ($sektor_industri as $si) : ?>
                            <option value="<?= $si['id'] ?>"><?= $si['sektor_industri'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('sektor_industri', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="wilayah" style="font-size: 12px; font-weight:bold">Wilayah padanan</label>
                    <select id="wilayah" name="wilayah" class="form-control border-0 shadow-sm bg-white rounded">
                        <option value="18"> -Select- </option>
                        <?php foreach ($wilayah as $w) : ?>
                            <option value="<?= $w['id'] ?>"><?= $w['wilayah'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('wilayah', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="cabang" style="font-size: 12px; font-weight:bold">Cabang Padanan</label>
                    <select name="cabang" id="cabang" class="form-control border-0 shadow-sm bg-white rounded">
                        <option value="197">-Select-</option>
                    </select>
                    <?= form_error('cabang', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="produk" style="font-size: 12px; font-weight:bold">Produk</label>
                    <select name="produk" id="produk" class="form-control border-0 shadow-sm bg-white rounded">
                        <option value=""> -Select- </option>
                        <?php foreach ($produk as $p) : ?>
                            <option value="<?= $p['id'] ?>"><?= $p['produk'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('produk', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="progress_status" style="font-size: 12px; font-weight:bold">Progress status</label>
                    <select name="progress_status" id="progress_status" class="form-control border-0 shadow-sm bg-white rounded">
                        <option value=""> -Select- </option>
                        <?php foreach ($status as $s) : ?>
                            <option value="<?= $s['id'] ?>"><?= $s['progress_status'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('progress_status', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="note" style="font-size: 12px; font-weight:bold">Note</label>
                    <textarea name="note" id="note" class="form-control border-0 shadow-sm bg-white rounded" rows="4" id="product" name="product" type="text"></textarea>
                    <?= form_error('note', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-dark btn-block">Submit</button>
            <hr>
        </div>
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