<?php

require 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Form otomatis</title>

    <style>
        .container {
            width: 100;
            padding: 10px 30px 10px 30px;
        }

        select, input, textarea {
            border: 1px solid #D6D6D6;
            padding: 4px;
            margin-bottom: 5px;
        }
    </style>

</head>
<body>

    <div class="container">

        <form action="" method="POST">
            <label>NIS</label><br>
            <select name="nis" id="nis">
                <?php
                    $query = mysqli_query($kon, "SELECT nis FROM siswa");
                    while ($siswa = mysqli_fetch_array($query)):
                ?>

                <option><?php echo $siswa['nis']; ?></option>

                <?php endwhile; ?>
            </select><br>

            <label>Nama</label><br>
            <input type="text" name="nama" id="nama"  disabled/><br>

            <label>Alamat</label><br>
            <textarea name="alamat" id="alamat" disabled></textarea><br>

            <label>Jenis Kelamin</label>
            <input type="radio" name="jenis_kelamin" value="laki-laki" disabled/> Laki-laki
            <input type="radio" name="jenis_kelamin" value="perempuan" disabled/>Perempuan
            <br><br>
            <input type="submit" value="Simpan">
        </form>

    </div>

    <script src="jquery.min.js"></script>

    <script>
        $(function() {
            $("#nis").change(function(){
                var nis = $("#nis option:selected").val();

                $.ajax({
                    url: 'getsiswa.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'nis': nis
                    },
                    success: function (siswa) {
                        $("#nama").val(siswa['nama']);
                        $("#alamat").val(siswa['alamat']);

                        var $jenis_kelamin = $('input:radio[name=jenis_kelamin]');

                        if(siswa['jenis_kelamin'] == 'laki-laki'){
                            $jenis_kelamin.filter('[value=laki-laki]').prop('checked', true);
                        }else{
                            $jenis_kelamin.filter('[value=perempuan]').prop('checked', true);
                        }
                    }
                });
            });

            $("form").submit(function(){
                alert("Keep learning");
            });
        });
    </script>
</body>
</html>
