// script.js - funcionalidades comuns (match, notificações e pequenos comportamentos)

document.addEventListener('DOMContentLoaded', () => {
  // Delegation: trata botões .btn-match que podem existir em várias páginas
  document.body.addEventListener('click', (e) => {
    if (e.target && e.target.classList.contains('btn-match')) {
      const button = e.target;
      // animação
      button.classList.add('active');
      setTimeout(() => button.classList.remove('active'), 800);

      // nome do pet — procura h3 no mesmo card
      const parent = button.closest('.pet-card');
      const petName = parent ? (parent.querySelector('h3')?.innerText || 'pet querido') : 'pet querido';
      showNotification(`💘 Você deu match com ${petName}!`);
    }
  });

  // fechar notificações ao clicar
  document.body.addEventListener('click', (e) => {
    if (e.target && e.target.classList.contains('notification')) {
      e.target.remove();
    }
  });
});

// FUNÇÃO DE NOTIFICAÇÃO (reutilizável)
function showNotification(message) {
  const notif = document.createElement('div');
  notif.className = 'notification';
  notif.textContent = message;
  document.body.appendChild(notif);

  // entra
  setTimeout(() => notif.classList.add('show'), 40);

  // sai após 3s
  setTimeout(() => {
    notif.classList.remove('show');
    setTimeout(() => notif.remove(), 420);
  }, 3000);
}

