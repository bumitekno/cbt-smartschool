<?php
session_start();
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');
?>
<style>
    table thead tr {
        background-color: #364247;
        color: white;
    }

    table tfoot tr {
        background-color: #192227;
        color: black;
    }

    tfoot {
        display: table-header-group;
    }

    #foo {
        pointer-events: none;
        cursor: default;
        opacity: 0;
    }
</style>
<div style="overflow-x:auto;" id="printableArea">
    <table id="table" class="table table-hover table-striped">
        <thead>
            <tr>
                <th style='width: 10%'>No</th>
                <th style='width: 20%'>Nama</th>
                <th style='width: 20%'>Kelas</th>
                <th style='width: 20%'>Kode Soal</th>
                <th style='width: 20%'>Progres</th>
                <th style='width: 10%'>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th id="foo"></th>
                <th id="foo"></th>
                <th>kelas</th>
                <th>kode soal</th>
                <th id="foo"></th>
                <th id="foo"></th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $querydosen = mysqli_query($konek, "SELECT * FROM siswa CROSS JOIN jawaban USING (nis)  GROUP BY nis  ORDER by nis ASC");
            if ($querydosen == false) {
                die("Terjadi Kesalahan : " . mysqli_error($konek));
            }
            $i = 1;
            while ($ar = mysqli_fetch_array($querydosen)) {
                
                $result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]' AND status IN ('1','3','4','5') ");
                $rows = mysqli_num_rows($result);
            
                $result2 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]' AND status='2'");
                $rows2 = mysqli_num_rows($result2);

                // Jawaban selain uraian
                $result3 = mysqli_query($konek, "SELECT * FROM jawabother WHERE kodesoal='$ar[kodesoal]' AND tipe IN ('1','3','4','5') AND nis='$ar[nis]' ");
                $jawabsiswa = mysqli_num_rows($result3);
                
                // Jawaban Uraian
                $query2 = mysqli_query($konek, "SELECT * FROM jawaburaian WHERE nama='$ar[nama]' AND kodesoal='$ar[kodesoal]' AND nis='$ar[nis]'");
                $rows6 = mysqli_num_rows($query2);

                $count_soal = $rows + $rows2;
                $count_jawaban = $jawabsiswa + $rows6;
                //$terjwb = $count_soal - $count_jawaban;
                //$persen = 100 / $count_soal;
                //$persenjawab = $persen * $terjwb;
                $persenjawab = $count_jawaban/$count_soal * 100;
                //var_dump($count_jawaban);

                $aktif = $ar['statuslogin'];
                $sisa = $ar['sisawaktu'] / 60;
                $sisawaktu = number_format($sisa, 0, '.', '');
                $sisasisa = $sisawaktu;
                
                if (!$aktif == 1) {
                    $aktifstatus =
                        "
					    <td><p style='display:block;width:100%;background:transparent;overflow:show;z-index:9999999999;font-size:10px;margin:0;'>Terjawab $jawabsiswa dari $rows Soal PG, Benar Salah, PG Kompleks, Menjodohkan | Terjawab $rows6 dari $rows2 Soal Uraian | sisa $sisasisa menit</p>
    									<div class='progress progress-md' style='background:grey;width:100%;height:0.5em;'>
    									  <div class='progress-bar' style='width: $persenjawab%;font-size:10px;background-color:black;'></div>
    									</div>
								  </td>
					    <td><a href='#'>
                        <button class='btn btn-flat btn-xs' style='color:black;' disabled >RESET LOGIN&emsp; <i class='fa fa-undo'></i></button>
                        </a></td>
					    ";
                } else {
                    $aktifstatus =
                        "
					    <td><p style='display:block;width:100%;background:transparent;overflow:show;z-index:9999999999;font-size:10px;margin:0;'>Terjawab $jawabsiswa dari $rows Soal PG, Benar Salah, PG Kompleks,Menjodohkan | Terjawab $rows6 dari $rows2 Soal Uraian | sisa $sisasisa menit</p>
    									<div class='progress progress-md' style='background:red;width:100%;height:0.5em;'>
    									  <div class='progress-bar progress-bar-success progress-bar-striped active' style='width: $persenjawab%;font-size:10px;'></div>
    									</div>
								  </td>
					    <td>
                            <a href='#' onClick='confirm_delete(\"page/siswa_reset_login.php?id=$ar[id]\")'>
                                <button class='btn btn-flat bg-orange btn-xs'>RESET LOGIN&emsp; <i class='fa fa-undo fa-spin'></i></button>
                            </a>
                            <div>
                                <form action='jawab.php' method='post'>
                                    <input type='hidden' name='nis' value='$ar[nis]'>
                                    <input type='hidden' name='ks1' value='$ar[kodesoal]'>
                                    <input type='hidden' name='km1' value='$ar[kodemapel]'>
                                    <button id='yakin' type='submit' class='btn btn-success'> SELESAI</button>

                                </form>
							</div>
                        </td>
					    ";
                }


                echo "
						<tr>
								  <td>$i</td>
								  <td>$ar[nama]</td>
								  <td>$ar[kelas]</td>
								  <td>$ar[kodesoal]</td>
								  $aktifstatus
								</tr>
								";
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#table').DataTable({
            "pageLength": 40,
            "lengthMenu": [[10, 20, 30, 40, 50, 60, 70, 80, 90, 100, -1], [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, "All Data"]],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
    });	
</script>