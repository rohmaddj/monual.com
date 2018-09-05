/*
 Copyright 2011-2016 Adobe Systems Incorporated. All Rights Reserved.
*/
(function() {
    if (!window.museConfigLoadedAndExecuted) {
        window.museConfigLoadedAndExecuted = !0;
        var d = {
            waitSeconds: 0,
            paths: {
                "html5shiv": html5shiv,
                "jquery": jquery,
                musemenu: musemenu2,
                museoverlay: museoverlay2,
                musepolyfill: musepolyfill2,
                museresponsive: museresponsive2,
                scrolleffects: scrolleffects2,
                watch: watch2,
                "musedisclosure": musedisclosure,
                "museutils": museutils,
                "musewpdisclosure": musedisclosure,
                "musewpslideshow": musewpslideshow,
                "pie": pie,
                "taketori": taketori,
                "touchswipe": touchswipe,
                "webpro": webpro,
                "whatinput": whatinput
            },
            map: {
                "*": {
                    jquery: "jquery-private"
                },
                "jquery-private": {
                    jquery: "jquery"
                }
            }
        };
        require.undef("jquery");
        define("jquery-private", ["jquery"], function(b) {
            b = b.noConflict(!0);
            if ("undefined" === typeof $) window.$ = window.jQuery = b;
            return b
        });
        if (true && document.location.protocol != "https:") d.paths.jquery = ["http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min", d.paths.jquery];
        requirejs.config(d);
        muse_init()
    }
})();
(function() {
    if (!("undefined" == typeof Muse || "undefined" == typeof Muse.assets)) {
        var a = function(a, b) {
            for (var c = 0, d = a.length; c < d; c++)
                if (a[c] == b) return c;
            return -1
        }(Muse.assets.required, "http://localhost/monual/public/monual/scripts/museconfig.js");
        if (-1 != a) {
            Muse.assets.required.splice(a, 1);
            for (var a = document.getElementsByTagName("meta"), b = 0, c = a.length; b < c; b++) {
                var d = a[b];
                if ("generator" == d.getAttribute("name")) {
                    "2018.0.0.379" != d.getAttribute("content") && Muse.assets.outOfDate.push("http://localhost/monual/public/monual/scripts/museconfig.js");
                    break
                }
            }
        }
    }
})();
