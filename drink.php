<?php require_once 'header.php'; ?>

<div class="container" id="icecekler-details">

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
    $sql = $db->read("drinks", [
        "columns_name" => "drinks_must",
        "columns_sort" => "ASC"
    ]);

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <div class="lrc-item">
            <div class="gall-col gallery-img-box gallery-bread">
                <a>
                    <div class="lrc-content">
                        <div class="lrc-img">
                            <img class="card-img-top" src="nedmin/dmg/drinks/<?php echo $row['drinks_file']; ?>" alt="<?php echo $row['drinks_title']; ?>">
                        </div>
                        <div class="lrc-desc">
                            <div class="lrc-title">
                                <h2 class="card-title"><?php echo $row['drinks_title']; ?></h2>
                            </div>
                            <div class="lrc-text">
                                <p class="card-text"><?php echo mb_substr($row['drinks_content'], 0, 400) ?></p>
                            </div>
                            <div class="lrc-text">
                                <p class="card-text"><?php echo '₺' . mb_substr($row['drinks_price'], 0, 400) ?></p>
                            </div>
                            <div class="lrc-button">
                                <div class="lrcb-left">
                                    <span class="lhc like">
                                        <svg class="svg-inline--fa fa-lira-sign fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lira-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M371.994 256h-48.019C317.64 256 312 260.912 312 267.246 312 368 230.179 416 144 416V256.781l134.603-29.912A12 12 0 0 0 288 215.155v-40.976c0-7.677-7.109-13.38-14.603-11.714L144 191.219V160.78l134.603-29.912A12 12 0 0 0 288 119.154V78.179c0-7.677-7.109-13.38-14.603-11.714L144 95.219V44c0-6.627-5.373-12-12-12H76c-6.627 0-12 5.373-12 12v68.997L9.397 125.131A12 12 0 0 0 0 136.845v40.976c0 7.677 7.109 13.38 14.603 11.714L64 178.558v30.439L9.397 221.131A12 12 0 0 0 0 232.845v40.976c0 7.677 7.109 13.38 14.603 11.714L64 274.558V468c0 6.627 5.373 12 12 12h79.583c134.091 0 223.255-77.834 228.408-211.592.261-6.782-5.211-12.408-11.997-12.408z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="lrcb-right"></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>

</div>

<?php require_once 'footer.php'; ?>