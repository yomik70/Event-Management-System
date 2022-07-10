            </div>
            <!-- Footer -->
            <footer class="footer text-right">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            Copyright 2021 Design and develop by Yomik
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!-- jQuery  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/admin/')?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/admin/')?>js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url('assets/admin/')?>js/datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url('assets/admin/')?>js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url('assets/admin/')?>js/jquery.form-pickers.init.js"></script>
        <!--Datepicker files start-->
        <script src="<?php echo base_url('assets/admin/')?>js/datepickr.min.js"></script>

        <!--Datetimepicker files start-->
        <script src="<?php echo base_url('assets/')?>js/jquery.datetimepicker.full.js"></script>

         <!--Animation scripts-->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        <script>
          AOS.init();
        </script>
        <script>
            // Regular datepickr
            // datepickr('#datepickr');
            $('.datepickr').datetimepicker({
                format: 'Y-m-d H:i',
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();
        </script>
    </body>
</html>