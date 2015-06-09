$(function(){
    setClick();
});

$(document).on("pjax:timeout", function(event) {
  // Prevent default timeout redirection behavior
  event.preventDefault()
});

$(document).on("pjax:end", function(event) {
  // Set buttons Click after PjaxGrid refresh 
  if (event.target.getAttribute("id")=="PjaxGrid") {
    setClick();
    event.preventDefault();
  }
});

function setClick(){
    $("[id^=modalButton]").click(function(){

        $('#modalContent')
            .html('<div class="span12 text-center"><i class="fa fa-spinner fa-pulse fa-4x"></i></div>')
            .load($(this).attr('value'));
        $('#modal').modal('show');
    });
}
// serialize form, render response and close modal
function submitform(id) {
    // get the form id and set the event handler
    $('form#' + id).on('beforeSubmit', function(e) {
        var form = $(this);
        $.post(
            form.attr("action"),
            form.serialize()
        )
        .done(function(result) {
            //console.log(result);
            if ($.type(result)=='object') {
                if (result.message=="Success!!!") {
                    $('#modal').modal('hide');
                    $.pjax.reload({container:"#PjaxGrid"});
                    setClick();
                }
            } else {
                $('#modalContent').html(result);
            }
        })
        .fail(function() {
            console.log("server error");
        });
        return false;
    }).on('submit', function(e){
        e.preventDefault();
    });
}