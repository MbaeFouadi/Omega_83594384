"use strict";

$('.delete-element').on('click', function(e){
    if(confirm('Action irréversible. Voulez vous vraiment supprimer cet element ?')){
        alert("Element supprimé !");
    }else{
      e.preventDefault();
    }
})