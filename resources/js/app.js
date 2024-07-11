import './bootstrap';

import Alpine from 'alpinejs';
import Sortable from 'sortablejs';

document.addEventListener('DOMContentLoaded', function() {
  var lists = document.querySelectorAll('.board-list');
  lists.forEach(function(list) {
      new Sortable(list, {
          group: 'shared',
          animation: 150,
          onEnd: function(evt) {
              var cardId = evt.item.dataset.cardId;
              var newListId = evt.to.dataset.listId;
              var newPosition = evt.newIndex;

              // Envoyer une requête AJAX pour mettre à jour la position de la carte
              axios.patch('/cards/' + cardId + '/move', {
                  list_id: newListId,
                  position: newPosition
              });
          }
      });
  });
});


window.Alpine = Alpine;

Alpine.start();
