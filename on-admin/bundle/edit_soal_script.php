
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../aset/plugins/datatables/buttons.print.min.js"></script>
    <script src="../aset/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="../aset/plugins/datatables/jszip.min.js"></script>
    <script src="../aset/plugins/datatables/buttons.html5.min.js"></script>
    <script src="../aset/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- CkEditor -->
    <script src="../aset/plugins/ckeditor/ckeditor.js"></script>
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
			swal("Sukses!", "Berhasil hapus data", "success");
		});

		  // Data Table
       $(document).ready(function() {
    $('#data5').DataTable( {
        "language": {
                searchPlaceholder: "Cari",
                search: "<i class='fa fa-search' aria-hidden='true'></i>",
            },
            "dom": '<"top"Bf>rt<"bottom"lip><"clear">'  ,
        "scrollX": true,
        "lengthMenu": [[10, 20, 30, 40, 50, 60, 70, 80, 90, 100, -1], [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, "All Data"]],
        buttons: [
            {
                extend: 'collection',
                text: '<span class="glyphicon glyphicon-level-up"></span> Kunci Soal', className: 'btn btn-flat bg-red',
                buttons: [
                    {
                        text: '<span class="glyphicon glyphicon-check"></span> Tampilkan Kunci Jawaban',
                        action: function ( e, dt, node, config ) {
                            dt.column( -2 ).visible( ! dt.column( -2 ).visible() );
                        }
                    }
                ]
            }
        ],
        columnDefs: [
            {
                targets: [-2],
                visible: false
            }
        ]
    } );
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
					url: "page/soal_modal_edit.php",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
					$("#ModalEditDosen").html(ajaxData);
					$("#ModalEditDosen").modal('show',{backdrop: 'true'});
					}
				});
			});
		$(document).on("click",".open_modal1", function (e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "page/soal_gambar_upload.php",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
					$("#ModalEditDosen").html(ajaxData);
					$("#ModalEditDosen").modal('show',{backdrop: 'true'});
					}
				});
			});
		});

		$(document).ready(function () {
		
		// Dosen
		$(document).on("click",".open_modal3", function (e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "page/soal_modal_edit3.php",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
					$("#ModalEditDosen3").html(ajaxData);
					$("#ModalEditDosen3").modal('show',{backdrop: 'true'});
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
	<script>

//The final solution code for all bugs ckeditor in twitter bootstrap3' modal
$.fn.modal.Constructor.prototype.enforceFocus = function() {
        var $modalElement = this.$element;
        $(document).on('focusin.modal',function(e) {
                var $parent = $(e.target.parentNode);
                if ($modalElement[0] !== e.target
                                && !$modalElement.has(e.target).length
                                && $(e.target).parentsUntil('*[role="dialog"]').length === 0) {
                        $modalElement.focus();
                }
        });
};
</script>