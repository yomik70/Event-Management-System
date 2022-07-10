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
         <!--Animation scripts-->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

        <script>
          AOS.init();
        </script>
        <script>
            // Regular datepickr
            datepickr('#datepickr');
        </script>
        <script>
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){

                // Update Vendor Status starts
                $(".change_vendor_sts").change(function() {
                    var vendor_id = $(this).val();

                    if(this.checked) {
                        var vendor_status = 1;
                    }
                    else{
                        var vendor_status = 0;
                    }

                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url('welcome/change_vendor_status');?>", 
                        data:{vendor_id:vendor_id, vendor_status:vendor_status},
                        success: function(data) { 
                            // console.log("Vendor status updated")
                        }
                    }); 
                });
                // Update Vendor Status ends

                // Update Product Status starts
                $(".change_product_sts").change(function() {
                    var pro_id = $(this).val();

                    if(this.checked) {
                        var pro_status = 1;
                    }
                    else{
                        var pro_status = 0;
                    }

                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url('welcome/change_product_status');?>", 
                        data:{pro_id:pro_id, pro_status:pro_status},
                        success: function(data) { 
                            // console.log("Product status updated")
                        }
                    }); 
                });
                // Update Product Status ends

            });
        </script>

    </body>
</html>