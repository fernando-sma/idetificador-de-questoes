function cortar(texto, inicio, parada) {
  return texto.substring(
    texto.indexOf(inicio) + inicio.length,
    texto.indexOf(parada)
  );
}

var letrasMaiusculas = ["A", "B", "C", "D", "E"];
