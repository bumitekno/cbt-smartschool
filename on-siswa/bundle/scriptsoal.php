<script>
    $('.cls<?php echo $o; ?> textarea').change(function () {
        if ($(this).attr("id") == "token<?php echo $o; ?>")
            $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
                .css("color", "white");
    });
</script>