$(window).ready(function() {
    $('#live-chat #minimize').on('click', function() {
        $('.chat').slideToggle(300, 'swing');
        $('.chat-message-counter').fadeToggle(300, 'swing');
    });

    $('#close').on('click', function(e) {
        e.preventDefault();
        $('#live-chat').fadeToggle(300);
    });
});