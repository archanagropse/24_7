<div class="container_full">

    <div class="container-fluid">

        <main class="content_wrapper">

            <div class="page-heading">

                <div class="container-fluid">

                    <div class="row d-flex align-items-center">

                        <div class="col-md-6">

                            <div class="page-breadcrumb">

                                <h1>Caregiver List</h1>

                            </div>

                        </div>

                        <div class="col-md-6 justify-content-end d-flex">

                            <div class="breadcrumb_nav">

                                <ol class="breadcrumb">

                                    <li>

                                        <i class="fa fa-home"></i>

                                        <a class="parent-item" href="<?php echo base_url('Admin/dashboard'); ?>">Home</a>

                                        <i class="fa fa-angle-right"></i>

                                    </li>

                                    <li class="active">

                                        Caregiver List

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

                                <table id="bs4-table" class="table table-bordered table-striped" cellspacing="0" width="100%">

                                    <thead>

                                        <tr>

                                            <th>Sr.No</th>

                                            <th>Name</th>


                                            <th>Email Id</th>

                                            <th>Mobile</th>

                                            <th>City</th>

                                            <th>Action</th>

                                            <!--<th>Status</th>-->

                                        </tr>

                                    </thead>



                                    <tbody>

                                        <?php $count = 1;
                                        foreach ($caregiver_list as $row):
                                            ?>
                                            <tr>
                                                <td><?= $count; ?></td>
                                                <td><?=
                                                    $row['name']
                                                    ?>
                                                </td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['mobile'] ?></td>
                                                <td><?= $row['city']; ?></td>


                                                <td class="mytd"><a href="<?php echo base_url('Admin/caregiver-detail/'.$row['user_id']); ?>"><i class="fa fa-eye"></i></a>

<!--                                                    <a href="<?php //echo base_url('Caregiver/edit-caregiver/'.$row['id']); ?>"><i class="fa fa-edit"></i></a>-->

                                                </td>

<!--                                                <td><div class="mytoggle">

                                                        <label class="switch">

                                                            <input type="checkbox" checked>

                                                            <span class="slider round"></span>

                                                        </label>

                                                    </div>

                                                </td>-->
                                            </tr>
                                            <?php $count++;
                                        endforeach;
                                        ?>

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
