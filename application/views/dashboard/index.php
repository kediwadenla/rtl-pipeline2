<!-- Begin Page Content -->
<style>
    th {
        font-size: 10px;
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
                <th scope="col">OFFERING</th>
                <th scope="col">NEGOTIATION</th>
                <th scope="col">CARD PRODUCTION</th>
                <th scope="col">SUBMISSION FORM</th>
                <th scope="col">NDA</th>
                <th scope="col">BUSINESS DEAL</th>
                <th scope="col">PKS</th>
                <th scope="col">SUCCESS</th>
                <th scope="col">FAILED</th>
                <th scope="col">TOTAL</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $jum = 1;
            foreach ($result as $row) {
                $jumlah = $row['offering'] + $row['submission'] + $row['card_production'] + $row['nda'] + $row['business_deal'] + $row['pks'] + $row['success'] + $row['failed'];
                echo '<tr href="http://google.com">';
                if ($jum <= 1) {
                    echo '<td rowspan="' . $row['jumlah'] . '">' . $row['unit'] . '</td>';
                    $jum = $row['jumlah'];
                } else {
                    $jum = $jum - 1;
                }
                echo '<td>' . $row['produk_group'] . '</td>';
                echo '<td>' . $row['offering'] . '</td>';
                echo '<td>' . $row['negotiation'] . '</td>';
                echo '<td>' . $row['card_production'] . '</td>';
                echo '<td>' . $row['submission'] . '</td>';
                echo '<td>' . $row['nda'] . '</td>';
                echo '<td>' . $row['business_deal'] . '</td>';
                echo '<td>' . $row['pks'] . '</td>';
                echo '<td>' . $row['success'] . '</td>';
                echo '<td>' . $row['failed'] . '</td>';
                echo '<td>' . $jumlah . '</td>';
                echo '<td>' . '<a href="#">detail</a>' . '</td>';
                echo '</tr>';
            } ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->