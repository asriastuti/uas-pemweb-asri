  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Kategori Buku</h1>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori Buku</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = $this->uri->segment('') + 1;
            // menampilkan data buku
            foreach ($kategori as $cat): 

            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $cat['kategori']?></td>
              <td> <?php echo anchor('book/editKategori/'.$cat['idkategori'], 'Edit') ?> | <?php echo anchor('book/deleteKategori/'.$cat['idkategori'], 'Delete'); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>

       <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kategori Buku</h1>
      </div>

      <?php
      // arahkan form submit ke kontroller 'book/insert' 
      echo form_open_multipart('book/insertKategori'); 
      ?>

          <div class="form-group row">
              <label for="judul" class="col-sm-2 col-form-label">Nama Kategori Baru</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="kategori" placeholder="Masukkan Nama Kategori">
              </div>
          </div>

                    <div class="form-group row">
              <div class="col-sm-2">
              </div>
              <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary mb-2">Tambahkan Kategori Baru</button>      
              </div>
          </div>
  </main>