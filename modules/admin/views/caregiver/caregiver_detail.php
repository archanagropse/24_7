<div class="container_full">

    <main class="content_wrapper">

        <div class="page-heading">

            <div class="container-fluid">

                <div class="row d-flex align-items-center">

                    <div class="col-md-6">

                        <div class="page-breadcrumb">

                            <h1> Caregiver Detail </h1>

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

                                    Caregiver Detail

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

                        <h3>Caregiver Name</h3>

                        <h4><?= $caregiver_info['name'] ?>
                        </h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Caregiver Specialties</h3>

                        <h4><?php
                            $speciality = get_speciality($caregiver_info['speciality']);
                            if ($speciality) {
                                foreach ($speciality as $row) {
                                    echo $row['speciality'];
                                }
                            } else {
                                echo "Not Found";
                            }
                            ?>
                        </h4>

                    </div>

                </div>



                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Email Id</h3>

                        <h4><?=
                            $caregiver_info['email'];
                            ?>
                        </h4>

                    </div>

                </div>



                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Date of Birth</h3>

                        <h4><?=
                            date('d-m-Y', strtotime($caregiver_info['dob']));
                            ?>
                        </h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Profile Picture</h3>

                        <?php if ($caregiver_info['image'] != '') { ?>
                            <a href="<?= base_url() . 'assets/images/admin/about-1.jpg'; ?>" target="_blank"><i class="fa fa-picture-o"></i> View Image</a>
                            <?php
                        } else {
                            echo "<h4>Image Not Found</h4>";
                        }
                        ?> 

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Steet Address</h3>

                        <h4><?= $caregiver_info['address']; ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>City</h3>

                        <h4><?= $caregiver_info['city']; ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>State</h3>

                        <h4><?= $caregiver_info['state']; ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Zip Code</h3>

                        <h4><?= $caregiver_info['zip']; ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Primary Phone</h3>

                        <h4><?= $caregiver_info['mobile']; ?>
                        </h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Alternate Phone</h3>

                        <h4><?= $caregiver_info['alternative_mobile']; ?></h4>

                    </div>

                </div>
                







            </div>

        </div>
        <div class="container-fluid Franchieseedetail">


            <div class="row">
                <div class="col-md-12">

                    <h2>Resume & Certification</h2>

                    <div class="form-group row titleeventimage">
                        <?php if ($doc_info != ""): foreach ($doc_info as $img): ?>
                                
                                    <div class="col-sm-4 file-upload my-2 ">
                                        <a href="<?= $img['image']; ?>" target="_blank"><img src="<?= $img['image'] ?>" alt="image"></a>
                                        <h4 class="cush6 text-center" style="color:green !important;">

                                        <?php
                                        if ($img['status'] == 1) {
                                            $getStatus = 'Verified by Admin';
                                            $color = 'background-color:#0b78e1;border-color:#0b78e1';
                                            
                                        } else {
                                            $getStatus = 'Verify';
                                            $color = '';
                                            
                                        }
                                        ?>
                                        &nbsp; <button type="button" onclick="changeSetting(this, '<?= $img['status'] ?>', '<?= $img['id'] ?>');" class="btn btn-primary statusbtn" style="<?= $color ?>"><?= $getStatus; ?></button>
                                    </h4>
                                    </div>
                                    
                                
                                <?php
                            endforeach;

                        endif;
                        ?>
                    </div>
                </div>    



            </div>
        </div>
        <div class="container-fluid Franchieseedetail">

            <div class="row">
                <div class="col-md-12">
                    <h2>Tax Information</h2>
                    <div class="form-group row titleeventimage">
                        <?php
                        if ($tax_info != ""):
                            $status = explode(',', $tax_info['status']);
                            ?>

                            <div class="col-sm-4 file-upload my-2">
                                <?php
                                if ($tax_info['w_4_form'] != ''): $ext = explode('.', $tax_info['w_4_form']);

                                    if (end($ext) != 'pdf'):
                                        ?>

                                        <a href="<?= $tax_info['w_4_form']; ?>" target="_blank"><img src="<?= $tax_info['w_4_form']; ?>" alt="image"></a>

                                    <?php else: ?>
                                        <a href="<?= $tax_info['w_4_form']; ?>" target="_blank"><img src="<?= base_url() ?>assets/images/logo/pdf.png" alt="image"></a>
                                    <?php endif; ?>

                                    <h4 class="cush6 text-center" style="color:green !important;">

                                        <?php
                                        if (in_array('1', $status)) {
                                            $getStatus = 'Verified by Admin';
                                            $color = 'background-color:#0b78e1;border-color:#0b78e1';
                                            $var=0;
                                        } else {
                                            $getStatus = 'Verify';
                                            $color = '';
                                            $var=1;
                                        }
                                        ?>
                                        &nbsp; <button type="button" onclick="verifyDocs(this, '<?=$var ?>', '<?= $tax_info['id'] ?>' , 1);" class="btn btn-primary statusbtn" style="<?= $color ?>"><?= $getStatus; ?></button>
                                    </h4>

                                <?php endif; ?>


                            </div>

                            <div class="col-sm-4 file-upload my-2">
                                <?php
                                if ($tax_info['non_resident_form'] != ''): $ext1 = explode('.', $tax_info['non_resident_form']);
                                    if (end($ext1) != 'pdf'):
                                        ?>

                                        <a href="<?= $tax_info['non_resident_form']; ?>" target="_blank"><img src="<?= $tax_info['non_resident_form']; ?>" alt="image"></a>
                                    <?php else:
                                        ?>
                                        <a href="<?= $tax_info['non_resident_form']; ?>" target="_blank"><img src="<?= base_url() ?>assets/images/logo/pdf.png" alt="image"></a>
                                    <?php endif; ?>
                                    <h4 class="cush6 text-center" style="color:green !important;">

                                        <?php
                                        if (in_array('2', $status)) {
                                            $getStatus = 'Verified by Admin';
                                            $color = 'background-color:#0b78e1;border-color:#0b78e1';
                                            $var=0;
                                        } else {
                                            $getStatus = 'Verify';
                                            $color = '';
                                            $var=2;
                                        }
                                        ?>
                                        &nbsp; <button type="button" onclick="verifyDocs(this, '<?=$var ?>', '<?= $tax_info['id'] ?>', 2);" class="btn btn-primary statusbtn" style="<?= $color ?>"><?= $getStatus; ?></button>
                                    </h4>
                                <?php endif;
                                ?>


                            </div>

                            <div class="col-sm-4 file-upload my-2">
                                <?php
                                if ($tax_info['i_9_form'] != ''): $ext2 = explode('.', $tax_info['i_9_form']);
                                    if (end($ext2) != 'pdf'):
                                        ?>
                                        <a href="<?= $tax_info['i_9_form']; ?>" target="_blank"><img src="<?= $tax_info['i_9_form']; ?>" alt="image"></a>

                                    <?php else: ?>
                                        <a href="<?= $tax_info['i_9_form']; ?>" target="_blank"><img src="<?= base_url() ?>assets/images/logo/pdf.png" alt="image"></a>
                                    <?php endif; ?>
                                    <h4 class="cush6 text-center" style="color:green !important;">

                                        <?php
                                        if (in_array('3', $status)) {
                                            $getStatus = 'Verified by Admin';
                                            $color = 'background-color:#0b78e1;border-color:#0b78e1';
                                            $var=0;
                                        } else {
                                            $getStatus = 'Verify';
                                            $color = '';
                                            $var=3;
                                        }
                                        ?>
                                        &nbsp; <button type="button" onclick="verifyDocs(this, '<?= $var ?>', '<?= $tax_info['id'] ?>' , 3);" class="btn btn-primary statusbtn" style="<?= $color ?>"><?= $getStatus; ?></button>
                                    </h4>
                                <?php endif;
                                ?>


                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>





    </main>

