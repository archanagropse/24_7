    <div class="container_full">

      <main class="content_wrapper">

        <div class="page-heading">

          <div class="container-fluid">

            <div class="row d-flex align-items-center">

              <div class="col-md-6">

                <div class="page-breadcrumb">

                  <h1> Course Detail </h1>

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

                      Course Detail

                    </li>

                  </ol>

                </div>

              </div>

            </div>

          </div>

        </div>



<div class="container-fluid Franchieseedetail">
    <?=$this->session->flashdata('response'); ?>
     <div class="row float-right">
                <div class="col-md-2 ml-5">
                     <a class="btn btn-primary" href="<?= base_url()."Admin/add-question/".$course['id'] ?>">Add Question</a>
                </div>
            </div>

          <div class="row">

            <div class="col-md-4">

                <div class="detailbox">

                    <h3>Video Url</h3>

                   <a href="<?= $course['video'] ?>" target="_blank"><?= $course['video'] ?></a>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Course Type</h3>

                   <h4><?= $course['course_type'] ?></h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                   <h3>Course Name</h3>

                   <h4><?= $course['course_name'] ?></h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                  <h3>Rating</h3>

                   <h4><?= $course['rating'] ?></h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="detailbox">

                 <h3>Course Image</h3>

                   <a href="<?= $course['image'] ?>" target="_blank"><i class="fa fa-picture-o"></i> View Image</a>

                </div>

            </div>
           
          </div>
          
</div>

           
                          <div class="container-fluid">

                        <!-- state start-->

                        <div class="row">

                            <div class=" col-sm-12">

                                <div class="card card-shadow mb-4">

                                    <div class="card-body">

                                        <table id="bs4-table" class="table table-bordered table-striped" cellspacing="0" width="100%">

                                            <thead>

                                                <tr>

                                                    <th>Question No</th>

                                                    <th>Question</th>

                                                    <th>Option 1</th>

                                                    <th>Option 2</th>

                                                    <th>Option 3</th>

                                                    <th>Option 4</th>

                                                    <th>Correct Answer</th>

                                                    <th>Action</th>

                                                    <th>Status</th>

                                                </tr>

                                            </thead>



                                            <tbody>
                                                <?php $count=1;foreach($question as $row):?>
                                                    <tr>

                                                    <td><?= $count; ?></td>

                                                    <td><?=$row['question']; ?></td>

                                                    <td><?=$row['option_1']; ?></td>

                                                    <td><?=$row['option_2']; ?></td>

                                                    <td><?=$row['option_3']; ?></td>

                                                    <td><?=$row['option_4']; ?></td>

                                                    <td><?=$row['answer']; ?></td>

                                                    <td class="mytd">

                                                      <a href="<?php echo base_url('Admin/edit-question/'.$row['id']);?>"><i class="fa fa-edit"></i></a>

                                                   </td>

                                                    <td><div class="mytoggle">

                                                            <label class="switch">

                                                              <input type="checkbox" <?php if($row['status']== '1'){echo "checked";}?> onchange="checkStatus(this, '<?= $row['id']; ?>');" id="switch-<?= $count; ?>" >

                                                              <span class="slider round"></span>

                                                            </label>

                                                         </div>

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

      </main>

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
                data: 'method=checkStatus&dataId=' + id + '&action=' + status+'&type=3',
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