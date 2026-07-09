<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm font-weight-bolder text-uppercase"
                    data-toggle="modal" data-target="#exampleModal">
                    Tambah order
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">NAMA CUSTOMER</th>
                                <th scope="col">STATUS ORDER</th>
                                <th scope="col">NOMINAL</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">TANGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($transaksi as $row) {
                                ?>
                                    <td><?php echo $no++; ?></td>
                                    <td class="text-center"><?= $row['nama_customer'] ?></td>
                                    <td class="text-center"><?= $row['status_order'] ?></td>
                                    <td class="text-center">Rp <?= number_format($row['nominal'], 0, ',', '.') ?></td>
                                    <td class="text-center"><?= $row['keterangan'] ?></td>
                                    <td class="text-center"><?= $row['timestamp'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase font-weight-bolder text-white" id="exampleModalLabel">Tambah Order
                </h5>
            </div>
            <div class="modal-body">
                <form id="form_order" action="<?php echo base_url('Dashboard/simpan_order'); ?>" method="post">
                    <div class="form-group">
                        <label>
                            <h6 class="text-uppercase font-weight-bolder">Nama Customer</h6>
                        </label>
                        <input type="text" name="nama_customer" class="form-control"
                            placeholder="Masukkan nama customer">
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_order" value="cuci">
                                <label class="form-check-label" for="exampleRadios2">
                                    <h6 class="text-uppercase font-weight-bolder">CUCI</h6>
                                </label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class=" form-check">
                                <input class="form-check-input" type="radio" name="status_order" value="cuci_strika">
                                <label class="form-check-label" for="exampleRadios3">
                                    <h6 class="text-uppercase font-weight-bolder">Cuci Strika</h6>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr style="border: 1px solid black;">
                    <div class="form-group">
                        <label>
                            <h6 class="text-uppercase font-weight-bolder">Nominal</h6>
                        </label>
                        <input type="text" id="nominal_display" class="form-control" placeholder="Masukkan nominal">
                        <input type="hidden" id="nominal" name="nominal">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var displayInput = document.getElementById('nominal_display');
        var hiddenInput = document.getElementById('nominal');
        var form = document.getElementById('form_order');

        function formatRupiah(value) {
            var numberString = value.replace(/\D/g, '');
            if (!numberString) {
                return '';
            }
            return 'Rp ' + numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        displayInput.addEventListener('input', function() {
            var numeric = this.value.replace(/\D/g, '');
            this.value = formatRupiah(numeric);
            hiddenInput.value = numeric;
        });

        if (form) {
            form.addEventListener('submit', function() {
                hiddenInput.value = displayInput.value.replace(/\D/g, '');
            });
        }
    });
</script>