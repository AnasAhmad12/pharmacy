"use strict";

function sticky_footer() {
    $("body").css("padding-bottom", $(".footer").height())
}

function sticky_con() {
    var t = $(window),
        e = ($("header").height(), $("footer").height().offset().top),
        s = $("#sticky-con"),
        i = s.offset().top;
    t.scroll(function() {
        get_width() >= 767 ? (s.width(s.parent().width()), t.scrollTop() > i && t.scrollTop() < e ? s.addClass("sticky") : s.removeClass("sticky")) : (s.width(s.parent().width()), s.removeClass("sticky"))
    }), $(window).scrollTop($(window).scrollTop() + 1)
}

function get_width() {
    return $(window).width()
}

function loading(t) {
    $("#loading").show(), setTimeout(function() {
        $("#loading").hide()
    }, t)
}

function get(t) {
    return "undefined" != typeof Storage ? localStorage.getItem(t) : void alert("Please use a modern browser as this site needs localstroage!")
}

function store(t, e) {
    "undefined" != typeof Storage ? localStorage.setItem(t, e) : alert("Please use a modern browser as this site needs localstroage!")
}

function remove(t) {
    "undefined" != typeof Storage ? localStorage.removeItem(t) : alert("Please use a modern browser as this site needs localstroage!")
}

function gen_html(t) {
    var e = "",
        s = get("shop_grid"),
        i = ".three-col" == s ? 3 : 2,
        a = s && ".three-col" == s ? "col-sm-6 col-md-4" : "col-md-6",
        o = s && ".three-col" == s ? "alt" : "";
    t || (e += "<h4>No product found, please try to search or filter again.</h4>"), $.each(t, function(s, n) {
        var r = formatMoney(n.price);
        0 === s && (e += '<div class="row">'), s % i === 0 && (e += '</div><div class="row">'), e += '<div class="product-container ' + a + '">\n        <div class="product ' + o + '">\n        <div class="product-top">\n        <div class="product-image">\n        <img class="img-responsive" src="' + site.base_url + "assets/uploads/" + n.image + '" alt=""/>\n        </div>\n        <div class="product-desc">\n        <h2 class="product-name">' + n.name + "</h2>\n        <p>" + n.details + '</p>\n        </div>\n        </div>\n        <div class="clearfix"></div>\n        <div class="product-bottom">\n        <div class="product-rating">\n        <div class="stars">\n        <div id="stars" class="star">\n        <i class="fa fa-star"></i>\n        <i class="fa fa-star"></i>\n        <i class="fa fa-star"></i>\n        <i class="fa fa-star"></i>\n        <i class="fa fa-star"></i>\n        </div>\n        </div>\n        </div>\n        <div class="product-price">\n        ' + r + '\n        </div>\n        <div class="product-cart-button">\n        <div class="btn-group" role="group" aria-label="...">\n        <button class="btn btn-info add-to-wishlist" data-id="' + n.id + '"><i class="fa fa-heart-o"></i></button>\n        <button class="btn btn-theme add-to-cart" data-id="' + n.id + '"><i class="fa fa-shopping-cart padding-right-md"></i> Add to Cart</button>\n        </div>\n        </div>\n        </div>\n        <div class="clearfix"></div>\n        </div>\n        </div>', s + 1 === t.length && (e += "</div>")
    }), $("#results").empty(), $("<div>" + e + "</div>").appendTo($("#results"))
}

function searchProducts() {
    $("#loading").show();
    var t = {};
    t[site.csrf_token] = site.csrf_token_value, t.filters = get_filters(), t.format = "json", $.ajax({
        url: site.shop_url + "search?per_page=" + filters.per_page,
        type: "POST",
        data: t,
        dataType: "json"
    }).done(function(t) {
        products = t.products, t.products ? (t.pagination && $("#pagination").empty().html(t.pagination), t.info && $(".page-info").empty().text(lang.page_info.replace("_page_", t.info.page).replace("_total_", t.info.total))) : ($(".page-info").empty(), $("#pagination").empty()), gen_html(products)
    }).always(function() {
        $("#loading").hide()
    })
}

function get_filters() {
    return filters.category = $("#product-category").val() ? $("#product-category").val() : filters.category, filters.min_price = $("#min-price").val(), filters.max_price = $("#max-price").val(), filters.in_stock = $("#in-stock").is(":checked") ? 1 : 0, filters.sorting = get("sorting"), filters
}

