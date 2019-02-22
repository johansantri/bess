 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?php echo  $x;?></h1>
          <p>area Education, go future</p>
        </div>
        
          <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                 <button class="btn btn-success pull pull-right btn-sm" data-toggle="modal" data-target="#addEducation" onclick="addEducationModel()">
         <i class="fa fa-plus"></i>  Education
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
                  <table class="table table-striped" id="manageEducationTable">
                    <thead>
                      <tr>
                        <th></th>
                        <th>institution</th>
                        <th>department</th>
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

 <!-- add Education -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addEducation">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title w-100 font-weight-bold"><?php echo $this->session->userdata('nama_depan');?> <?php echo $this->session->userdata('nama_belakang');?></h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <form method="post" action="education/create" id="createForm">
      <div class="modal-body">  

              <div class="row">
              <div class="form-group col md-3">
                <label>institution</label>                   
                    <input type="text" class="form-control" id="institusi" name="institusi" placeholder="institution " required>
                  </div>
                </div>
             

                 <div class="row">                
              <div class="form-group col md-3">
                <label>department</label>
                <input type="text" name="jurusan"  id="jurusan" class="form-control" placeholder="department" required >
             
              </div>     

               <div class="form-group col md-3">
                <label>level</label>
                <input type="text" name="level_pendidikan"  id="level_pendidikan" class="form-control" placeholder="level" required >
             
              </div>             

              </div>

                <div class="row">
              <div class="form-group col md-3">
                 <label>year</label>
              <input type="date" class="form-control" id="tahun" name="tahun_lulus" placeholder="year" required >

              </div>   
           
              <div class="form-group col md-3">
              <label >IPK</label>
           <input type="text" class="form-control" id="nilai" name="nilai" placeholder=" IPK " required >
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


      


    <!-- removeEducation -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeEducationModal">
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
        <button type="button" id="removeEducationBtn" class="btn btn-primary">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- removeEducation -->