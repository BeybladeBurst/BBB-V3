if (window.location.pathname.indexOf('other')==-1) 
  $('main').prepend('<h5>全<span>'+$('a[id]:not(.none)').length+'</span>種</h5>');

var loadDeferredStyles = function() {
    $('body').append('<link rel="stylesheet" href="/include/fonts/fa.css">');
    let moz=false;
    try {document.querySelector(':-webkit-any(#A)')} catch(e) {moz=true;}
    if (moz)
        $.ajax({url:"/parts/require/typography.css",success:
            css=>$('head').append('<style>'+css.replace(/-webkit/g,'-moz')+'</style>')});
    else
        $('body').append('<link rel="stylesheet" href="require/typography.css?'+Math.random()+'">');
};
var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
else window.addEventListener('load', loadDeferredStyles);