function update_mini_cart(t) {
    if (t.total_items && t.total_items > 0) {
        $(".cart-total-items").text(t.total_items + " " + (t.total_items > 1 ? lang.items : lang.item)), $("#cart-items").empty(), $.each(t.contents, function() {
            var t = '<td><img src="' + site.base_url + "assets/uploads/thumbs/" + this.image + '" alt=""></td><td>' + this.name + "<br>" + this.qty + " x " + formatMoney(this.price) + '</td><td class="text-right text-bold">' + formatMoney(this.subtotal) + "</td>";
            $("<tr>" + t + "</tr>").appendTo("#cart-items")
        });
        var e = '\n        <tr class="text-bold"><td colspan="2">' + lang.total_items + '</td><td class="text-right">' + t.total_items + '</td></tr>\n        <tr class="text-bold"><td colspan="2">' + lang.total + '</td><td class="text-right">' + formatMoney(t.total) + "</td></tr>\n        ";
        $("<tfoot>" + e + "</tfoot>").appendTo("#cart-items"), $("#cart-empty").hide(), $("#cart-contents").show()
    } else $(".cart-total-items").text(lang.cart_empty), $("#cart-contents").hide(), $("#cart-empty").show()
}

function update_cart(t) {
    if (t.total_items && t.total_items > 0) {
        $("#cart-table tbody").empty();
        var e = 1;
        $.each(t.contents, function() {
            var t = this,
                s = '\n            <td class="text-center">\n                <button class="btn btn-danger btn-xs remove-item" data-rowid="' + this.rowid + '"><i class="fa fa-trash-o"></i><buttona>\n            </td>\n            <td><input type="hidden" name="' + e + '[rowid]" value="' + this.rowid + '">' + e + '</td>\n            <td>\n                <img src="' + site.base_url + "assets/uploads/thumbs/" + this.image + '" alt=""> ' + this.name + "\n            </td>\n            <td>";
            this.options && (s += '<select name="' + e + '[option]" class="selectpicker" data-width="100%" data-style="btn-default">', $.each(this.options, function() {
                s += '<option value="' + this.id + '" ' + (this.id == t.option ? "selected" : "") + ">" + this.name + " (+" + formatMoney(this.price, "") + ")</option>"
            }), s += "</select>"), s += '</td>\n            <td><input type="text" name="' + e + '[qty]" class="form-control text-center input-qty" value="' + this.qty + '"></td>\n            <td class="text-right">' + formatMoney(this.price, " ") + '</td>\n            <td class="text-right">' + formatMoney(this.subtotal) + "</td>\n            ", e++, $("<tr>" + s + "</tr>").appendTo("#cart-table tbody"), $("#cart-empty-msg").hide(), $(".cart-contents").show()
        })
    } else $(".cart-contents").hide(), $("#cart-empty-msg").show()
}

function formatMoney(t, e) {
    if (e || (e = site.settings.symbol), 1 == site.settings.sac) return (1 == site.settings.display_symbol ? e : "") + "" + formatSA(parseFloat(t).toFixed(site.settings.decimals)) + (2 == site.settings.display_symbol ? e : "");
    var s = accounting.formatMoney(t, e, site.settings.decimals, 0 == site.settings.thousands_sep ? " " : site.settings.thousands_sep, site.settings.decimals_sep, "%s%v");
    return (1 == site.settings.display_symbol ? e : "") + s + (2 == site.settings.display_symbol ? e : "")
}

function formatSA(t) {
    t = t.toString();
    var e = "";
    t.indexOf(".") > 0 && (e = t.substring(t.indexOf("."), t.length)), t = Math.floor(t), t = t.toString();
    var s = t.substring(t.length - 3),
        i = t.substring(0, t.length - 3);
    "" != i && (s = "," + s);
    var a = i.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + s + e;
    return a
}

function sa_alert(t, e, s, i) {
    s = s || "success", i = i || !1, swal({
        title: t,
        html: e,
        type: s,
        timer: i ? 6e4 : 2e3,
        confirmButtonText: "Okay"
    }).catch(swal.noop)
}

