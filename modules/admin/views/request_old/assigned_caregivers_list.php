        <div class="container_full">

            <div class="container-fluid">

                <main class="content_wrapper">

                    <div class="page-heading">

                        <div class="container-fluid">

                            <div class="row d-flex align-items-center">

                                <div class="col-md-6">

                                    <div class="page-breadcrumb">

                                        <h1>Assigned Caregiver List</h1>

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

                                                Assigned Caregiver List

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

                                                    <th>Name</th>

                                                    <th>Email</th>

                                                    <th>Mobile</th>
                                                    <th>City</th>

                                                    <th>Action</th>

                                                </tr>

                                            </thead>



                                            <tbody>
                                                <?php $count=1;foreach($request_list as $row):?>
                                                
                                                <tr>
                                                    <td><?= $count; ?></td>
                                                <td><?php
                                                    $caregiver = get_user($row['user_id']);
                                                    if ($caregiver) {
                                                        echo $caregiver[0]['name'];
                                                    } else {
                                                        echo "Caregiver Not Found";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $caregiver[0]['email'] ?></td>
                                                <td><?= $caregiver[0]['mobile'] ?></td>
                                                <td><?= $row['city']; ?></td>


                                                <td class="mytd">
													<a href="<?php echo base_url('Caregiver/caregiver-detail/'.$row['id']); ?>"><i class="fa fa-eye"></i></a>
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
