/**
 * Created by paulo on 11/10/15.
 */
var cont = 1;
var contAlt = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1];

$(document).ready(function(){ restoreQuestions()})

function validateForm() {
    var x = document.forms["qid"]["fname"].value;
    if (x == null || x == "") {
        alert("Ops! Não pode enviar uma prova sem nome.");
        return false;
    }
}

function createQuestDisc(valueDisc){
    var appd = $('<div class="q'+cont+' well"><div class=" resposta form-group"><input type="hidden" name="'+cont+'tipo" value="discursiva"><h3 name="'+cont+'enunciado">'+valueDisc+'</h1><input type="text" class="form-control" name="resposta" value=""></div>');
    $(".quest").append(appd);
    cont++;
}

function createQuestObj(valueObj){
    var appd = $('<div class="q'+cont+' well"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="objetiva"><h3 name="'+cont+'enunciado">'+valueObj+'</h1><div class="checkbox'+cont+'"></div></div>');
    $(".quest").append(appd);
    cont++;
}

function createAlternativa(valueAlt,add,valueCbx){

        contAlt[add]++;
        var appd = $('<div class="row"><div class="col-lg-12"><div class="input-group"><span class="input-group-addon"><input type="checkbox" name="checkbox" aria-label="..."></span><p class="form-control" name="texto" aria-label="...">'+valueAlt+'</p></div><!-- /input-group --></div>');
        var classe = (".checkbox"+add);
        $(classe).prepend(appd);
}

function makeJSON(){
    var questions = [];
    $(".quest > div[class^='q']").each(function(){
        var type = $(this).find("input[name$='tipo']").val();
        var quest = $(this).find("h3[name$='enunciado']").text()
        var ans = [];
        if (type==="discursiva"){
            $(this).find("div[class~='resposta']").each(function(){
                var that = this;
                var resp =  $(that).find("input[name$='resposta']").val();
                questions.push({"tipo": type,"enunciado": quest,"resposta":resp});
            });
        }else{
            $(this).find("div[class^='row']").each(function(){
                var that = this;
                var check =  $(that).find("input[name$='checkbox']").is(':checked');
                var text = $(that).find("p[name$='texto']").text();
                ans.push({"alt": check, "txt": text});
            });
            questions.push({"tipo": type,"enunciado": quest,"resposta":ans});
        }
    });
    oFormObject = document.forms['qid'];
    oFormObject.elements["questions"].value = JSON.stringify(questions);//;
}

function restoreQuestions(){
    var stringTest = $('.inputQ').text();
    var jsonTest = JSON.parse(stringTest);
    for (var i = 0; i < jsonTest.test.length; i++){
        if (jsonTest.test[i].tipo == "objetiva"){
            var retorno = jsonTest.test[i].enunciado;
            createQuestObj(retorno);
            var numDeAlternativas = jsonTest.test[i].resposta.length;
            var x = numDeAlternativas;
            for (var y = 0; y < numDeAlternativas; y++){
                x--;
                var retornoAlt = jsonTest.test[i].resposta[x].txt;
                var retornoCbx = jsonTest.test[i].resposta[x].alt;
                createAlternativa(retornoAlt,i+1,retornoCbx);
            }

        }else{
            var retorno = jsonTest.test[i].enunciado;
            createQuestDisc(retorno);
        }
    }




}