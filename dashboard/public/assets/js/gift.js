document.addEventListener('DOMContentLoaded', () => {
  const toast = new bootstrap.Toast(document.getElementById('copyToast'));

  document.querySelectorAll('.btn-copy').forEach(btn => {
    btn.addEventListener('click', () => {
      const acc = btn.closest('.gift-acc').dataset.account;
      copyToClipboard(acc).then(() => {
        btn.classList.add('copied');
        setTimeout(() => btn.classList.remove('copied'), 700);
        toast.show();
      });
    });
  });

  async function copyToClipboard(text) {
    // pakai Clipboard API jika tersedia & aman
    if (navigator.clipboard && window.isSecureContext) {
      return navigator.clipboard.writeText(text);
    }
    // fallback untuk HTTP non-localhost
    const ta = document.createElement('textarea');
    ta.value = text;
    ta.style.position = 'fixed';
    ta.style.opacity  = 0;
    document.body.appendChild(ta);
    ta.focus();
    ta.select();
    document.execCommand('copy');
    ta.remove();
  }
});