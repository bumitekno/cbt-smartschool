
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <script src="../aset/bootstrap/js/pace.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- CkEditor -->
    <script src="../aset/plugins/ckeditor/ckeditor.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/adminlte.min.js"></script>
	<!-- Daterange Picker -->
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		$('#Tanggal_Lahir').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			format: 'YYYY-MM-DD'
		});
		
		  // Data Table
        $("#data").dataTable({
			"searching": false
			scrollX: true
		});		
      });
    </script>
	
	<!-- Javascript Edit--> 
	<script type="text/javascript"> 
		$(document).ready(function () {
		
		// Dosen
		$(document).on("click",".open_modal", function (e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "page/article_modal_edit.php",
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