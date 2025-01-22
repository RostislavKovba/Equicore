/******/ (function() { // webpackBootstrap
/*!**************************!*\
  !*** ./src/js/swiper.js ***!
  \**************************/
function _readOnlyError(r) { throw new TypeError('"' + r + '" is read-only'); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
/* eslint-disable */

//*===========
//*  SWIPER  =
//*===========
var _functions = {};
var winW, winH, winScr, isTouchScreen, isAndroid, isChrome, isIPhone, isMac;
jQuery(function ($) {
  'use strict';

  // Options set Swiper
  function updateClasses(_ref) {
    var el = _ref.el,
      slides = _ref.slides,
      activeIndex = _ref.activeIndex;
    $(el).find('.swiper-slide-prev-prev').removeClass('swiper-slide-prev-prev');
    $(slides).eq(activeIndex).prev().prev().addClass('swiper-slide-prev-prev');
    $(el).find('.swiper-slide-next-next').removeClass('swiper-slide-next-next');
    $(slides).eq(activeIndex).next().next().addClass('swiper-slide-next-next');
  }
  _functions.getSwOptions = function (swiper) {
    var options = swiper.data('options');
    options = !options || _typeof(options) !== 'object' ? {} : options;
    console.log(options);
    var $p = swiper.closest('.swiper-entry'),
      slidesLength = swiper.closest('.swiper-entry').find('.swiper-wrapper>.swiper-slide').length;
    if (options.arrowsOut) {
      if (!options.navigation) options.navigation = {
        nextEl: $p.closest('section, .section').find('.swiper-button-next')[0],
        prevEl: $p.closest('section, .section').find('.swiper-button-prev')[0]
      };
      if (!options.pagination) {
        options.pagination = {
          el: $p.closest('section, .section').find('.swiper-pagination')[0],
          clickable: false,
          dynamicBullets: slidesLength > 5 ? true : false
        };
      } else {
        options.pagination = _objectSpread({
          el: $p.closest('section, .section').find('.swiper-pagination')[0]
        }, options.pagination);
      }
    } else {
      if (!options.pagination) {
        options.pagination = {
          el: $p.find('.swiper-pagination')[0],
          clickable: false,
          dynamicBullets: slidesLength > 5 ? true : false
        };
      } else {
        options.pagination = _objectSpread({
          el: $p.find('.swiper-pagination')[0]
        }, options.pagination);
      }
      if (!options.navigation) {
        options.navigation = {
          nextEl: $p.find('.swiper-button-next')[0],
          prevEl: $p.find('.swiper-button-prev')[0]
        };
      }
    }
    options.preloadImages = false;
    options.lazy = {
      loadPrevNext: true
    };
    options.observer = true;
    options.observeParents = true;
    options.watchOverflow = true;
    if (!('centerInsufficientSlides' in options)) options.centerInsufficientSlides = true;
    if (!options.speed) options.speed = 1000;
    options.roundLengths = true;
    if (isTouchScreen) options.direction = 'horizontal';
    if (slidesLength <= 1) {
      options.loop = false;
    }
    options.on = {
      init: function init(swiper) {
        updateClasses(swiper);
      },
      slideChange: function slideChange(swiper) {
        updateClasses(swiper);
      }
    };
    return options;
  };
  _functions.updateSwiperLock = function (swiper) {
    if (swiper.isLocked) {
      $(swiper.el).closest('.swiper-entry').addClass('swiper-controls-hide');
    } else {
      $(swiper.el).closest('.swiper-entry').removeClass('swiper-controls-hide');
    }
  };
  // Init each Swiper
  _functions.initSwiper = function ($el) {
    var options = _functions.getSwOptions($el);
    var swiper = new Swiper($el[0], options);
    if (options.destroy) {
      var breakpoint = window.matchMedia(options.destroy);
      var breakpointChecker = function breakpointChecker() {
        if (breakpoint.matches === true) {
          if (swiper !== undefined) {
            swiper.el.classList.add('swiper-destroyed');
            swiper.destroy(true, true);
          }
          return;
        } else if (breakpoint.matches === false && swiper.destroyed) {
          new Swiper($el[0], options), _readOnlyError("swiper");
          swiper.el.classList.remove('swiper-destroyed');
          _functions.updateSwiperLock(swiper);
        }
      };
      breakpointChecker();
      breakpoint.addEventListener('change', breakpointChecker);
    }
    _functions.updateSwiperLock(swiper);
    swiper.on('resize', function () {
      _functions.updateSwiperLock(swiper);
    });
    $(document).trigger('swiperInit');
  };
  $('.swiper-entry .swiper-container').each(function () {
    var thisSlider = $(this);
    _functions.initSwiper(thisSlider);
  });

  // thumbs Swiper
  $('.swiper-thumbs').each(function () {
    if ($('.swiper-thumbs-top').length && $('.swiper-thumbs-bottom').length) {
      var t = $(this);
      var top = t.find('.swiper-thumbs-top>.swiper-container')[0].swiper,
        bottom = t.find('.swiper-thumbs-bottom>.swiper-container')[0].swiper;
      top.thumbs.swiper = bottom;
      top.thumbs.init();
      top.thumbs.update();
      if (top.slides.length < 2) {
        t.addClass('hide-bottom');
      }
    }
  });
});
/******/ })()
;
//# sourceMappingURL=swiper.js.map