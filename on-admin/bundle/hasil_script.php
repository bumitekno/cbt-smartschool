
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
        var table = $('#data').DataTable( {
            "language": {
                searchPlaceholder: "Cari",
                search: "<i class='fa fa-search' aria-hidden='true'></i>",
            },
            "dom": '<"top"Bf>rt<"bottom"lip><"clear">'  ,
            "pageLength": 40,
            "lengthMenu": [[10, 20, 30, 40, 50, 60, 70, 80, 90, 100, -1], [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, "All Data"]],
            initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value="">All</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        
        buttons: [
            { extend:'colvis', className: 'BTN1', text: '<span class="glyphicon glyphicon-level-up"></span> Detail Hasil Test' }, { extend: 'excel', className: 'BTN2',
            text: '<span class="glyphicon glyphicon-cloud-download"></span> Download Excel'}, { extend: 'print', className: 'BTN3',
            text: '<span class="glyphicon glyphicon-print"></span> Cetak'}
        ],
        columnDefs: [
            {
                targets: [-2, -3, -4],
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
					url: "page/hasil_modal_edit.php",
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
	<script type="text/javascript"> 
		$(document).ready(function () {
		
		// Dosen
		$(document).on("click",".open_modal2", function (e) {
			var nis = $(this).attr("nis");
			var nama = $(this).attr("nama");
			var kelas = $(this).attr("kelas");
			var kodesoal = $(this).attr("kodesoal");
			var data = 'nis='+nis+'&kodesoal='+kodesoal+'&nama='+nama+'&kelas='+kelas;
				$.ajax({
					url: "page/koreksi_modal.php",
					type: "GET",
					data : data,
					success: function (ajaxData){
					$("#ModalEditDosen2").html(ajaxData);
					$("#ModalEditDosen2").modal('show',{backdrop: 'true'});
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