function saa_alert(t, e, s, i) {
    s = s || "delete", e = e || "This action can't be reverted back.", i = i || {}, i._method = s, i[site.csrf_token] = site.csrf_token_value, console.log(t, fomr_data)
}
$(function() {
    $(document).on("click", ".add-to-cart", function(t) {
        t.preventDefault();
        var e = $(this).attr("data-id"),
            s = $(".shopping-cart:visible");
        /*    i = $(this).parents(".product").find("img").eq(0);
        if (i) {
            var a = i.clone().offset({
                top: i.offset().top,
                left: i.offset().left
            }).css({
                opacity: "0.5",
                position: "absolute",
                height: "150px",
                width: "150px",
                "z-index": "1000"
            }).appendTo($("body")).animate({
                top: s.offset().top + 10,
                left: s.offset().left + 10,
                width: "50px",
                height: "50px"
            }, 400);
            a.animate({
                width: 0,
                height: 0
            }, function() {
                $(this).detach()
            })
        }*/
        $.ajax({
            url: site.shop_url + "cart/add/" + e,
            type: "GET",
            dataType: "json"
        }).done(function(t) {
            s = t, update_mini_cart(t)
        })
    }), update_mini_cart(cart), $("#dropdown-cart").click(function() {
        $(this).next(".dropdown-menu").animate({
            scrollTop: $(this).next(".dropdown-menu").height() + 400
        }, 100)
    }), $("ul.nav li.dropdown").hover(function() {
        get_width() >= 767 && $(this).addClass("open")
    }, function() {
        get_width() >= 767 && $(this).removeClass("open")
    }), $("ul.dropdown-menu [data-toggle=dropdown]").on("click", function(t) {
        t.preventDefault(), t.stopPropagation(), $(this).parent().siblings().removeClass("open"), $(this).parent().toggleClass("open")
    }), $(".tip").tooltip({
        container: "body"
    }), $(window).scroll(function() {
        $(this).scrollTop() > 70 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
    }), sticky_footer(), $(window).resize(sticky_footer), $(".theme-color").click(function(t) {
        return store("shop_color", $(this).attr("data-color")), $("#wrapper").removeAttr("class").addClass($(this).attr("data-color")), !1
    }), (shop_color = get("shop_color")) && $("#wrapper").removeAttr("class").addClass(shop_color), "products" == v && ($(".sorting").click(function(t) {
        return store("sorting", $(this).attr("id")), $(".sorting").removeClass("active"), $(this).addClass("active"), searchProducts(), !1
    }), $(".two-col").click(function() {
        return store("shop_grid", ".two-col"), $(this).addClass("active"), $(".three-col").removeClass("active"), gen_html(products), !1
    }), $(".three-col").click(function() {
        return store("shop_grid", ".three-col"), $(this).addClass("active"), $(".two-col").removeClass("active"), gen_html(products), !1
    }), $("#product-search-form").submit(function(t) {
        return t.preventDefault(), filters.query = $("#product-search").val(), searchProducts(), !1
    }), $("#product-search").blur(function(t) {
        return t.preventDefault(), filters.query = $(this).val(), searchProducts(), !1
    }), $(".reset_filters_brand").click(function(t) {
        filters.brand = null, searchProducts(), $(this).closest("li").remove()
    }), $(".reset_filters_category").click(function(t) {
        filters.category = null, searchProducts(), $(this).closest("li").remove()
    }), $("#min-price, #max-price, #in-stock").change(function() {
        searchProducts()
    }), $(document).on("click", "#pagination a", function(t) {
        t.preventDefault();
        var e = $(this).attr("href"),
            s = e.split("per_page=");
        if (s[1]) {
            var i = s[1].split("&");
            filters.per_page = i[0]
        } else filters.per_page = 1;
        return searchProducts(), !1
    }), (shop_grid = get("shop_grid")) && $(shop_grid).click(), (sorting = get("sorting")) ? ($(".sorting").removeClass("active"), $("#" + sorting).addClass("active")) : store("sorting", "name-asc"), filters.query && $("#product-search").val(filters.query), searchProducts()), $(".product").each(function(t, e) {
        $(e).find(".details").hover(function() {
            $(this).parent().css("z-index", "20"), $(this).addClass("animate")
        }, function() {
            $(this).removeClass("animate"), $(this).parent().css("z-index", "1")
        })
    }), $("#sticky-con").stick_in_parent({
        parent: $(".container")
    }), "cart_ajax" == m && "index" == v && (update_cart(cart), $(document).on("click", ".remove-item", function(t) {
        t.preventDefault();
        ({
            rowid: $(this).attr("data-rowid")
        }), site.shop_url + "cart/remove"
    }), $("#empty-cart").click(function(t) {
        t.preventDefault();
        var e = $(this).attr("href");
        saa_alert(e)
    }))
});