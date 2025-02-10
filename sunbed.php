<?php require_once 'header.php'; ?>
<!-- Page Content -->
<div class="container" id="sunbed-details">


    <div class="geri_don">
        <a href="index.php">
            <div class="back-btn">
                <div class="icon-back">
                    <svg class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path>
                    </svg>
                </div>
                <div class="text-back">Menüye Geri Dön</div>
            </div>
        </a>
    </div>



    <?php

    $sql = $db->read("sunbeds", [
        "columns_name" => "sunbeds_must",
        "columns_sort" => "ASC"
    ]);
    $say = 1;
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>


        <!-- sunbed Post -->
        <div class="lrc-item">
            <div class="gall-col gallery-img-box gallery-bread">
                <a>
                    <div class="lrc-content">
                        <div class="lrc-img">
                            <img class="card-img-top" src="nedmin/dmg/sunbeds/<?php echo $row['sunbeds_file']; ?>" alt="<?php echo $row['sunbeds_title']; ?>">
                        </div>
                        <div class="lrc-desc">
                            <div class="lrc-title">
                                <h2 class="card-title"><?php echo $row['sunbeds_title']; ?></h2>
                            </div>
                            <div class="lrc-text">
                                <p class="card-text"><?php echo mb_substr($row['sunbeds_content'], 0, 400) ?></p>
                            </div>
                            <div class="lrc-text">

                                <p class="card-text"><?php echo '₺' . mb_substr($row['sunbeds_price'], 0, 400); ?></p>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    <?php } ?>





    <!-- Pagination -->
    <!-- <ul class="pagination justify-content-center mb-4">
      <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
      </li>
      <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
      </li>
    </ul>-->

</div>
</div>
<!-- /.container -->

<?php require_once 'footer.php'; ?>