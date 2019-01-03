    <div class="container_full">

      <main class="content_wrapper">

        <div class="page-heading">

          <div class="container-fluid">

            <div class="row d-flex align-items-center">

              <div class="col-md-6">

                <div class="page-breadcrumb">

                  <h1> Provider Detail </h1>

                </div>

              </div>

              <div class="col-md-6 justify-content-md-end d-md-flex">

                <div class="breadcrumb_nav">

                  <ol class="breadcrumb">

                    <li>

                      <i class="fa fa-home"></i>

                      <a class="parent-item" href="<?= base_url('Admin/dashboard') ?>">Home</a>

                      <i class="fa fa-angle-right"></i>

                    </li>

                    <li class="active">

                      Provider Detail

                    </li>

                  </ol>

                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="container-fluid Franchieseedetail">

          <div class="row">

           

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Provider Name</h3>

                   <h4><?php
                            $provider = get_user($provider_info['user_id']);
                            if ($provider) {
                                echo $provider[0]['name'];
                            } else {
                                echo "Provider Not Found";
                            }
                            ?></h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Email Id</h3>

                   <h4><?php
                            if ($provider) {
                                echo $provider[0]['name'];
                            } else {
                                echo "Provider Not Found";
                            }
                            ?></h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Phone No</h3>

                   <h4><?php
                            if ($provider) {
                                echo $provider[0]['mobile'];
                            } else {
                                echo "Provider Number Not Found";
                            }
                            ?></h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Date of Birth</h3>

                   <h4><?php
                            if ($provider) {
                                echo date('d-m-Y', strtotime($provider[0]['dob']));
                            } else {
                                echo "Dob Not Found";
                            }
                            ?>
                   </h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Company Name</h3>

                     <h4><?= $provider_info['company_name']; ?></h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Company Person Name</h3>

                     <h4><?= $provider_info['company_person_name']; ?></h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Profile Image</h3>

                   <a href="#" target="_blank"><i class="fa fa-picture-o"></i> View Image</a>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Address</h3>

                     <h4><?= $provider_info['address']; ?></h4>

                </div>

            </div>

          </div>

        </div>

      </main>

    </div>

