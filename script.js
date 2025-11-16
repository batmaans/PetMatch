// script.js - funcionalidades comuns (match, notificações e pequenos comportamentos)

document.addEventListener('DOMContentLoaded', () => {
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


//pets
const pets = [
  { nome: "Virginia", especie: "gato", genero: "fêmea", idade: "5 anos", descricao: "Adoro tirar fotos!", img: "img/gato4.avif" },
  { nome: "Snoop", especie: "cachorro", genero: "macho", idade: "12 anos", descricao: "Prefiro ração verde...", img: "img/snoop.jpg" },
  { nome: "Bruce", especie: "gato", genero: "macho", idade: "4 anos", descricao: "Eu sou a noite!", img: "img/noite.jpg" },
  { nome: "Catarina", especie: "cachorro", genero: "fêmea", idade: "5 anos", descricao: "Viajar e comida vegana aqui meu bem!", img: "img/rica.jpg" },
  { nome: "Vini Jr", especie: "gato", genero: "macho", idade: "5 anos", descricao: "'Eu sou o nego gato!'", img: "img/gato5.jpg" },
  { nome: "Bichento", especie: "gato", genero: "fêmea", idade: "9 anos", descricao: "Rsrs sou meio bipolar!", img: "img/bichento.jpg" },
  { nome: "Mauricio", especie: "cachorro", genero: "macho", idade: "5 anos", descricao: "Dizem que pareço um ator, me deixa atuar na sua vida?", img: "img/mmattar.png" },
  { nome: "Grelin", especie: "cachorro", genero: "macho", idade: "2 anos", descricao: "Não gosto do Natal!", img: "img/gremlin.jpg" },
  { nome: "Corrimão", especie: "cachorro", genero: "macho", idade: "3 anos", descricao: "Todo mundo quer passar a mão!", img: "img/corrimao1.jpg" },
  { nome: "Jorge da 12", especie: "cachorro", genero: "macho", idade: "8 anos", descricao: "Correr atrás de motos, simplesmente amo!", img: "img/caramelo3.jpeg" },
  { nome: "Mel", especie: "cachorro", genero: "fêmea", idade: "6 anos", descricao: "As vezes dou uma sumida!", img: "img/caramelo4.jpeg" },
  { nome: "Xandão", especie: "gato", genero: "macho", idade: "5 anos", descricao: "Reconhecido como terror delas!", img: "img/gato1.avif" },
  { nome: "Enzo", especie: "cachorro", genero: "macho", idade: "2 anos", descricao: "Deixe seus chinelos bem perto de mim!", img: "img/cao.jpg" },
  { nome: "Rebeca", especie: "cachorro", genero: "fêmea", idade: "7 anos", descricao: "'Não procuro um pai pros meus filhos porque isso eles já tem!'", img: "img/cao1.jpg" },
  { nome: "Calabreso", especie: "gato", genero: "macho", idade: "2 anos", descricao: "Procuro mais que uma casa — um lar.", img: "img/gato3.jpg" },
  { nome: "Segurança", especie: "cachorro", genero: "macho", idade: "4 anos", descricao: "Proteger sua casa? Claro...zZzZz", img: "img/cao3.jpg" },
];

// Renderização de pets para index e adote
document.addEventListener('DOMContentLoaded', () => {
  const lista = document.getElementById('lista-pets');
  const destaques = document.getElementById('destaques');
  const filtro = document.getElementById('filtro-especie');

  if (lista) renderPets(lista);
  if (destaques) renderPets(destaques, 3); // mostra 3 primeiros no index

  if (filtro) {
    filtro.addEventListener('change', e => renderPets(lista, null, e.target.value));
  }

  // evento global de match
  document.body.addEventListener('click', (e) => {
    if (e.target.classList.contains('btn-match')) {
      const card = e.target.closest('.pet-card');
      const petName = card?.querySelector('h3')?.innerText || 'seu pet';
      mostrarMatch(petName);
    }
  });
});

// função de renderização genérica
function renderPets(container, limite = null, filtroAtual = 'todos') {
  container.innerHTML = '';
  let petsFiltrados = pets.filter(p => filtroAtual === 'todos' || p.especie === filtroAtual);
  if (limite) petsFiltrados = petsFiltrados.slice(0, limite);

  petsFiltrados.forEach(pet => {
    const card = document.createElement('article');
    card.className = 'pet-card';
    card.innerHTML = `
      <img src="${pet.img}" alt="${pet.nome}">
      <h3>${pet.nome}</h3>
      <p class="info-pet">${pet.genero} • ${pet.especie} • ${pet.idade}</p>
      <p>${pet.descricao}</p>
      <button class="btn-match">Dar Match ❤️</button>
    `;
    container.appendChild(card);
  });
}

// DEU MATCH
function mostrarMatch(petName) {
  const overlay = document.createElement('div');
  overlay.className = 'match-overlay';
  overlay.innerHTML = `
    <div class="match-box">
      <h2>💘 DEU MATCH!</h2>
      <p>Você deu match com <strong>${petName}</strong>!</p>
      <p>Seus dados foram enviados para nossa central.<br>Torça para ser o primeiro a dar match com ele(a) 💕</p>
    </div>
  `;
  document.body.appendChild(overlay);

  setTimeout(() => overlay.classList.add('show'), 50);
  setTimeout(() => {
    overlay.classList.remove('show');
    setTimeout(() => overlay.remove(), 800);
  }, 9500);
}