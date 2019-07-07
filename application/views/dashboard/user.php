  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar User</h1>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Password</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = $this->uri->segment('') + 1;
            // menampilkan data buku
            foreach ($users as $user): 

            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $user['username']?></td>
              <td><?php echo $user['fullname']; ?></td>
              <td><?php echo $user['password']; ?></td>
              <td><?php echo $user['role']; ?></td>
              <td> <?php echo anchor('book/editUser/'.$user['username'], 'Edit') ?> | <?php echo anchor('book/deleteUser/'.$user['username'], 'Delete'); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
     <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah User</h1>
      </div>

      <?php
      // arahkan form submit ke kontroller 'book/insert' 
      echo form_open_multipart('book/insertUser'); 
      ?>

          <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
              </div>
          </div>

          <div class="form-group row">
              <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap User</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="fullname" placeholder="Masukkan Nama Lengkap User">
              </div>
          </div>

          <div class="form-group row">
              <label for="role" class="col-sm-2 col-form-label">Role User</label>
              <div class="col-sm-10">
                  <select class="form-control" name="idrole">
    
                  <?php
                      // menampilkan combo box berisi kategori buku
                      foreach ($roles as $role):
                  ?>
                      <option value="<?php echo $role['idrole']?>"><?php echo $role['role']?></option>
                  <?php
                      endforeach;
                  ?>
                  </select>
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="password" placeholder="Masukkan Password">
              </div>
          </div>

          <div class="form-group row">
              <div class="col-sm-2">
              </div>
              <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary mb-2">Tambahkan User</button>      
              </div>
          </div>
  </main>

   

      