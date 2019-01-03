         <div class="container_full">

      <div class="content_wrapper">
        <div class="container-fluid">
          <!-- breadcrumb -->
          <div class="page-heading">
            <div class="row d-flex align-items-center">
              <div class="col-md-6">
                <div class="page-breadcrumb">
                  <h1>Dashboard</h1>
                </div>
              </div>
              <div class="col-md-6 justify-content-md-end d-md-flex">
                <div class="breadcrumb_nav">
                  <ol class="breadcrumb">
                    <li>
                      <i class="fa fa-home"></i>
                      <a class="parent-item" href="<?php echo base_url('Admin/dashboard');?>">Home</a>
                      <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">
                      Dashboard
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- breadcrumb_End -->
          <!-- base_view_box -->
          <div class="base_view">
            <div class="row">
              <div class="col-xl-3 col-md-6">
                <div class="info_items bg_green d-flex align-items-center">
                  <span class="info_items_icon">
                    <i class="fa fa-users"></i>
                  </span>
                  <div class="info_item_content">
                    <span class="info_items_text">Caregiver users</span>
                    <span class="info_items_number">450</span>
                  </div>
                </div>
              </div>
              <!-- /info-box-content -->
              <div class="col-xl-3 col-md-6">
                <div class="info_items bg_yellow d-flex align-items-center">
                  <span class="info_items_icon">
                    <i class="fa fa-user"></i>
                  </span>
                  <div class="info_item_content">
                    <span class="info_items_text">Provider users</span>
                    <span class="info_items_number">155</span>
                  </div>
                </div>
              </div>
              <!-- /info-box-content -->
              <div class="col-xl-3 col-md-6">
                <div class="info_items bg_blue d-flex align-items-center">
                  <span class="info_items_icon">
                    <i class="fa fa-book"></i>
                  </span>
                  <div class="info_item_content">
                    <span class="info_items_text">Total Request</span>
                    <span class="info_items_number">52</span>
                  </div>
                </div>
              </div>
              <!-- /info-box-content -->
              <div class="col-xl-3 col-md-6">
                <div class="bg_pink info_items d-flex align-items-center">
                  <span class="info_items_icon">
                    <i class="fa fa-usd"></i>
                  </span>
                  <div class="info_item_content">
                    <span class="info_items_text">Complete Project</span>
                    <span class="info_items_number">30</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </div>
            </div>
          </div>
          <!-- Site_view_box_End -->
          <!-- Chat -->
          <div class="chart_section">
            <div class="row">
              <div class="col-lg-6">
                <div class="full_chart card">
                  <div class="chart_header">
                    <div class="chart_headibg">
                      <h3>Caregiver List</h3>
                    </div>
                  </div>
                  <div class="mytablehome">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Name</th>
                              <th>E-mail</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php $count=1;foreach($caregiver_list as $row): ?>
                              <tr>
                                  <td><?= $count; ?></td>
                                  <td><?= $row['name'];
                                            ?>
                                  </td>
                                  <td><?= $row['email'] ?></td>
                                  <td><a href="<?= base_url().'Admin/caregiver-detail/'.$row['user_id'] ?>"><i class="fa fa-eye"></i></a></td>
                              </tr>
                           <?php $count++;endforeach; ?>
                          </tbody>
                        </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="full_chart card">
                  <div class="chart_header">
                    <div class="chart_headibg">
                      <h3>Provider List</h3>
                    </div>
                  </div>
                  <div class="mytablehome">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $count1=1;foreach($provider_list as $data): ?>
                              <tr>
                                  <td><?= $count1; ?></td>
                                  <td><?php $provider=get_user($data['user_id']);
                                            if($provider){
                                                echo $provider[0]['name'];
                                            }
                                            else{
                                                echo "Provider Not Found";
                                            }?>
                                  </td>
                                  <td><?= $provider[0]['email']; ?></td>
                                  <td><a href="<?= base_url().'Admin/provider-detail/'.$data['id'] ?>"><i class="fa fa-eye"></i></a></td>
                              </tr>
                           <?php $count1++;endforeach; ?>
                          </tbody>
                        </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>