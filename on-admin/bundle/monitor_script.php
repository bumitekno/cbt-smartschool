
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
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
			format: 'YYYY-MM-DD'
		});

		$('#alert').click(function(){
			swal("Sukses!", "Berhasil Download Xls", "success");
		});
		$('#alert2').click(function(){
			swal("Sukses!", "Berhasil Download template CSV", "success");
		});

		$('#alert4').click(function(){
			swal("Sukses!", "Berhasil reset ", "success");
		});
		
		$("#data2").dataTable({
			"pageLength": 10,
            "lengthMenu": [[10, 20, 30, 40, 50, 60, 70, 80, 90, 100, -1], [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, "All Data"]],
			scrollX: true
		});	
	
      });
    </script>
         <script>
$(document).ready(function() {
$("#responsecontainer").load("dt_monitor.php");
var refreshId = setInterval(function() {
$("#responsecontainer").load('dt_monitor.php?randval='+ Math.random());
}, 10000);
});
</script>
	<script>
function myFunction() {
    location.reload();
}
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
					url: "page/siswa_monitor.php",
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