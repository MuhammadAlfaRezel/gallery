<?php 
$details=mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID WHERE foto.FotoID='$_GET[id]'");
$data=mysqli_fetch_array($details);
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card" style="margin-top: 50px;" >
            <img src="uploads/<?= $data['LokasiFile'] ?>"  class="object-fit-cover">
            <div class="card-body">
            <h3 class="card-title mb-0"><?= $data['JudulFoto']?></h3>
            <small class="text-muted mb-3">by : <?= $data['Username'] ?>, <?= $data['TanggalUnggah'] ?></small>
            <p><?= $data['DeskripsiFoto'] ?></p>
            <?php
            $submit=@$_POST['submit'];
            if ($submit=='Kirim'){
                $komentar=@$_POST['komentar'];
                $foto_id=@$_POST['foto_id'];
                $user_id=@$_SESSION['user_id'];
                $tanggal=date('Y-m-d');
                $komen=mysqli_query($conn, "INSERT INTO komentar VALUES('','$foto_id','$user_id','$tanggal')");
                header("Location: ?url=detail&&id=$foto_id");

            }
            ?>
            <form action="?url=detail" method="post">
                <div class="form-group d-flex flex-row">
                    <input type="hidden" name="foto_id" value="<?= $data['FotoID'] ?>">
                    <a href="?url-home" class="btn btn-dark">Kembali</a>
                    <?php if(isset($_SESSION['user_id'])):?>
                    <?php endif;?>
                </div>
            </form>
            </div>
        </div>
        </div>
        <div class="col-6">
        </div>
    </div>
</div>