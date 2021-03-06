!function(t) {
    t.fn.timeDropper = function(e, d) {
        return t(this).each(function() {
            var d, o = t(this), n = !1, a = !1, i = function(t) {
                return t < 10 ? "0" + t : t
            }, r = t(".td-clock").length, s = null, l = t.extend({
                format: "HH:mm",
                autoswitch: !1,
                meridians: !1,
                mousewheel: !1,
                setCurrentTime: !1,
                init_animation: "fadein",
                primaryColor: "#E95420",
                borderColor: "#E95420",
                backgroundColor: "#FFF",
                textColor: "#555"
            }, e);
            o.prop({
                readonly: !0
            }).addClass("td-input"),
            t("body").append('<div class="td-wrap td-n2" id="td-clock-' + r + '"><div class="td-overlay"></div><div class="td-clock td-init"><div class="td-deg td-n"><div class="td-select"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 35.4" enable-background="new 0 0 100 35.4" xml:space="preserve"><g><path fill="none" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M98.1,33C85.4,21.5,68.5,14.5,50,14.5S14.6,21.5,1.9,33"/><line fill="none" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1.9" y1="33" x2="1.9" y2="28.6"/><line fill="none" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1.9" y1="33" x2="6.3" y2="33"/><line fill="none" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="98.1" y1="33" x2="93.7" y2="33"/><line fill="none" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="98.1" y1="33" x2="98.1" y2="28.6"/></g></svg></div></div><div class="td-medirian"><span class="td-icon-am td-n">AM</span><span class="td-icon-pm td-n">PM</span></div><div class="td-lancette"><div></div><div></div></div><div class="td-time"><span class="on"></span>:<span></span></div></div></div>'),
            t("head").append("<style>#td-clock-" + r + " .td-clock {color:" + l.textColor + ";background: " + l.backgroundColor + "; box-shadow: 0 0 0 1px " + l.borderColor + ",0 0 0 8px rgba(0, 0, 0, 0.05); } #td-clock-" + r + " .td-clock .td-time span.on { color:" + l.primaryColor + "} #td-clock-" + r + " .td-clock:before { border-color: " + l.borderColor + "} #td-clock-" + r + " .td-select:after { box-shadow: 0 0 0 1px " + l.borderColor + " } #td-clock-" + r + " .td-clock:before,#td-clock-" + r + " .td-select:after {background: " + l.backgroundColor + ";} #td-clock-" + r + " .td-lancette {border: 2px solid " + l.primaryColor + "; opacity:0.1}#td-clock-" + r + " .td-lancette div:after { background: " + l.primaryColor + ";} #td-clock-" + r + " .td-bulletpoint div:after { background:" + l.primaryColor + "; opacity:0.1}</style>");
            var c = t("#td-clock-" + r)
              , u = c.find(".td-overlay")
              , f = c.find(".td-clock");
            f.find("svg").attr("style", "stroke:" + l.borderColor);
            var p = -1
              , m = 0
              , v = 0
              , h = function() {
                var t = f.find(".td-time span.on")
                  , e = parseInt(t.attr("data-id"));
                0 == t.index() ? deg = Math.round(360 * e / 23) : deg = Math.round(360 * e / 59),
                p = -1,
                m = deg,
                v = deg
            }
              , g = function(t) {
                var e = f.find(".td-time span.on")
                  , d = e.attr("data-id");
                d || (d = 0);
                var n = Math.round(23 * t / 360)
                  , a = Math.round(59 * t / 360);
                if (0 == e.index() ? (e.attr("data-id", i(n)),
                l.meridians && (n >= 12 && n < 24 ? (f.find(".td-icon-pm").addClass("td-on"),
                f.find(".td-icon-am").removeClass("td-on")) : (f.find(".td-icon-am").addClass("td-on"),
                f.find(".td-icon-pm").removeClass("td-on")),
                n > 12 && (n -= 12),
                0 == n && (n = 12)),
                e.text(i(n))) : e.attr("data-id", i(a)).text(i(a)),
                v = t,
                f.find(".td-deg").css("transform", "rotate(" + t + "deg)"),
                0 == e.index()) {
                    var r = Math.round(360 * n / 12);
                    f.find(".td-lancette div:last").css("transform", "rotate(" + r + "deg)")
                } else
                    f.find(".td-lancette div:first").css("transform", "rotate(" + t + "deg)");
                var s = f.find(".td-time span:first").attr("data-id")
                  , c = f.find(".td-time span:last").attr("data-id");
                if (Math.round(s) >= 12 && Math.round(s) < 24)
                    var n = Math.round(s) - 12
                      , u = "pm"
                      , p = "PM";
                else
                    var n = Math.round(s)
                      , u = "am"
                      , p = "AM";
                0 == n && (n = 12);
                var m = l.format.replace(/\b(H)\b/g, Math.round(s)).replace(/\b(h)\b/g, Math.round(n)).replace(/\b(m)\b/g, Math.round(c)).replace(/\b(HH)\b/g, i(Math.round(s))).replace(/\b(hh)\b/g, i(Math.round(n))).replace(/\b(mm)\b/g, i(Math.round(c))).replace(/\b(a)\b/g, u).replace(/\b(A)\b/g, p);
                o.val(m)
            };
            /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && (a = !0),
            f.find(".td-time span").on("click", function(e) {
                var d = t(this);
                f.find(".td-time span").removeClass("on"),
                d.addClass("on");
                var o = parseInt(d.attr("data-id"));
                0 == d.index() ? deg = Math.round(360 * o / 23) : deg = Math.round(360 * o / 59),
                p = -1,
                m = deg,
                v = deg,
                g(deg)
            }),
            f.find(".td-deg").on("touchstart mousedown", function(e) {
                h(),
                e.preventDefault(),
                clearInterval(d),
                f.find(".td-deg").removeClass("td-n"),
                f.find(".td-select").removeClass("td-rubber"),
                n = !0;
                var o, i, r, s, l = f.offset(), c = {
                    y: l.top + f.height() / 2,
                    x: l.left + f.width() / 2
                }, u = 180 / Math.PI;
                f.removeClass("td-rubber"),
                t(window).on("touchmove mousemove", function(t) {
                    1 == n && (a ? move = t.originalEvent.touches[0] : move = t,
                    o = c.y - move.pageY,
                    i = c.x - move.pageX,
                    r = Math.atan2(o, i) * u,
                    r < 0 && (r = 360 + r),
                    p == -1 && (p = r),
                    s = Math.floor(r - p + m),
                    s < 0 ? s = 360 + s : s > 360 && (s %= 360),
                    g(s))
                })
            }),
            l.mousewheel && f.on("mousewheel", function(t) {
                t.preventDefault(),
                f.find(".td-deg").removeClass("td-n"),
                t.originalEvent.wheelDelta > 0 ? v <= 360 && (t.originalEvent.wheelDelta <= 120 ? v++ : t.originalEvent.wheelDelta > 120 && (v += 20),
                v > 360 && (v = 0)) : v >= 0 && (t.originalEvent.wheelDelta >= -120 ? v-- : t.originalEvent.wheelDelta < -120 && (v -= 20),
                v < 0 && (v = 360)),
                p = -1,
                m = v,
                g(v)
            }),
            t(document).on("touchend mouseup", function() {
                n && (n = !1,
                l.autoswitch && (f.find(".td-time span").toggleClass("on"),
                f.find(".td-time span.on").click()),
                f.find(".td-deg").addClass("td-n"),
                f.find(".td-select").addClass("td-rubber"))
            });
            var k = function(t) {
                var e, d, n = new Date, a = f.find(".td-time span:first"), r = f.find(".td-time span:last");
                if (o.val().length && !l.setCurrentTime) {
                    var s, c = /\d+/g, u = o.val().split(":");
                    u ? (e = u[0].match(c),
                    d = u[1].match(c),
                    o.val().indexOf("am") != -1 || o.val().indexOf("AM") != -1 || o.val().indexOf("pm") != -1 || o.val().indexOf("PM") != -1 ? (s = o.val().indexOf("am") != -1 || o.val().indexOf("AM") != -1,
                    s ? 12 == e && (e = 0) : e < 13 && (e = parseInt(e) + 12,
                    24 == e && (e = 0))) : 24 == e && (e = 0)) : (e = i(parseInt(a.text()) ? a.text() : n.getHours()),
                    d = i(parseInt(r.text()) ? r.text() : n.getMinutes()))
                } else
                    e = i(parseInt(a.text()) ? a.text() : n.getHours()),
                    d = i(parseInt(r.text()) ? r.text() : n.getMinutes());
                a.attr("data-id", e).text(e),
                r.attr("data-id", d).text(d),
                m = Math.round(360 * e / 23),
                f.find(".td-lancette div:first").css("transform", "rotate(" + Math.round(360 * d / 59) + "deg)"),
                g(m),
                v = m,
                p = -1
            };
            k(),
            o.focus(function(t) {
                t.preventDefault(),
                o.blur()
            }),
            o.click(function(t) {
                clearInterval(s),
                c.removeClass("td-fadeout"),
                c.addClass("td-show").addClass("td-" + l.init_animation),
                f.css({
                    top: o.offset().top + (o.outerHeight() - 8),
                    left: o.offset().left + o.outerWidth() / 2 - f.outerWidth() / 2
                }),
                f.hasClass("td-init") && (d = setInterval(function() {
                    f.find(".td-select").addClass("td-alert"),
                    setTimeout(function() {
                        f.find(".td-select").removeClass("td-alert")
                    }, 1e3)
                }, 2e3),
                f.removeClass("td-init"))
            }),
            u.click(function() {
                c.addClass("td-fadeout").removeClass("td-" + l.init_animation),
                s = setTimeout(function() {
                    c.removeClass("td-show")
                }, 300)
            }),
            t(window).on("resize", function() {
                h(),
                f.css({
                    top: o.offset().top + (o.outerHeight() - 8),
                    left: o.offset().left + o.outerWidth() / 2 - f.outerWidth() / 2
                })
            })
        })
    }
}(jQuery),


Vue.component("example", require("./components/Example.vue"));
const app = new Vue({
    el: "#app"
});
