<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="card-title">Daftar Tamu Undangan</h3>
    <div class="ml-auto">
      <a href="<?= base_url('invited-guests/create') ?>" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i> Tambah Tamu
      </a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm datatable" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>No. HP</th>
            <th>Detail</th>
            <th>Terkirim</th>
            <th>Dibuka</th>
            <th>Waktu Dibuka</th>
            <th>RSVP</th>
            <th>Waktu</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($guests as $i => $g): ?>
          <tr>
            <td><?= $i+1 ?></td>
            <td><?= esc($g['name']) ?></td>
            <td><?= esc($g['phone']) ?></td>
            <td><?= esc($g['detail']) ?></td>
            <td class="text-center"><?= $g['is_sent'] ? '✔️' : '❌' ?></td>
            <td class="text-center"><?= $g['is_opened'] ? '✔️' : '❌' ?></td>
            <td>
              <?php if (!empty($g['opened_at'])): ?>
              <?= date('d F Y H:i', strtotime(esc($g['opened_at']))) ?>
              <?php endif ?>
            </td>
            <td><?= esc($g['rsvp_status']) ?></td>
            <td><?= date('d F Y H:i', strtotime(esc($g['created_at']))) ?></td>
            <td class="text-center">
              <a href="<?= base_url("invited-guests/edit/{$g['id']}") ?>" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
              </a>
              <form action="<?= base_url("invited-guests/delete/{$g['id']}") ?>" method="post" class="d-inline d-none" id="formDeleteGuest<?= $g['id'] ?>">
                <?= csrf_field() ?>
              </form>
              <button type="button" class="btn btn-sm btn-danger btn-delete-guest" data-toggle="modal" data-target="#modalDeleteGuest" data-id="<?= $g['id'] ?>" data-name="<?= esc($g['name']) ?>">
                <i class="fas fa-trash"></i>
              </button>
              <button type="button" class="btn btn-sm btn-success" onclick="copyUndangan('<?= esc($g['name']) ?>', '<?= esc($g['slug']) ?>')">
                <i class="fas fa-copy"></i>
              </button>
              <!-- <a href="https://wa.me/?text=<?= rawurlencode("Kepada Yth.\nBapak/Ibu/Saudara/i\n{$g['name']}\n__________\n\nAssalamualaikum Wr. Wb.\n\nBismillahirahmanirrahim.\nTanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami:\n\nIndah Permata Sari S.Ikom\n   &\nGery Anuggrah S.SOS\n\nBerikut link untuk info lengkap dari acara kami:\n" . base_url('invite/' . $g['slug']) . "\n\nMerupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\nJangan lupa isi Guestbook ya..\n\nWassalamualaikum Wr. Wb.\n\nTerima Kasih..\n\nHormat kami,\nIndah & Gery") ?>" target="_blank" class="btn btn-sm btn-info">
                <i class="fab fa-whatsapp"></i>
              </a> -->

              <a href="https://wa.me/?text=<?= rawurlencode(
                  "Kepada Yth.\nBapak/Ibu/Saudara/i\n{$g['name']}\n__________\n\nAssalamualaikum Wr. Wb.\n\nBismillahirahmanirrahim.\nTanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami:\n\nIndah Permata Sari S.Ikom\n   &\nGery Anuggrah S.SOS\n\nMerupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\nJangan lupa isi Guestbook ya..\n\nWassalamualaikum Wr. Wb.\n\nTerima Kasih..\n\nHormat kami,\nIndah & Gery\n\n" . base_url('invite/' . $g['slug'])
              ) ?>" target="_blank" class="btn btn-sm btn-info">
                  <i class="fab fa-whatsapp"></i>
              </a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Delete Guest -->
<div class="modal fade" id="modalDeleteGuest" tabindex="-1" aria-labelledby="modalDeleteGuestLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteGuestForm" method="post">
        <?= csrf_field() ?>
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteGuestLabel">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus tamu <b id="deleteGuestName"></b>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Preview -->
<div class="modal fade" id="modalPreview" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Template Undangan</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <textarea id="undanganText" class="form-control" rows="14"></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="salinText()">Salin</button>
        <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
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

    // Modal delete guest
    $('#modalDeleteGuest').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var name = button.data('name');
      var form = $('#deleteGuestForm');
      form.attr('action', '<?= base_url('invited-guests/delete/') ?>' + id);
      $('#deleteGuestName').text(name);
    });
  });

  function copyUndangan(nama, slug) {
    const template = `Kepada Yth.\nBapak/Ibu/Saudara/i\n${nama}\n__________\n\nAssalamualaikum Wr. Wb.\n\nBismillahirahmanirrahim.\nTanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami:\n\nIndah Permata Sari S.Ikom\n   &\nGery Anuggrah S.SOS\n\nBerikut link untuk info lengkap dari acara kami:\n<?= base_url('invite') ?>/${slug}\n\nMerupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\nJangan lupa isi Guestbook ya..\n\nWassalamualaikum Wr. Wb.\n\nTerima Kasih..\n\nHormat kami,\nIndah & Gery`;
    document.getElementById('undanganText').value = template;
    $('#modalPreview').modal('show');
  }

  function salinText() {
    const textarea = document.getElementById('undanganText');
    textarea.select();
    document.execCommand('copy');
    alert('Teks undangan berhasil disalin!');
    $('#modalPreview').modal('hide');
  }
</script>
<?= $this->endSection() ?>
