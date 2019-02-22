 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?php echo  $x;?></h1>
          <p>area Works, go future</p>
        </div>
          <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                 <button class="btn btn-success pull pull-right btn-sm" data-toggle="modal" data-target="#addWorks" onclick="addWorksModel()">
         <i class="fa fa-plus"></i>  Works
        </button>
      </div>
              </div>
       
      </div>
       
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
            <div class="messages"></div>
              
              <br>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped" id="manageWorksTable">
                    <thead>
                      <tr>
                        <th></th>

                        <th>company</th>
                        <th>position</th>
                        <th>deskripsi</th>
                        <th>year</th>
                        
                        
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

 <!-- add Works -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addWorks">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title w-100 font-weight-bold"><?php echo $this->session->userdata('nama_depan');?> <?php echo $this->session->userdata('nama_belakang');?></h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <form method="post" action="works/create" id="createForm">
      <div class="modal-body">  

                     <div class="row">           
                     <div class="form-group col md-3">
                  <label>organisasi</label>
                    <input type="text" class="form-control" name="organisasi" id="organisasi" placeholder=" " required="">
                  </div>
                </div>

                 <div class="row">
                 <div class="form-group col md-3">
                  <label>position</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="position" required >
               
              </div> 

              <div class="form-group col md-3">
                <label>year</label>
                <input type="date" name="tahun"  id="tahun" class="form-control" placeholder="year" required >
             
              </div>  

               

              </div>

                <div class="row">
              <div class="form-group col md-3">
                 <label>salery</label>
              <input type="number" class="form-control" id="gaji" name="gaji" placeholder="salery" required >

              </div>   
           
              
            </div>

             <div class="row">
              <div class="form-group col md-4">
              <label for="message-text" class="col-form-label">jobs description</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="" required> </textarea>
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


      


    <!-- removeWorks -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeWorksModal">
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
        <button type="button" id="removeWorksBtn" class="btn btn-primary">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- removeWorks -->