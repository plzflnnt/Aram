/**
 * Created by paulo on 11/10/15.
 */
var cont = 1;
var contAlt = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1];



function createQuest(){
    if(document.getElementById('discursiva').checked) {

        var appd = $('<div class="q'+cont+' well"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="discursiva"><span>Enunciado:</span><input type="text" class="form-control" name="'+cont+'enunciado"><button type="button" class="btn btn-default glyphicon glyphicon-trash" onclick="delQuest('+cont+')" ></button><input type="hidden" name="'+cont+'resposta" value=""></div>');
        $(".quest").append(appd);
        cont++;

    }


    else if(document.getElementById('objetiva').checked) {

        var appd = $('<div class="q'+cont+' well"><div class="form-group"><input type="hidden" name="'+cont+'tipo" value="objetiva"><span>Enunciado:</span><input type="text" class="form-control" name="'+cont+'enunciado"><button type="button" class="btn btn-default glyphicon glyphicon-trash" onclick="delQuest('+cont+')" ></button><button type="button" class="btn btn-default glyphicon glyphicon glyphicon-list" onclick="addAlt('+cont+')" > Add <span class="glyphicon glyphicon-plus"></span> alternativa</button><div class="checkbox'+cont+'"></div></div>');
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
    var appd = $('<div class="q'+add+'a'+contAlt[add]+' checkbox input-group "><span class="input-group-addon"><input name="'+add+'alternativa'+contAlt[add]+'checkbox" type="checkbox" style="margin-left: 0px;" >.    .</span><input type="text" class="form-control" name="'+add+'alternativa'+contAlt[add]+'texto"> <span class="input-group-btn"><button type="button" style="border-top-width: 0px;" class="btn btn-default glyphicon glyphicon-remove" onclick="delAlt('+add+','+contAlt[add]+')" ></button></span></div>');
    var classe = (".checkbox"+add);
    $(classe).prepend(appd);

}


function delAlt(q, a){

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