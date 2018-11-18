(function($){
  $(document).on("click", ".items-unique", function(event){
    event.preventDefault();
    $('.update-item-actions').addClass('hidden');
    $(this).find('.update-item-actions').removeClass('hidden');
    $(".items-unique").removeClass("chosenone");
    $(this).addClass("chosenone");
  });
  $(document).on("click", ".update-item-actions .cancel", function(event){
    event.preventDefault();
    $(this).closest("li").removeClass("chosenone");
  });
  $(document).on("click", ".update-item-actions .delete", function(event){
    event.preventDefault();
    var togo  = $(this).data('thisid');
    var thepage  = $(this).data('page');
    var token  = $('input[name="_token"]').val();
    $(this).prepend('<i class="fa fa-spinner fa-spin"></i>');
    $.ajax({
      url: '/chatteradmin/delete/category',
      type: 'POST',
      data: {_token: token, cat:togo, page:thepage },
      dataType: 'JSON',
      success: function(response) {
        // alert(JSON.stringify(response));
        if(response.msgtype =="success"){
            window.location.replace("/chatteradmin/categories");
        }
      },
      error  : function(errors){
        alert(JSON.stringify(errors));
      }
    });
  });
})(jQuery);
