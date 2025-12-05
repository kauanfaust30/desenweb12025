document.addEventListener("DOMContentLoaded", carregarDashboard);

async function carregarDashboard() {
    try {
        const res = await fetch("../src/api_dashboard.php");
        const dados = await res.json();

        if (!dados.media_setores || !dados.media_perguntas) {
            console.error("API retornou dados incompletos:", dados);
            return;
        }

        atualizarCards(dados);
        montarGraficoSetores(dados.media_setores);
        montarGraficoPerguntas(dados.media_perguntas);
        montarHeatmap(dados.media_perguntas);

        document.getElementById("ultimaAtualizacao").textContent =
            new Date().toLocaleString("pt-BR");

    } catch (err) {
        console.error("Erro ao carregar:", err);
    }
}

/* ------------------------------
        Atualiza os cards
-------------------------------*/
function atualizarCards(dados) {
    document.getElementById("mediaGeral").textContent =
        dados.media_geral?.toFixed(2) ?? "—";

    document.getElementById("totalAvaliacoes").textContent =
        dados.total_avaliacoes ?? "—";
}

/* ------------------------------
   Gráfico de Média por Setor
-------------------------------*/
function montarGraficoSetores(lista) {
    const ctx = document.getElementById("graficoSetores");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: lista.map(s => s.nome_setor),
            datasets: [{
                label: "Média",
                data: lista.map(s => s.media),
                backgroundColor: "rgba(59,130,246,0.7)",
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, max: 10 }
            }
        }
    });
}