</div>
<script>
    function changeSetting(obj, status, dataId) {
        if (status == '1') {
            var action = '0';
        } else {
            var action = '1';
        }
        if (action && dataId) {
            $.ajax({
                url: "<?php echo base_url("Admin/ajax") ?>",
                type: "POST",
                data: "method=checkStatus&action=" + action + '&dataId=' + dataId + '&type=1',
                success: function (data) {
                    var dta = $.trim(data);
                    var jsonData = $.parseJSON(dta);
                    if (jsonData['error_code'] == 100) {
                        location.reload();
                    } else {
                        alert(jsonData['message']);
                    }
                }
            })
        } else {
            alert("Error");
        }
    }

    function verifyDocs(obj, status, dataId ,type) {

        if (status && dataId && type) {
            $.ajax({
                url: "<?php echo base_url("Admin/ajax") ?>",
                type: "POST",
                data: "method=verifyDoc&action=" + status + '&dataId=' + dataId + '&type='+type,
                success: function (data) {
                    var dta = $.trim(data);
                    var jsonData = $.parseJSON(dta);
                    if (jsonData['error_code'] == 100) {
                        location.reload();
                    } else {
                        alert(jsonData['message']);
                    }
                }
            })
        } else {
            alert("Error");
        }
    }
</script>

