const visor = document.getElementById("visor");

// strings para exibição e cálculo interno
let expressaoVisivel = "";
let expressaoInterna = "";

// estados internos
let resultado = null;        // número acumulado (null quando vazio)
let ultimoOperador = null;   // '+' '-' '*' '/'
let ultimoNumero = "";       // string que representa o número que o usuário está digitando agora

function atualizarVisor() {
  visor.value = expressaoVisivel;
}

function adicionarNumero(ch) {
  // evitar múltiplos pontos no mesmo número
  if (ch === '.' && ultimoNumero.includes('.')) return;

  // se acabou de mostrar resultado (resultado != null e não há operador e visor mostra apenas resultado),
  // e o usuário começa a digitar número, começa nova expressão
  if (resultado !== null && ultimoOperador === null && expressaoVisivel === String(resultado) && ultimoNumero === "") {
    expressaoVisivel = "";
    expressaoInterna = "";
    resultado = null;
  }

  ultimoNumero += ch;
  expressaoVisivel += ch;
  expressaoInterna += ch;
  atualizarVisor();
}

function adicionarOperacao(op, simboloVisivel) {
  // se houve erro anterior, não faz nada até limpar
  if (resultado === 'Erro') return;

  // se nenhum número foi digitado ainda
  if (ultimoNumero === "" && resultado === null) {
    // permitir sinal negativo no início
    if (op === '-') {
      ultimoNumero = "-";
      expressaoVisivel += "-";
      expressaoInterna += "-";
      atualizarVisor();
    }
    return;
  }

  // se usuário pressionou operador logo após outro operador (últimoNumero vazio),
  // substitui o operador visual/interno
  if (ultimoNumero === "" && resultado !== null) {
    if (expressaoVisivel.length > 0) {
      // substitui último símbolo visível e interno
      expressaoVisivel = expressaoVisivel.slice(0, -1) + simboloVisivel;
      expressaoInterna = expressaoInterna.slice(0, -1) + op;
      ultimoOperador = op;
      atualizarVisor();
    }
    return;
  }

  // se há operador pendente e número atual, calcula internamente sem mostrar no visor
  if (ultimoOperador !== null && ultimoNumero !== "") {
    resultado = executarOperacao(resultado, parseFloat(ultimoNumero), ultimoOperador);
  } else if (resultado === null) {
    // primeiro número: define resultado como esse número
    resultado = parseFloat(ultimoNumero);
  }

  // atualiza estado com novo operador
  ultimoOperador = op;
  expressaoVisivel += simboloVisivel;
  expressaoInterna += op;
  ultimoNumero = "";
  atualizarVisor();
}

function executarOperacao(a, b, operador) {
  if (a === 'Erro' || isNaN(a) || isNaN(b)) return 'Erro';
  let r;
  switch (operador) {
    case '+': r = a + b; break;
    case '-': r = a - b; break;
    case '*': r = a * b; break;
    case '/':
      if (b === 0) return 'Erro';
      r = a / b;
      break;
    default: return 'Erro';
  }
  // reduzir imprecisão de ponto flutuante
  if (typeof r === 'number' && !Number.isInteger(r)) {
    r = parseFloat(r.toFixed(10));
  }
  return r;
}

function mostrarResultado() {
  // se já houve erro
  if (resultado === 'Erro') {
    visor.value = 'Erro';
    visor.style.backgroundColor = 'lightcoral';
    return;
  }

  // se tem operador pendente e número atual, calcula com ele
  if (ultimoOperador !== null && ultimoNumero !== "") {
    resultado = executarOperacao(resultado, parseFloat(ultimoNumero), ultimoOperador);
  } else if (ultimoOperador === null && ultimoNumero !== "") {
    // sem operador (apenas um número), o resultado é esse número
    resultado = parseFloat(ultimoNumero);
  }

  // exibe resultado (ou erro)
  if (resultado === 'Erro' || resultado === undefined || !isFinite(resultado)) {
    visor.value = 'Erro';
    visor.style.backgroundColor = 'lightcoral';
  } else {
    visor.value = resultado;
    if (resultado > 0) visor.style.backgroundColor = 'lightgreen';
    else if (resultado < 0) visor.style.backgroundColor = 'lightcoral';
    else visor.style.backgroundColor = 'lightgray';
  }

  // atualiza estado: preparar para próxima entrada
  expressaoVisivel = String(resultado);
  expressaoInterna = String(resultado);
  ultimoNumero = "";
  ultimoOperador = null;
  // resultado permanece para permitir sequência de operações após '='
}

function limparTudo() {
  expressaoVisivel = "";
  expressaoInterna = "";
  resultado = null;
  ultimoOperador = null;
  ultimoNumero = "";
  visor.value = "";
  visor.style.backgroundColor = "white";
}
