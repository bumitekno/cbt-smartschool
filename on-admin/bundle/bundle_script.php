
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <script src="../aset/bootstrap/js/pace.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../aset/plugins/datatables/buttons.print.min.js"></script>
    <script src="../aset/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="../aset/plugins/datatables/jszip.min.js"></script>
    <script src="../aset/plugins/datatables/buttons.html5.min.js"></script>
    <script src="../aset/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/adminlte.min.js"></script>
	<script src="../js/sweetalert.min.js" type="text/javascript"></script>
	<!-- Daterange Picker -->
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/select2/select2.full.min.js"></script>
	<script src="../aset/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- page script -->
	<script src="../js/bootbox.min.js"></script>
    <script>
      $(function () {	

		$('#alert').click(function(){
			swal("Sukses!", "Berhasil Download Xls", "success");
		});
		$('#alert2').click(function(){
			swal("Sukses!", "Berhasil Download template Xls", "success");
		});

		$('#alert4').click(function(){
			swal("Sukses!", "Berhasil hapus data", "success");
		});

		  // Data Table
        $(document).ready(function() {
        var table = $('#data1').DataTable( {
             dom: 'frtip',
        buttons: [
            { extend:'colvis', className: 'BTN3', text: 'Detail Siswa' }, { extend: 'excel', className: 'BTN3',
            text: 'Export Excel'}, { extend: 'print', className: 'BTN3',
            text: 'Cetak'}
        ]
    } );

        table.buttons().container()
            .appendTo( '#data_wrapper .col-sm-6:eq(0)' );
        } );
        
        $(document).ready(function() {
        var table = $('#data2').DataTable( {
             dom: 'Bfrtip',
        buttons: [
            { extend:'colvis', className: 'BTN3', text: 'Detail Siswa' }, { extend: 'excel', className: 'BTN3',
            text: 'Export Excel'}, { extend: 'print', className: 'BTN3',
            text: 'Cetak'}
        ],
        columnDefs: [
            {
                targets: [-4],
                visible: false
            }
        ]
    } );

        table.buttons().container()
            .appendTo( '#data_wrapper .col-sm-6:eq(0)' );
        } );
        
        $(document).ready(function() {
        var table = $('#data').DataTable( {
             dom: 'Bfrtip',
        buttons: [
            { extend:'colvis', className: 'BTN1', text: 'Detail Siswa' }, { extend: 'excel', className: 'BTN2',
            text: 'Export Excel'}, { extend: 'print', className: 'BTN3',
            text: 'Cetak'}
        ],
        columnDefs: [
            {
                targets: [-1, -2, -3,],
                visible: false
            }
        ]
    } );

        table.buttons().container()
            .appendTo( '#data_wrapper .col-sm-6:eq(0)' );
        } );
        
      });
    </script>
<script>
	$(document).ready(function(){
		var date_input=$('input[name="tgl"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd/mm/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>	
<script>
    $(document).ready(function() {
    $('.form-control').select2();
});
</script>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
	<!-- Javascript Edit--> 
	<script type="text/javascript"> 
		$(document).ready(function () {
		
		// Dosen
		$(document).on("click",".open_modal", function (e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "page/siswa_modal_edit.php",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
					$("#ModalEditDosen").html(ajaxData);
					$("#ModalEditDosen").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>	
	<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url){
			$("#modal_delete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>