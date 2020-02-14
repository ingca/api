let url = "http://localhost/api/bi_categories_getall";

$(document).ready(function() {

    get_categories();


});
function get_categories(){
    $.ajax({
        url     : url,
        type    : "get",
        success : (function (data) {
            $.each( data, function( key, value) {
                console.log(value.BusinessCategories.name);
                $("#category").append("<option  value='"+value.BusinessCategories.id+"'>"+value.BusinessCategories.name+"</option>");
                $("#categories .list").append("<li data-value='"+value.BusinessCategories.name+"' class='option'>"+value.BusinessCategories.name+"</li>");
            });
        }),
    });

}

