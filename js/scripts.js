$(document).ready(function() {

  // preventing the default behaviour of form submission
  $('#estimator_form').submit(function(event) {
    event.preventDefault();
  });

  $('#estimate_btn').click(function() {

    $.ajax({
      type: 'POST',
      url: 'ajax/data.php?submit=true',
      data: $('#estimator_form').serialize(),
      dataType: 'JSON',
      success: function(feedback) {
        $('h2').text(feedback.result);
        // console.log(feedback);
      }
    });


  });



});
