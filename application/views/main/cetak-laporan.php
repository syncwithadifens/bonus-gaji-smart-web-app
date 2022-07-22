<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
    table {
      border-collapse: collapse;
      width: 770;
      margin: 1;
    }

    table th {
      padding: 3px;
      text-align: center;
    }

    table td {
      padding: 3px;
      text-align: center;
    }
  </style>
</head>

<body>
  <table border="0" cellspasing=0 cellpadding=0 width="100%">
    <tr>
      <td></td>
      <td width="50%" align="center" style="font-family: Arial;">
        <p style="text-align: center; line-height: 1.6;">
          <span><b>PT Adifens Tech<br>
              Kecamatan Gandusari<br></b></span>
          Jl. Raya Sillicon Valey 66187
        </p>
      </td>
      <td></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><strong>
          <hr>
        </strong></td>
    </tr>
    <tr>
      <td colspan="3" align="center">
        <?php
        $s = date("Y");
        echo "<p style='line-height:1.6;'>";
        echo "<b>";
        echo "Laporan Bonus Gaji Karyawan <br> Adifens Tech <br>  ";
        echo $s;
        echo "</b>";
        echo "</p>";
        ?>
      </td>
    </tr>
  </table>
  <p style="text-indent: 1px;">
    <?php echo "Dicetak pada: ";
    echo tgl_indo(date('Y-m-d')); ?>
  </p>
  <table border="1" style="border-collapse: collapse;">
    <tr>
      <th width="10px">No.</th>
      <th width="100px">ID Karyawan</th>
      <th width="100px">Nama Karyawan</th>
      <!-- <?php
            foreach ($kriteria as $row) { ?>
      <th width="90px" height="60px"><?php echo $row->nama_kriteria ?></th>
      <?php
            }
      ?> -->
      <th width="70px">Hasil</th>
      <th width="90px">Status</th>
    </tr>
    <!-- <tr>
      <th width="50px"><center>-</center></th>
      <th width="100px">-</th>
      <th width="100px">-</th>
      <?php
      foreach ($kriteria as $row) { ?>
      <th width="80px"><?php echo $row->bobot_normalisasi ?></th>
      <?php
      }
      ?>
      <th width="70px">-</th>
      <th width="90px">-</th>
    </tr> -->
    <?php
    foreach ($alternatif as $index => $row2) { ?>
      <tr>
        <td width="10px"><?php echo  $index + 1; ?></td>
        <td width="140px" style="text-align: left;"><?php echo $row2->id_karyawan; ?></td>
        <td width="200px" style="text-align: left;"><?php echo $row2->nama_alternatif; ?></td>
        <!-- <?php
              foreach ($kriteria as $row3) { ?> 
        <td width="80px">
        <?php
                $query3 = $this->db->query("SELECT * FROM alternatif_kriteria WHERE id_kriteria='" . $row3->id_kriteria . "' and id_alternatif='" . $row2->id_alternatif . "'");
                $ad = $query3->result();
                foreach ($ad as $row4) {
                  echo $row4->nilai_alternatif_kriteria;
                }
        ?>
        </td>
        <?php } ?> -->
        <td width="70px"><?php echo $row2->hasil_alternatif; ?></td>
        <td width="90px"><?php echo $row2->ket_alternatif; ?></td>
      </tr>
    <?php } ?>
  </table>
  <p>Keterangan: <br>
    1. Jika Hasil kurang dari 4, maka <b>Tidak Mendapat Bonus</b> <br>
    2. Jika Hasil lebih dari 4, maka <b>Mendapat Bonus</b>
  </p>
  <table border="0" cellspasing=0 cellpadding=0 width="100%">
    <tr>
      <td width="70%"></td>
      <td>
        <?php
        function tgl_indo($tanggal)
        {
          $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
          );
          $pecahkan = explode('-', $tanggal);

          // variabel pecahkan 0 = tanggal
          // variabel pecahkan 1 = bulan
          // variabel pecahkan 2 = tahun

          return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }

        echo tgl_indo(date('Y-m-d')); // contoh: 21 Oktober 2017
        ?>
        <br><br>
        CEO
        <br><br><br><br><br><br><br>
        (&nbsp;Afiv Dicky Efendy&nbsp;)
      </td>
    </tr>

  </table>
</body>

</html>