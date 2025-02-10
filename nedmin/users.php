<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="content-wrapper">
  <section class="content">

    <?php if (isset($_GET['usersInsert'])) { ?>
      <div class="box box-primary">
        <div class="content-header">
          <h1>Yeni Kullanıcı Ekle</h1>
          <hr>
        </div>
        <div class="box-body">

          <?php
          if (isset($_POST['users_insert'])) {
            $sonuc = $db->insert("users", $_POST, [
              "form_name" => "users_insert",
              "dir" => "users",
              "file_name" => "users_file",
              "pass" => "users_pass"
            ]);

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
                  <input type="file" name="users_file" required class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Ad Soyad</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="users_namesurname" required class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Kullanıcı Mail</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="users_mail" required class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Şifre</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="password" name="users_pass" required class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Kullanıcı Durum</label>
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="users_status">
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                </div>
              </div>
            </div>

            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-success" name="users_insert">Ekle</button>
            </div>
          </form>
        </div>
      </div>

    <?php } else if (isset($_GET['usersUpdate'])) { ?>
      <div class="box box-primary">
        <div class="content-header">
          <h1>Kullanıcı Düzenle</h1>
          <hr>
        </div>
        <div class="box-body">

          <?php
          if (isset($_POST['users_update'])) {
            $sonuc = $db->update("users", $_POST, [
              "form_name" => "users_update",
              "columns" => "users_id",
              "dir" => "users",
              "file_name" => "users_file",
              "file_delete" => "delete_file",
              "pass" => "users_pass"
            ]);

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

          $sql = $db->wread("users", "users_id", $_GET['users_id']);
          $row = $sql->fetch(PDO::FETCH_ASSOC);
          ?>

          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Yüklü Resim</label>
              <div class="row">
                <div class="col-xs-12">
                  <img width="250" src="dmg/users/<?php echo $row['users_file'] ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Resim Seç</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="file" name="users_file" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Ad Soyad</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="users_namesurname" required class="form-control" value="<?php echo $row['users_namesurname']; ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Kullanıcı Mail</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="text" name="users_mail" required class="form-control" value="<?php echo $row['users_mail']; ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Şifre</label>
              <div class="row">
                <div class="col-xs-12">
                  <input type="password" name="users_pass" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Kullanıcı Durum</label>
              <div class="row">
                <div class="col-xs-12">
                  <select class="form-control" name="users_status">
                    <option <?php echo $row['users_status'] == 1 ? 'selected' : '' ?> value="1">Aktif</option>
                    <option <?php echo $row['users_status'] == 0 ? 'selected' : '' ?> value="0">Pasif</option>
                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="users_id" value="<?php echo $row['users_id']; ?>">
            <input type="hidden" name="delete_file" value="<?php echo $row['users_file']; ?>">

            <div align="right" class="box-footer">
              <button type="submit" class="btn btn-success" name="users_update">Ekle</button>
            </div>
          </form>
        </div>
      </div>

    <?php } ?>

    <div class="box box-primary">
      <div class="content-header">
        <h1>Kullanıcılar</h1>
        <div align="right">
          <a href="?usersInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
          <br><br>
        </div>

        <?php
        if (isset($_GET['usersDelete'])) {
          $sonuc = $db->delete("users", "users_id", $_GET['users_id'], $_GET['file_delete']);

          if ($sonuc['status']) { ?>
            <div class="alert alert-success">
              Silme Başarılı
            </div>
          <?php } else { ?>
            <div class="alert alert-danger">
              Silme Başarısız
            </div>
        <?php }
        }
        ?>
      </div>

      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th align="center" width="5">#</th>
              <th>Ad Soyad</th>
              <th>Mail adresi</th>
              <th>Durum</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody id="sortable">

            <?php
            $sql = $db->read("users", [
              "columns_name" => "users_must",
              "columns_sort" => "ASC"
            ]);

            $say = 1;
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

              <tr id="item-<?php echo $row['users_id'] ?>">
                <td><?php echo $say++; ?></td>
                <td class="sortable"><?php echo $row['users_namesurname'] ?></td>
                <td><?php echo $row['users_mail'] ?></td>
                <td><?php echo $row['users_status'] == 0 ? "Pasif" : "Aktif"; ?></td>
                <td align="center" width="5">
                  <a href="?usersUpdate=true&users_id=<?php echo $row['users_id'] ?>"><i class="fa fa-pencil-square"></i></a>
                </td>
                <td align="center" width="5">
                  <a href="?usersDelete=True&users_id=<?php echo $row['users_id'] ?>&file_delete=<?php echo $row['users_file'] ?>">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>

            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>

  </section>
</div>

<?php require_once 'footer.php'; ?>