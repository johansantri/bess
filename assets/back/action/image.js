
    $(document).ready(function(){

        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'upload/do_upload',
                     type:"post",
                     data:new FormData(this), //this is formData
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Upload Image Successful.");
                          window.location='http://localhost/bess/auth';
                   }
                 });
        });
        

    });

