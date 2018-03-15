var job_posts_card = ''
$(function() {
    job_posts_card = $('.append_multiple').first().html()
    $('.fa-minus').hide()
        // console.log(job_posts_card)

    $('.job_opening_date, .job_closing_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: new Date(),
        todayHighlight: true
    })
})

function add() {
    $('.append_multiple').append(job_posts_card)
    $('.job_opening_date, .job_closing_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: new Date(),
        todayHighlight: true
    })
    if ($('.append_multiple').children().length > 1) {
        $('.append_multiple .fa-plus:not(:last)').hide()
        $('.append_multiple .fa-minus:not(:last)').show()
    }
}

function remove(event) {
    // console.log($(event).closest('.col-md-6'))
    $(event).closest('.col-md-6').remove()
    if ($('.append_multiple').children().length < 2) {
        $('.append_multiple').children().find('.fa-minus').hide()
        $('.append_multiple').children().find('.fa-plus').show()
    } else {
        $('.append_multiple').children().last().find('.fa-plus').show()
    }
}