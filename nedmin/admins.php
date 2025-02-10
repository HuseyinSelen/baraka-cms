<?php
require_once 'header.php';
require_once 'sidebar.php';


?>
<div class="content-wrapper">
  <section class="content">

    <?php
    function yetki_kontrol($db)
    {
      if (!isset($_SESSION['admins_id']) || empty($_SESSION['admins_id'])) {
        echo "<div class='alert alert-danger'>Yetkiniz yok.</div>";
        exit;
      }

      // Oturumdaki admins_id'yi al
      $admins_id = $_SESSION['admins_id'];

      // $admins_update_id = $_GET[$admins['admins_id']];
      // Veritabanından admins_roles değerini kontrol et
      $stmt = $db->prepare("SELECT admins_roles FROM admins WHERE admins_id = ?");
      if ($stmt->execute([$admins_id])) {
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);



        if ($admin === false) {
          echo "<div class='alert alert-danger'>Kullanıcı bulunamadı.</div>";
          exit;
        }

        if ($admin['admins_roles'] != 1) {
          if (isset($_GET['adminsUpdate'])) {
            if ($admins_id != $_GET['admins_id']) {
              echo "<div class='alert alert-danger'>Bu işlem için yetkiniz yok.</div>";
              exit;
            }
          } else {

            echo "<div class='alert alert-danger'>Bu işlem için yetkiniz yok.</div>";
            exit;
          }
        } else {

          if (isset($_GET['adminsUpdate'])) {
          } else {
          }
        }
      }
    }


    // Yetki kontrolünü ekleme, güncelleme, silme gibi işlemlerde çağır

    if (isset($_GET['adminsInsert'])) {


      yetki_kontrol($db)

    ?>
      <div class="box box-primary">
        <div class="content-header">
          <h1>Yeni Yönetici Ekle</h1>
          <hr>
        </div>

        <div class="box-body">

          <?php


          if (isset($_POST['admin_insert'])) {


            $sonuc = $db->insert(
              "admins",
              $_POST,
              [
                "form_name" => "admin_insert",
                "dir" => "admins",
                "file_name" => "admins_file",
                "pass" => "admins_pass"
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
                  <input type="file" name="admins_file" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Ad Soyad</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="admins_namesurname" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Kullanıcı Adı</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="admins_username" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Şifre</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="password" name="admins_pass" required="" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Kullanıcı Durum</label>
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="admins_status">
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>

                  </select>
                </div>
              </div>
            </div>

            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-success" name="admin_insert">Ekle</button>
            </div>


          </form>
        </div>

      </div>
    <?php    } else if (isset($_GET['adminsUpdate'])) {

      yetki_kontrol($db);

    ?>

      <div class="box box-primary">
        <div class="content-header">
          <h1>Yönetici Düzenle</h1>
          <hr>
        </div>

        <div class="box-body">

          <?php

          if (isset($_POST['admin_update'])) {



            $sonuc = $db->update(
              "admins",
              $_POST,
              [
                "form_name" => "admin_update",
                "columns" => "admins_id",
                "dir" => "admins",
                "file_name" => "admins_file",
                "file_delete" => "delete_file",
                "pass" => "admins_pass"
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
          $sql = $db->wread("admins", "admins_id", $_GET['admins_id']);
          $row = $sql->fetch(PDO::FETCH_ASSOC);

          ?>

          <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label>Yüklü Resim</label>
              <div class="row">
                <div class="col-xs-12">
                  <img width="250" src="dmg/admins/<?php echo $row['admins_file'] ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Resim Seç</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="file" name="admins_file" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Ad Soyad</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="admins_namesurname" required="" value="<?php echo $row['admins_namesurname']; ?>" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Kullanıcı Adı</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="admins_username" required="" value="<?php echo $row['admins_username'] ?>" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Şifre</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="password" name="admins_pass" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Kullanıcı Durum</label>
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="admins_status">
                    <option <?php echo $row['admins_status'] == 1  ? 'selected' : '' ?> value="1">Aktif</option>
                    <option <?php echo $row['admins_status'] == 0  ? 'selected' : '' ?> value="0">Pasif</option>

                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="admins_id" value="<?php echo $row['admins_id']; ?>">
            <input type="hidden" name="delete_file" value="<?php echo $row['admins_file']; ?>">

            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-success" name="admin_update">Düzenle</button>
            </div>
          </form>
        </div>

      </div>

    <?php }

    ?>

    <div class="box box-primary">
      <div class="content-header">
        <h1>Yöneticiler</h1>
        <div align="right">
          <a href="?adminsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
          <br><br>
        </div>
        <?php
        if (isset($_GET['adminsDelete'])) {

          yetki_kontrol($db);

          $sonuc = $db->delete("admins", "admins_id", $_GET['admins_id'], $_GET['file_delete']);

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
              <th>Kullanıcı Adı</th>
              <th>Ad Soyad</th>
              <th>Durum</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody id="sortable">


            <?php

            $sql = $db->read("admins", [
              "columns_name" => "admins_must",
              "columns_sort" => "ASC"
            ]);
            $say = 1;
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

              <tr id="item-<?php echo $row["admins_id"] ?>">
                <td><?php echo $say++; ?></td>
                <td class="sortable"><?php echo $row["admins_username"] ?></td>
                <td><?php echo $row["admins_namesurname"] ?></td>
                <td><?php
                    if ($row['admins_status'] == 0) {
                      echo "Pasif";
                    } else if ($row['admins_status'] == 1) {
                      echo "Aktif";
                    }
                    ?></td>
                <td align="center" width="5"><a href="?adminsUpdate=true&admins_id=<?php echo $row['admins_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
                <td align="center" width="5"><a href="?adminsDelete=True&admins_id=<?php echo $row['admins_id'] ?>&file_delete=<?php echo $row['admins_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
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
          url: "netting/order-ajax.php?admins_must=true",
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