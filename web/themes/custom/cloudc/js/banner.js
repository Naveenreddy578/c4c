Drupal.behaviors.C4CBanner = {
    attach: function (context) {
      once('C4CBanner', '.heropeek', context).forEach(function (element) {
        // element.classList.add('processed');
        var glideHeroPeek = new Glide(element, {
          type: 'carousel',
          autoplay: 4500,
          focusAt: '1',
          startAt: 1,
          perView: 1, 
        });
        glideHeroPeek.mount();
        }
      );
    }
  };
