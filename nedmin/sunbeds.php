<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="content-wrapper">
    <section class="content">

        <?php
        if (isset($_GET['sunbedsInsert'])) { ?>
            <div class="box box-primary">
                <div class="content-header">
                    <h1>Yeni Ürün Ekle</h1>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['sunbeds_insert'])) {
                        $sonuc = $db->insert(
                            "sunbeds",
                            $_POST,
                            [
                                "form_name" => "sunbeds_insert",
                                "slug" => "sunbeds_slug",
                                "title" => "sunbeds_title",
                                "dir" => "sunbeds",
                                "file_name" => "sunbeds_file"
                            ]
                        );

                        if ($sonuc['status']) { ?>
                            <div class="alert alert-success">
                                Kayıt Başarılı
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                                Kayıt Başarısız
                            </div>
                    <?php }
                    }
                    ?>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="sunbeds_file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Şezlongun İsmi</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="sunbeds_title" required="" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Şezlongun İçerik</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea id="editor1" class="form-control" name="sunbeds_content"></textarea>
                                </div>
                            </div>
                        </div>

                        <script>
                            CKEDITOR.replace('editor1');
                        </script>

                        <div class="form-group">
                            <label>Şezlong Fiyat</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <input type="text" name="sunbeds_price" required="" class="form-control">
                                        <span class="input-group-addon">₺</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success" name="sunbeds_insert">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php } else if (isset($_GET['sunbedsUpdate'])) {

            $sql = $db->wread("sunbeds", "sunbeds_id", $_GET['sunbeds_id']);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
        ?>

            <div class="box box-primary">
                <div class="content-header">
                    <h1>Şezlongları Düzenle</h1>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['sunbeds_update'])) {
                        $sonuc = $db->update(
                            "sunbeds",
                            $_POST,
                            [
                                "form_name" => "sunbeds_update",
                                "slug" => "sunbeds_slug",
                                "title" => "sunbeds_title",
                                "columns" => "sunbeds_id",
                                "dir" => "sunbeds",
                                "file_name" => "sunbeds_file",
                                "file_delete" => "delete_file"
                            ]
                        );

                        if ($sonuc['status']) { ?>
                            <div class="alert alert-success">
                                Kayıt Başarılı
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                                Kayıt Başarısız
                            </div>
                    <?php }
                    }
                    ?>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Yüklü Resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="250" src="dmg/sunbeds/<?php echo $row['sunbeds_file'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="sunbeds_file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ürün Adı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="sunbeds_title" required="" value="<?php echo $row['sunbeds_title']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Şezlongun İçeriği</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea id="editor1" class="form-control" name="sunbeds_content"><?php echo $row['sunbeds_content']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <script>
                            CKEDITOR.replace('editor1');
                        </script>

                        <div class="form-group">
                            <label>Şezlongun Fiyatı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <input type="text" name="sunbeds_price" required="" value="<?php echo $row['sunbeds_price']; ?>" class="form-control">
                                        <span class="input-group-addon">₺</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="sunbeds_id" value="<?php echo $row['sunbeds_id']; ?>">
                        <input type="hidden" name="delete_file" value="<?php echo $row['sunbeds_file']; ?>">

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success" name="sunbeds_update">Düzenle</button>
                        </div>
                    </form>
                </div>
            </div>

        <?php } ?>

        <div class="box box-primary">
            <div class="content-header">
                <h1>Şezlongları Listele</h1>
                <div align="right">
                    <a href="?sunbedsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
                    <br><br>
                </div>

                <?php
                if (isset($_GET['sunbedsDelete'])) {
                    $sonuc = $db->delete("sunbeds", "sunbeds_id", $_GET['sunbeds_id'], $_GET['file_delete']);

                    if ($sonuc['status']) { ?>
                        <div class="alert alert-success">
                            Silme Başarılı
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-danger">
                            Silme Başarısız
                        </div>
                <?php }
                } ?>
            </div>

            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th align="center" width="5">#</th>
                            <th>Şezlong Başlıkları</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="sortable">

                        <?php
                        $sql = $db->read("sunbeds", [
                            "columns_name" => "sunbeds_must",
                            "columns_sort" => "ASC"
                        ]);
                        $say = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

                            <tr id="item-<?php echo $row["sunbeds_id"] ?>">
                                <td><?php echo $say++; ?></td>
                                <td class="sortable"><?php echo $row["sunbeds_title"] ?></td>
                                <td align="center" width="5"><a href="?sunbedsUpdate=true&sunbeds_id=<?php echo $row['sunbeds_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
                                <td align="center" width="5"><a href="?sunbedsDelete=True&sunbeds_id=<?php echo $row['sunbeds_id'] ?>&file_delete=<?php echo $row['sunbeds_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php require_once 'footer.php'; ?>

<script type="text/javascript">
    $(function() {
        $("#sortable").sortable({
            revert: true,
            handle: ".sortable",
            stop: function(event, ui) {
                var data = $(this).sortable('serialize');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: data,
                    url: "netting/order-ajax.php?sunbeds_must=true",
                    success: function(msg) {
                        if (msg.islemMsj) {
                            alert("Sıralama başarılı");
                        } else {
                            alert("Sıralama başarısız");
                        }
                    }
                });
            }
        });
        $("#sortable").disableSelection();
    });
</script>