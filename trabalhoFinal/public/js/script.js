document.addEventListener("DOMContentLoaded", init);

let perguntas = [];
let indice = 0;
const respostas = {};
const opinioes = {};

const box = document.getElementById("question-box");
const progressEl = document.querySelector(".progress");
const thankyou = document.getElementById("thankyou");

const cores = [
  "#EF4444", "#F97316", "#FB923C", "#F59E0B", "#FBBF24",
  "#FDE68A", "#a2cdb1ff", "#86EFAC", "#4ADE80", "#10B981", "#059669"
];


async function init() {
  try {
    const res = await fetch("../src/get_perguntas.php");
    const data = await res.json();

    if (data.erro) return alert("Erro: " + data.erro);
    if (!Array.isArray(data) || data.length === 0) return alert("Nenhuma pergunta disponível.");

    perguntas = data;
    mostrarPergunta(0);

  } catch (err) {
    console.error(err);
    alert("Erro ao carregar as perguntas. Verifique o servidor.");
  }
}

function criarBlocos(perguntaId) {
  return cores.map((c, i) => `
      <label class="block" data-value="${i}" style="background:${c}">
        <input type="radio" name="q${perguntaId}" value="${i}">
        <span>${i}</span>
      </label>
    `).join("");
}

function mostrarPergunta(i) {
  const q = perguntas[i];
  const total = perguntas.length;
  const progressPct = Math.round(((i + 1) / total) * 100);

  if (progressEl) progressEl.style.width = progressPct + "%";

  box.innerHTML = `
    <div class="q-head">
      <div class="setor">${q.nome_setor || ''}</div>
      <h2>${q.texto_pergunta}</h2>
      <p class="muted" style="margin-top:6px">Pergunta ${i + 1} de ${total}</p>
    </div>

    <div class="scale" id="scale-${q.pergunta_id}">
      ${criarBlocos(q.pergunta_id)}
    </div>

    <div class="feedback-area">
      <label for="fb-${q.pergunta_id}">Comentário (opcional):</label>
      <textarea id="fb-${q.pergunta_id}">${opinioes[q.pergunta_id] || ''}</textarea>
    </div>

    <div class="nav">
        <button id="prevBtn" class="btn secondary">← Voltar</button>
        <button id="nextBtn" class="btn primary">${i === total - 1 ? "Enviar" : "Próxima →"}</button>
    </div>
  `;

  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");

  prevBtn.disabled = (i === 0);

  prevBtn.addEventListener("click", () => {
    if (indice > 0) {
      indice--;
      mostrarPergunta(indice);
    }
  });

  nextBtn.addEventListener("click", async () => {
    const qId = perguntas[indice].pergunta_id;

    if (respostas[qId] === undefined && indice < perguntas.length - 1) {
      return alert("Por favor, escolha uma nota antes de continuar.");
    }

    if (indice < perguntas.length - 1) {
      indice++;
      mostrarPergunta(indice);
    } else {
      await enviarAvaliacoes();
    }
  });

  const container = document.getElementById(`scale-${q.pergunta_id}`);
  container.querySelectorAll(".block").forEach(block => {
    block.addEventListener("click", () => {
      container.querySelectorAll(".block").forEach(b => b.classList.remove("selected"));
      block.classList.add("selected");
      respostas[q.pergunta_id] = parseInt(block.dataset.value);
    });
  });


  if (respostas[q.pergunta_id] !== undefined) {
    const sel = container.querySelector(`.block[data-value="${respostas[q.pergunta_id]}"]`);
    if (sel) sel.classList.add("selected");
  }

  document.getElementById(`fb-${q.pergunta_id}`).addEventListener("input", (e) => {
    opinioes[q.pergunta_id] = e.target.value;
  });
}

async function enviarAvaliacoes() {

  const avaliacoes = perguntas.map(q => ({
      pergunta_id: q.pergunta_id,
      setor_id: q.setor_id,

      dispositivo_id: DEVICE_ID,

      resposta: respostas[q.pergunta_id] ?? null,
      feedback: opinioes[q.pergunta_id] || ""
  })).filter(a => a.resposta !== null);

  if (avaliacoes.length === 0) {
      alert("Selecione pelo menos uma resposta.");
      return;
  }

  try {
      const resp = await fetch("../src/salvar_avaliacao.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ avaliacoes })
      });

      const data = await resp.json();

      if (data.sucesso) {
          document.querySelector(".card-wrapper").classList.add("hidden");
          thankyou.classList.remove("hidden");
      } else {
          alert("Erro ao enviar: " + data.erro);
      }

  } catch (err) {
      console.error(err);
      alert("Falha ao enviar. Verifique o servidor.");
  }
}

