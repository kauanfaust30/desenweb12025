var totalAlunos = 6;
var totalNotas = 9;

function calcularMediaAlunos() {
  var cabecalho = document.querySelector("table thead tr:nth-child(2)");
  var celulaCabecalho = document.createElement("th");
  celulaCabecalho.innerText = "Média dos Alunos";
  celulaCabecalho.style.backgroundColor = "#d8d7d7ff";
  cabecalho.appendChild(celulaCabecalho);

  for (var aluno = 1; aluno <= totalAlunos; aluno++) {
    var soma = 0;
    for (var nota = 1; nota <= totalNotas; nota++) {
      soma += parseFloat(document.getElementById("nota" + aluno + "." + nota).innerText);
    }
    var media = soma / totalNotas;
    var linha = document.getElementById("nota" + aluno + ".1").parentNode;
    var celulaMedia = linha.insertCell();
    celulaMedia.innerText = media.toFixed(1);
    celulaMedia.style.fontWeight = "bold";
    celulaMedia.style.backgroundColor = "#d8d7d7ff";
  }
}

function calcularMediaNotas() {
  var tbody = document.querySelector("table tbody");
  var novaLinha = tbody.insertRow();
  var celulaTitulo = novaLinha.insertCell();
  celulaTitulo.innerText = "Média das Notas";
  celulaTitulo.style.fontWeight = "bold";
  celulaTitulo.style.backgroundColor = "#d8d7d7ff";

  for (var nota = 1; nota <= totalNotas; nota++) {
    var soma = 0;
    for (var aluno = 1; aluno <= totalAlunos; aluno++) {
      soma += parseFloat(document.getElementById("nota" + aluno + "." + nota).innerText);
    }
    var media = soma / totalAlunos;
    var celulaMedia = novaLinha.insertCell();
    celulaMedia.innerText = media.toFixed(1);
    celulaMedia.style.backgroundColor = "#d8d7d7ff";
  }
}
