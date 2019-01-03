<div class="container_full">

    <div class="container-fluid">

        <main class="content_wrapper">
            <form method="post">
            <div class="page-heading">

                <div class="container-fluid">

                    <div class="row d-flex align-items-center">

                        <div class="col-md-6">

                            <div class="page-breadcrumb">

                                <h1>Caregiver Request</h1>

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

                                        Caregiver Request

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
                                <?php $this->session->flashdata('response');?>
                                
                                <table id="bs4-table" class="table table-bordered table-striped" cellspacing="0" width="100%">

                                    <thead>

                                        <tr>

                                            <th>Sr.No</th>

                                            <th>Name</th>
                                            <th>Speciality</th>

                                            <th>Email Id</th>

                                            <th>Mobile</th>

                                            <th>City</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>



                                    <tbody>
                                        <?php $count = 1;
                                        foreach ($caregiver_info as $row): ?>
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
                                                <td><?php
                                                    $speciality = get_speciality($row['speciality']);
                                                    if ($speciality) {
                                                        foreach ($speciality as $data) {
                                                            echo $data['speciality'];
                                                        }
                                                    } else {
                                                        echo "Not Found";
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    if ($caregiver) {
                                                        echo $caregiver[0]['name'];
                                                    } else {
                                                        echo "Caregiver Not Found";
                                                    }
                                                    ?>
                                                </td>

                                                <td><?php
                                                    if ($caregiver) {
                                                        echo $caregiver[0]['mobile'];
                                                    } else {
                                                        echo "Primary Number Not Found";
                                                    }
                                                    ?>
                                                </td>

                                                <td><?= $row['city'];?></td>
                                                <td>
                                                    <input type="checkbox" class="form-control" name="select_caregiver[]" value="<?= $row['user_id']; ?>">

                                                </td>



                                            </tr>

                                            <?php $count++;
                                        endforeach; ?>

                                    </tbody>

                                </table>
                                

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <div class="container-fluid verification">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="adminbutton">
                            <button type="submit">Send Request </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </main>

    </div>

</div>