    function refresh_div() {
        jQuery.ajax({
            url:'https://trinichat.ga/chat/messages.php',
            type:'POST',
            success:function(content) {
                jQuery(".content").html(content);
            }
        });
    }

    t = setInterval(refresh_div,1000);