
        // individuaal sms
        $("#sendAddFloat").click(function(event){
            event.preventDefault();
            // alert('ds');

            jQuery.support.cors = true;
            $.ajax({
                url: '/add-float',
                method:"POST",
                data:$('#add-float-form').serialize(),
                beforeSend:function(){
                    //
                },
                success:function(data){
                    if (data.status == "errors"){
                        $('#validation-errors-add-form').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors-add-form').append('<li class="alert alert-danger">'+value+'</li>');
                        });

                        toastr.error(data.errors,'Error');
                        return false;
                    }else if(data.status == "error") {
                        toastr.error(data.error,'Error');
                    }else if(data.status == "success") {
                        $('#addFloat').modal('hide');
                        $("#add-float-form")[0].reset();
                        $('#amt-span').html(data.new_float);
                        toastr.success(data.success, 'Success');
                    }
                },
                error: function (data) {
                    $('#validation-errors-add-form').html('');
                    $.each(data.errors, function(key,value) {
                        $('#validation-errors-add-form').append('<div class="alert alert-danger">'+value+'</div>');
                    });
                },
                complete : function (data){

                }
            });
        });

        // group send sms
        $("#sendRemoveFloat").click(function(event){
            event.preventDefault();

            jQuery.support.cors = true;
            $.ajax({
                url: '/remove-float',
                method:"POST",
                data:$('#remove-float-form').serialize(),
                beforeSend:function(){
                    //
                },
                success:function(data){
                    if (data.status == "errors"){
                        $('#validation-errors-remove-group').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors-remove-group').append('<li class="alert alert-danger">'+value+'</li>');
                        });

                        toastr.error(data.errors,'Error');
                        return false;
                    }else if(data.status == "error") {
                        toastr.error(data.error,'Error');
                    }else if(data.status == "success") {
                        $('#removeFloat').modal('hide');
                        $("#remove-float-form")[0].reset();
                        $('#amt-span').html(data.new_float);
                        toastr.success(data.success, 'Success');
                    }
                },
                error: function (data) {
                    $('#validation-errors-remove-group').html('');
                    $.each(data.errors, function(key,value) {
                        $('#validation-errors-remove-group').append('<div class="alert alert-danger">'+value+'</div>');
                    });
                },
                complete : function (data){

                }
            });
        });


        $(".sendStartEndGroupSubmit").click(function(event){
            event.preventDefault();

            var el = $(this).attr('id');
            // alert(el);
            var url = "";
            if (el == 'sendStartGroup'){
                url = '/start-group';
            }else {
                url = '/end-group';
            }

            jQuery.support.cors = true;
            $.ajax({
                url: url,
                method:"POST",
                data:$('#start-group-form').serialize(),
                beforeSend:function(){
                    // alert('anza');
                },
                success:function(data){
                    console.log(data);
                    if (data.status == "errors"){
                        $('#validation-errors-start-group-form').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors-start-group-form').append('<li class="alert alert-danger">'+value+'</li>');
                        });

                        toastr.error(data.errors,'Error');
                        return false;
                    }else if(data.status == "error") {
                        toastr.error(data.message,'Error');
                    }else if(data.status == "success") {
                        $('#startGroup').modal('hide');
                        $("#start-group-form")[0].reset();
                        toastr.success(data.message, 'Success');
                    }
                },
                error: function (data) {
                    $('#validation-errors-start-group-form').html('');
                    $.each(data.errors, function(key,value) {
                        $('#validation-errors-start-group-form').append('<div class="alert alert-danger">'+value+'</div>');
                    });
                },
                complete : function (data){

                }
            });
        });
