<html lang="en">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>

    <script src="texto.js"></script>
    <script src="util.js"></script>
    <script>
      // Transformar as questoes em array
      questaoInicial = 16;
      questaoFinal = 20;
      questoes = new Array();

      for (j = 0; j <= questaoFinal - questaoInicial; j++) {
        item = [];

        var questao = cortar(
          texto,
          j + questaoInicial + ". ",
          j + questaoInicial + 1 + ". "
        );
        pergunta = cortar(questao, 0, "A) ");

        for (i = 0; i <= 3; i++) {
          item[i] = cortar(
            questao,
            letrasMaiusculas[i] + ") ",
            letrasMaiusculas[i + 1] + ")"
          );
        }
        item[4] = questao.substring(questao.indexOf("E)") + 3, questao.length);

        questoes.push(
          new Array(pergunta, item[0], item[1], item[2], item[3], item[4])
        );
      }
      console.log(questoes);

      // criar interface grafica

      for(k = 0 ; k < questoes.length ; k++){
          document.write("<textArea id='id"  + k.toString() +"0'>" + questoes[k][0] + "</textArea>");
          document.write("<textArea id='id"  + k.toString() +"1'>" + questoes[k][1] + "</textArea>");
          document.write("<textArea id='id"  + k.toString() +"2'>" + questoes[k][2] + "</textArea>");
          document.write("<textArea id='id"  + k.toString() +"3'>" + questoes[k][3] + "</textArea>");
          document.write("<textArea id='id"  + k.toString() +"4'>" + questoes[k][4] + "</textArea>");
          document.write("<textArea id='id"  + k.toString() +"5'>" + questoes[k][5] + "</textArea>");
          document.write("<textArea id='id"  + k.toString() +"6'>" + questoes[k][6] + "</textArea>");
          document.write("<textArea id='id"  + k.toString() +"7'>" + questoes[k][7] + "</textArea>");
          document.write("<br>")
      }

      questoesFinalizadas = new Array();
      function finalizar(){
         // Recriando o array conforme as alterações
          for(i = 0 ; i < questoes.length ; i++){
            questoesFinalizadas.push(
                new Array(
                    document.getElementById("id" + i.toString() + "0").value,
                    document.getElementById("id" + i.toString() + "1").value,
                    document.getElementById("id" + i.toString() + "2").value,
                    document.getElementById("id" + i.toString() + "3").value,
                    document.getElementById("id" + i.toString() + "4").value,
                    document.getElementById("id" + i.toString() + "5").value,
                    document.getElementById("id" + i.toString() + "6").value,
                    document.getElementById("id" + i.toString() + "7").value,
                    )
            )
          }
          console.log("Finalizado");
          console.log(questoesFinalizadas); 
          // Criando sql
          var sql = "INSERT INTO `questoes` (`per`, `a`, `b`, `c`, `d`, `e`, `rc`, `img`) VALUES ("
    
          for(i = 0 ; i < questoesFinalizadas.length ; i++){
              if(i > 0){
                  sql = sql + "("
              }
              sql = sql + "'" + questoesFinalizadas[i][0] + "',";
              sql = sql + "'" + questoesFinalizadas[i][1] + "',";
              sql = sql + "'" + questoesFinalizadas[i][2] + "',";
              sql = sql + "'" + questoesFinalizadas[i][3] + "',";
              sql = sql + "'" + questoesFinalizadas[i][4] + "',";
              sql = sql + "'" + questoesFinalizadas[i][5] + "',";
              sql = sql + "'" + questoesFinalizadas[i][6] + "',";
              sql = sql + "'" + questoesFinalizadas[i][7] + "'";
              sql = sql + "),"


          }
          sql = sql.substr(0,sql.length - 1)
          console.warn(sql)
          document.getElementById('qualquer').value = sql;
          }
      
      </script>
    <?php
    $a = '<script>document.write(sql)</script>';
    ?>

<button type="button" onclick="finalizar()">GERAR VARIAVEL</button>

    <form method="POST" action="insere.php">
        <input type="text" hidden="hidden" id = "qualquer" name="teste"/>
        <br>
        <button type="submit" >Finalizar</button>

      </form>
 
  </body>
</html>
