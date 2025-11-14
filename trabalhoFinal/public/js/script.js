
document.addEventListener("DOMContentLoaded", init);

let perguntas = [];
let indice = 0;
const respostas = {};   
const opinioes = {};   

const box = document.getElementById("question-box");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const progressEl = document.querySelector(".progress");
const thankyou = document.getElementById("thankyou");

const cores = [
  "#EF4444", "#F97316", "#FB923C", "#F59E0B", "#FBBF24",
  "#FDE68A", "#DCFCE7", "#86EFAC", "#4ADE80", "#10B981", "#059669"
];

const urlParams = new URLSearchParams(window.location.search);
const DEVICE_ID = parseInt(urlParams.get("device")) || null; // null = não informado

async function init(){
  try{
    const res = await fetch("../src/get_perguntas.php");
    const data = await res.json();

    if(data.erro){ alert("Erro: " + data.erro); return; }
    if(!Array.isArray(data) || data.length === 0){ alert("Nenhuma pergunta disponível."); return; }

    perguntas = data;
    mostrarPergunta(0);

  } catch(err){
    console.error(err);
    alert("Erro ao carregar as perguntas. Verifique o servidor.");
  }
}

function criarBlocos(perguntaId){
  return cores.map((c, i) => {
    return `
      <label class="block" data-value="${i}" style="background:${c}">
        <input type="radio" name="q${perguntaId}" value="${i}">
        <span>${i}</span>
      </label>
    `;
  }).join("");
}

function mostrarPergunta(i){
  const q = perguntas[i];
  const total = perguntas.length;

  const progressPct = Math.round(((i+1)/total)*100);
  if(progressEl) progressEl.style.width = progressPct + "%";

  box.innerHTML = `
    <div class="q-head">
      <div class="setor">${q.nome_setor || ''}</div>
      <h2>${q.texto_pergunta}</h2>
      <p class="muted" style="color:var(--muted); margin-top:6px">Pergunta ${i+1} de ${total}</p>
    </div>

    <div class="labels">
      <div style="text-align:left">Muito insatisfeito</div>
      <div style="text-align:right">Muito satisfeito</div>
    </div>

    <div class="scale" id="scale-${q.pergunta_id}">
      ${criarBlocos(q.pergunta_id)}
    </div>

    <div class="feedback-area">
      <label for="fb-${q.pergunta_id}">Comentário (opcional):</label>
      <textarea id="fb-${q.pergunta_id}" placeholder="Escreva aqui sua opinião...">${opinioes[q.pergunta_id] || ''}</textarea>
      <div class="footer-note">
        Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.
      </div>
    </div>
  `;

  prevBtn.disabled = i === 0;
  nextBtn.textContent = i === perguntas.length - 1 ? "Enviar" : "Próxima →";

  const container = document.getElementById(`scale-${q.pergunta_id}`);
  container.querySelectorAll(".block").forEach(block => {
    block.addEventListener("click", () => {
      container.querySelectorAll(".block").forEach(b => b.classList.remove("selected"));
      block.classList.add("selected");

      const val = parseInt(block.getAttribute("data-value"));
      respostas[q.pergunta_id] = val;
    });
  });

  if(respostas[q.pergunta_id] !== undefined){
    const sel = container.querySelector(`.block[data-value="${respostas[q.pergunta_id]}"]`);
    if(sel) sel.classList.add("selected");
  }

  const ta = document.getElementById(`fb-${q.pergunta_id}`);
  ta.addEventListener("input", (e) => {
    opinioes[q.pergunta_id] = e.target.value;
  });
}

nextBtn.addEventListener("click", async () => {
  const qId = perguntas[indice]?.pergunta_id;
  if(respostas[qId] === undefined && indice < perguntas.length - 1) {
    alert("Por favor, escolha uma nota antes de continuar.");
    return;
  }

  if(indice < perguntas.length - 1){
    indice++;
    mostrarPergunta(indice);
  } else {
    await enviarAvaliacoes();
  }
});

prevBtn.addEventListener("click", () => {
  if(indice > 0){
    indice--;
    mostrarPergunta(indice);
  }
});

async function enviarAvaliacoes(){
  const avaliacoes = perguntas.map(q => ({
    pergunta_id: q.pergunta_id,
    setor_id: q.setor_id,
    dispositivo_id: DEVICE_ID || q.dispositivo_id || 1,
    resposta: respostas[q.pergunta_id] ?? null,
    feedback: opinioes[q.pergunta_id] || ""
  })).filter(a => a.resposta !== null);

  if(avaliacoes.length === 0){
    alert("Selecione pelo menos uma resposta antes de enviar.");
    return;
  }

  try{
    const resp = await fetch("../src/salvar_avaliacao.php", {
      method:"POST",
      headers:{"Content-Type":"application/json"},
      body: JSON.stringify({avaliacoes})
    });
    const data = await resp.json();
    if(data.sucesso){
      document.querySelector(".card-wrapper").classList.add("hidden");
      thankyou.classList.remove("hidden");

    } else {
      console.error("Erro do servidor:", data);
      alert("Falha ao enviar avaliação. " + (data.erro || ""));
    }
  } catch(err){
    console.error(err);
    alert("Falha ao enviar avaliação. Verifique a conexão com o servidor.");
  }
}
