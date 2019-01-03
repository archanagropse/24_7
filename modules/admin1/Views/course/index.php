        <div class="container_full">
            <div class="container-fluid">
                <main class="content_wrapper">
                    <div class="page-heading">
                        <div class="container-fluid">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6">
                                    <div class="page-breadcrumb">
                                        <h1>Courses List</h1>
                                    </div>
                                </div>
                                <div class="col-md-6 justify-content-end d-flex">
                                    <div class="breadcrumb_nav">
                                        <ol class="breadcrumb">
                                            <li>
                                                <i class="fa fa-home"></i>
                                                <a class="parent-item" href="<?php echo site_url('dashboard');?>">Home</a>
                                                <i class="fa fa-angle-right"></i>
                                            </li>
                                            <li class="active">
                                                Courses List
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
                                         <?= $this->session->flashdata('response'); ?>
                                        <table id="bs4-table" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Courses Type</th>
                                                    <th>Courses Name</th>
                                                    <th>Rating</th>
                                                    <th>No of Question</th>
                                                    <th>Action</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $i=1;foreach($course_list as $list):?>
                                                <tr>
                                                    <td><?= $list['course_type']?></td>
                                                    <td><?= $list['course_name']?></td>
                                                    <td><?= $list['rating']?></td>
                                                    <td><?php $count=get_data('course_id',$list['id'],'question');echo $count;?></td>
                                                    <td class="mytd"><a href="<?php echo base_url('Admin/course-detail/'.$list['id']);?>"><i class="fa fa-eye"></i></a>
                                                      <a href="<?php echo base_url('Admin/edit-courses/'.$list['id']);?>"><i class="fa fa-edit"></i></a>
                                                   </td>
                                                    <td><div class="mytoggle">
                                                            <label class="switch">
                                                              <input type="checkbox" <?php if($list['status']== '1'){echo "checked";}?> onchange="checkStatus(this, '<?= $list['id']; ?>');" id="switch-<?= $i; ?>">
                                                              <span class="slider round"></span>
                                                            </label>
                                                         </div>
                                                    </td>
                                                </tr>
                                                <?php  $i++;endforeach; ?>
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
<script>
    function checkStatus(obj, id) {
        var checked = $(obj).is(':checked');
        if (checked == true) {
            var status = 1;
        } else {
            var status = 0;
        }
        if (id) {
            $.ajax({
                url: "<?= base_url(); ?>admin/ajax",
                type: 'post',
                data: 'method=checkCourseStatus&id=' + id + '&status=' + status,
                success: function (data) {
                    var dt = $.trim(data);
                    var jsonData = $.parseJSON(dt);
                    if (jsonData['error_code'] == "100") {
                        location.reload();
                    } else {
                        alert(jsonData['message']);
                    }
                }
            });
        } else {
            alert("Something Wrong");
        }
    }
    
  </script>