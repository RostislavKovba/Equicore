/******/ (function() { // webpackBootstrap
/*!**************************!*\
  !*** ./src/js/filter.js ***!
  \**************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator.return && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, catch: function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
/* eslint-disable */
/**
 * Posts Filter
 */
var Filter = /*#__PURE__*/function () {
  function Filter(block) {
    _classCallCheck(this, Filter);
    this.form = block.querySelector('.js-filters-form');
    this.autoSubmit = this.form.querySelector("input[name='auto_submit']");
    this.pagedInput = this.form.querySelector("input[name='paged']");
    this.taxonomiesInputs = this.form.querySelectorAll("input[name='taxonomies[]']");
    this.orderbySelect = block.querySelector("[name='orderby']");
    this.filterBtns = this.form.querySelectorAll('.js-filter-item input');
    this.allBtn = this.form.querySelector('.js-all-filter input');
    this.postWrap = block.querySelector('.js-posts-list');
    this.loadMoreWrap = block.querySelector('.js-load-more');
    this.preloaderWrap = block.querySelector('.js-preloader');
    this.preloader = '<div class="preloader"><div></div><div></div></div>';
    this.filterSidebar = block.querySelector('.js-filter');
    this.openFilterBtn = block.querySelector('.js-filter-open');
    this.closeFilterBtn = block.querySelector('.js-filter-close');
  }
  return _createClass(Filter, [{
    key: "initFilter",
    value: function initFilter() {
      var _this = this;
      console.log('filter init');
      this.showFilteredPosts();
      this.toggleFilterAllBtn();
      // this.initToggleFilterBtn();
      this.initSubmitFilterForm();
      this.form.addEventListener('submit', function (e) {
        _this.handleSubmit(e);
      });
    }
  }, {
    key: "ajaxRecieveData",
    value: function () {
      var _ajaxRecieveData = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee(action) {
        var formData, response, json;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              if (action) {
                _context.next = 2;
                break;
              }
              return _context.abrupt("return");
            case 2:
              formData = new FormData(this.form);
              formData.append('action', action);
              _context.next = 6;
              return fetch(var_from_php.ajax_url, {
                method: 'POST',
                body: formData
              });
            case 6:
              response = _context.sent;
              _context.next = 9;
              return response.json();
            case 9:
              json = _context.sent;
              return _context.abrupt("return", json);
            case 11:
            case "end":
              return _context.stop();
          }
        }, _callee, this);
      }));
      function ajaxRecieveData(_x) {
        return _ajaxRecieveData.apply(this, arguments);
      }
      return ajaxRecieveData;
    }()
  }, {
    key: "showFilteredPosts",
    value: function () {
      var _showFilteredPosts = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee2() {
        var loadmore,
          json,
          event,
          _args2 = arguments;
        return _regeneratorRuntime().wrap(function _callee2$(_context2) {
          while (1) switch (_context2.prev = _context2.next) {
            case 0:
              loadmore = _args2.length > 0 && _args2[0] !== undefined ? _args2[0] : false;
              _context2.prev = 1;
              // console.log('postFiltering');

              this.hideLoadMoreBtn();
              this.preloaderLoading('start', loadmore);
              _context2.next = 6;
              return this.ajaxRecieveData('filtering');
            case 6:
              json = _context2.sent;
              this.preloaderLoading('end', loadmore);

              // Output data
              if (!loadmore) {
                this.postWrap.innerHTML = json.html;
              } else {
                this.postWrap.insertAdjacentHTML('beforeend', json.html);
              }

              // this.addParamsToUrl();
              this.showLoadMoreBtn();
              event = new Event('customFilterUpdated');
              document.dispatchEvent(event);
              _context2.next = 17;
              break;
            case 14:
              _context2.prev = 14;
              _context2.t0 = _context2["catch"](1);
              console.error('Failed filtering posts:', _context2.t0);
            case 17:
            case "end":
              return _context2.stop();
          }
        }, _callee2, this, [[1, 14]]);
      }));
      function showFilteredPosts() {
        return _showFilteredPosts.apply(this, arguments);
      }
      return showFilteredPosts;
    }()
  }, {
    key: "showLoadMoreBtn",
    value: function () {
      var _showLoadMoreBtn = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee3() {
        var _this2 = this;
        var json, loadMoreBtn;
        return _regeneratorRuntime().wrap(function _callee3$(_context3) {
          while (1) switch (_context3.prev = _context3.next) {
            case 0:
              _context3.prev = 0;
              _context3.next = 3;
              return this.ajaxRecieveData('load_more');
            case 3:
              json = _context3.sent;
              this.loadMoreWrap.innerHTML = json.html;
              loadMoreBtn = this.loadMoreWrap.querySelector('.load-more__btn');
              if (loadMoreBtn) {
                _context3.next = 8;
                break;
              }
              return _context3.abrupt("return");
            case 8:
              loadMoreBtn.addEventListener('click', function () {
                _this2.loadMorePosts();
              });
              _context3.next = 14;
              break;
            case 11:
              _context3.prev = 11;
              _context3.t0 = _context3["catch"](0);
              console.error('Failed to show load-more button:', _context3.t0);
            case 14:
            case "end":
              return _context3.stop();
          }
        }, _callee3, this, [[0, 11]]);
      }));
      function showLoadMoreBtn() {
        return _showLoadMoreBtn.apply(this, arguments);
      }
      return showLoadMoreBtn;
    }()
  }, {
    key: "loadMorePosts",
    value: function () {
      var _loadMorePosts = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee4() {
        return _regeneratorRuntime().wrap(function _callee4$(_context4) {
          while (1) switch (_context4.prev = _context4.next) {
            case 0:
              // console.log('loading more posts');
              // Increment page
              this.pagedInput.value++;
              _context4.prev = 1;
              this.hideLoadMoreBtn();
              _context4.next = 5;
              return this.showFilteredPosts(true);
            case 5:
              _context4.next = 10;
              break;
            case 7:
              _context4.prev = 7;
              _context4.t0 = _context4["catch"](1);
              console.error('Failed loading more posts:', _context4.t0);
            case 10:
            case "end":
              return _context4.stop();
          }
        }, _callee4, this, [[1, 7]]);
      }));
      function loadMorePosts() {
        return _loadMorePosts.apply(this, arguments);
      }
      return loadMorePosts;
    }()
  }, {
    key: "hideLoadMoreBtn",
    value: function hideLoadMoreBtn() {
      var loadMoreBtn = this.loadMoreWrap.querySelector('.load-more__btn');
      if (!loadMoreBtn) return;
      loadMoreBtn.classList.add('d-none');
    }
  }, {
    key: "preloaderLoading",
    value: function preloaderLoading(position, loadmore) {
      this.hideLoadMoreBtn();
      if (position == 'start') {
        !loadmore ? this.postWrap.innerHTML = this.preloader : this.postWrap.insertAdjacentHTML('beforeend', this.preloader);
      }
      if (position == 'end') {
        var _this$postWrap$queryS;
        (_this$postWrap$queryS = this.postWrap.querySelector('.preloader')) === null || _this$postWrap$queryS === void 0 || _this$postWrap$queryS.remove();
      }
    }
  }, {
    key: "addParamsToUrl",
    value: function addParamsToUrl() {
      var _this3 = this;
      var searchData = {};
      // Get taxonomies names from hidden inputs
      var taxonomies = Array.from(this.taxonomiesInputs).map(function (taxonomyInput) {
        return taxonomyInput.value;
      });
      taxonomies.forEach(function (taxonomy) {
        var taxonomyField = _this3.form.querySelector("[name='".concat(taxonomy, "[]']"));
        var terms = taxonomyField.value;
        if (taxonomyField.tagName == 'INPUT') {
          var activeFilters = _this3.form.querySelectorAll("[name='".concat(taxonomy, "[]']:checked"));
          // Get active filters to array and joins them to string
          terms = Array.from(activeFilters).map(function (input) {
            return input.value;
          }).join(',');
        }
        if (!terms || terms == 'all') return;
        searchData[taxonomy] = terms;
      });
      if (this.orderbySelect) {
        var _this$orderbySelect;
        searchData['order'] = (_this$orderbySelect = this.orderbySelect) === null || _this$orderbySelect === void 0 ? void 0 : _this$orderbySelect.value;
      }
      var searchParams = new URLSearchParams(searchData);
      window.history.replaceState('', '', searchParams.size ? "?".concat(searchParams.toString()) : window.location.pathname);
    }
  }, {
    key: "toggleFilterAllBtn",
    value: function toggleFilterAllBtn() {
      var _this4 = this;
      if (!this.allBtn) return;
      // Clicking on "All" filter button unchecked all other filters
      this.allBtn.addEventListener('click', function (e) {
        if (!e.target.checked) {
          e.preventDefault();
          return;
        }
        _this4.filterBtns.forEach(function (filter) {
          return filter.checked = false;
        });
      });
      // Clicking on any other than "All" filter button toggled "All" filter item
      this.filterBtns.forEach(function (filter) {
        var hasChecked = false;
        filter.addEventListener('click', function () {
          _this4.allBtn.checked = !_this4.hasCheckedFilters();
        });
      });
    }
  }, {
    key: "hasCheckedFilters",
    value: function hasCheckedFilters() {
      var hasChecked = false;
      this.filterBtns.forEach(function (filter) {
        if (filter.checked == true) {
          hasChecked = true;
          return;
        }
      });
      return hasChecked;
    }
  }, {
    key: "handleSubmit",
    value: function handleSubmit(e) {
      e.preventDefault();
      this.pagedInput.value = 1;
      this.showFilteredPosts();
    }
  }, {
    key: "initSubmitFilterForm",
    value: function initSubmitFilterForm() {
      var _this$orderbySelect2,
        _this5 = this,
        _this$form;
      (_this$orderbySelect2 = this.orderbySelect) === null || _this$orderbySelect2 === void 0 || _this$orderbySelect2.addEventListener('change', function () {
        _this5.form.dispatchEvent(new Event('submit', {}));
      });
      if (!this.autoSubmit) return;
      (_this$form = this.form) === null || _this$form === void 0 || _this$form.addEventListener('change', function () {
        _this5.form.dispatchEvent(new Event('submit', {}));
      });
    }
  }, {
    key: "initToggleFilterBtn",
    value: function initToggleFilterBtn() {
      var _this$openFilterBtn,
        _this6 = this,
        _this$closeFilterBtn;
      // if (window.innerWidth >= 768) return;

      (_this$openFilterBtn = this.openFilterBtn) === null || _this$openFilterBtn === void 0 || _this$openFilterBtn.addEventListener('click', function () {
        _this6.filterSidebar.classList.add('opened');
        document.body.classList.add('popup-opened');
      });
      (_this$closeFilterBtn = this.closeFilterBtn) === null || _this$closeFilterBtn === void 0 || _this$closeFilterBtn.addEventListener('click', function () {
        _this6.filterSidebar.classList.remove('opened');
        document.body.classList.remove('popup-opened');
      });
    }
  }]);
}();
var block = document.querySelector('.block-events');
if (block) {
  var filter = new Filter(block);
  filter.initFilter();
}
/******/ })()
;
//# sourceMappingURL=filter.js.map