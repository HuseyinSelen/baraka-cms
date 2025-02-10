<?php
require_once 'header.php';
require_once 'sidebar.php';


?>


<!-- Left side column. contains the logo and sidebar -->


<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <section class="content" id="settings">


    <?php

    function yetki_kontrol($db)
    {
      // Oturumun başlatıldığından emin olun
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }

      // Oturumda 'admins_id' olup olmadığını kontrol edin
      if (!isset($_SESSION['admins_id'])) {
        echo "<div class='alert alert-danger'>Yetkiniz yok.</div>";
        exit;
      }

      // Oturumdaki admins_id'yi alın
      $admins_id = $_SESSION['admins_id'];

      // Veritabanından admins_roles değerini kontrol edin
      $stmt = $db->prepare("SELECT admins_roles FROM admins WHERE admins_id = ?");
      if ($stmt->execute([$admins_id])) {
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Eğer kullanıcı bulunamazsa hata mesajı göster
        if ($admin === false) {
          echo "<div class='alert alert-danger'>Kullanıcı bulunamadı.</div>";
          exit;
        }

        // Eğer kullanıcının yetkisi 1 değilse ve settingsDelete parametresi varsa yetkisiz işlem mesajı ver
        if ($admin['admins_roles'] != 1) {
          if (isset($_GET['settingsDelete'])) {
            echo "<br><div class='alert alert-danger'>Bu işlem için yetkiniz yok.</div>";
            exit;
          }
        } else {
          // Eğer kullanıcının yetkisi 1 ise, yetki verildiği işlemler burada yapılabilir
          if (isset($_GET['settingsUpdate'])) {
            // Update işlemi yapılabilir
            echo "<div class='alert alert-success'>Yetkiniz var, güncelleme işlemi yapılabilir.</div>";
          } else {
            echo "<div class='alert alert-info'>Geçerli bir işlem seçilmedi.</div>";
          }
        }
      }
    }


    if (isset($_GET['settingsInsert'])) { ?>
      <div class="box box-primary">


        <div class="content-header">
          <h1>Yeni Ayar Ekle</h1>
          <hr>
        </div>
        <div class="box-body">

          <?php

          if (isset($_POST['settings_insert'])) {

            $sonuc = $db->insert(
              "settings",
              $_POST,
              [
                "form_name" => "settings_insert",
                "dir" => "settings",
                "file_name" => "settings_file",
                "pass" => "settings_pass"
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


          <!--<div class="alert alert-success">
            Kayıt Başarılı
          </div>-->
          <form method="POST" enctype="multipart/form-data">
            <!-- Ayar ekleme alanı -->
          </form>
        </div>

      </div>
    <?php    } else if (isset($_GET['settingsUpdate'])) {

      //bağlı id bilgilerini çek




    ?>

      <div class="box box-primary">


        <div class="content-header">
          <h1>Ayar Düzenle</h1>
          <hr>
        </div>



        <div class="box-body">

          <?php

          if (isset($_POST['settings_update'])) {

            $sonuc = $db->update(
              "settings",
              $_POST,
              [
                "form_name" => "settings_update",
                "columns" => "settings_id",
                "dir" => "settings",
                "file_name" => "settings_value",
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
          $sql = $db->wread("settings", "settings_id", $_GET['settings_id']);
          $row = $sql->fetch(PDO::FETCH_ASSOC);



          ?>

          <!-- Update işlem sorgusu gelecek -->
          <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label>Açıklama</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="settings_description" readonly="" required="" value="<?php echo $row['settings_description']; ?>" class="form-control">
                </div>
              </div>
            </div>

            <?php

            if ($row['settings_type'] == "file") { ?>

              <div class="form-group">
                <label>Resim Seç</label>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="file" name="settings_value" required="" class="form-control">
                  </div>
                </div>
              </div>


            <?php }

            ?>

            <div class="form-group">
              <label>İçerik</label>
              <div class="row">
                <div class="col-xs-12">

                  <?php

                  if ($row['settings_type'] == "text") { ?>
                    <input type="text" name="settings_value" value="<?php echo $row['settings_value']; ?>" required="" class="form-control">
                  <?php  } else if ($row['settings_type'] == "textarea") { ?>
                    <textarea class="form-control" name="settings_value"><?php echo $row['settings_value']; ?></textarea>
                  <?php  } else if ($row['settings_type'] == "ckeditor") { ?>
                    <textarea id="editor1" class="form-control" name="settings_value"><?php echo $row['settings_value']; ?></textarea>
                  <?php  } else if ($row['settings_type'] == "file") { ?>
                    <a target="_blank" href="dmg/settings/<?php echo $row['settings_value']; ?>"><img width="100" src="dmg/settings/<?php echo $row['settings_value']; ?>" alt=""></a>
                  <?php  }

                  ?>

                </div>
              </div>
            </div>

            <script>
              CKEDITOR.replace('editor1');
            </script>

            <input type="hidden" name="settings_id" value="<?php echo $row['settings_id']; ?>">
            <input type="hidden" name="delete_file" value="<?php echo $row['settings_value']; ?>">

            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-success" name="settings_update">Düzenle</button>
            </div>

          </form>
        </div>
      </div>

    <?php }

    ?>
    <div class="box box-primary">
      <div class="content-header">
        <h1>Ayarlar</h1>

        <?php
        if (isset($_GET['settingsDelete'])) {

          yetki_kontrol($db);

          $sonuc = $db->delete("settings", "settings_id", $_GET['settings_id'], $_GET['file_delete']);


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
              <th>Ad</th>
              <th>İçerik</th>
              <th>Key</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="sortable">

            <?php

            $sql = $db->read("settings", [
              "columns_name" => "settings_must",
              "columns_sort" => "ASC"
            ]);
            $say = 1;
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

              <tr id="item-<?php echo $row["settings_id"] ?>">
                <td class="sortable"><?php echo $row["settings_description"] ?></td>
                <td><?php

                    if ($row['settings_type'] == "file") { ?>
                    <img width="200" src="dmg/settings/<?php echo $row["settings_value"]; ?>">

                  <?php } else {
                      echo $row["settings_value"];
                    }

                  ?>
                </td>
                <td><?php echo $row["settings_key"] ?></td>
                <td align="center" width="5"><a href="?settingsUpdate=true&settings_id=<?php echo $row['settings_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
                <td align="center" width="5"><a href="?settingsDelete=true&settings_id=<?php echo $row['settings_id'] ?>"><i class="fa fa-trash-o"></i></a></td>
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
          url: "netting/order-ajax.php?settings_must=true",
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