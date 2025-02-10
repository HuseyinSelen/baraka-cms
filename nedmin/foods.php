<?php

require_once 'header.php';
require_once 'sidebar.php';

?>

<div class="content-wrapper">
    <section class="content">

        <?php
        if (isset($_GET['foodsInsert'])) { ?>
            <div class="box box-primary">


                <div class="content-header">
                    <h1>Yeni Ürün Ekle</h1>
                    <hr>
                </div>

                <div class="box-body">

                    <?php

                    if (isset($_POST['foods_insert'])) {

                        $sonuc = $db->insert(
                            "foods",
                            $_POST,
                            [
                                "form_name" => "foods_insert",
                                "slug" => "foods_slug",
                                "title" => "foods_title",
                                "dir" => "foods",
                                "file_name" => "foods_file"
                            ]
                        );

                        if ($sonuc['status']) { ?>
                            <div class="alert alert-success">
                                Kayıt Başarılı
                            </div>
                        <?php  } else { ?>
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
                                    <input type="file" name="foods_file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Yiyeceğin Adı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="foods_title" required="" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Yiyeceği İçeriği</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea id="editor1" class="form-control" name="foods_content"></textarea>
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
                                        <input type="text" name="foods_price" required="" class="form-control">
                                        <span class="input-group-addon">₺</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success" name="foods_insert">Ekle</button>
                        </div>

                    </form>
                </div>
            </div>
        <?php    } else if (isset($_GET['foodsUpdate'])) {

        ?>

            <div class="box box-primary">

                <div class="content-header">
                    <h1>Yiyecekleri Düzenle</h1>
                    <hr>
                </div>

                <div class="box-body">

                    <?php

                    if (isset($_POST['foods_update'])) {

                        $sonuc = $db->update(
                            "foods",
                            $_POST,
                            [
                                "form_name" => "foods_update",
                                "slug" => "foods_slug",
                                "title" => "foods_title",
                                "columns" => "foods_id",
                                "dir" => "foods",
                                "file_name" => "foods_file",
                                "file_delete" => "delete_file"
                            ]
                        );

                        if ($sonuc['status']) { ?>
                            <div class="alert alert-success">
                                Kayıt Başarılı
                            </div>
                        <?php  } else { ?>
                            <div class="alert alert-danger">
                                Kayıt Başarısız
                            </div>
                    <?php }
                    }
                    $sql = $db->wread("foods", "foods_id", $_GET['foods_id']);
                    $row = $sql->fetch(PDO::FETCH_ASSOC);

                    ?>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Yüklü Resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="250" src="dmg/foods/<?php echo $row['foods_file'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="foods_file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Yiyeceğin İsmi</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="foods_title" required="" value="<?php echo $row['foods_title']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Yiyeceğin İçeriği</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea id="editor1" class="form-control" name="foods_content"><?php echo $row['foods_content']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <script>
                            CKEDITOR.replace('editor1');
                        </script>

                        <div class="form-group">
                            <label>Yiyeceğin Fiyatı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <input type="text" name="foods_price" required="" value="<?php echo $row['foods_price']; ?>" class="form-control">
                                        <span class="input-group-addon">₺</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="foods_id" value="<?php echo $row['foods_id']; ?>">
                        <input type="hidden" name="delete_file" value="<?php echo $row['foods_file']; ?>">

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success" name="foods_update">Düzenle</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php }

        ?>

        <div class="box box-primary">
            <div class="content-header">
                <h1>Yiyecekleri Listele</h1>
                <div align="right">
                    <a href="?foodsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
                    <br><br>
                </div>
                <?php
                if (isset($_GET['foodsDelete'])) {

                    $sonuc = $db->delete("foods", "foods_id", $_GET['foods_id'], $_GET['file_delete']);

                    if ($sonuc['status']) { ?>
                        <div class="alert alert-success">
                            Silme Başarılı
                        </div>
                    <?php  } else { ?>
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
                            <th>Yiyecek Başlıkları</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="sortable">

                        <?php

                        $sql = $db->read("foods", [
                            "columns_name" => "foods_must",
                            "columns_sort" => "ASC"
                        ]);
                        $say = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

                            <tr id="item-<?php echo $row["foods_id"] ?>">
                                <td><?php echo $say++; ?></td>
                                <td class="sortable"><?php echo $row["foods_title"] ?></td>

                                <td align="center" width="5"><a href="?foodsUpdate=true&foods_id=<?php echo $row['foods_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
                                <td align="center" width="5"><a href="?foodsDelete=True&foods_id=<?php echo $row['foods_id'] ?>&file_delete=<?php echo $row['foods_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
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
                    url: "netting/order-ajax.php?foods_must=true",
                    success: function(msg) {
                        if (msg.islemMsj) {
                            alert("Sıralama Başarılı");
                        } else {
                            alert("Hata Var...");
                        }
                    }
                });
            }
        });
        $("#sortable").disableSelection();
    });
</script>