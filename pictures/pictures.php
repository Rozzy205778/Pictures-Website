<?php
	include_once "important/header.php";
	include_once "connection.php";
	include_once "important/image.php";
?>

<script>

$("img").click(function() {
    $(this).toggleClass("zoomIn");
});

</script>

<?php
	include_once "important/footer.php";
?>

