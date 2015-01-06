/**
 *  scroll to offset top of $scrollTo
 *  
 * @param {type} $scrollTo
 * @returns null
 */
function scroll($scrollTo) {
    $('html, body').animate({
        scrollTop: ($($scrollTo).offset().top)
    }, 1000); //2000
};

/**
 * function for facebook like/share options
 * 
 * @param {type} d
 * @param {type} s
 * @param {type} id
 * @returns {undefined}
 */
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/* Object : form/questionnaire management */
var form = form || {
    result: {dev: 0,
        motion: 0,
        journal: 0,
        da: 0,
        total: 0},
    
    slide: $('.slide').length - 2,
    
    /**
     *  init : positionnement de la fiole et anim logo
     */
    init: function() {
        $('.slide').css('height', $window.innerHeight() + 'px');
        $($fiole).css('left', ($window.innerWidth() * 0.5) - ($fiole.width() * 0.5) + 'px');
        setTimeout(function() {
            $('#bulle').css({'top': '0', 'opacity': 1});
        }, 750); // 1250
    },
    /**
     *  activation du formulaire
     */
    play: function($slide) {
        $('html').css('overflow-y', 'scroll');
        this.next($slide, 750, 2500); // 1250 3000
        $fiole.css('bottom', '-300px');
        $linkBar.css('opacity', '1');
    },
    /**
     *  switch vers la question suivante
     */
    next: function($elem, $timerAnim, $timerScroll) {
        $elem.removeClass('active');
        if (this.slide == this.result.total + 1) {
            $puce.removeClass('form-active');
            this.final();
            return false;
        }

        var parentIndex = parseFloat($elem.attr('data-index')) + 1;
        setTimeout(function() {
            $puce.removeClass('form-active');
            $($puce[parentIndex - 1]).addClass('form-active');
            $('#slide-' + parentIndex).addClass('active');
            scroll('#slide-' + parentIndex);
        }, $timerAnim);
        setTimeout(function(){
            $('#slide-' + parentIndex).find('li').addClass('animated bounce');
        }, $timerScroll);
    },
    /**
     * garde en mémoire les choix et le nombre de questions traitées
     */
    increment: function($elem) {
        var $type = $elem.attr('data-link');
        this.result[$type] += 1;
        this.result.total += 1;
    },
    /**
     * génére les vignettes animées lors de la sélection et lance form.next();
     */
    pillsAnimate: function($elem, e){
        var $parent = $elem.parent('ul').parent('div').parent('.slide');
        if($parent.hasClass('active')){
            $elem.find('p, h4').addClass('choice-validate');
            if($elem.children('figure').children('img').attr('src')!=null){
                var src = $elem.children('figure').children('img').attr('src');              
                var img = "<div id='choice-" + $parent.attr('data-index') + "' class='pills'><img src='" + src +"'/></div>";
            }else{
                var img = "<div id='choice-" + $parent.attr('data-index') + "' class='pills'>" + $elem.html() + "</div>";
            }
            var X = e.clientX;
            var Y = e.clientY;
            var pills = $(img).appendTo($parent);
            pills.css({'top' : Y +'px', 'left' : X - (($window.width() - $('#wrapper').width())*0.5)+'px'});
            setTimeout(function(){
                pills.css({'top' : ($parent.height())- 275 +"px", 'left' : ($parent.width()- pills.width()*0.5)*0.5 + 15 + 'px'});
            }, 300); //300
            setTimeout(function(){
                pills.addClass('animated hinge');
            }, 1000); // 1300
            this.next($parent, 2550, 4800); //2550 4800
        }
		this.increment($elem);
    },
    /** 
     * une fois le formulaire complété fais apparaitre les résultats et bloque les mouvements de la fiole
     */
    final: function() {
        $final.css({'display': 'block', 'opacity': 1});
        $final.addClass('active');
        setTimeout(function() {
            scroll('#final');
            $($fiole).css('bottom', ($window.innerHeight() * 0.5) - ($fiole.height() * 0.5) + 'px');
            $($fiole).appendTo('#final').css({'position' : 'absolute', 'left': ($final.innerWidth() * 0.5) - ($fiole.width() * 0.5) + 'px', 'top' : '25rem'});
            $('#link-bar').children('ul').append('<li data-id=9 class="form-active"></li>');
            $puce = $linkBar.children('ul').children('li');
        }, 1550); //2550

        $('#dev .score').html(((this.result.dev / (this.result.total)) * 100).toFixed(2) + '%');
        $('#motion .score').html(((this.result.motion / (this.result.total)) * 100).toFixed(2) + '%');
        $('#journal .score').html(((this.result.journal / (this.result.total)) * 100).toFixed(2) + '%');
        $('#da .score').html(((this.result.da / (this.result.total)) * 100).toFixed(2) + '%');
    }
};

$(function() {
    $window = $(window);
    $body = $('body');
    $fiole = $('#fiole');
    $linkBar = $('#link-bar');
    $final = $('#final');

    $('html').css('overflow-y', 'hidden');
    form.init();
    $('#play').on('click', function(e) {
        e.preventDefault();
        form.play($('#slide-1'));
    });

    $('li.choice').on('click', function(e){
        e.preventDefault();
        form.pillsAnimate($(this), e);
    });

    // GESTION DE LA BARRE DE NAVIGATION LATERALE
    $puce = $linkBar.children('ul').children('li');

    // SCROLL VERS QUESTION LORS DU CLICK SUR LA PUCE ASSOCIEES
    $linkBar.children('ul').children('li').on('click', function(e){
        var id = '#slide-' + $(this).attr('data-id');
        scroll(id);
    });

    // Coloration de la puce active en fonction du slide visible
    $window.on('scroll', function(e){
        windowScroll = Math.floor($window.scrollTop());
        $pos = Math.round(($body.height() - windowScroll) / $window.innerHeight());
        $puce.removeClass('slide-active');
        $($puce[$puce.length - $pos]).addClass('slide-active');
    });
});