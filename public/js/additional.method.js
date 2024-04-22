/*! jQuery Validation Plugin - v1.19.5 - 7/1/2022
 * https://jqueryvalidation.org/
 * Copyright (c) 2022 Jörn Zaefferer; Licensed MIT */
!(function (a) {
    "function" == typeof define && define.amd
        ? define(["jquery", "./jquery.validate.min"], a)
        : "object" == typeof module && module.exports
        ? (module.exports = a(require("jquery")))
        : a(jQuery);
})(function (a) {
    return (
        (function () {
            function b(a) {
                return a
                    .replace(/<.[^<>]*?>/g, " ")
                    .replace(/&nbsp;|&#160;/gi, " ")
                    .replace(/[.(),;:!?%#$'\"_+=\/\-“”’]*/g, "");
            }
            a.validator.addMethod(
                "maxWords",
                function (a, c, d) {
                    return (
                        this.optional(c) || b(a).match(/\b\w+\b/g).length <= d
                    );
                },
                a.validator.format("Please enter {0} words or less.")
            ),
                a.validator.addMethod(
                    "minWords",
                    function (a, c, d) {
                        return (
                            this.optional(c) ||
                            b(a).match(/\b\w+\b/g).length >= d
                        );
                    },
                    a.validator.format("Please enter at least {0} words.")
                ),
                a.validator.addMethod(
                    "rangeWords",
                    function (a, c, d) {
                        var e = b(a),
                            f = /\b\w+\b/g;
                        return (
                            this.optional(c) ||
                            (e.match(f).length >= d[0] &&
                                e.match(f).length <= d[1])
                        );
                    },
                    a.validator.format(
                        "Please enter between {0} and {1} words."
                    )
                );
        })(),
        a.validator.addMethod(
            "abaRoutingNumber",
            function (a) {
                var b = 0,
                    c = a.split(""),
                    d = c.length;
                if (9 !== d) return !1;
                for (var e = 0; e < d; e += 3)
                    b +=
                        3 * parseInt(c[e], 10) +
                        7 * parseInt(c[e + 1], 10) +
                        parseInt(c[e + 2], 10);
                return 0 !== b && b % 10 === 0;
            },
            "Please enter a valid routing number."
        ),
        a.validator.addMethod(
            "accept",
            function (b, c, d) {
                var e,
                    f,
                    g,
                    h = "string" == typeof d ? d.replace(/\s/g, "") : "image/*",
                    i = this.optional(c);
                if (i) return i;
                if (
                    "file" === a(c).attr("type") &&
                    ((h = h
                        .replace(/[\-\[\]\/\{\}\(\)\+\?\.\\\^\$\|]/g, "\\$&")
                        .replace(/,/g, "|")
                        .replace(/\/\*/g, "/.*")),
                    c.files && c.files.length)
                )
                    for (
                        g = new RegExp(".?(" + h + ")$", "i"), e = 0;
                        e < c.files.length;
                        e++
                    )
                        if (((f = c.files[e]), !f.type.match(g))) return !1;
                return !0;
            },
            a.validator.format("Please enter a value with a valid mimetype.")
        ),
        a.validator.addMethod(
            "alphanumeric",
            function (a, b) {
                return this.optional(b) || /^\w+$/i.test(a);
            },
            "Letters, numbers, and underscores only please."
        ),
        a.validator.addMethod(
            "bankaccountNL",
            function (a, b) {
                if (this.optional(b)) return !0;
                if (!/^[0-9]{9}|([0-9]{2} ){3}[0-9]{3}$/.test(a)) return !1;
                var c,
                    d,
                    e,
                    f = a.replace(/ /g, ""),
                    g = 0,
                    h = f.length;
                for (c = 0; c < h; c++)
                    (d = h - c), (e = f.substring(c, c + 1)), (g += d * e);
                return g % 11 === 0;
            },
            "Please specify a valid bank account number."
        ),
        a.validator.addMethod(
            "bankorgiroaccountNL",
            function (b, c) {
                return (
                    this.optional(c) ||
                    a.validator.methods.bankaccountNL.call(this, b, c) ||
                    a.validator.methods.giroaccountNL.call(this, b, c)
                );
            },
            "Please specify a valid bank or giro account number."
        ),
        a.validator.addMethod(
            "bic",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^([A-Z]{6}[A-Z2-9][A-NP-Z1-9])(X{3}|[A-WY-Z0-9][A-Z0-9]{2})?$/.test(
                        a.toUpperCase()
                    )
                );
            },
            "Please specify a valid BIC code."
        ),
        a.validator.addMethod(
            "cifES",
            function (a, b) {
                "use strict";
                function c(a) {
                    return a % 2 === 0;
                }
                if (this.optional(b)) return !0;
                var d,
                    e,
                    f,
                    g,
                    h = new RegExp(
                        /^([ABCDEFGHJKLMNPQRSUVW])(\d{7})([0-9A-J])$/gi
                    ),
                    i = a.substring(0, 1),
                    j = a.substring(1, 8),
                    k = a.substring(8, 9),
                    l = 0,
                    m = 0,
                    n = 0;
                if (9 !== a.length || !h.test(a)) return !1;
                for (d = 0; d < j.length; d++)
                    (e = parseInt(j[d], 10)),
                        c(d) ? ((e *= 2), (n += e < 10 ? e : e - 9)) : (m += e);
                return (
                    (l = m + n),
                    (f = (10 - l.toString().substr(-1)).toString()),
                    (f = parseInt(f, 10) > 9 ? "0" : f),
                    (g = "JABCDEFGHI".substr(f, 1).toString()),
                    i.match(/[ABEH]/)
                        ? k === f
                        : i.match(/[KPQS]/)
                        ? k === g
                        : k === f || k === g
                );
            },
            "Please specify a valid CIF number."
        ),
        a.validator.addMethod(
            "cnhBR",
            function (a) {
                if (
                    ((a = a.replace(
                        /([~!@#$%^&*()_+=`{}\[\]\-|\\:;'<>,.\/? ])+/g,
                        ""
                    )),
                    11 !== a.length)
                )
                    return !1;
                var b,
                    c,
                    d,
                    e,
                    f,
                    g,
                    h = 0,
                    i = 0;
                if (((b = a.charAt(0)), new Array(12).join(b) === a)) return !1;
                for (e = 0, f = 9, g = 0; e < 9; ++e, --f)
                    h += +(a.charAt(e) * f);
                for (
                    c = h % 11,
                        c >= 10 && ((c = 0), (i = 2)),
                        h = 0,
                        e = 0,
                        f = 1,
                        g = 0;
                    e < 9;
                    ++e, ++f
                )
                    h += +(a.charAt(e) * f);
                return (
                    (d = h % 11),
                    d >= 10 ? (d = 0) : (d -= i),
                    String(c).concat(d) === a.substr(-2)
                );
            },
            "Please specify a valid CNH number."
        ),
        a.validator.addMethod(
            "cnpjBR",
            function (a, b) {
                "use strict";
                if (this.optional(b)) return !0;
                if (((a = a.replace(/[^\d]+/g, "")), 14 !== a.length))
                    return !1;
                if (
                    "00000000000000" === a ||
                    "11111111111111" === a ||
                    "22222222222222" === a ||
                    "33333333333333" === a ||
                    "44444444444444" === a ||
                    "55555555555555" === a ||
                    "66666666666666" === a ||
                    "77777777777777" === a ||
                    "88888888888888" === a ||
                    "99999999999999" === a
                )
                    return !1;
                for (
                    var c = a.length - 2,
                        d = a.substring(0, c),
                        e = a.substring(c),
                        f = 0,
                        g = c - 7,
                        h = c;
                    h >= 1;
                    h--
                )
                    (f += d.charAt(c - h) * g--), g < 2 && (g = 9);
                var i = f % 11 < 2 ? 0 : 11 - (f % 11);
                if (i !== parseInt(e.charAt(0), 10)) return !1;
                (c += 1), (d = a.substring(0, c)), (f = 0), (g = c - 7);
                for (var j = c; j >= 1; j--)
                    (f += d.charAt(c - j) * g--), g < 2 && (g = 9);
                return (
                    (i = f % 11 < 2 ? 0 : 11 - (f % 11)),
                    i === parseInt(e.charAt(1), 10)
                );
            },
            "Please specify a CNPJ value number."
        ),
        a.validator.addMethod(
            "cpfBR",
            function (a, b) {
                "use strict";
                if (this.optional(b)) return !0;
                if (
                    ((a = a.replace(
                        /([~!@#$%^&*()_+=`{}\[\]\-|\\:;'<>,.\/? ])+/g,
                        ""
                    )),
                    11 !== a.length)
                )
                    return !1;
                var c,
                    d,
                    e,
                    f,
                    g = 0;
                if (
                    ((c = parseInt(a.substring(9, 10), 10)),
                    (d = parseInt(a.substring(10, 11), 10)),
                    (e = function (a, b) {
                        var c = (10 * a) % 11;
                        return (10 !== c && 11 !== c) || (c = 0), c === b;
                    }),
                    "" === a ||
                        "00000000000" === a ||
                        "11111111111" === a ||
                        "22222222222" === a ||
                        "33333333333" === a ||
                        "44444444444" === a ||
                        "55555555555" === a ||
                        "66666666666" === a ||
                        "77777777777" === a ||
                        "88888888888" === a ||
                        "99999999999" === a)
                )
                    return !1;
                for (f = 1; f <= 9; f++)
                    g += parseInt(a.substring(f - 1, f), 10) * (11 - f);
                if (e(g, c)) {
                    for (g = 0, f = 1; f <= 10; f++)
                        g += parseInt(a.substring(f - 1, f), 10) * (12 - f);
                    return e(g, d);
                }
                return !1;
            },
            "Please specify a valid CPF number."
        ),
        a.validator.addMethod(
            "creditcard",
            function (a, b) {
                if (this.optional(b)) return "dependency-mismatch";
                if (/[^0-9 \-]+/.test(a)) return !1;
                var c,
                    d,
                    e = 0,
                    f = 0,
                    g = !1;
                if (
                    ((a = a.replace(/\D/g, "")), a.length < 13 || a.length > 19)
                )
                    return !1;
                for (c = a.length - 1; c >= 0; c--)
                    (d = a.charAt(c)),
                        (f = parseInt(d, 10)),
                        g && (f *= 2) > 9 && (f -= 9),
                        (e += f),
                        (g = !g);
                return e % 10 === 0;
            },
            "Please enter a valid credit card number."
        ),
        a.validator.addMethod(
            "creditcardtypes",
            function (a, b, c) {
                if (/[^0-9\-]+/.test(a)) return !1;
                a = a.replace(/\D/g, "");
                var d = 0;
                return (
                    c.mastercard && (d |= 1),
                    c.visa && (d |= 2),
                    c.amex && (d |= 4),
                    c.dinersclub && (d |= 8),
                    c.enroute && (d |= 16),
                    c.discover && (d |= 32),
                    c.jcb && (d |= 64),
                    c.unknown && (d |= 128),
                    c.all && (d = 255),
                    1 & d && (/^(5[12345])/.test(a) || /^(2[234567])/.test(a))
                        ? 16 === a.length
                        : 2 & d && /^(4)/.test(a)
                        ? 16 === a.length
                        : 4 & d && /^(3[47])/.test(a)
                        ? 15 === a.length
                        : 8 & d && /^(3(0[012345]|[68]))/.test(a)
                        ? 14 === a.length
                        : 16 & d && /^(2(014|149))/.test(a)
                        ? 15 === a.length
                        : 32 & d && /^(6011)/.test(a)
                        ? 16 === a.length
                        : 64 & d && /^(3)/.test(a)
                        ? 16 === a.length
                        : 64 & d && /^(2131|1800)/.test(a)
                        ? 15 === a.length
                        : !!(128 & d)
                );
            },
            "Please enter a valid credit card number."
        ),
        a.validator.addMethod(
            "currency",
            function (a, b, c) {
                var d,
                    e = "string" == typeof c,
                    f = e ? c : c[0],
                    g = !!e || c[1];
                return (
                    (f = f.replace(/,/g, "")),
                    (f = g ? f + "]" : f + "]?"),
                    (d =
                        "^[" +
                        f +
                        "([1-9]{1}[0-9]{0,2}(\\,[0-9]{3})*(\\.[0-9]{0,2})?|[1-9]{1}[0-9]{0,}(\\.[0-9]{0,2})?|0(\\.[0-9]{0,2})?|(\\.[0-9]{1,2})?)$"),
                    (d = new RegExp(d)),
                    this.optional(b) || d.test(a)
                );
            },
            "Please specify a valid currency."
        ),
        a.validator.addMethod(
            "dateFA",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^[1-4]\d{3}\/((0?[1-6]\/((3[0-1])|([1-2][0-9])|(0?[1-9])))|((1[0-2]|(0?[7-9]))\/(30|([1-2][0-9])|(0?[1-9]))))$/.test(
                        a
                    )
                );
            },
            a.validator.messages.date
        ),
        a.validator.addMethod(
            "dateITA",
            function (a, b) {
                var c,
                    d,
                    e,
                    f,
                    g,
                    h = !1,
                    i = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
                return (
                    i.test(a)
                        ? ((c = a.split("/")),
                          (d = parseInt(c[0], 10)),
                          (e = parseInt(c[1], 10)),
                          (f = parseInt(c[2], 10)),
                          (g = new Date(Date.UTC(f, e - 1, d, 12, 0, 0, 0))),
                          (h =
                              g.getUTCFullYear() === f &&
                              g.getUTCMonth() === e - 1 &&
                              g.getUTCDate() === d))
                        : (h = !1),
                    this.optional(b) || h
                );
            },
            a.validator.messages.date
        ),
        a.validator.addMethod(
            "dateNL",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^(0?[1-9]|[12]\d|3[01])[\.\/\-](0?[1-9]|1[012])[\.\/\-]([12]\d)?(\d\d)$/.test(
                        a
                    )
                );
            },
            a.validator.messages.date
        ),
        a.validator.addMethod(
            "extension",
            function (a, b, c) {
                return (
                    (c =
                        "string" == typeof c
                            ? c.replace(/,/g, "|")
                            : "png|jpe?g|gif"),
                    this.optional(b) ||
                        a.match(new RegExp("\\.(" + c + ")$", "i"))
                );
            },
            a.validator.format("Please enter a value with a valid extension.")
        ),
        a.validator.addMethod(
            "giroaccountNL",
            function (a, b) {
                return this.optional(b) || /^[0-9]{1,7}$/.test(a);
            },
            "Please specify a valid giro account number."
        ),
        a.validator.addMethod(
            "greaterThan",
            function (b, c, d) {
                var e = a(d);
                return (
                    this.settings.onfocusout &&
                        e.not(".validate-greaterThan-blur").length &&
                        e
                            .addClass("validate-greaterThan-blur")
                            .on("blur.validate-greaterThan", function () {
                                a(c).valid();
                            }),
                    b > e.val()
                );
            },
            "Please enter a greater value."
        ),
        a.validator.addMethod(
            "greaterThanEqual",
            function (b, c, d) {
                var e = a(d);
                return (
                    this.settings.onfocusout &&
                        e.not(".validate-greaterThanEqual-blur").length &&
                        e
                            .addClass("validate-greaterThanEqual-blur")
                            .on("blur.validate-greaterThanEqual", function () {
                                a(c).valid();
                            }),
                    b >= e.val()
                );
            },
            "Please enter a greater value."
        ),
        a.validator.addMethod(
            "iban",
            function (a, b) {
                if (this.optional(b)) return !0;
                var c,
                    d,
                    e,
                    f,
                    g,
                    h,
                    i,
                    j,
                    k,
                    l = a.replace(/ /g, "").toUpperCase(),
                    m = "",
                    n = !0,
                    o = "",
                    p = "",
                    q = 5;
                if (l.length < q) return !1;
                if (
                    ((c = l.substring(0, 2)),
                    (h = {
                        AL: "\\d{8}[\\dA-Z]{16}",
                        AD: "\\d{8}[\\dA-Z]{12}",
                        AT: "\\d{16}",
                        AZ: "[\\dA-Z]{4}\\d{20}",
                        BE: "\\d{12}",
                        BH: "[A-Z]{4}[\\dA-Z]{14}",
                        BA: "\\d{16}",
                        BR: "\\d{23}[A-Z][\\dA-Z]",
                        BG: "[A-Z]{4}\\d{6}[\\dA-Z]{8}",
                        CR: "\\d{17}",
                        HR: "\\d{17}",
                        CY: "\\d{8}[\\dA-Z]{16}",
                        CZ: "\\d{20}",
                        DK: "\\d{14}",
                        DO: "[A-Z]{4}\\d{20}",
                        EE: "\\d{16}",
                        FO: "\\d{14}",
                        FI: "\\d{14}",
                        FR: "\\d{10}[\\dA-Z]{11}\\d{2}",
                        GE: "[\\dA-Z]{2}\\d{16}",
                        DE: "\\d{18}",
                        GI: "[A-Z]{4}[\\dA-Z]{15}",
                        GR: "\\d{7}[\\dA-Z]{16}",
                        GL: "\\d{14}",
                        GT: "[\\dA-Z]{4}[\\dA-Z]{20}",
                        HU: "\\d{24}",
                        IS: "\\d{22}",
                        IE: "[\\dA-Z]{4}\\d{14}",
                        IL: "\\d{19}",
                        IT: "[A-Z]\\d{10}[\\dA-Z]{12}",
                        KZ: "\\d{3}[\\dA-Z]{13}",
                        KW: "[A-Z]{4}[\\dA-Z]{22}",
                        LV: "[A-Z]{4}[\\dA-Z]{13}",
                        LB: "\\d{4}[\\dA-Z]{20}",
                        LI: "\\d{5}[\\dA-Z]{12}",
                        LT: "\\d{16}",
                        LU: "\\d{3}[\\dA-Z]{13}",
                        MK: "\\d{3}[\\dA-Z]{10}\\d{2}",
                        MT: "[A-Z]{4}\\d{5}[\\dA-Z]{18}",
                        MR: "\\d{23}",
                        MU: "[A-Z]{4}\\d{19}[A-Z]{3}",
                        MC: "\\d{10}[\\dA-Z]{11}\\d{2}",
                        MD: "[\\dA-Z]{2}\\d{18}",
                        ME: "\\d{18}",
                        NL: "[A-Z]{4}\\d{10}",
                        NO: "\\d{11}",
                        PK: "[\\dA-Z]{4}\\d{16}",
                        PS: "[\\dA-Z]{4}\\d{21}",
                        PL: "\\d{24}",
                        PT: "\\d{21}",
                        RO: "[A-Z]{4}[\\dA-Z]{16}",
                        SM: "[A-Z]\\d{10}[\\dA-Z]{12}",
                        SA: "\\d{2}[\\dA-Z]{18}",
                        RS: "\\d{18}",
                        SK: "\\d{20}",
                        SI: "\\d{15}",
                        ES: "\\d{20}",
                        SE: "\\d{20}",
                        CH: "\\d{5}[\\dA-Z]{12}",
                        TN: "\\d{20}",
                        TR: "\\d{5}[\\dA-Z]{17}",
                        AE: "\\d{3}\\d{16}",
                        GB: "[A-Z]{4}\\d{14}",
                        VG: "[\\dA-Z]{4}\\d{16}",
                    }),
                    (g = h[c]),
                    "undefined" != typeof g &&
                        ((i = new RegExp("^[A-Z]{2}\\d{2}" + g + "$", "")),
                        !i.test(l)))
                )
                    return !1;
                for (
                    d = l.substring(4, l.length) + l.substring(0, 4), j = 0;
                    j < d.length;
                    j++
                )
                    (e = d.charAt(j)),
                        "0" !== e && (n = !1),
                        n ||
                            (m +=
                                "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ".indexOf(
                                    e
                                ));
                for (k = 0; k < m.length; k++)
                    (f = m.charAt(k)), (p = "" + o + f), (o = p % 97);
                return 1 === o;
            },
            "Please specify a valid IBAN."
        ),
        a.validator.addMethod(
            "integer",
            function (a, b) {
                return this.optional(b) || /^-?\d+$/.test(a);
            },
            "A positive or negative non-decimal number please."
        ),
        a.validator.addMethod(
            "ipv4",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^(25[0-5]|2[0-4]\d|[01]?\d\d?)\.(25[0-5]|2[0-4]\d|[01]?\d\d?)\.(25[0-5]|2[0-4]\d|[01]?\d\d?)\.(25[0-5]|2[0-4]\d|[01]?\d\d?)$/i.test(
                        a
                    )
                );
            },
            "Please enter a valid IP v4 address."
        ),
        a.validator.addMethod(
            "ipv6",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^((([0-9A-Fa-f]{1,4}:){7}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){6}:[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){5}:([0-9A-Fa-f]{1,4}:)?[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){4}:([0-9A-Fa-f]{1,4}:){0,2}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){3}:([0-9A-Fa-f]{1,4}:){0,3}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){2}:([0-9A-Fa-f]{1,4}:){0,4}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){6}((\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b)\.){3}(\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b))|(([0-9A-Fa-f]{1,4}:){0,5}:((\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b)\.){3}(\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b))|(::([0-9A-Fa-f]{1,4}:){0,5}((\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b)\.){3}(\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b))|([0-9A-Fa-f]{1,4}::([0-9A-Fa-f]{1,4}:){0,5}[0-9A-Fa-f]{1,4})|(::([0-9A-Fa-f]{1,4}:){0,6}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){1,7}:))$/i.test(
                        a
                    )
                );
            },
            "Please enter a valid IP v6 address."
        ),
        a.validator.addMethod(
            "lessThan",
            function (b, c, d) {
                var e = a(d);
                return (
                    this.settings.onfocusout &&
                        e.not(".validate-lessThan-blur").length &&
                        e
                            .addClass("validate-lessThan-blur")
                            .on("blur.validate-lessThan", function () {
                                a(c).valid();
                            }),
                    b < e.val()
                );
            },
            "Please enter a lesser value."
        ),
        a.validator.addMethod(
            "lessThanEqual",
            function (b, c, d) {
                var e = a(d);
                return (
                    this.settings.onfocusout &&
                        e.not(".validate-lessThanEqual-blur").length &&
                        e
                            .addClass("validate-lessThanEqual-blur")
                            .on("blur.validate-lessThanEqual", function () {
                                a(c).valid();
                            }),
                    b <= e.val()
                );
            },
            "Please enter a lesser value."
        ),
        a.validator.addMethod(
            "lettersonly",
            function (a, b) {
                return this.optional(b) || /^[a-z]+$/i.test(a);
            },
            "Letters only please."
        ),
        a.validator.addMethod(
            "letterswithbasicpunc",
            function (a, b) {
                return this.optional(b) || /^[a-z\-.,()'"\s]+$/i.test(a);
            },
            "Letters or punctuation only please."
        ),
        a.validator.addMethod(
            "maxfiles",
            function (b, c, d) {
                return (
                    !!this.optional(c) ||
                    !(
                        "file" === a(c).attr("type") &&
                        c.files &&
                        c.files.length > d
                    )
                );
            },
            a.validator.format("Please select no more than {0} files.")
        ),
        a.validator.addMethod(
            "maxsize",
            function (b, c, d) {
                if (this.optional(c)) return !0;
                if ("file" === a(c).attr("type") && c.files && c.files.length)
                    for (var e = 0; e < c.files.length; e++)
                        if (c.files[e].size > d) return !1;
                return !0;
            },
            a.validator.format("File size must not exceed {0} bytes each.")
        ),
        a.validator.addMethod(
            "maxsizetotal",
            function (b, c, d) {
                if (this.optional(c)) return !0;
                if ("file" === a(c).attr("type") && c.files && c.files.length)
                    for (var e = 0, f = 0; f < c.files.length; f++)
                        if (((e += c.files[f].size), e > d)) return !1;
                return !0;
            },
            a.validator.format(
                "Total size of all files must not exceed {0} bytes."
            )
        ),
        a.validator.addMethod(
            "mobileNL",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)6((\s|\s?\-\s?)?[0-9]){8}$/.test(
                        a
                    )
                );
            },
            "Please specify a valid mobile number."
        ),
        a.validator.addMethod(
            "mobileRU",
            function (a, b) {
                var c = a.replace(/\(|\)|\s+|-/g, "");
                return (
                    this.optional(b) ||
                    (c.length > 9 && /^((\+7|7|8)+([0-9]){10})$/.test(c))
                );
            },
            "Please specify a valid mobile number."
        ),
        a.validator.addMethod(
            "mobileUK",
            function (a, b) {
                return (
                    (a = a.replace(/\(|\)|\s+|-/g, "")),
                    this.optional(b) ||
                        (a.length > 9 &&
                            a.match(
                                /^(?:(?:(?:00\s?|\+)44\s?|0)7(?:[1345789]\d{2}|624)\s?\d{3}\s?\d{3})$/
                            ))
                );
            },
            "Please specify a valid mobile number."
        ),
        a.validator.addMethod(
            "netmask",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^(254|252|248|240|224|192|128)\.0\.0\.0|255\.(254|252|248|240|224|192|128|0)\.0\.0|255\.255\.(254|252|248|240|224|192|128|0)\.0|255\.255\.255\.(254|252|248|240|224|192|128|0)/i.test(
                        a
                    )
                );
            },
            "Please enter a valid netmask."
        ),
        a.validator.addMethod(
            "nieES",
            function (a, b) {
                "use strict";
                if (this.optional(b)) return !0;
                var c,
                    d = new RegExp(
                        /^[MXYZ]{1}[0-9]{7,8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/gi
                    ),
                    e = "TRWAGMYFPDXBNJZSQVHLCKET",
                    f = a.substr(a.length - 1).toUpperCase();
                return (
                    (a = a.toString().toUpperCase()),
                    !(a.length > 10 || a.length < 9 || !d.test(a)) &&
                        ((a = a
                            .replace(/^[X]/, "0")
                            .replace(/^[Y]/, "1")
                            .replace(/^[Z]/, "2")),
                        (c = 9 === a.length ? a.substr(0, 8) : a.substr(0, 9)),
                        e.charAt(parseInt(c, 10) % 23) === f)
                );
            },
            "Please specify a valid NIE number."
        ),
        a.validator.addMethod(
            "nifES",
            function (a, b) {
                "use strict";
                return (
                    !!this.optional(b) ||
                    ((a = a.toUpperCase()),
                    !!a.match(
                        "((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)"
                    ) &&
                        (/^[0-9]{8}[A-Z]{1}$/.test(a)
                            ? "TRWAGMYFPDXBNJZSQVHLCKE".charAt(
                                  a.substring(8, 0) % 23
                              ) === a.charAt(8)
                            : !!/^[KLM]{1}/.test(a) &&
                              a[8] ===
                                  "TRWAGMYFPDXBNJZSQVHLCKE".charAt(
                                      a.substring(8, 1) % 23
                                  )))
                );
            },
            "Please specify a valid NIF number."
        ),
        a.validator.addMethod(
            "nipPL",
            function (a) {
                "use strict";
                if (((a = a.replace(/[^0-9]/g, "")), 10 !== a.length))
                    return !1;
                for (
                    var b = [6, 5, 7, 2, 3, 4, 5, 6, 7], c = 0, d = 0;
                    d < 9;
                    d++
                )
                    c += b[d] * a[d];
                var e = c % 11,
                    f = 10 === e ? 0 : e;
                return f === parseInt(a[9], 10);
            },
            "Please specify a valid NIP number."
        ),
        a.validator.addMethod(
            "nisBR",
            function (a) {
                var b,
                    c,
                    d,
                    e,
                    f,
                    g = 0;
                if (
                    ((a = a.replace(
                        /([~!@#$%^&*()_+=`{}\[\]\-|\\:;'<>,.\/? ])+/g,
                        ""
                    )),
                    11 !== a.length)
                )
                    return !1;
                for (
                    c = parseInt(a.substring(10, 11), 10),
                        b = parseInt(a.substring(0, 10), 10),
                        e = 2;
                    e < 12;
                    e++
                )
                    (f = e),
                        10 === e && (f = 2),
                        11 === e && (f = 3),
                        (g += (b % 10) * f),
                        (b = parseInt(b / 10, 10));
                return (d = g % 11), (d = d > 1 ? 11 - d : 0), c === d;
            },
            "Please specify a valid NIS/PIS number."
        ),
        a.validator.addMethod(
            "notEqualTo",
            function (b, c, d) {
                return (
                    this.optional(c) ||
                    !a.validator.methods.equalTo.call(this, b, c, d)
                );
            },
            "Please enter a different value, values must not be the same."
        ),
        a.validator.addMethod(
            "nowhitespace",
            function (a, b) {
                return this.optional(b) || /^\S+$/i.test(a);
            },
            "No white space please."
        ),
        a.validator.addMethod(
            "pattern",
            function (a, b, c) {
                return (
                    !!this.optional(b) ||
                    ("string" == typeof c &&
                        (c = new RegExp("^(?:" + c + ")$")),
                    c.test(a))
                );
            },
            "Invalid format."
        ),
        a.validator.addMethod(
            "phoneNL",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9]){8}$/.test(
                        a
                    )
                );
            },
            "Please specify a valid phone number."
        ),
        a.validator.addMethod(
            "phonePL",
            function (a, b) {
                a = a.replace(/\s+/g, "");
                var c =
                    /^(?:(?:(?:\+|00)?48)|(?:\(\+?48\)))?(?:1[2-8]|2[2-69]|3[2-49]|4[1-68]|5[0-9]|6[0-35-9]|[7-8][1-9]|9[145])\d{7}$/;
                return this.optional(b) || c.test(a);
            },
            "Please specify a valid phone number."
        ),
        a.validator.addMethod(
            "phonesUK",
            function (a, b) {
                return (
                    (a = a.replace(/\(|\)|\s+|-/g, "")),
                    this.optional(b) ||
                        (a.length > 9 &&
                            a.match(
                                /^(?:(?:(?:00\s?|\+)44\s?|0)(?:1\d{8,9}|[23]\d{9}|7(?:[1345789]\d{8}|624\d{6})))$/
                            ))
                );
            },
            "Please specify a valid uk phone number."
        ),
        a.validator.addMethod(
            "phoneUK",
            function (a, b) {
                return (
                    (a = a.replace(/\(|\)|\s+|-/g, "")),
                    this.optional(b) ||
                        (a.length > 9 &&
                            a.match(
                                /^(?:(?:(?:00\s?|\+)44\s?)|(?:\(?0))(?:\d{2}\)?\s?\d{4}\s?\d{4}|\d{3}\)?\s?\d{3}\s?\d{3,4}|\d{4}\)?\s?(?:\d{5}|\d{3}\s?\d{3})|\d{5}\)?\s?\d{4,5})$/
                            ))
                );
            },
            "Please specify a valid phone number."
        ),
        a.validator.addMethod(
            "phoneUS",
            function (a, b) {
                return (
                    (a = a.replace(/\s+/g, "")),
                    this.optional(b) ||
                        (a.length > 9 &&
                            a.match(
                                /^(\+?1-?)?(\([2-9]([02-9]\d|1[02-9])\)|[2-9]([02-9]\d|1[02-9]))-?[2-9]\d{2}-?\d{4}$/
                            ))
                );
            },
            "Please specify a valid phone number."
        ),
        a.validator.addMethod(
            "postalcodeBR",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^\d{2}.\d{3}-\d{3}?$|^\d{5}-?\d{3}?$/.test(a)
                );
            },
            "Informe um CEP válido."
        ),
        a.validator.addMethod(
            "postalCodeCA",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ] *\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i.test(
                        a
                    )
                );
            },
            "Please specify a valid postal code."
        ),
        a.validator.addMethod(
            "postalcodeIT",
            function (a, b) {
                return this.optional(b) || /^\d{5}$/.test(a);
            },
            "Please specify a valid postal code."
        ),
        a.validator.addMethod(
            "postalcodeNL",
            function (a, b) {
                return (
                    this.optional(b) || /^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/.test(a)
                );
            },
            "Please specify a valid postal code."
        ),
        a.validator.addMethod(
            "postcodeUK",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^((([A-PR-UWYZ][0-9])|([A-PR-UWYZ][0-9][0-9])|([A-PR-UWYZ][A-HK-Y][0-9])|([A-PR-UWYZ][A-HK-Y][0-9][0-9])|([A-PR-UWYZ][0-9][A-HJKSTUW])|([A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRVWXY]))\s?([0-9][ABD-HJLNP-UW-Z]{2})|(GIR)\s?(0AA))$/i.test(
                        a
                    )
                );
            },
            "Please specify a valid UK postcode."
        ),
        a.validator.addMethod(
            "require_from_group",
            function (b, c, d) {
                var e = a(d[1], c.form),
                    f = e.eq(0),
                    g = f.data("valid_req_grp")
                        ? f.data("valid_req_grp")
                        : a.extend({}, this),
                    h =
                        e.filter(function () {
                            return g.elementValue(this);
                        }).length >= d[0];
                return (
                    f.data("valid_req_grp", g),
                    a(c).data("being_validated") ||
                        (e.data("being_validated", !0),
                        e.each(function () {
                            g.element(this);
                        }),
                        e.data("being_validated", !1)),
                    h
                );
            },
            a.validator.format("Please fill at least {0} of these fields.")
        ),
        a.validator.addMethod(
            "skip_or_fill_minimum",
            function (b, c, d) {
                var e = a(d[1], c.form),
                    f = e.eq(0),
                    g = f.data("valid_skip")
                        ? f.data("valid_skip")
                        : a.extend({}, this),
                    h = e.filter(function () {
                        return g.elementValue(this);
                    }).length,
                    i = 0 === h || h >= d[0];
                return (
                    f.data("valid_skip", g),
                    a(c).data("being_validated") ||
                        (e.data("being_validated", !0),
                        e.each(function () {
                            g.element(this);
                        }),
                        e.data("being_validated", !1)),
                    i
                );
            },
            a.validator.format(
                "Please either skip these fields or fill at least {0} of them."
            )
        ),
        a.validator.addMethod(
            "stateUS",
            function (a, b, c) {
                var d,
                    e = "undefined" == typeof c,
                    f =
                        !e &&
                        "undefined" != typeof c.caseSensitive &&
                        c.caseSensitive,
                    g =
                        !e &&
                        "undefined" != typeof c.includeTerritories &&
                        c.includeTerritories,
                    h =
                        !e &&
                        "undefined" != typeof c.includeMilitary &&
                        c.includeMilitary;
                return (
                    (d =
                        g || h
                            ? g && h
                                ? "^(A[AEKLPRSZ]|C[AOT]|D[CE]|FL|G[AU]|HI|I[ADLN]|K[SY]|LA|M[ADEINOPST]|N[CDEHJMVY]|O[HKR]|P[AR]|RI|S[CD]|T[NX]|UT|V[AIT]|W[AIVY])$"
                                : g
                                ? "^(A[KLRSZ]|C[AOT]|D[CE]|FL|G[AU]|HI|I[ADLN]|K[SY]|LA|M[ADEINOPST]|N[CDEHJMVY]|O[HKR]|P[AR]|RI|S[CD]|T[NX]|UT|V[AIT]|W[AIVY])$"
                                : "^(A[AEKLPRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])$"
                            : "^(A[KLRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])$"),
                    (d = f ? new RegExp(d) : new RegExp(d, "i")),
                    this.optional(b) || d.test(a)
                );
            },
            "Please specify a valid state."
        ),
        a.validator.addMethod(
            "strippedminlength",
            function (b, c, d) {
                return a(b).text().length >= d;
            },
            a.validator.format("Please enter at least {0} characters.")
        ),
        a.validator.addMethod(
            "time",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^([01]\d|2[0-3]|[0-9])(:[0-5]\d){1,2}$/.test(a)
                );
            },
            "Please enter a valid time, between 00:00 and 23:59."
        ),
        a.validator.addMethod(
            "time12h",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^((0?[1-9]|1[012])(:[0-5]\d){1,2}(\ ?[AP]M))$/i.test(a)
                );
            },
            "Please enter a valid time in 12-hour am/pm format."
        ),
        a.validator.addMethod(
            "url2",
            function (a, b) {
                return (
                    this.optional(b) ||
                    /^(?:(?:(?:https?|ftp):)?\/\/)(?:(?:[^\]\[?\/<~#`!@$^&*()+=}|:";',>{ ]|%[0-9A-Fa-f]{2})+(?::(?:[^\]\[?\/<~#`!@$^&*()+=}|:";',>{ ]|%[0-9A-Fa-f]{2})*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z0-9\u00a1-\uffff][a-z0-9\u00a1-\uffff_-]{0,62})?[a-z0-9\u00a1-\uffff]\.)+(?:[a-z\u00a1-\uffff]{2,}\.?)|(?:(?:[a-z0-9\u00a1-\uffff][a-z0-9\u00a1-\uffff_-]{0,62})?[a-z0-9\u00a1-\uffff])|(?:(?:[a-z0-9\u00a1-\uffff][a-z0-9\u00a1-\uffff_-]{0,62}\.)))(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(
                        a
                    )
                );
            },
            a.validator.messages.url
        ),
        a.validator.addMethod(
            "vinUS",
            function (a) {
                if (17 !== a.length) return !1;
                var b,
                    c,
                    d,
                    e,
                    f,
                    g,
                    h = [
                        "A",
                        "B",
                        "C",
                        "D",
                        "E",
                        "F",
                        "G",
                        "H",
                        "J",
                        "K",
                        "L",
                        "M",
                        "N",
                        "P",
                        "R",
                        "S",
                        "T",
                        "U",
                        "V",
                        "W",
                        "X",
                        "Y",
                        "Z",
                    ],
                    i = [
                        1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 3, 4, 5, 7, 9, 2, 3, 4, 5,
                        6, 7, 8, 9,
                    ],
                    j = [8, 7, 6, 5, 4, 3, 2, 10, 0, 9, 8, 7, 6, 5, 4, 3, 2],
                    k = 0;
                for (b = 0; b < 17; b++) {
                    if (
                        ((e = j[b]),
                        (d = a.slice(b, b + 1)),
                        8 === b && (g = d),
                        isNaN(d))
                    ) {
                        for (c = 0; c < h.length; c++)
                            if (d.toUpperCase() === h[c]) {
                                (d = i[c]),
                                    (d *= e),
                                    isNaN(g) && 8 === c && (g = h[c]);
                                break;
                            }
                    } else d *= e;
                    k += d;
                }
                return (f = k % 11), 10 === f && (f = "X"), f === g;
            },
            "The specified vehicle identification number (VIN) is invalid."
        ),
        a.validator.addMethod(
            "zipcodeUS",
            function (a, b) {
                return this.optional(b) || /^\d{5}(-\d{4})?$/.test(a);
            },
            "The specified US ZIP Code is invalid."
        ),
        a.validator.addMethod(
            "ziprange",
            function (a, b) {
                return this.optional(b) || /^90[2-5]\d\{2\}-\d{4}$/.test(a);
            },
            "Your ZIP-code must be in the range 902xx-xxxx to 905xx-xxxx."
        ),
        a
    );
});
