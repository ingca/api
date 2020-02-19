<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div id="div1" class="container">
  <h1>My First Bootstrap Page1</h1>
  <p>This is some text.</p>
</div>

<div id="div2" class="container">
  <h1>My First Bootstrap Page2</h1>
  <p>This is some text.</p>
</div>

<script>
    $(document).ready(function()
{
    //$("#div2").hide();
    var url = "http://localhost/";
    get_categories();
    
    function get_categories()
    {
        $.ajax({
        url     : url+"api/bi_categories_getall",
        type    : "get",
        success : (function (data) {
            $.each( data, function( key, value) {
                if(value.BusinessCategories.name =="Restaurante"){
                    $("#div1").append("<p>"+value.BusinessCategories.name+"</p>");
                }
                else if(value.BusinessCategories.name =="Gym"){
                    $("#div2").append("<p>"+value.BusinessCategories.name+"</p>");
                }
                //console.log(value.BusinessCategories.name);
            });
        })
    });
    }
}


//manipular los objetos, cuando es con # es por ID, cuando es por . (punto) es por clase 
//append te pone la informacion a aparti de, y html te la reemplaza

);
</script>

</body>
</html> 