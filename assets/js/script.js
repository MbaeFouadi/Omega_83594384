
$(function(){

    var choix = { un: null, deux: null, trois: null};
    var choixdep = { un: null, deux: null, trois: null};
    var choixvar = { un: '', deux: '', trois: ''};
    var id = 'po';

    function recuperation(code_facult, opt, cb){
        $.ajax({ url:"script.php",
             method :  "POST",
             data : {id : code_facult, option: opt},
             success : cb,
            // error :          
             dataType : "HTML",
    
        })
    }
    function peuplemen(data){
        $("#"+id).html(data);
    }

    function compare(){
        return (choixvar.trois == choixvar.deux && choixvar.deux != '') ? true : false;
    }
    function chop(){
        return (choix.trois == choix.deux && choix.deux != 0) ? true : false;
    }
    function chopp(){
        return ((choixdep.trois == choixdep.deux && choixdep.deux != null ) || (choixdep.trois == choixdep.un && choixdep.un != null ) || (choixdep.un == choixdep.deux && choixdep.un != null )) ? true : false;
    }

    $('#inputcomp').on('change' , function(){
        choix.un = $(this).find("option[value='"+$(this).val()+"']").data('concour');
        console.log(choix)
        id = 'po';
        recuperation($('#inputcomp').val(), 'comp', peuplemen);
    });

    $('#inputcomp1').on('change' , function(){
        choix.deux = $(this).find("option[value='"+$(this).val()+"']").data('concour');
        choixvar.deux = $(this).val();
        console.log(choix, choixvar)
        id = 'polo';
        if((cho = chop()) && (c = compare())){
            $('#inputcomp1').val('');
            alert('..')
        }else{
            recuperation($('#inputcomp1').val(), 'comp1', peuplemen);
        }
    });
    $('#inputcomp2').on('change' , function(){
        choix.trois = $(this).find("option[value='"+$(this).val()+"']").data('concour');
        choixvar.trois = $(this).val();
        console.log(choix, choixvar)
        id = 'kilo';
        if(cho = chop() && (c = compare())){
            $('#inputcomp2').val('');
            alert('Erreur de choix: Vous pouvez pas prendre le meme departement qui demande un concours')
        }else{
            recuperation($('#inputcomp2').val(), 'comp2', peuplemen);
        }
    });
    
    $(document).on('change' , '.inputdep' , function(){
        switch($(this).attr('id')){
            case 'inputdep': {
                choixdep.un = $(this).val();
                break;
            }
            case 'inputdep1': {
                choixdep.deux = $(this).val();
                break;
            }
            case 'inputdep2': {
                choixdep.trois = $(this).val();
                break;
            }
        }
        console.log(choixdep);
        if(cho = chopp()){
            $(this).val('');
            alert('Vous pouvez pas choisir  le meme departement plus d une fois')
        }
    });
})