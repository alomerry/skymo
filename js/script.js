/* ***

* 
* By: Alomerry
* Last Update: 2020.7.5

*** */
$(document).ready(function () {
    $("body").prepend("<canvas id='stage1' class='stage' style='position: fixed;'></canvas>")

    $(".post-thumbnail >a").each(function (index, element) {
        var item = document.createElement("div");
        $(item).css("width", "100%");
        $(item).addClass("post-thumbnail-inner-modal ");
        // $(item).css("background-color","rgba(0, 0, 0, 0.3)");
        $(this).append(item);
    });

    $(".panel-picture header").each(function (index, element) {
        var top = $(this).find("h3 a span");
        $(this).prepend(top);
        $(this).find("h3 a span").remove();
    });

})