/* 
 * Configuración de las librerias por defecto y las
 * Librerias personalizdas del módulo iniciado utilizando la
 * Cargar de RequireJS
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 */

var Builder = Builder || {};
var UModule = Request.UrlHash.m.toLocaleLowerCase();
var UController = Request.UrlHash.c.toLocaleLowerCase();
var UAction = Request.UrlHash.a.toLocaleLowerCase();
var _core = 1;
var Global = {
    const: {
        js: "js",
        css: "css",
        M: "module",
        C: "controllers",
        A: "actions",
        path: "_PATH_",
        package: "_PACKAGE_",
        theme: "_THEME_",
        cdn: "_CDN_"
    },
    require: {paths: {}, deps: [], shim: {}},
    rand: function (prefijo) {
        var prefijo = prefijo || 'I';
        var valor = new Date().getTime();
        var rand = Math.floor((Math.random() * valor) + 1);
        return '_' + prefijo + rand.toString();
    },
    utils: {
        addChildrenCss: function (link, theme) {
            if (typeof theme !== "undefined" && theme) {
                var _obj = document.getElementsByTagName("head")[0].children;
                for (var i in _obj) {
                    if (_obj[i].className === "requirejs-css") {
                        document.getElementsByTagName("head")[0].insertBefore(link, document.getElementsByTagName("head")[0].children[i]);
                        break;
                    }
                }
            }else{
                document.getElementsByTagName("head")[0].appendChild(link);
            }
        },
        loadCss: function (url, theme) {
            var link = document.createElement("link");
            link.type = "text/css";
            link.rel = "stylesheet";
            link.href = url;
            this.addChildrenCss(link, theme);

        },
        addCss: function (obj) {
            if (obj.hasOwnProperty("libs")) {
                for (var l in obj.libs) {
                    if (this.isTheme(obj.libs[l])) {
                        Global.utils.loadCss(Request.themeUrl + '/css/' + this.getTheme(obj.libs[l], true) + '.css');
                    } else if (this.isCDN(obj.libs[l])) {
                        Global.utils.loadCss(this.getCDN(obj.libs[l]));
                    } else {
                        Global.utils.loadCss(Request.BaseUrl + '/resource/libs/' + obj.libs[l] + '.css', true);
                    }
                }
            }
            if (obj.hasOwnProperty("custom")) {
                for (var c in obj.custom) {
                    Global.utils.loadCss(Request.BaseUrl + '/resource/packages/' + UModule + '/' + obj.custom[c] + '.min.css');
                }
            }
            if (obj.hasOwnProperty("package")) {
                for (var c in obj.package) {
                    Global.utils.loadCss(Request.BaseUrl + '/resource/packages/' + obj.package[c] + '.min.css');
                }
            }
        },
        addPackage: function (js, module) {
            var package = (typeof module == "undefined") ? UModule : module;
            return "packages/" + package + "/" + js + ".min";
        },
        addLib: function (JS) {
            var namePath = Global.rand();
            Global.require.paths[namePath] = Global.utils.addPackage(JS);
            if (Global.require.deps.length == 0) {
                Global.require.shim[namePath] = {deps: ['system', Global.utils.getDeps(namePath)]};
            } else {
                Global.require.shim[namePath] = {deps: [Global.utils.getDeps(namePath)]};
            }
            _core++;
        },
        isTheme: function (lib) {
            if (lib.indexOf(Global.const.theme) != -1) {
                return true;
            }
            return false;
        },
        isCDN: function (lib) {
            if (lib.indexOf(Global.const.cdn) != -1) {
                return true;
            }
            return false;
        },
        isPath: function (lib) {
            if (lib.indexOf(Global.const.path) != -1) {
                Global.utils.getPath(lib);
                return true;
            }
            return false;
        },
        isPackage: function (lib) {
            if (lib.indexOf(Global.const.package) != -1) {
                Global.utils.getPackage(lib);
                return true;
            }
            return false;
        },
        getDeps: function (namePath) {
            var index = Global.require.deps.length - 1;
            var end = Global.require.deps[index];
            Global.require.deps.push(namePath);
            return end;
        },
        getCDN: function (lib) {
            var path = lib.split("_CDN_:");
            return path[1];
        },
        getTheme: function (lib, css) {
            var css = css || false
            var path = lib.split("_THEME_:");
            if (css) {
                return path[1];
            } else {
                var namePath = Global.rand("T");
                Global.require.paths[namePath] = Request.BaseUrl + '/themes/metronic/assets/' + path[1];

                if (Global.require.deps.length == 0) {
                    Global.require.shim[namePath] = {deps: ['system', Global.utils.getDeps(namePath)]};
                } else {
                    Global.require.shim[namePath] = {deps: [Global.utils.getDeps(namePath)]};
                }
                _core++;
            }
        },
        getPackage: function (lib) {
            var path = lib.split(":");
            var namePath = Global.rand();
            Global.require.paths[namePath] = Global.utils.addPackage(path[2], path[1]);
            Global.require.shim[namePath] = {deps: [Global.utils.getDeps(namePath)]};
            _core++;
        },
        getPath: function (lib) {
            var path = lib.split("_PATH_:");
            if (app.requireConfig.deps.indexOf(path[1]) != -1) {
                console.error("RequireJS Error: Estás tratando de cargar más de una vez el PATH: " + path[1]);
            } else {
//                app.requireConfig.deps.push(path[1]);
                app.requireConfig.shim.system.deps.push(path[1]);
            }
        },
        JSONconcat: function jsonConcat(o1, o2) {
            for (var key in o2) {
                o1[key] = o2[key];
            }
            return o1;
        },
        toObject: function (arr) {
            var rv = {};
            for (var i = 0; i < arr.length; ++i)
                rv[i] = arr[i];
            return rv;
        }
    }
};

