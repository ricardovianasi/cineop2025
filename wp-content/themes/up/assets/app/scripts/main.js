// Slider navigations elements
const sliderPrevEl = '.slider-button-prev';
const sliderNextEl = '.slider-button-next';

$(document).ready(() => {
  Fancybox.bind('[data-fancybox]');

  $('#menubtn').on('click', function() {
    $('html').toggleClass('mainmenu-active');
  });

  if($(window).width() < 1024) {
    $('#mainmenu .menu-item-has-children .dropdown-toggle').on('click', function(e) {
      e.preventDefault();

      const $this = $(this);
      const subMenu = $this.parents('.menu-item-has-children').find('ul.sub-menu');

      if(subMenu.is(':visible')) {
        subMenu.hidden(200);
      } else {
        subMenu.show(200);
      }
    })
  }

  const banner = new Swiper('.banner-slider .swiper', {
    slidesPerView: 1,
    centeredSlides: true,
    loop: true,
    spaceBetween: 20,
    pagination: {
      el: '.banner-slider .slider-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: `.banner ${sliderNextEl}`,
      prevEl: `.banner ${sliderPrevEl}`,
    },
  });

  const workshopThumb = new Swiper('.workshop-thumbs .swiper', {
    spaceBetween: 24,
    slidesPerView: 2,
    watchSlidesProgress: true,
  });
  const workshop = new Swiper('.workshop-slider-main', {
    effect: 'fade',
    slidesPerView: 1,
    spaceBetween: 24,
    loop: false,
    pagination: {
      el: '.workshop .slider-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: `.workshop ${sliderNextEl}`,
      prevEl: `.workshop ${sliderPrevEl}`,
    },
    thumbs: {
      swiper: workshopThumb,
    },
  });

  const $movies = $('.movie-bgc');
  if($movies.length) {
    $movies.upMovies();
  }

  $('.player').mediaplayer();

  const movieSliders = $('.movie-slider');
  movieSliders.each(function () {
    const sliderId = $(this).attr('id');
    const isAutoplay = $(this).hasClass('movie-autoplay');
    const slidesPerView = $(this).attr('data-slides-per-view');

    const swiperOptions = {
      slidesPerView: (slidesPerView ? slidesPerView : 5),
      spaceBetween: 21,
      navigation: {
        nextEl: `#${sliderId} ${sliderNextEl}`,
        prevEl: `#${sliderId} ${sliderPrevEl}`
      },
      pagination: {
        el: `#${sliderId} .slider-pagination`,
        type: 'bullets',
        clickable: true
      },
      breakpoints: {
        320: {
          slidesPerView: 1.4,
        },
        575: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: (slidesPerView ? slidesPerView : 4),
        }
      }
    };

    if(isAutoplay) {
      swiperOptions.autoplay = {
        delay: 3000
      };
    }

    return new Swiper(`#${sliderId} .movie-items`, swiperOptions);
  });

  const categoriesNames = new Swiper('.home .category-names .swiper', {
    slidesPerView: 5,
    loop: false,
    clickable: true,
    watchSlidesProgress: true,
    spaceBetween: 0,
    breakpoints: {
      320: {
        slidesPerView: 2,
      },
      575: {
        slidesPerView: 3
      },
      768: {
        slidesPerView: 4
      },
      1200: {
        slidesPerView: 5,
      }
    }

  });
  const categoriesItems = new Swiper('.home .category-items .swiper', {
    slidesPerView: 1,
    effect: 'fade',
    loop: false,
    thumbs: {
      swiper: categoriesNames,
    },
    navigation: {
      nextEl: `.home .category ${sliderNextEl}`,
      prevEl: `.home .category ${sliderPrevEl}`
    },
    pagination: {
      el: '.home .category .slider-pagination',
      type: 'bullets',
      clickable: true
    },
  });

  const debate = new Swiper('.home .debate .swiper', {
    slidesPerView: 'auto',
    spaceBetween: 24,
    loop: true,
    pagination: {
      el: '.home .debate .slider-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: `.home .debate ${sliderNextEl}`,
      prevEl: `.home .debate ${sliderPrevEl}`,
    },
  });

  const art = new Swiper('.art-slider .swiper', {
    slidesPerView: 1,
    spaceBetween: 12,
    loop: true,
    navigation: {
      nextEl: `.art ${sliderNextEl}`,
      prevEl: `.art ${sliderPrevEl}`
    },
    pagination: {
      el: '.art .slider-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  const artThumb = new Swiper('.art-thumb .swiper', {
    navigation: false,
    pagination: false,
    slidesPerView: 3,
    spaceBetween: 12,
    loop: false,
    allowTouchMove: false,
    on: {
      init: function (swiper) {
        const mainIndex = art.activeIndex;
        swiper.slideTo(mainIndex + 1);
      }
    }
  });

  $('.art-thumb .swiper-slide').on('click', function() {
    const current = $(this).index();
    art.slideTo(current);

  })

  art.on('slideChange', function (swiper) {
    const index = swiper.activeIndex;
    if (artThumb instanceof Swiper) {
      artThumb.slideTo(index + 1);
    }
  });

  const timelineThumbs = new Swiper('.home .timeline-years .swiper', {
    slidesPerView: 6,
    loop: false,
    clickable: true,
    watchSlidesProgress: true,
    spaceBetween: 16,
    draggable: false,
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 8,
        navigation: false
      },
      575: {
        slidesPerView: 2
      },
      768: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 6,
      }
    }

  });
  const timeline = new Swiper('.home .timeline-items .swiper', {
    slidesPerView: 1,
    loop: false,
    thumbs: {
      swiper: timelineThumbs,
    },
    navigation: {
      nextEl: `.home .timeline ${sliderNextEl}`,
      prevEl: `.home .timeline ${sliderPrevEl}`
    },
    pagination: {
      el: '.home .timeline .slider-pagination',
      type: 'bullets',
      clickable: true
    },
  });
});
