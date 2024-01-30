<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Group Piket
                </h4>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th width="200">Piket Hadir</th>
                        <td><?= $jadwal['group']; ?></td>
                    </tr>
                    <tr>
                        <th>Cadangan Piket</th>
                        <td>B</td>
                    </tr>
                    <tr>
                        <th>Lepas Piket</th>
                        <td>C</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <form id="myForm">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Status Piket</th>
                        <th>Ket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($anggota) :
                        $no = 1;
                        foreach ($anggota as $a) : ?>
                            <tr>
                                <td><?= $no++; ?><input type="hidden" name="anggota_id[]" value="<?= $a['id']; ?>"></td>
                                <td> <?= $a['nama']; ?></td>
                                <td> <?= $a['jabatan']; ?></td>
                                <td>
                                    <select name="status[]" class="custom-select">
                                        <option value="<?= $a['status'] ?>" selected disabled><?= $a['status'] ?></option>
                                        <?php foreach ($status as $s) : ?>
                                            <option value="<?= $s['status'] ?>"><?= $s['status'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><input type="text" name="ket[]"></td>
                            </tr>
                    <?php endforeach;
                    else : ?>
                        <tr>
                            <td colspan="6" class="text-center">
                                Data absen hari ini sudah di submit!!!
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        </h4>
                    </div>
                    <div class="col-auto">
                        <button onclick="simpanKeDatabase()"  class="btn btn-sm btn-secondary" >Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function simpanKeDatabase() {
        var table = document.getElementById("dataTable");
        var data_table = [];
        var currentDate = new Date();
        var formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1).toString().padStart(2, '0') + '-' + currentDate.getDate().toString().padStart(2, '0');
    

        // Loop melalui baris di tabel, mulai dari indeks 1 untuk melewati baris header
        for (var i = 1; i < table.rows.length; i++) {
            var row = table.rows[i];
            var rowData = {
                tanggal: formattedDate,
                anggota_id: row.cells[0].querySelector("input[name='anggota_id[]']").value,
                status: row.cells[3].querySelector("select[name='status[]']").value,
                ket: row.cells[4].querySelector("input[name='ket[]']").value
            };
            data_table.push(rowData);
            
        }

        // Kirim data ke server menggunakan AJAX
        $.ajax({
            url: 'kelompok/simpan_ke_database',
            type: 'POST',
            data: {
                data_table: data_table,
                <?= $this->config->item('csrf_token_name'); ?>: '<?= $this->security->get_csrf_hash(); ?>'
            },
            success: function(response) {
                console.log('Data saved successfully');
                // Handle success response if needed
                loadData();
            },
            error: function(xhr, status, error) {
                console.error('Error saving data:', error);
                // Handle error response if needed
            }
        });
        
        window.location.href = 'absensi-anggota/kelompok';
    }

    function loadData() {
        window.location.href = 'absensi-anggota/kelompok';
    }
</script>
