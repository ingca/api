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
 <input type="button" onclick="get_categories('div1')">
</div>

<div id="div2" class="container">
<input type="button" onclick="get_categories('div2')">
</div>

<script>
    var url = "http://localhost/";
    function get_categories(parameter)
{
        $.ajax({
        url     : url+"api/bi_categories_getall",
        type    : "get",
        success : (function (data) {
            $.each( data, function( key, value) {
                    $("#"+parameter+"").append(" "+value.BusinessCategories.name);
            });
        })
    });
}
</script>

</body>
</html> 