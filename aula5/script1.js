const visor = document.getElementById("visor");

let numeroAtual = "";   
let resultado = null;   
let operador = null;    
let expressao = "";     

function atualizarVisor() {
  visor.value = expressao || "0";
  visor.style.backgroundColor = "white"; 
}

function adicionarNumero(n) {
  numeroAtual += n;
  expressao += n;
  atualizarVisor();
}

function adicionarOperacao(op) {
  if (numeroAtual === "" && resultado === null) return; 

  if (resultado === null) {
    resultado = parseFloat(numeroAtual); 
  } else if (numeroAtual !== "") {
    resultado = calcular(resultado, parseFloat(numeroAtual), operador);
  }
  operador = op;
  numeroAtual = "";
  expressao += op;
  atualizarVisor();
}

function mostrarResultado() {
  if (numeroAtual === "" || operador === null) return;

  resultado = calcular(resultado, parseFloat(numeroAtual), operador);

  visor.value = resultado;
  expressao = "";       
  numeroAtual = "";
  operador = null;

  if (resultado > 0) visor.style.backgroundColor = "lightgreen";
  else if (resultado < 0) visor.style.backgroundColor = "lightcoral";
  else visor.style.backgroundColor = "lightgray";
}

function calcular(a, b, op) {
  let resultado;

  if (op === "+") {
    resultado = a + b;
  } else if (op === "-") {
    resultado = a - b;
  } else if (op === "*") {
    resultado = a * b;
  } else if (op === "/") {
    if (b !== 0) {
      resultado = a / b;
    } else {
      resultado = "Erro"; 
    }
  } else {
    resultado = b; 
  }
  return resultado;
}

function limparTudo() {
  numeroAtual = "";
  resultado = null;
  operador = null;
  expressao = "";
  visor.value = "";
  visor.style.backgroundColor = "white";
}
