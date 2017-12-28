<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap/css/myStyles.css" rel="stylesheet" type="text/css"/>

<script src="bootstrap/js/jquery.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script>
    $(function () {
        $("#nav .dropdown").hover(
                function () {
                    $('#products-menu.dropdown-menu', this).stop(true, true).fadeIn("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('#products-menu.dropdown-menu', this).stop(true, true).fadeOut("fast");
                    $(this).toggleClass('open');
                });
    });
</script>

