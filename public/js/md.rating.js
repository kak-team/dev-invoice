
(function ($) {
    $.fn.mdbRate = function () {
      var $stars;
      // Custom whitelist to allow for using HTML tags in popover content
      var myDefaultWhiteList = $.fn.tooltip.Constructor.Default.whiteList
      myDefaultWhiteList.textarea = [];
      myDefaultWhiteList.button = [];
  
      var $container = $(this);
  
      var titles = ['1 star', '2 stars', '3 stars', '4 stars', '5 stars'];
  
      for (var i = 1; i < 6; i++) {
        $container.append(`<i class="py-1 px-1 rate-popover" data-index="${i}" data-html="true" 
        data-placement="top" title="${titles[i]}"></i>`);
      }
  
      $stars = $container.children();
      $stars.addClass('fas fa-star');
      var index = $container.attr('star') ;
      markStarsAsActive(index);

      $stars.on('click', function () {
        index = $(this).attr('data-index');
        markStarsAsActive(index);
      });
  
      function markStarsAsActive(index) {
        unmarkActive();
  
        for (var i = 0; i < index; i++) {
            $($stars.get(i)).addClass('amber-text');
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
