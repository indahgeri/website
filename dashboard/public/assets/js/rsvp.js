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
});