

 if (!arv_empty(ga_suite_opt['aid'])){
	 window.google_analytics_uacct = ga_suite_opt['aid'];
}

/** initilize everything */
   var _gaq = _gaq || [];
  _gaq.push(['_setAccount',ga_suite_opt['id'] ]);


/*							*/
jQuery(document).ready(function($) {

 if (!arv_empty(ga_suite_opt['dnt']) && !arv_empty(navigator.doNotTrack) && navigator.doNotTrack == "1" ){//we cant track unfortunately


 }else{

 
/* anonymize IP*/
if (!arv_empty(ga_suite_opt['tanon'])){
     _gaq.push(['_gat._anonymizeIp']);
/* /end anonymize*/
}
/* page speed trarking*/
if (!arv_empty(ga_suite_opt['pagespeed'])){
        _gaq.push(['_trackPageLoadTime']);
}
/*--*/
/** Scroll Depth */
if (!arv_empty(ga_suite_opt['scroll'])){
  $.scrollDepth();

}/** end scroll depth*/



/** Select external links*/
 if (!arv_empty(ga_suite_opt['outlink'])){
  $.expr[':'].external = function(obj){
    return !obj.href.match(/^mailto\:/)
            && (obj.hostname != location.hostname) && !arv_empty(obj.href);
  };

  $('a:external').click(function(e){ 

    var url =  arv_empty(e.target.href) ? '' : e.target.href;
    if (url==''){return;}
    var targh=  $(e).attr("target");
        _gaq.push(['_trackEvent', 'Outbound Links', e.currentTarget.host, url, 0]);
        if (e.metaKey || e.ctrlKey || (!arv_empty(targh) && targh=="_blank") ) {
             var newtab = true;
        }
        if (!newtab) {
             e.preventDefault();
             setTimeout('document.location = "' + url + '"', 200);
        }

  });
}
/** Downloads */
if (!arv_empty(ga_suite_opt['download'])){
  var n = ga_suite_opt['edownloads'];
   $(n).each(function(i,elem){
  
          $('href$=".' + elem + '"').each(function(i,elem){
            $(elem).click(function(e){

              _gaq.push(['_trackEvent', 'Download', e.target.href]);
                var targh= $(e).attr("target");

              if (e.metaKey || e.ctrlKey || (!arv_empty(targh) && targh=="_blank") ) {
               var newtab = true;
               }
               if (!newtab) {

                e.preventDefault();
                 setTimeout('document.location = "' + url + '"', 200);
             }

            });

          });
  });

}
 /** */

   if (!arv_empty(ga_suite_opt['pageview'])){
	  _gaq.push(['_trackPageview']); //pageviews	
}
 


  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


} //end check if we may track
});

function arv_empty(what){
	return (typeof what == 'undefined') || ((typeof what === 'array') && what.length==0) || (what=="");
}





/*!
* jquery.scrolldepth.js | v0.1.2
* Copyright (c) 2012 Rob Flaherty (@robflaherty)
* Licensed under the MIT and GPL licenses.
*/
;(function ( $, window, document, undefined ) {
  
  "use strict";

  var defaults = {
    elements: [],
    minHeight: 0,
    offset: 0, // Not used yet
    percentage: true,
    testing: false
  },

  $window = $(window),
  cache = [];

  /*
* Plugin
*/

  $.scrollDepth = function(options) {
    
    var startTime = +new Date;

    options = $.extend({}, defaults, options);

    // Return early if document height is too small
    if ( $(document).height() < options.minHeight ) {
      return;
    }

    // Establish baseline (0% scroll)
    sendEvent('Percentage', 'Baseline');

    /*
* Functions
*/

    function sendEvent(action, label, timing) {
      if (!options.testing) {

        _gaq.push(['_trackEvent', 'Scroll Depth', action, label, 1, true]);

        if (arguments.length > 2) {
          _gaq.push(['_trackTiming', 'Scroll Depth', action, timing, label, 100]);
        }

      } else {
//        $('#console').html(action + ': ' + label);
      }
    }

    function calculateMarks(docHeight) {
      return {
        '25%' : parseInt(docHeight * 0.25, 10),
        '50%' : parseInt(docHeight * 0.50, 10),
        '75%' : parseInt(docHeight * 0.75, 10),
        // 1px cushion to trigger 100% event in iOS
        '100%': docHeight - 1
      };
    }

    function checkMarks(marks, scrollDistance, timing) {
      // Check each active mark
      $.each(marks, function(key, val) {
        if ( $.inArray(key, cache) === -1 && scrollDistance >= val ) {
          sendEvent('Percentage', key, timing);
          cache.push(key);
        }
      });
    }

    function checkElements(elements, scrollDistance, timing) {
      $.each(elements, function(index, elem) {
        if ( $.inArray(elem, cache) === -1 && $(elem).length ) {
          if ( scrollDistance >= $(elem).offset().top ) {
            sendEvent('Elements', elem, timing);
            cache.push(elem);
          }
        }
      });
    }

    /*
* Scroll Event
*/

    $window.on('scroll.scrollDepth', function() {

      /*
* We calculate document and window height on each scroll event to
* account for dynamic DOM changes.
*/

      var docHeight = $(document).height(),
        winHeight = window.innerHeight ? window.innerHeight : $window.height(),
        scrollDistance = $window.scrollTop() + winHeight,

        // Offset not being used yet
        offset = parseInt(winHeight * (options.offset / 100), 10),

        // Recalculate percentage marks
        marks = calculateMarks(docHeight),

        // Timing
        timing = +new Date - startTime;

      // If all marks already hit, unbind scroll event
      if (cache.length >= 4 + options.elements.length) {
        $window.off('scroll.scrollDepth');
        return;
      }

      // Check specified DOM elements
      if (options.elements) {
        checkElements(options.elements, scrollDistance, timing);
      }

      // Check standard marks
      if (options.percentage) {
        checkMarks(marks, scrollDistance, timing);
      }
    });

  };

})( jQuery, window, document );