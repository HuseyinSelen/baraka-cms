<?php

require_once 'header.php';
require_once 'sidebar.php';

?>

<div class="content-wrapper">
    <section class="content">

        <?php
        if (isset($_GET['drinksInsert'])) { ?>
            <div class="box box-primary">


                <div class="content-header">
                    <h1>Yeni Ürün Ekle</h1>
                    <hr>
                </div>

                <div class="box-body">

                    <?php

                    if (isset($_POST['drinks_insert'])) {

                        $sonuc = $db->insert(
                            "drinks",
                            $_POST,
                            [
                                "form_name" => "drinks_insert",
                                "slug" => "drinks_slug",
                                "title" => "drinks_title",
                                "dir" => "drinks",
                                "file_name" => "drinks_file"
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
                                    <input type="file" name="drinks_file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>İçeceğin İsmi</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="drinks_title" required="" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>İçeceğin İçeriği</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea id="editor1" class="form-control" name="drinks_content"></textarea>
                                </div>
                            </div>
                        </div>

                        <script>
                            CKEDITOR.replace('editor1');
                        </script>

                        <div class="form-group">
                            <label>İçeceğin Fiyatı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <input type="text" name="drinks_price" required="" class="form-control">
                                        <span class="input-group-addon">₺</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success" name="drinks_insert">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php    } else if (isset($_GET['drinksUpdate'])) {

        ?>

            <div class="box box-primary">

                <div class="content-header">
                    <h1>İçecekleri Düzenle</h1>
                    <hr>
                </div>

                <div class="box-body">

                    <?php

                    if (isset($_POST['drinks_update'])) {

                        $sonuc = $db->update(
                            "drinks",
                            $_POST,
                            [
                                "form_name" => "drinks_update",
                                "slug" => "drinks_slug",
                                "title" => "drinks_title",
                                "columns" => "drinks_id",
                                "dir" => "drinks",
                                "file_name" => "drinks_file",
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
                    $sql = $db->wread("drinks", "drinks_id", $_GET['drinks_id']);
                    $row = $sql->fetch(PDO::FETCH_ASSOC);

                    ?>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Yüklü Resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="250" src="dmg/drinks/<?php echo $row['drinks_file'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="drinks_file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>İçeceğin İsmi</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="drinks_title" required="" value="<?php echo $row['drinks_title']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>İçeceğin İçeriği</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea id="editor1" class="form-control" name="drinks_content"><?php echo $row['drinks_content']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <script>
                            CKEDITOR.replace('editor1');
                        </script>

                        <div class="form-group">
                            <label>İçeceğin Fiyatı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <input type="text" name="drinks_price" required="" value="<?php echo $row['drinks_price']; ?>" class="form-control">
                                        <span class="input-group-addon">₺</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="drinks_id" value="<?php echo $row['drinks_id']; ?>">
                        <input type="hidden" name="delete_file" value="<?php echo $row['drinks_file']; ?>">

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success" name="drinks_update">Düzenle</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php }

        ?>

        <div class="box box-primary">
            <div class="content-header">
                <h1>İçecekleri Listele</h1>
                <div align="right">
                    <a href="?drinksInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
                    <br><br>
                </div>
                <?php
                if (isset($_GET['drinksDelete'])) {

                    $sonuc = $db->delete("drinks", "drinks_id", $_GET['drinks_id'], $_GET['file_delete']);

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
                            <th>İçecek Başlıkları</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="sortable">

                        <?php

                        $sql = $db->read("drinks", [
                            "columns_name" => "drinks_must",
                            "columns_sort" => "ASC"
                        ]);
                        $say = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

                            <tr id="item-<?php echo $row["drinks_id"] ?>">
                                <td><?php echo $say++; ?></td>
                                <td class="sortable"><?php echo $row["drinks_title"] ?></td>

                                <td align="center" width="5"><a href="?drinksUpdate=true&drinks_id=<?php echo $row['drinks_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
                                <td align="center" width="5"><a href="?drinksDelete=True&drinks_id=<?php echo $row['drinks_id'] ?>&file_delete=<?php echo $row['drinks_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
                            </tr>

                        <?php    }  ?>

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
                    url: "netting/order-ajax.php?drinks_must=true",
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