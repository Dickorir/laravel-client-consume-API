
$("#the_search").click(function(event){
    event.preventDefault();
    var form = $('#search_form'); // refer the form you want
    var url = form.attr('action'); // take the action of the url
    var data = form.serialize(); // serialize the data in  the form
    // alert(data);

    jQuery.support.cors = true;
    $.ajax({
        url: url,
        method:"POST",
        data:data,
        beforeSend:function(){
            //
        },
        success:function(response){
            console.log(9);
            $('#search_res').html(response.search);
        },
        error: function (data) {
            toastr.error('Ooops something went wrong!','Error');
        },
        complete : function (response){
            //
        }
    });
});
