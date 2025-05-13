<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">General Form</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">General Form</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
              <!--begin::Col-->
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Quick Example</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="proses-simpan-barang-masuk.php" method="POST" enctype="multipart/form-data">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="id_masuk" class="form-label">Id Masuk</label>
                                <input name="id_masuk" type="number" class="form-control" id="id_masuk" placeholder="id masuk"
                                    required
                                />
                        </div>

                        <div class="mb-3">
                            <label for="jenis_barang" class="form-label">Jenis Barang</label>
                            <select name="jenis_barang" id="jenis_barang" class="form-control" placeholder="jenis barang">
                                <option value="">-- Pilih Jenis --</option>
                                <option value="SR12">SR12</option>
                                <option value="Fashion">Fashion</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_masuk" class="form-label">TANGGAL MASUK</label>
                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="tanggal masuk">
                        </div>

                        <div class="mb-3">
                            <label for="tgl_exp" class="form-label">TGL EXPIRED</label>
                            <input type="date" class="form-control" id="tgl_exp" name="tgl_exp" placeholder="tgl exp">
                        </div>

                        <div class="mb-3">
                            <label for="id_supplier" class="form-label">ID SUPPLIER</label>
                            <input type="number" class="form-control" id="id_supplier" name="id_supplier" placeholder="id supplier">
                        </div>

                        <div class="mb-3">
                            <label for="subtotal" class="form-label">SUBTOTAL</label>
                            <input type="number" class="form-control" id="subtotal" name="subtotal" placeholder="subtotal">
                        </div>

                        <div class="mb-3">
                            <label for="kode_masuk" class="form-label">KODE MASUK</label>
                            <input type="number" class="form-control" id="kode_masuk" name="kode_masuk" placeholder="kode masuk">
                        </div>

                        <div class="mb-3">
                            <label for="id_user" class="form-label">ID USER</label>
                            <input type="number" class="form-control" id="id_user" name="id_user" placeholder="id user">
                        </div>

                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
</main>
    <script>
        document.getElementById('jenis_barang').addEventListener('change', function () {
        const jenis = this.value;
        const tglExp = document.getElementById('tgl_exp');

        if (jenis === 'Fashion') {
        tglExp.disabled = true;
        tglExp.value = '';
        tglExp.removeAttribute('required');
        } else {
        tglExp.disabled = false;
        tglExp.setAttribute('required', true);
        }
    });
    </script>
