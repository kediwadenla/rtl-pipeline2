<!-- Begin Page Content -->
<style>
    th {
        font-size: 11px;
        font-weight: bold;
        text-align: center;
    }

    td {
        font-size: 11px;
        align-items: center;
        text-align: center;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800"><?= $title ?></h1>
    <hr>

    <h5 class="h5 mb-2 text-gray-800">Business Pipeline</h5>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">SEGMEN</th>
                <th scope="col">PRODUK</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $jum = 1;
            foreach ($record as $row) {
                echo '<tr>';
                if ($jum <= 1) {
                    echo '<td rowspan="' . $row['jumlah'] . '">' . $row['produk_group'] . '</td>';
                    $jum = $row['jumlah'];
                } else {
                    $jum = $jum - 1;
                }
                echo '<td>' . $row['produk'] . '</td>';
                echo '</tr>';
            } ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->