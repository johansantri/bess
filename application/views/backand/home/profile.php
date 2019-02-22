 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?php echo  $x;?></h1>
          <p>area Profile, go future</p>
        </div>

        <?php if ($tes<1){?>

                <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                 <button class="btn btn-success pull pull-right btn-sm" data-toggle="modal" data-target="#addProfile" onclick="addProfileModel()">
         <i class="fa fa-plus"></i>  Profile
        </button>
      </div>
              </div>
              <?php 
            }
            ?>
       
      </div>
      
     
        <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
            <div class="messages"></div>
              
              <br>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped" id="manageProfileTable">
                    <thead>
                      <tr>
                        <th></th>
                        <th>address</th>
                        <th>phone</th>
                        <th>gender</th>
                        <th>status</th>
                        <th>place of birth</th>
                       
                        <th>nik/paspor</th>
                        <th>country</th>
                        
                      </tr>
                    </thead>
                   
                  </table>
                </div>
              </div>
              
            </section>
          </div>
        </div>
      </div>

   
    </main>

 <!-- add Profile -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addProfile">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title w-100 font-weight-bold"><?php echo $this->session->userdata('nama_depan');?> <?php echo $this->session->userdata('nama_belakang');?></h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <form method="post" action="profile/create" id="createForm">
      <div class="modal-body">  

              <div class="row">
              <div class="form-group col md-3">
               
                <label>Phone number</label>                   
                    <input type="text" class="form-control" name="tlpn" id="tlpn" placeholder=" " required="">
                  </div>
                </div>
              <div class="row">  
              <div class="form-group col md-3">
                <label>gender</label>
                <select class="form-control" id="jk" name="jk" placeholder="gender" required >
                  <option required ></option>
                  <option id="jk">male</option>
                  <option  id="jk">female</option>
                </select>
             
              </div>  

                <div class="form-group col md-3">
                  <label>marital</label>
                <select class="form-control" id="status" name="status" placeholder="status" required >
                  <option required ></option>
                  <option id="status">single</option>
                  <option id="status">merried</option>
                </select>
             
              </div>  
           </div>

                 <div class="row">
                
              <div class="form-group col md-3">
                <label>birth date</label>
                <input type="date" name="tgl_lahir"  id="tgl_lahir" class="form-control" placeholder="birth date" required >
             
              </div>  

                <div class="form-group col md-3">
                  <label>paspor</label>
                <input type="text" name="nik_paspor" id="nik_paspor" class="form-control" placeholder="*paspor/nik" required >
               
              </div> 

              </div>

                <div class="row">
              <div class="form-group col md-3">
                 <label>country</label>
              <input type="text" class="form-control" id="negara" name="negara" placeholder="country" required >

              </div>   
           
              <div class="form-group col md-3">
              <label >place birth:</label>
           <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="place of birth" required >
              </div> 
            </div>

             <div class="row">
              <div class="form-group col md-4">
              <label for="message-text" class="col-form-label">address:</label>
            <textarea class="form-control" id="alamat" name="alamat" placeholder="address" required> </textarea>
              </div> 
            </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- /add mmebers -->


      


    <!-- removeProfile -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProfileModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100 font-weight-bold"><?php echo $this->session->userdata('nama_depan');?> <?php echo $this->session->userdata('nama_belakang');?></h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove this address ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" id="removeProfileBtn" class="btn btn-primary">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- removeProfile -->