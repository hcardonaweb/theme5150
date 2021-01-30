/***
 *    ┌┬┐┬ ┬┌─┐┌┬┐┌─┐  ┬─┐┌─┐┬  ┌─┐┌┬┐┌─┐┌┬┐   ┬┌─┐
 *     │ ├─┤├┤ │││├┤   ├┬┘├┤ │  ├─┤ │ ├┤  ││   │└─┐
 *     ┴ ┴ ┴└─┘┴ ┴└─┘  ┴└─└─┘┴─┘┴ ┴ ┴ └─┘─┴┘  └┘└─┘
 */
// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
var currentPlayerParent, currentPlayerThumb;
var youtubeReady = false;

function onYouTubeIframeAPIReady() {
    youtubeReady = true;
}

function createYTPlayer(videoId, playerId) {
    if (youtubeReady) {
        player = new YT.Player(playerId, {
            videoId: videoId,
            playerVars: {rel: 0, showinfo: 0},
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }
}

function onPlayerReady(event) {
    event.target.playVideo();
}

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        event.target.destroy();
        currentPlayerParent.removeClass('activated');
        currentPlayerThumb.fadeIn();
    }
}

(function ($, root, undefined) {
    $(function () {

        //MOBILE MENU FUNCTIONALITY
        $('.menu-button-container').click(function () {
            $('.drawer-container').slideToggle();
            $('.menu-btn').toggleClass('active');
            $('body').toggleClass('noscroll');
        });

        // REUSABLE SHOW/HIDE TOGGLE
        $('.toggle-btn').click(function (e) { //the button class to use
            e.preventDefault();
            $(this).parent().find('.toggle-content').slideToggle();
            $(this).parent().toggleClass('toggle-open');
            if ($(this).parent().hasClass('toggle-open')) {
                $(this).parent().find('.toggle-btn span').text("-");
            } else {
                $(this).parent().find('.toggle-btn span').text("+");
            }
        });

        // mobile sub menu functionality
        $(".menu-drawer-btn").click(function () { // mouse CLICK instead of hover
            $(this).parent().find("ul.sub-menu").slideToggle(); // display child
            $(this).toggleClass('sub-menu-open');
            if ($(this).hasClass('sub-menu-open')) {
                $(this).text("-");
            } else {
                $(this).text("+");
            }
        });

        // BUTTON POPUP
        $('.popup-btn').click(function (e) {
            e.preventDefault();
            $(this).parent().find('.popup-wrapper').show();
            $('body').addClass('fixed');
        });

        // POPUP CLOSE BUTTON
        $('.close-popup').click(function (e) {
            e.preventDefault();
            $('.popup-wrapper').hide();
            $('body').removeClass('fixed');
        });

        // RESET SCROLL POSTION IN POPUP WINDOW ON CLICK OF CLOSE BUTTON
        $('.close-popup').click(function () {
            $('.popup-wrapper').scrollTop(0);
        });

        //CATEGORY FILTER

        function filterToggle() {
            if( $( window ).width() < 768) {
                $('.show-info').text($(this).text() == 'Show Filters' ? 'Hide Filters' : 'Show Filters');
                $('.show-info').parent().find('.visible-content').slideToggle();
                $('.show-info').parent().find('.hidden-content').slideToggle();
                $('.show-info').toggleClass('open');
            }
        }

        $('.filter').click(function(e) {
            $('.filter-button').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
            var id = $(this).attr('data-filter');
            $(".item").each(function(){
                var itemID = $(this).attr('data-filter');
                var filter = itemID.split(",");
                $(this).hide();
                if(filter.includes(id)) {
                    $(this).show();
                }
            });

            filterToggle();

            $('.image--expand').css({'display':'none'});
            $('.image__cell').removeClass('is-expanded').addClass('is-collapsed');
            $('.image--basic').css('height', 'initial');
        });
        $('#show-all').click(function(e) {
            $('.filter-button').removeClass('active');
            $(this).addClass('active');
            $('.item').show();

            filterToggle();
        });
        // MOBILE FILTER TOGGLE
        $('.show-info').click(function (e) { //the button class to use
            e.preventDefault();
            $(this).text($(this).text() == 'Show Filters' ? 'Hide Filters' : 'Show Filters');
            $(this).parent().find('.visible-content').slideToggle();
            $(this).parent().find('.hidden-content').slideToggle();
            $(this).toggleClass('open');
        });

        // SMOOTH SCROLLING
        // Select all links with hashes and scrollTo class
        $('.scrollTo[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function (event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();

                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function () {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            }
                            ;
                        });
                    }
                }
            });

        // MAKE VIDEO THUMBNAIL CLICKABLE - HIDES IMAGE AND PLAYS VIDEO
        $('.video-thumb-container').click(function () {
            currentPlayerParent = $(this).addClass('activated');
            currentPlayerThumb = currentPlayerParent.find('img.video-thumblink').fadeOut();
            var YTID = currentPlayerThumb.data('video');
            var PlayerID = currentPlayerThumb.data('id');
            createYTPlayer(YTID, PlayerID);
        });

    });
})(jQuery, this);