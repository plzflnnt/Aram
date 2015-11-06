/**
 * Created by paulo on 06/11/15.
 */
$(document).ready(function(){ exibe()})

function exibe(){
    var nudeTest = $('.inputQ').text();
    var jsonTest = JSON.parse(nudeTest);

    $(".visualizacao").append(jsonTest.name+"<br>");

    for (var i = 0; i < jsonTest.test.length; i++){
        if (jsonTest.test[i].tipo == "objetiva"){

            var retorno = jsonTest.test[i].enunciado;
            $(".visualizacao").append(retorno+"<br>");
            var numDeAlternativas = jsonTest.test[i].resposta.length;
            for (var y = 0; y < numDeAlternativas; y++){

                $(".visualizacao").append(jsonTest.test[i].resposta[y].txt+"<br>");
                $(".visualizacao").append(jsonTest.test[i].resposta[y].alt+"<br>");
            }

        }else{

            var retorno = jsonTest.test[i].enunciado;
            $(".visualizacao").append(retorno+"<br>");

        }
    }


    //TODO: ja retorna tudo menos as alternativas e fazer a funcão ser executada assim que a pagina carregar


}