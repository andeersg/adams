(function() {
  "use strict";

  var menuToggle = document.getElementById('js-toggle-menu');
  var menuOverlay = document.getElementById('js-overlay');
  menuToggle.addEventListener('click', function(e) {
    menuOverlay.classList.toggle('is-visible');
    document.body.classList.toggle('overlay-visible');
  });
})();


var visitation = function() {
  "use strict";
  
  localStorage.setItem('visited-'+window.location.pathname,true);
  var links = document.getElementsByTagName('a');
  for (var i=0; i < links.length; i++) {   
    var link = links[i];

    if (link.classList.contains('mark-visited')) {
      if (link.host == window.location.host && localStorage.getItem('visited-' + link.pathname)) {
        link.dataset.visited = true;
      }
    }
  }
};

visitation();
