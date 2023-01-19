<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <title>{{ $title }}</title>

        <link
            href="{{ asset('assets') }}/vendors/bootstrap/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />

        <link
            href="{{ asset('assets') }}/vendors/font-awesome/css/font-awesome.min.css"
            rel="stylesheet"
        />

        <link href="{{ asset('assets') }}/vendors/nprogress/nprogress.css" rel="stylesheet" />

        <link href="{{ asset('assets') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet" />

        <link
            href="{{ asset('assets') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
            rel="stylesheet"
        />

        <link href="{{ asset('assets') }}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />

        <link
            href="{{ asset('assets') }}/vendors/bootstrap-daterangepicker/daterangepicker.css"
            rel="stylesheet"
        />

        {{-- data table --}}
        <link href="{{ asset('assets') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('assets') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('assets') }}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('assets') }}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('assets') }}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('assets') }}/build/css/custom.min.css" rel="stylesheet" />
        <meta name="robots" content="index, nofollow" />
        <script nonce="7bc64854-f5e3-4c93-a436-42d0e0df0e40">
            (function (w, d) {
                !(function (a, e, t, r) {
                    (a.zarazData = a.zarazData || {}),
                        (a.zarazData.executed = []),
                        (a.zaraz = { deferred: [] }),
                        (a.zaraz.q = []),
                        (a.zaraz._f = function (e) {
                            return function () {
                                var t = Array.prototype.slice.call(arguments);
                                a.zaraz.q.push({ m: e, a: t });
                            };
                        });
                    for (const e of ["track", "set", "ecommerce", "debug"])
                        a.zaraz[e] = a.zaraz._f(e);
                    (a.zaraz.init = () => {
                        var t = e.getElementsByTagName(r)[0],
                            z = e.createElement(r),
                            n = e.getElementsByTagName("title")[0];
                        for (
                            n &&
                                (a.zarazData.t =
                                    e.getElementsByTagName("title")[0].text),
                                a.zarazData.x = Math.random(),
                                a.zarazData.w = a.screen.width,
                                a.zarazData.h = a.screen.height,
                                a.zarazData.j = a.innerHeight,
                                a.zarazData.e = a.innerWidth,
                                a.zarazData.l = a.location.href,
                                a.zarazData.r = e.referrer,
                                a.zarazData.k = a.screen.colorDepth,
                                a.zarazData.n = e.characterSet,
                                a.zarazData.o = new Date().getTimezoneOffset(),
                                a.zarazData.q = [];
                            a.zaraz.q.length;

                        ) {
                            const e = a.zaraz.q.shift();
                            a.zarazData.q.push(e);
                        }
                        z.defer = !0;
                        for (const e of [localStorage, sessionStorage])
                            Object.keys(e || {})
                                .filter((a) => a.startsWith("_zaraz_"))
                                .forEach((t) => {
                                    try {
                                        a.zarazData["z_" + t.slice(7)] =
                                            JSON.parse(e.getItem(t));
                                    } catch {
                                        a.zarazData["z_" + t.slice(7)] =
                                            e.getItem(t);
                                    }
                                });
                        (z.referrerPolicy = "origin"),
                            (z.src =
                                "/cdn-cgi/zaraz/s.js?z=" +
                                btoa(
                                    encodeURIComponent(
                                        JSON.stringify(a.zarazData)
                                    )
                                )),
                            t.parentNode.insertBefore(z, t);
                    }),
                        ["complete", "interactive"].includes(e.readyState)
                            ? zaraz.init()
                            : a.addEventListener(
                                  "DOMContentLoaded",
                                  zaraz.init
                              );
                })(w, d, 0, "script");
            })(window, document);
        </script>
    </head>
    <body class="nav-md">