<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    
    <div class="table-responsive">
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
                    <?php if ($cabang) :
                        $no = 1;
                        foreach ($cabang as $a) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td> <?= $a['nama']; ?></td>
                                <td> <?= $a['jabatan']; ?></td>
                                <td> <?= $a['group']; ?></td>
                                <td> <?= $a['ket']; ?></td>
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
    </div>
</div>
