
        // individuaal sms
        $("#sendIndividualSubmit").click(function(event){
            event.preventDefault();

            jQuery.support.cors = true;
            $.ajax({
                url: '/sms-indiviual',
                method:"POST",
                data:$('#send-individual-form').serialize(),
                beforeSend:function(){
                    //
                },
                success:function(data){
                    if (data.status == "errors"){
                        $('#validation-errors-individual').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors-individual').append('<li class="alert alert-danger">'+value+'</li>');
                        });

                        toastr.error(data.errors,'Error');
                        return false;
                    }else if(data.status == "error") {
                        toastr.error(data.error,'Error');
                    }else if(data.status == "success") {
                        $('#composeIndividual').modal('hide');
                        $("#send-individual-form")[0].reset();
                        toastr.success(data.success, 'Success');
                    }
                },
                error: function (data) {
                    $('#validation-errors-individual').html('');
                    $.each(data.errors, function(key,value) {
                        $('#validation-errors-individual').append('<div class="alert alert-danger">'+value+'</div>');
                    });
                },
                complete : function (data){

                }
            });
        });

        // group send sms
        $("#sendGroupSubmit").click(function(event){
            event.preventDefault();

            jQuery.support.cors = true;
            $.ajax({
                url: '/sms-group',
                method:"POST",
                data:$('#send-group-form').serialize(),
                beforeSend:function(){
                    //
                },
                success:function(data){
                    if (data.status == "errors"){
                        $('#validation-errors-group').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors-group').append('<li class="alert alert-danger">'+value+'</li>');
                        });

                        toastr.error(data.errors,'Error');
                        return false;
                    }else if(data.status == "error") {
                        toastr.error(data.error,'Error');
                    }else if(data.status == "success") {
                        $('#composeGroup').modal('hide');
                        $("#send-group-form")[0].reset();
                        toastr.success(data.success, 'Success');
                    }
                },
                error: function (data) {
                    $('#validation-errors-group').html('');
                    $.each(data.errors, function(key,value) {
                        $('#validation-errors-group').append('<div class="alert alert-danger">'+value+'</div>');
                    });
                },
                complete : function (data){

                }
            });
        });

        // sub group send sms
        $("#sendSubGroupSubmit").click(function(event){
            event.preventDefault();

            jQuery.support.cors = true;
            $.ajax({
                url: '/sms-subgroup',
                method:"POST",
                data:$('#send-subgroup-form').serialize(),
                beforeSend:function(){
                    //
                },
                success:function(data){
                    if (data.status == "errors"){
                        $('#validation-errors-subgroup').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors-subgroup').append('<li class="alert alert-danger">'+value+'</li>');
                        });

                        toastr.error(data.errors,'Error');
                        return false;
                    }else if(data.status == "error") {
                        toastr.error(data.error,'Error');
                    }else if(data.status == "success") {
                        $('#composeSubGroup').modal('hide');
                        $("#send-subgroup-form")[0].reset();
                        toastr.success(data.success, 'Success');
                    }
                },
                error: function (data) {
                    $('#validation-errors-subgroup').html('');
                    $.each(data.errors, function(key,value) {
                        $('#validation-errors-subgroup').append('<div class="alert alert-danger">'+value+'</div>');
                    });
                },
                complete : function (data){

                }
            });
        });

        // all members send sms
        $("#sendAllMembersSubmit").click(function(event){
            event.preventDefault();

            jQuery.support.cors = true;
            $.ajax({
                url: '/sms-all-members',
                method:"POST",
                data:$('#send-all-member-form').serialize(),
                beforeSend:function(){
                    //
                },
                success:function(data){
                    if (data.status == "errors"){
                        $('#validation-errors-all-member').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors-all-member').append('<li class="alert alert-danger">'+value+'</li>');
                        });

                        toastr.error(data.errors,'Error');
                        return false;
                    }else if(data.status == "error") {
                        toastr.error(data.error,'Error');
                    }else if(data.status == "success") {
                        $('#composeAllMembers').modal('hide');
                        $("#send-all-member-form")[0].reset();
                        toastr.success(data.success, 'Success');
                    }
                },
                error: function (data) {
                    $('#validation-errors-all-member').html('');
                    $.each(data.errors, function(key,value) {
                        $('#validation-errors-all-member').append('<div class="alert alert-danger">'+value+'</div>');
                    });
                },
                complete : function (data){

                }
            });
        });
