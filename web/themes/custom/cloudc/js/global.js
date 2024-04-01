
(function ($, Drupal, drupalSettings) {
    let flag = false;
    Drupal.behaviors.MyThemeBehavior = {
      attach: function (context, settings) {
        $('div.section-center-title ').next().css("margin", "20px auto");
      }
};

})(jQuery, Drupal, drupalSettings);
