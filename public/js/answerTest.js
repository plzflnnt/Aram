/**
 * Created by paulo on 06/11/15.
 */
$(document).ready(function(){ answerTest()})


function answerTest(){


    var nudeTest = $('.inputQ').text();
    var jsonTest = JSON.parse(nudeTest);

    $(".test").append(jsonTest.name+"<br>");

    for (var i = 0; i < jsonTest.test.length; i++){
        if (jsonTest.test[i].tipo == "objetiva"){

            var retorno = jsonTest.test[i].enunciado;
            $(".test").append(retorno+"<br>");
            var numDeAlternativas = jsonTest.test[i].resposta.length;
            for (var y = 0; y < numDeAlternativas; y++){

                $(".test").append(jsonTest.test[i].resposta[y].txt+"<br>");
                $(".test").append(jsonTest.test[i].resposta[y].alt+"<br>");
            }

        }else{

            var retorno = jsonTest.test[i].enunciado;
            $(".test").append(retorno+"<br>");

        }
    }


}

function makeJSON(){
    //var questions = [];
    //$(".quest > div[class^='q']").each(function(){
    //    var type = $(this).find("input[name$='tipo']").val();
    //    var quest = $(this).find("input[name$='enunciado']").val()
    //    var ans = [];
    //    $(this).find("div[class^='checkbox']").each(function(i){
    //        if(i > 0){
    //            var that = this;
    //            var check =  $(that).find("input[name$='checkbox']").val();
    //            alert(check);
    //            var text = $(that).find("input[name$='texto']").val();
    //            ans.push({"alt": check, "txt": text});
    //        }
    //    });
    //    questions.push({"tipo": type,"enunciado": quest,"resposta":ans});
    //});
    //oFormObject = document.forms['qid'];
    //oFormObject.elements["questions"].value = JSON.stringify(questions);//;

    alert("oi");
}