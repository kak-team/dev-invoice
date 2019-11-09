
(function ($) {
  $.fn.mdbRate = function () {
    var $stars;
    // Custom whitelist to allow for using HTML tags in popover content
    var myDefaultWhiteList = $.fn.tooltip.Constructor.Default.whiteList
    myDefaultWhiteList.textarea = [];
    myDefaultWhiteList.button = [];

    var $container = $(this);

    var titles = [0, '1 star', '2 stars', '3 stars', '4 stars', '5 stars'];

    for (var i = 1; i <= 5; i++) {
      $container.append(`<i class="py-2 px-1 rate-popover" data-index="${i}" data-html="true" data-toggle="popover"
      data-placement="top" title="${titles[i]}"></i>`);
    }

    $stars = $container.children();

    if ($container.hasClass('rating-faces')) {
      $stars.addClass('far fa-meh-blank');
    } else if ($container.hasClass('empty-stars')) {
      $stars.addClass('far fa-star');
    } else {
      $stars.addClass('fas fa-star');
    }

    var index = $container.attr('star');
    markStarsAsActive(index);

    $stars.on('click', function () {
      var index = $(this).attr('data-index');
      markStarsAsActive(index);
    });

    var loop = 0;

    function markStarsAsActive(index) {
      unmarkActive();
      if( index > 0){
        index = index -1;
        for (var i = 0; i <= index; i++) {
            $($stars.get(i)).addClass('amber-text');
            loop++;
        }
      }
     

    }

    function unmarkActive() {
      $stars.parent().hasClass('rating-faces') ? $stars.addClass('fa-meh-blank') : $stars;
      $container.hasClass('empty-stars') ? $stars.removeClass('fas') : $container;
      $stars.removeClass('fa-angry fa-frown fa-meh fa-smile fa-laugh live oneStar twoStars threeStars fourStars fiveStars amber-text');
    }

    $stars.on('click', function () {
      $stars.popover('hide');
    });

    // Submit, you can add some extra custom code here
    // ex. to send the information to the server
    $container.on('click', '#voteSubmitButton', function () {
      $stars.popover('hide');
    });

    // Cancel, just close the popover
    $container.on('click', '#closePopoverButton', function () {
      $stars.popover('hide');
    });

    if ($container.hasClass('feedback')) {

      $(function () {
        $stars.popover({
          // Append popover to #rateMe to allow handling form inside the popover
          container: $container,
          // Custom content for popover
          content: `<div class="my-0 py-0"> <textarea type="text" style="font-size: 0.78rem" class="md-textarea form-control py-0" placeholder="Write us what can we improve" rows="3"></textarea> <button id="voteSubmitButton" type="submit" class="btn btn-sm btn-primary">Submit!</button> <button id="closePopoverButton" class="btn btn-flat btn-sm">Close</button>  </div>`
        });
      })
    }

    $stars.tooltip();
  }
})(jQuery);
