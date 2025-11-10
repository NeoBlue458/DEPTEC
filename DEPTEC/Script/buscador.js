(function(document) {
    'buscador'; 

    var LightTableFilter = (function(Arr) {

      var _input;

      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        
        Arr.forEach.call(tables, function(table) {
          var visibleRowsCount = 0;
          
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, function(row) {
                var isVisible = _filter(row); 
                if (isVisible) {
                    visibleRowsCount++;
                }
            });
          });
          
          // Llama a la función para mostrar/ocultar el mensaje
          _toggleNoResultsMessage(table, visibleRowsCount);
        });
      }

  
      function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        var isMatch = text.indexOf(val) !== -1;
        
        row.style.display = isMatch ? 'table-row' : 'none';
        
        return isMatch; // Retorna si la fila se mostrará
      }

      function _toggleNoResultsMessage(table, count) {
          var messageId = 'no-results-js-' + table.id; // ID único para el mensaje
          var existingMessage = document.getElementById(messageId);

          if (count === 0 && _input.value.length > 0) {
              //Mostrar mensaje solo si no hay filas visibles Y el campo de búsqueda no está vacío
              if (!existingMessage) {
                  // Crear el mensaje si no existe
                  var messageElement = document.createElement('div');
                  messageElement.id = messageId;
                  messageElement.textContent = '⚠️ No se encontraron registros que coincidan con su búsqueda.';
                  
                  
                  messageElement.style.cssText = 'padding: 15px; margin-top: 20px; text-align: center; color: #f8d7da; background-color: #721c24; font-weight: bold; border-radius: 5px;';
                  table.parentNode.insertBefore(messageElement, table.nextSibling);
              } else {
                  // Si ya existe, solo nos aseguramos de que esté visible
                  existingMessage.style.display = 'block';
              }
          } else {
              // 2. Ocultar mensaje si hay filas visibles o el campo está vacío
              if (existingMessage) {
                  existingMessage.style.display = 'none';
              }
          }
      }

      return {
        init: function() {
          var inputs = document.getElementsByClassName('light-table-filter');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
            _onInputEvent({target: input});
          });
        }
      };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
      if (document.readyState === 'complete') {
        LightTableFilter.init();
      }
    });

})(document);
