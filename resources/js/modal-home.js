jQuery(document).ready(function(){
    jQuery('#formSubmit').click(function(e){
        //e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "dashboard.blade.php",
            method: 'post',
            data: $('form.newRequestForm').serialize(),
            success: function(result){
                if(result.errors)
                {
                    jQuery('.alert-danger').html('');

                    jQuery.each(result.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<li>'+value+'</li>');
                    });
                }
                else
                {
                    jQuery('.alert-danger').hide();
                    $('#open').hide();
                    $('#newModal').modal('hide');
                }
            }});
            e.preventDefault();
            e.unbind();
    });
});