var _SET = function (obj) {
    if (obj.hasOwnProperty(Global.const.js)) {
        var JS = obj.js;
        for (var lib in JS) {
            if (typeof JS[lib] == "object") {
                for (var deps in JS[lib]) {
                    if (Array.isArray(JS[lib][deps])) {
                        for (var dep in JS[lib][deps]) {
                            if (!Global.utils.isPath(JS[lib][deps][dep]) && !Global.utils.isPackage(JS[lib][deps][dep])) {
                                if (Global.utils.isTheme(JS[lib][deps][dep])) {
                                    Global.utils.getTheme(JS[lib][deps][dep]);
                                } else {
                                    Global.utils.addLib(JS[lib][deps][dep]);
                                }
                            }

                        }
                        Global.utils.addLib(deps);
                    }
                }
            } else {
                if (!Global.utils.isPath(JS[lib]) && !Global.utils.isPackage(JS[lib])) {
                    if (Global.utils.isTheme(JS[lib])) {
                        Global.utils.getTheme(JS[lib]);
                    } else {
                        Global.utils.addLib(JS[lib]);
                    }
                }
            }
        }
    }
    if (obj.hasOwnProperty(Global.const.css)) {
        Global.utils.addCss(obj.css);
    }
};

var _GET = function () {
    if (Global.require.deps.length != 0) {
        app.requireConfig.deps.push(Global.require.deps[Global.require.deps.length - 1]);
    }

    Global.utils.JSONconcat(app.requireConfig.paths, Global.require.paths);
    Global.utils.JSONconcat(app.requireConfig.shim, Global.require.shim);

};

if (Builder.hasOwnProperty(Global.const.M)) {
    var Module = Builder.module;
    _SET(Module);
    if (Module.hasOwnProperty(Global.const.C)) {
        var Controllers = Module.controllers;
        if (Controllers.hasOwnProperty(UController)) {
            var CController = Controllers[UController];
            _SET(CController);
            if (CController.hasOwnProperty(Global.const.A)) {
                var Actions = CController.actions;
                if (Actions.hasOwnProperty(UAction)) {
                    var CAction = Actions[UAction];
                    _SET(CAction);
                }
            }
        }
    }
    _GET();
}

requirejs.config(app.requireConfig);