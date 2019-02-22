 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-upload"></i> <?php echo  $x;?></h1>
          <p>area member, go future</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
  
      <?php if ($tes<1){?>
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            
            <section class="invoice">
             
             
               
                <div class="row invoice-info">
                <div class="img-responsive card">Allowed File Type - jpg, png, gif
                  <br>
                  <form id="submit" >  
                     <div class="form-group">  
                           
                          <input type="file" name="file" id="image_file" />  
                         
                     </div>  
                     <p>
                     <button type="submit" name="upload_button" class="btn btn-info btn-sm" id="btn_upload">upload</button>   
                   </p>
                </form> 

                </div>
               
              
                
              </div>
          
             
            </section>
          
          </div>
        </div>
      </div>
             <?php 
            }
            ?>

              
    </main>

