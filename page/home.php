   
</div>
<div class="Judul">
</div>
<div class="container">
    <div class="row">
        <?php
        $tampil = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID");
        foreach ($tampil as $tampils) :
        ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card" style="margin-top: 50px;">
                    <img src="uploads/<?= $tampils['LokasiFile'] ?>" class="object-fit-cover" style="aspect-ratio: 16/9;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $tampils['JudulFoto'] ?></h5>
                        <h6 class="card-title"><?= $tampils['DeskripsiFoto'] ?></h6>
                        <p class="card-text text-muted">by: <?= $tampils['Username'] ?></p>
                        <a href="?url=detail&&id=<?= $tampils['FotoID'] ?>" class="btn btn-primary">Detail</a>
                        <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="?url=edit&&IDFoto=<?= $tampils['FotoID'] ?>" class="btn btn-success">Edit</a>
                        <a href="?url=hapus&&id=<?= $tampils['FotoID'] ?>" class="btn btn-danger">Hapus</a>
                        <?php else: ?>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>