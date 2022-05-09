function addToBasket() {
    var idProd = $("#idProd").attr("value");
    $.post("panier/add", {idp: idProd},
    function (data) {
        $("#valueCart").html(data);
    });
}

function emptyBasket () {
    $.post("panier/delete");
    $("#valueCart").html("(0)");
    $("#tablePanier").html("");
}

$(document).ready(function() {
    $.get("panier/count", function (data) {
        $("#valueCart").html(data);
    });
});

$(document).ready(function() {
    $(".delete").click( function (event) {
        var idp = event.target.id;
        $("tr[name='" + idp + "']").html("");
        $.post("panier/remove", {idp: idp}, function(data) {
            $("#valueCart").html(data);
        });
    });
});