<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="card-title">Data RSVP</h3>
  </div>
  <div class="card-body">
    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm datatable" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Tamu</th>
            <th>Slug</th>
            <th>Kehadiran</th>
            <th>Jumlah Hadir</th>
            <th>Pesan</th>
            <th>Waktu</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($rsvps as $i => $rsvp): ?>
          <tr>
            <td><?= $i+1 ?></td>
            <td><?= esc($rsvp['guest_name']) ?></td>
            <td><?= esc($rsvp['guest_slug']) ?></td>
            <td><?= esc($rsvp['attendance']) ?></td>
            <td><?= esc($rsvp['total_attendees']) ?></td>
            <td><?= esc($rsvp['message']) ?></td>
            <td><?= date('l, d F Y H:i', strtotime($rsvp['created_at'])) ?></td>
            <td>
              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete" data-id="<?= $rsvp['id'] ?>" data-name="<?= esc($rsvp['guest_name']) ?>">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteForm" method="post">
        <?= csrf_field() ?>
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus RSVP dari <b id="deleteGuestName"></b>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
<script>
  $(document).ready(function () {
    $('.datatable').DataTable({
      responsive: true,
      autoWidth: false,
      language: {
        search: "Cari Nama:",
        lengthMenu: "Tampilkan _MENU_ baris",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        zeroRecords: "Tidak ditemukan data",
        paginate: {
          first: "Awal", last: "Akhir", next: ">", previous: "<"
        }
      },
      columnDefs: [
        { orderable: false, targets: -1 }
      ]
    });

    // Modal delete RSVP
    $('#modalDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var name = button.data('name');
      var form = $('#deleteForm');
      form.attr('action', '<?= base_url('rsvp/delete/') ?>' + id);
      $('#deleteGuestName').text(name);
    });
  });
</script>
<?= $this->endSection() ?>
