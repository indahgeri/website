document.addEventListener('DOMContentLoaded', () => {
  /* Bootstrap validation ------------------------------*/
  const forms = document.querySelectorAll('.needs-validation');
  forms.forEach(form => {
    form.addEventListener('submit', e => {
      if (!form.checkValidity()) { e.preventDefault(); e.stopPropagation(); }
      form.classList.add('was-validated');
    }, false);
  });

  /* Tampilkan input jumlah tamu jika hadir ------------*/
  const yesRadio  = document.getElementById('attendYes');
  const wrapper   = document.getElementById('guestCountWrapper');
  const countInput= document.getElementById('guestCount');

  function toggleGuestCount(){
    if (yesRadio.checked) {
      wrapper.classList.remove('d-none');
      countInput.setAttribute('required', 'required');
    } else {
      wrapper.classList.add('d-none');
      countInput.removeAttribute('required');
    }
  }
  yesRadio.addEventListener('change', toggleGuestCount);
  document.getElementById('attendNo').addEventListener('change', toggleGuestCount);

  // RSVP AJAX submit & auto append wish
  const rsvpForm = document.getElementById('rsvpForm');
  if (rsvpForm) {
    rsvpForm.addEventListener('submit', function(e) {
      e.preventDefault();
      e.stopPropagation();

      if (!rsvpForm.checkValidity()) {
        rsvpForm.classList.add('was-validated');
        return;
      }

      const formData = new FormData(rsvpForm);
      fetch(rsvpForm.action, {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          document.getElementById('rsvpSuccess').classList.remove('d-none');
          rsvpForm.reset();
          rsvpForm.classList.remove('was-validated');
          document.getElementById('guestCountWrapper').classList.add('d-none');
          if (data.wish) addWishToList(data.wish);
          // Trigger reload wishes agar wishes.js yang handle
          document.dispatchEvent(new Event('wishes:reload'));
        } else {
          alert(data.message || 'Gagal mengirim RSVP.');
        }
      })
      .catch(() => alert('Terjadi kesalahan. Silakan coba lagi.'));
    });
  }

  function addWishToList(wish) {
    const wishList = document.getElementById('wishList');
    if (!wishList) return;
    const li = document.createElement('li');
    li.className = 'wish-card';
    li.innerHTML = `
      <div class="wish-header">
        <span class="wish-avatar">${wish.name.charAt(0).toUpperCase()}</span>
        <div>
          <h5 class="wish-name">${wish.name}</h5>
          <time class="wish-time" datetime="${wish.time}">${wish.timeFormatted}</time>
        </div>
      </div>
      <p class="wish-text">${wish.message}</p>
    `;
    wishList.prepend(li);
  }
});