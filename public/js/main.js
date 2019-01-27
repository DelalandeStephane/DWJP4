
/*Valider les choix */

var agreeEl = document.getElementsByClassName('agree-alert');
var deleteEl = document.getElementsByClassName('delete-alert');

for (var agree of agreeEl) {
 		agree.addEventListener('click', function(e) {
 			var r = confirm("Etes vous sûr de vouloir accepter le commentaire ?");
			if (r == false) { e.preventDefault() }
			
 		});
 	}

for (var deleted of deleteEl) {
 		deleted.addEventListener('click', function(e) {
 			var r = confirm("Etes vous sûr de vouloir supprimer ?");
			if (r == false) { e.preventDefault() }	
 		});
 	}

/* Gestion de l'éditeur de texte */
window.addEventListener('load', function(){
	tinymce.init({
    selector: '#write-area',
    height:720,
    resize:false
  });

})
