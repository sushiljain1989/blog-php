$(document).ready(function(){
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $(".editBlog").click(function(){
      //$(this).attr("data-id");
      var title = $.trim($(".title-"+$(this).attr("data-id")).html());
      $("#title").val(title);
      var desc = $("."+$(this).attr("data-id")).html();
      $("#description").html(desc);
      $("#blog-id").val($(this).attr("data-id"));
      $("#myModal").modal();
    });

    $("#saveBlog").click(function(){
      //$(this).attr("data-id");
      var formData = {
                'title': $('input[name=email]').val() //for get email
            };
      $.ajax({
                url: "/blog/update",
                type: "post",
                data: {id: $("#blog-id").val(), description: $("#description").html(), title: $("#title").val()  },
                success: function(d) {
                    if(d == 1)
                    {
                      $('#myModal').modal('hide');
                      $('.alert').show();
                    }
                }
            });
        });


        $(".deleteBlog").click(function(){
          $("#confirmationHeader").html("Hit \"DELETE\" button to delete.");
          //show modal
          $("#confirmationModal").modal();
          $("#delete-blog-id").val($(this).attr("data-id"));

        });

        $("#deleteBlog").click(function(){


            $.ajax({
                      url: "/blog/delete",
                      type: "post",
                      data: {id: $("#delete-blog-id").val()},
                      success: function(d) {
                          if(d == 1)
                          {

                            $('.deleteBlogBody').html("Deleted successfully !");
                            $('#confirmationModal').modal('hide');
                          }
                      }
                  });


        });


        $(".changeactivationstatus").click(function(){

        blogger_id = $(this).attr("data-id");
        activation_status = ($(this).html() == "Deactivate" ? 0 : 1);

          $.ajax({
                    url: "/change-status",
                    type: "post",
                    data: {id: blogger_id, status: activation_status },
                    success: function(d) {
                        if(d == 1)
                        {
                          location.reload();

                        }
                    }
                });

        });

        $(".deleteblogger").click(function(){

        blogger_id = $(this).attr("data-id");


          $.ajax({
                    url: "/delete-blogger",
                    type: "post",
                    data: {id: blogger_id },
                    success: function(d) {
                        if(d == 1)
                        {
                          location.reload();

                        }
                    }
                });

        });




});
