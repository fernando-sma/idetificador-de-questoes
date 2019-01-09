<html lang="en">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>

  <div id = "formularioInical">
  <input type = "number" id = "questaoInicial" placeholder="Questão inicial"> <input type = "number" id = "questaoFinal" placeholder="Questão final"><br>
  Limitador de questão ex: 10. <input type = "text" id = "limitadorDeQuestao" value = ". "><br>
  <textarea id = "texto" placeholder="Digite o texto a ser identificado"></textarea><br>
  <select id = "tabela">
    <option value="questoes">Questoes</option>
    <option value="biologia">Biologia</option>
    <option value="espanhol">Espanhol</option>
    <option value="filosofia">Filosofia</option>
    <option value="fisica">Física</option>
    <option value="geografia">Geografia</option>
    <option value="historia">História</option>
    <option value="ingles">Ingles</option>
    <option value="matematica">Matemática</option>
    <option value="portugues">Portugues</option>
    <option value="quimica">Química</option>
    <option value="sociologia">Sociologia</option>
  </select>

  </div>

  <div id = "formulario">
  </div>

    <script src="texto.js"></script>
    <script src="util.js"></script>
    <script>
    function iniciar(){
      texto  = document.getElementById('texto').value;
      questaoInicial = parseInt(document.getElementById('questaoInicial').value);
      questaoFinal = parseInt(document.getElementById('questaoFinal').value);     
      limitadorDeQuestao = document.getElementById('limitadorDeQuestao').value;
      questoes = new Array();

      for (j = 0; j <= questaoFinal - questaoInicial; j++) {
        item = [];

        var questao = cortar(
          texto,
          j + questaoInicial + limitadorDeQuestao,
          j + questaoInicial + 1 + limitadorDeQuestao
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
          document.getElementById('formulario').innerHTML += ("<textArea id='id"  + k.toString() +"x0'>" + questoes[k][0] + "</textArea>");
          document.getElementById('formulario').innerHTML += ("<textArea id='id"  + k.toString() +"x1'>" + questoes[k][1] + "</textArea>");
          document.getElementById('formulario').innerHTML += ("<textArea id='id"  + k.toString() +"x2'>" + questoes[k][2] + "</textArea>");
          document.getElementById('formulario').innerHTML += ("<textArea id='id"  + k.toString() +"x3'>" + questoes[k][3] + "</textArea>");
          document.getElementById('formulario').innerHTML += ("<textArea id='id"  + k.toString() +"x4'>" + questoes[k][4] + "</textArea>");
          document.getElementById('formulario').innerHTML += ("<textArea id='id"  + k.toString() +"x5'>" + questoes[k][5] + "</textArea>");
          document.getElementById('formulario').innerHTML += ("<textArea id='id"  + k.toString() +"x6' maxlength='1' style = 'width: 50px'>" + questoes[k][6] + "</textArea>");
          document.getElementById('formulario').innerHTML += ("<textArea id='id"  + k.toString() +"x7'>" + questoes[k][7] + "</textArea>");
          document.getElementById('formulario').innerHTML += ("<br>")
      }
      document.getElementById("gerarVariavel").hidden = false;
      document.getElementById("iniciar").hidden = true;
      document.getElementById("texto").hidden = true;
    }

      questoesFinalizadas = new Array();
      function finalizar(){
         // Recriando o array conforme as alterações
          for(i = 0 ; i < questoes.length ; i++){
            questoesFinalizadas.push(
                new Array(
                    document.getElementById("id" + i.toString() + "x0").value,
                    document.getElementById("id" + i.toString() + "x1").value,
                    document.getElementById("id" + i.toString() + "x2").value,
                    document.getElementById("id" + i.toString() + "x3").value,
                    document.getElementById("id" + i.toString() + "x4").value,
                    document.getElementById("id" + i.toString() + "x5").value,
                    document.getElementById("id" + i.toString() + "x6").value,
                    document.getElementById("id" + i.toString() + "x7").value,
                    )
            )
          }
          console.log(questoesFinalizadas); 
          // Criando sql
          var sql = "INSERT INTO `" + document.getElementById("tabela").value +"` (`per`, `a`, `b`, `c`, `d`, `e`, `rc`, `img`) VALUES ("
    
          for(i = 0 ; i < questoesFinalizadas.length ; i++){
              if(i > 0){
                  sql = sql + "("
              }
              sql = sql + "'" + questoesFinalizadas[i][0].trim() + "',";
              sql = sql + "'" + questoesFinalizadas[i][1].trim() + "',";
              sql = sql + "'" + questoesFinalizadas[i][2].trim() + "',";
              sql = sql + "'" + questoesFinalizadas[i][3].trim() + "',";
              sql = sql + "'" + questoesFinalizadas[i][4].trim() + "',";
              sql = sql + "'" + questoesFinalizadas[i][5].trim() + "',";
              sql = sql + "'" + questoesFinalizadas[i][6].trim() + "',";
              sql = sql + "'" + questoesFinalizadas[i][7].trim() + "'";
              sql = sql + "),"
          }

          sql = sql.substr(0,sql.length - 1);
          // Retirando todos os undefined's
          strbusca = eval('/'+ "undefined" +'/g');
          sql = sql.replace(strbusca , ""); 
          questoesFinalizadas = [];
          console.warn(sql)
          document.getElementById('qualquer').value = sql;
          document.getElementById("finalizar").hidden = false;
          }
      
      </script>

    <?php
    $a = '<script>document.write(sql)</script>';
    ?>

    <button type="button" id = "iniciar" onclick="iniciar()">Iniciar</button><br>
    <button type="button" id = "gerarVariavel" onclick="finalizar()" hidden="hidden" >GERAR VARIAVEL</button>

    <form method="POST" action="insere.php">
        <input type="text" hidden="hidden" id = "qualquer" name="teste"/>
        <br>
        <button type="submit"  id = "finalizar" hidden="hidden">Finalizar</button>

     </form>

 
  </body>
</html>
