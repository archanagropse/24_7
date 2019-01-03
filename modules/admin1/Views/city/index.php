    <div class="container_full">
      <main class="content_wrapper">
        <div class="page-heading">
          <div class="container-fluid">
            <div class="row d-flex align-items-center">
              <div class="col-md-6">
                <div class="page-breadcrumb">
                  <h1>Add City</h1>
                </div>
              </div>
              <div class="col-md-6 justify-content-md-end d-md-flex">
                <div class="breadcrumb_nav">
                  <ol class="breadcrumb">
                    <li>
                      <i class="fa fa-home"></i>
                      <a class="parent-item" href="<?= base_url(); ?>Admin/dashboard">Home</a>
                      <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">
                      Add City
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
              <div class="container-fluid">
                <div class="row">
                  <div class=" col-md-12">
                    <div class="card card-shadow mb-4">
                      <div class="card-body">
                        <form id="addcoupon" method="post" class=" right-text-label-form">
                          <div class="form-group row">
                            <label class="col-sm-4 control-label">Add City : </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="City Name" name="city_name" required/>
                              <?php echo form_error('city_name');?>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-8 ml-auto">
                              <button type="submit" class="btn btn-primary">
                                Submit 
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="col-md-6">
                    <div class="container-fluid">
                        <!-- state start-->
                        <div class="row">
                            <div class=" col-sm-12">
                                <div class="card card-shadow mb-4">
                                    <div class="card-body">
                                        <?= $this->session->flashdata('response'); ?>
                                        <table id="bs4-table" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>City</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $count=1;foreach($city_list as $row):?>
                                                <tr>
                                                    <td><?= $count; ?></td>
                                                    <td><?= $row['city']; ?></td>
                                                    <td class="mytd">
                                                      <a href="<?php echo base_url('Admin/delete-city/'.$row['id']);?>"><i class="fa fa-trash"></i></a>
                                                   </td>
                                                </tr>
                                                <?php $count++;endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
          </div>


      </main>
    </div>






<style type="text/css">
  div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;

    width: 75%;
}
</style>
