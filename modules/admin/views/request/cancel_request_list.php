        <div class="container_full">

            <div class="container-fluid">

                <main class="content_wrapper">

                    <div class="page-heading">

                        <div class="container-fluid">

                            <div class="row d-flex align-items-center">

                                <div class="col-md-6">

                                    <div class="page-breadcrumb">

                                        <h1>Provider Cancel Request List</h1>

                                    </div>

                                </div>

                                <div class="col-md-6 justify-content-end d-flex">

                                    <div class="breadcrumb_nav">

                                        <ol class="breadcrumb">

                                            <li>

                                                <i class="fa fa-home"></i>

                                                <a class="parent-item" href="<?php echo base_url('dashboard');?>">Home</a>

                                                <i class="fa fa-angle-right"></i>

                                            </li>

                                            <li class="active">

                                                Provider Request

                                            </li>

                                        </ol>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!--page title end-->

                    <div class="container-fluid">

                        <!-- state start-->

                        <div class="row">

                            <div class=" col-sm-12">

                                <div class="card card-shadow mb-4">

                                    <div class="card-body">
                                        <?php echo $this->session->flashdata('response');?>

                                        <table id="bs4-table" class="table table-bordered table-striped" cellspacing="0" width="100%">

                                            <thead>

                                                <tr>

                                                    <th>Sr.No</th>

                                                    <th>Speciality</th>

                                                    <th>C-Name</th>

                                                    <th>C-Mobile</th>

                                                    <th>Action</th>

                                                </tr>

                                            </thead>



                                            <tbody>
                                                <?php $count=1;foreach($request_list as $row):?>
                                                
                                                <tr>
                                                    <td><?= $count; ?></td>
                                                    <td><?php
                                                            $speciality = get_speciality($row['speciality']);
                                                            if ($speciality) {
                                                                echo $speciality[0]['speciality'];
                                                            } else {
                                                                echo "unknown";
                                                            }
                                                            ?></td>

                                                    

                                                    <td><?= $row['person_name'] ?></td>

                                                    <td><?= $row['mobile'] ?></td>

                                                    <td class="mytd">
													<a href="<?php echo base_url('Request/request-detail/'.$row['request_id']);?>"><i class="fa fa-eye"></i></a>
														<a href="<?php echo base_url('Request/delete-request/'.$row['request_id']); ?>"><i class="fa fa-trash"></i></a>

<!--                                                      <a href="<?php //echo base_url('edit-request');?>"><i class="fa fa-edit"></i></a>-->

                                                   </td>


                                                </tr>
                                                <?php $count++;endforeach; ?>
                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </main>

            </div>

        </div>
