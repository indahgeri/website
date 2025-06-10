document.addEventListener('DOMContentLoaded', () => {
  const list   = document.getElementById('wishList');
  const loader = document.getElementById('wishLoader');

  // ambil pesan
  fetch('/rsvp/wishes')
    .then(res => res.ok ? res.json() : Promise.reject(res))
    .then(data => {
      // hapus contoh pertama
      list.innerHTML = '';
      (data.wishes || []).forEach(w => list.appendChild(renderWish(w)));
    })
    .catch(()=> console.error('Gagal memuat ucapan'))
    .finally(()=> loader.classList.add('d-none'));

  // builder element
  function renderWish({name='', message='', time=''}) {
    const li = document.createElement('li');
    li.className = 'wish-card';
    li.innerHTML = `
      <div class="wish-header">
        <span class="wish-avatar">${(name||'?').slice(0,1).toUpperCase()}</span>
        <div>
          <h5 class="wish-name">${escapeHtml(name)}</h5>
          <time class="wish-time">${formatTime(time)}</time>
        </div>
      </div>
      <p class="wish-text">${escapeHtml(message)}</p>
    `;
    return li;
  }
  // helper: jangan izinkan HTML injeksi
  function escapeHtml(str){
    return str.replace(/[&<>"']/g,m=>({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;' }[m]));
  }
  // helper format (ISO ke dd Mmm yyyy hh:mm)
  function formatTime(t){
    if(!t) return '';
    const d=new Date(t.replace(/ /,'T'));
    return d.toLocaleString('id-ID',{ day:'2-digit', month:'short', year:'numeric', hour:'2-digit', minute:'2-digit' });
  }

  document.addEventListener('wishes:reload', () => {
    loader.classList.remove('d-none');
    fetch('/rsvp/wishes')
      .then(res => res.ok ? res.json() : Promise.reject(res))
      .then(data => {
        list.innerHTML = '';
        (data.wishes || []).forEach(w => list.appendChild(renderWish(w)));
      })
      .catch(()=> console.error('Gagal memuat ucapan'))
      .finally(()=> loader.classList.add('d-none'));
  });
});
