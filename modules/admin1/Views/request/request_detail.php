<div class="container_full">

    <main class="content_wrapper">

        <div class="page-heading">

            <div class="container-fluid">

                <div class="row d-flex align-items-center">

                    <div class="col-md-6">

                        <div class="page-breadcrumb">

                            <h1> Request Detail </h1>

                        </div>

                    </div>

                    <div class="col-md-6 justify-content-md-end d-md-flex">

                        <div class="breadcrumb_nav">

                            <ol class="breadcrumb">

                                <li>

                                    <i class="fa fa-home"></i>

                                    <a class="parent-item" href="<?= base_url();?>Admin/dashboard">Home</a>

                                    <i class="fa fa-angle-right"></i>

                                </li>

                                <li class="active">

                                    Request Detail

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

                        <h3>Speciality</h3>

                        <h4><?php
                            $speciality = get_speciality($request_info['speciality']);
                            if ($speciality) {
                                echo $speciality[0]['speciality'];
                            } else {
                                echo "unknown";
                            }
                            ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Shift Date</h3>

                        <h4><?= date('d-m-Y', strtotime($request_info['shift_date'])); ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Shift Time</h3>

                        <h4><?= $request_info['shift_time']; ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Contact Person Name</h3>

                        <h4><?= $request_info['person_name'] ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Contact Person No</h3>

                        <h4><?= $request_info['mobile'] ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Location</h3>

                        <h4><?= $request_info['location'] ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>City</h3>

                        <h4><?php
                            $city = get_city($request_info['city_id']);
                            if ($city) {
                                echo $city[0]['city'];
                            } else {
                                echo 'City not found';
                            }
                            ?>
                        </h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Price</h3>

                        <h4><?= $request_info['price'] ?></h4>

                    </div>

                </div>

                <!--                <div class="col-md-6">
                
                                    <div class="detailbox">
                
                                        <h3>Hours</h3>
                
                                        <h4><?//= $request_info['shift_time'] ?></h4>
                
                                    </div>
                
                                </div>-->

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Description</h3>

                        <h4><?= $request_info['description'] ?></h4>

                    </div>

                </div>

            </div>

        </div>
        <div class="container-fluid verification">
            <div class="row">
                <div class="col-sm-3">
                    <div class="adminbutton">
                        <a href="<?php echo base_url('Admin/delete-request/'.$request_info['request_id']); ?>">Delete Request</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="adminbutton">
                        <a href="<?php echo base_url('Admin/request-caregiver/'.$request_info['speciality'].'/'.$request_info['request_id']); ?>">Send To Caregiver </a>
                    </div>
                </div>
            </div>
        </div>

    </main>

</div>



