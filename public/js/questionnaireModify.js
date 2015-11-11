/**
 * Created by paulo on 11/10/15.
 */
var cont = 1;
var contAlt = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1];

$(document).ready(function(){ restoreQuestions()})

function createQuest(){
    if(document.getElementById('discursiva').checked) {

        var appd = $('<div class="q'+cont+' well"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="discursiva"><label>Questão '+cont+' -</label><input type="text" class="form-control" name="'+cont+'enunciado"><button type="button" class="btn btn-default" onclick="delQuest('+cont+')" >Remover pergunta</button><input type="hidden" name="'+cont+'resposta" value=""></div>');
        $(".quest").append(appd);
        cont++;

    }


    else if(document.getElementById('objetiva').checked) {

        var appd = $('<div class="q'+cont+' well"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="objetiva"><label>Questão '+cont+' -</label><input type="text" class="form-control" name="'+cont+'enunciado"><button type="button" class="btn btn-default" onclick="delQuest('+cont+')" >Remover pergunta</button><button type="button" class="btn btn-default" onclick="addAlt('+cont+')" >Adicionar alternativa</button><div class="checkbox'+cont+'"></div></div>');
        $(".quest").append(appd);
        cont++;
    }


}


function createQuestDisc(valueDisc){
        var appd = $('<div class="q'+cont+' well"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="discursiva"><label>Questão '+cont+' -</label><input type="text" class="form-control" value="'+valueDisc+'" name="'+cont+'enunciado"><button type="button" class="btn btn-default" onclick="delQuest('+cont+')" >Remover pergunta</button><input type="hidden" name="'+cont+'resposta" value=""></div>');
        $(".quest").append(appd);
        cont++;
}



function createQuestObj(valueObj){
    var appd = $('<div class="q'+cont+' well"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="objetiva"><label>Questão '+cont+' -</label><input type="text" class="form-control" value="'+valueObj+'" name="'+cont+'enunciado"><button type="button" class="btn btn-default" onclick="delQuest('+cont+')" >Remover pergunta</button><button type="button" class="btn btn-default" onclick="addAlt('+cont+')" >Adicionar alternativa</button><div class="checkbox'+cont+'"></div></div>');
    $(".quest").append(appd);
    cont++;
}


var del = 0;
function delQuest(del) {

    var toDel = (".q" + del);
    $(toDel).remove();

}


function addAlt(add){

    contAlt[add]++;
    var appd = $('<div class="'+add+' checkbox '+contAlt[add]+'"><label><input name="'+add+'alternativa'+contAlt[add]+'checkbox"type="checkbox"> Alternativa '+contAlt[add]+'</label><input type="text" class="form-control" name="'+add+'alternativa'+contAlt[add]+'texto"><button type="button" class="btn btn-default" onclick="delAlt('+add+','+contAlt[add]+')" >Remover alternativa</button></div>');
    var classe = (".checkbox"+add);
    $(classe).prepend(appd);

}

function createAlternativa(valueAlt,add,valueCbx){

    if(valueCbx==true){
        contAlt[add]++;
        var appd = $('<div class="'+add+' checkbox '+contAlt[add]+'"><label><input name="'+add+'alternativa'+contAlt[add]+'checkbox"type="checkbox" checked> Alternativa '+contAlt[add]+'</label><input type="text" class="form-control" name="'+add+'alternativa'+contAlt[add]+'texto" value="'+valueAlt+'"><button type="button" class="btn btn-default" onclick="delAlt('+add+','+contAlt[add]+')" >Remover alternativa</button></div>');
        var classe = (".checkbox"+add);
        $(classe).prepend(appd);
    }else{
        contAlt[add]++;
        contAlt[add]++;
        var appd = $('<div class="'+add+' checkbox '+contAlt[add]+'"><label><input name="'+add+'alternativa'+contAlt[add]+'checkbox"type="checkbox"> Alternativa '+contAlt[add]+'</label><input type="text" class="form-control" name="'+add+'alternativa'+contAlt[add]+'texto" value="'+valueAlt+'"><button type="button" class="btn btn-default" onclick="delAlt('+add+','+contAlt[add]+')" >Remover alternativa</button></div>');
        var classe = (".checkbox"+add);
        $(classe).prepend(appd);
    }



}


function delAlt(q,a){

    var toDel = ("." + q + " checkbox " + a);
    $(toDel).remove();

}

function makeJSON(){
    var questions = [];
    $(".quest > div[class^='q']").each(function(){
        var type = $(this).find("input[name$='tipo']").val();
        var quest = $(this).find("input[name$='enunciado']").val()
        var ans = [];
        $(this).find("div[class~='checkbox']").each(function(){
            var that = this;
            var check =  $(that).find("input[name$='checkbox']").is(':checked');
            var text = $(that).find("input[name$='texto']").val();
            ans.push({"alt": check, "txt": text});
        });
        questions.push({"tipo": type,"enunciado": quest,"resposta":ans});
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
            for (var y = 0; y < numDeAlternativas; y++){
                var x = numDeAlternativas;
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