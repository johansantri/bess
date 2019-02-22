// global variable
var manageWorksTable;
 
$(document).ready(function() {
    manageWorksTable = $("#manageWorksTable").DataTable({
        'ajax': 'works/fetchWorksData',
        'orders': []
    });
});
 
 function addWorksModel()
{
    $("#createForm")[0].reset();
 
    //remove textdanger
    $(".text-danger").remove();
    // remove form-group
    $(".form-group").removeClass('has-error').removeClass('has-success');
 
    $("#createForm").unbind('submit').bind('submit', function() {
        var form = $(this);
 
        // remove the text-danger
        $(".text-danger").remove();
 
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(), // /converting the form data into array and sending it to server
            dataType: 'json',
            success:function(response) {
                if(response.success === true) {
                    $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                      '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                    '</div>');
 
                    // hide the modal
                    $("#addWorks").modal('hide');
 
                    // update the manageWorksTable
                    manageWorksTable.ajax.reload(null, false);
 
                } else {
                    if(response.messages instanceof Object) {
                        $.each(response.messages, function(index, value) {
                            var id = $("#"+index);
 
                            id
                            .closest('.form-group')
                            .removeClass('has-error')
                            .removeClass('has-success')
                            .addClass(value.length > 0 ? 'has-error' : 'has-success')
                            .after(value);
 
                        });
                    } else {
                        $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                          '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                        '</div>');
                    }
                }
            }
        });
 
        return false;
    });
 
}



function removeWorks(id = null)
{
    if(id) {
        $("#removeWorksBtn").unbind('click').bind('click', function() {
            $.ajax({
                url: 'Works/remove' + '/' + id,
                type: 'post',              
                dataType: 'json',
                success:function(response) {
                    if(response.success === true) {
                        $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                          '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                        '</div>');
 
                        // hide the modal
                        $("#removeWorksModal").modal('hide');
 
                        // update the manageWorksTable
                        manageWorksTable.ajax.reload(null, false);
 
                    } else {
                        $('.text-danger').remove()
                        if(response.messages instanceof Object) {
                            $.each(response.messages, function(index, value) {
                                var id = $("#"+index);
 
                                id
                                .closest('.form-group')
                                .removeClass('has-error')
                                .removeClass('has-success')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')                                      
                                .after(value);                                     
 
                            });
                        } else {
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                        }
                    }
                } // /succes
            }); // /ajax
        });
    }
}