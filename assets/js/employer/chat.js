$(document).ready(function() {
    $('#live-chat').fadeToggle(300);
    $('#live-chat #minimize').on('click', function() {
        $('.chat').slideToggle(300, 'swing');
        $('.chat-message-counter').fadeToggle(300, 'swing');
    });

    $('#close').on('click', function(e) {
        e.preventDefault();
        $('#live-chat').fadeToggle(300);
        $("#open-chat").removeClass("d-none")
        $("#open-chat").addClass("d-block");
    });

    $('#open-chat').on('click', function(e) {
        $("#open-chat").addClass("d-none");
        $("#open-chat").removeClass("d-block")
        $('#live-chat').fadeToggle(300);
    })
});