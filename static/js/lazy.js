var lazy = function (a, b) {
    b = b || function () {
    };
    var c = a.length, d = c, e = document.getElementsByTagName("head")[0], f = function () {
        --c || b()
    };
    while (d-- > 0) {
        if (a[d].indexOf("js") != -1) {
            var g = document.createElement("script");
            g.src = a[d];
            g.async = true;
            g.onload = f;
            g.onreadystatechange = function () {
                var a = g.readystate;
                if (a == "loaded" || a == "complete")f()
            }
        } else {
            c--;
            var g = document.createElement("link");
            g.rel = "stylesheet";
            g.type = "text/css";
            g.href = a[d]
        }
        e.appendChild(g)
    }
};
