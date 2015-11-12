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

        var appd = $('<div class="q'+cont+' well"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="objetiva"><label>Questão '+cont+' -</label><input type="text" class="form-control" name="'+cont+'enunciado"><div class="checkbox'+cont+'"></div></div>');
        $(".quest").append(appd);
        cont++;
    }


}


function createQuestDisc(valueDisc,resposta){
    var appd = $('<div class="q'+cont+' well"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="discursiva"><label>Questão '+cont+' -</label><input type="reset" class="form-control" value="'+valueDisc+'" name="'+cont+'enunciado"><p>Resposta:</p><input type="reset" name="'+cont+'resposta" class="form-control" value="'+resposta+'"></div>');
    $(".quest").append(appd);
    cont++;
}



function createQuestObj(valueObj,resposta){
    if(resposta=="certa"){
        var appd = $('<div class="q'+cont+' alert alert-success"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="objetiva"><label>Questão '+cont+' -</label><input type="reset" class="form-control" value="'+valueObj+'" name="'+cont+'enunciado"><div class="checkbox'+cont+'"></div></div>');
        $(".quest").append(appd);
        cont++;
    }else{
        var appd = $('<div class="q'+cont+' alert alert-danger"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="objetiva"><label>Questão '+cont+' -</label><input type="reset" class="form-control" value="'+valueObj+'" name="'+cont+'enunciado"><div class="checkbox'+cont+'"></div></div>');
        $(".quest").append(appd);
        cont++;
    }

}


var del = 0;
function delQuest(del) {

    var toDel = (".q" + del);
    $(toDel).remove();

}


function addAlt(add){

    contAlt[add]++;
    var appd = $('<div class="q'+add+'a'+contAlt[add]+' checkbox "><label><input name="'+add+'alternativa'+contAlt[add]+'checkbox"type="checkbox"> Alternativa '+contAlt[add]+'</label><input type="reset" class="form-control" name="'+add+'alternativa'+contAlt[add]+'texto"></div>');
    var classe = (".checkbox"+add);
    $(classe).prepend(appd);

}

function createAlternativa(valueAlt,add,valueCbx){

    if(valueCbx==true){
        contAlt[add]++;
        var appd = $('<div class="q'+add+'a'+contAlt[add]+' checkbox "><label><input name="'+add+'alternativa'+contAlt[add]+'checkbox"type="checkbox" checked> Alternativa '+contAlt[add]+'</label><input type="reset" class="form-control" name="'+add+'alternativa'+contAlt[add]+'texto" value="'+valueAlt+'"></div>');
        var classe = (".checkbox"+add);
        $(classe).prepend(appd);
    }else{
        contAlt[add]++;
        contAlt[add]++;
        var appd = $('<div class="q'+add+'a'+contAlt[add]+' checkbox "><label><input name="'+add+'alternativa'+contAlt[add]+'checkbox"type="checkbox"> Alternativa '+contAlt[add]+'</label><input type="reset" class="form-control" name="'+add+'alternativa'+contAlt[add]+'texto" value="'+valueAlt+'"></div>');
        var classe = (".checkbox"+add);
        $(classe).prepend(appd);
    }



}


function delAlt(q,a){

    var toDel = (".q" + q + "a"+ a);
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
    for (var i = 0; i < jsonTest.test.test.length; i++){
        if (jsonTest.test.test[i].tipo == "objetiva"){
            var retorno = jsonTest.test.test[i].enunciado;
            var id = "q"+i;
            var retornoResposta = jsonTest.res[id];
            createQuestObj(retorno,retornoResposta);
            var numDeAlternativas = jsonTest.test.test[i].resposta.length;
            var x = numDeAlternativas;
            for (var y = 0; y < numDeAlternativas; y++){
                x--;
                var retornoAlt = jsonTest.test.test[i].resposta[x].txt;
                var retornoCbx = jsonTest.test.test[i].resposta[x].alt;
                createAlternativa(retornoAlt,i+1,retornoCbx);
            }

        }else{
            var retorno = jsonTest.test.test[i].enunciado;
            var resposta = jsonTest.test.test[i].resposta;
            createQuestDisc(retorno,resposta);
        }
    }




}