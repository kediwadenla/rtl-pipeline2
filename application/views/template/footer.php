<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy;RTL-Keds 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/vendor/js/sb-admin-2.min.js"></script>

<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        })
    })

    $(document).ready(function() {
        // Untuk sunting
        $('#editRole').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#role').attr("value", div.data('role'));
        });
    });

    $(document).ready(function() {
        // Untuk sunting
        $('#editMenu').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#menu').attr("value", div.data('menu'));
        });
    });

    $(document).ready(function() {
        // Untuk sunting
        $('#editSubMenu').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#title').attr("value", div.data('title'));
            modal.find('#url').attr("value", div.data('url'));
            modal.find('#icon').attr("value", div.data('icon'));
        });
    });

    $(document).ready(function() {
        // Untuk sunting
        $('#edituser').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#npp').attr("value", div.data('npp'));
            modal.find('#name').attr("value", div.data('name'));
            modal.find('#phone').attr("value", div.data('phone'));
        });
    });

    $(document).ready(function() {
        $("#wilayah").change(function() {
            var id_wilayah = $(this).val();
            $.ajax({
                url: "<?= base_url('bisnis/getcabang') ?>",
                method: "POST",
                data: {
                    idWilayah: id_wilayah
                },
                success: function(data) {
                    $("#cabang").html(data);
                }
            });
        });
    });

    $(document).ready(function() {
        $("#auto").hide();
        $('#progress_status').on('change', function() {
            if (this.value == '8') {
                $("#auto").show();
            } else {
                $("#auto").hide();
            }
        });
    });

    $(document).ready(function() {
        $('#list-pending').DataTable({
            "language": {
                "emptyTable": "My Custom Message On Empty Table"
            }
        });
    });

    $(document).ready(function() {
        $('#list-pipeline').DataTable({
            "language": {
                "emptyTable": "My Custom Message On Empty Table"
            }
        });
    });
</script>

</body>

</html>