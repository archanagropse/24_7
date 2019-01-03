<div class="container_full">
    <div class="container-fluid">
        <main class="content_wrapper">
            <div class="page-heading">
                <div class="container-fluid">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6">
                            <div class="page-breadcrumb">
                                <h1>Provider List</h1>
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
                                        Provider List
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
                                        <?php $count1 = 1;
                                        foreach ($provider_list as $data):
                                            ?>
                                            <tr>
                                                <td><?= $count1; ?></td>
                                                <td><?php
                                                    $provider = get_user($data['user_id']);
                                                    if ($provider) {
                                                        echo $provider[0]['name'];
                                                    } else {
                                                        echo "Provider Not Found";
                                                    }
                                                    
                                                    ?>
                                                </td>
                                                <td><?= $provider[0]['email']; ?></td>
                                                <td><?= $provider[0]['mobile']; ?></td>
                                                <td><?= $data['address']; ?></td>

                                                <td class="mytd"><a href="<?php echo base_url('Admin/provider-detail/'.$data['id']); ?>"><i class="fa fa-eye"></i></a>
                                                    <!--<a href="<?php// echo base_url('Provider/edit_provider'.$data['id']); ?>"><i class="fa fa-edit"></i></a>-->
                                                </td>
<!--                                                <td><div class="mytoggle">
                                                        <label class="switch">
                                                            <input type="checkbox" checked>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </td>-->
                                            </tr>
                                        <?php $count1++; endforeach; ?>
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