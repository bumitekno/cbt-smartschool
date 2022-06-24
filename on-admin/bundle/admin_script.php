
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
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../aset/plugins/select2/select2.full.min.js"></script>
	<script src="../aset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		$('#Tanggal_Lahir').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			format: 'DD-MM-YYYY'
		});

		$('#alert1,#alert2,#alert3,#alert4,#alert5,#alert6,#alert7,#alert8,#alert9,#alert10,#alert11,#alert12,#alert13,#alert14,#alert15,#alert16,#alert17,#alert18,#alert19,#alert20,#alert21,#alert22,#alert23,#alert24,#alert25,#alert26,#alert27,#alert28,#alert29,#alert30').click(function(){
			swal("Sukses!", "Berhasil reset password", "success");
		});
		
        $(document).ready(function() {
        var table = $('#data2').DataTable( {
             dom: 'Bfrtip',
        buttons: [
            { extend:'colvis', className: 'btn bg-olive', text: 'Detail user' }, { extend: 'excel', className: 'btn bg-orange',
            text: 'Export Excel'}, { extend: 'print', className: 'btn bg-red',
            text: 'Cetak'}
        ],
        columnDefs: [
            {
                targets: [-2],
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
            { extend:'colvis', className: 'BTN1', text: 'Detail user' }, { extend: 'excel', className: 'BTN2',
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
					url: "page/admin_modal_edit.php",
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