(function($) {
  $.fn.upMovies = function () {
    return $(this).each(function() {
      const $sliderContainer = $(this);
      const $bgcEffect = $sliderContainer.find('.movie-bgc-effect');
      $sliderContainer.find('.movie-item[data-movie-bgc!=""][data-movie-bgc]')
      .on('mouseenter', function(e) {
        const movieBgc = $(this).attr('data-movie-bgc');
        let useTimeOut = false;

        if($bgcEffect.attr('style')) {
          useTimeOut = true;
        }

        $bgcEffect.css({
          'background-image': `url(${movieBgc})`,
          'opacity': 0
        });

        if(useTimeOut) {
          setTimeout(function () {
            $bgcEffect.css('opacity', '.24');
          }, 300);
        } else {
          $bgcEffect.css('opacity', '.24');
        }
      })
    });
  };

  $.fn.mediaplayer = function() {
    var $this = $(this),
      $mediaPlayer = $('#player-content', $this),
      playlistMedias = $mediaPlayer.data('playlist'),
      projectId = $mediaPlayer.data('project'),
      thumbnail = $mediaPlayer.data('thumbnail');

    if( !playlistMedias ) {
      return
    }

    if( !projectId ) {
      projectId = 'e2973506fea631750e9ee97a4dff1bfb';
    }

    var player = new SambaPlayer('player-content', { //player é o ID do elemento html que ele vai inserir o iframe
      height: 360,
      width: 640,
      //ph: "e2973506fea631750e9ee97a4dff1bfb",//Player Hash do projeto
      //m: "aff747e48d9fe6face8b5ede6632bd48",//MidiaID
      captionTheme: '[ffffff,32,pt-br]',
      playlist: {
        titles: [],
        ph: projectId,
        medias: playlistMedias,
        loop: false,
        timeout: 5,
        autoplay: true,
        sequence: true,
        volume: 100,
      },
      playerParams: { //Veja a lista de Parâmetros suportados
        volume: 50,
        thumbnailURL: thumbnail,
        //resume: 43,
        hasEmbed: false,
        enableShare: false,
        captionTheme: '[ffffff,32,pt-br]',
      },
      events: {
        '*': function( e ) {
          if( e.event == 'onLoad' ) {
            player.unmute();
          }
        },
      }
    });
  };
})(jQuery);
