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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase font-weight-bolder text-white" id="exampleModalLabel">Tambah Order
                </h5>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('Dashboard/simpan_order'); ?>" method="post">
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
                        <input type="text" name="nominal" class="form-control" placeholder="Masukkan nominal">
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