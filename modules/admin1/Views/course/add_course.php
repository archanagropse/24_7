<div class="container_full">
    <main class="content_wrapper">
        <div class="page-heading">
            <div class="container-fluid">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <div class="page-breadcrumb">
                            <h1>Add Course</h1>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-md-end d-md-flex">
                        <div class="breadcrumb_nav">
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a class="parent-item" href="index.html">Home</a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">
                                    Add Course
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="addcoupon" method="post" class=" right-text-label-form" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-body">
                                <?= $this->session->flashdata('response'); ?>
                                <div class="form-group row titleeventimage">
                                    <label class="col-sm-4 control-label">Video Url : </label>
                                    <div class="col-sm-5 file-upload">
                                        <input type="text" class="form-control" placeholder="File Name" id="file-name"/>
                                        <label for="upload" class="file-upload__label">Upload Video</label>
                                        <input id="upload" class="file-upload__input" type="file" name="video-upload" accept="video/*" onchange="set_value();" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Course Type : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Course Type" name="course_type" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Rating : </label>
                                    <div class="col-sm-5">
                                        <input type="number" min="1" max="5" class="form-control" placeholder="Rating" name="rating" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Course Name : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Course Name" name="course_name" required/>
                                    </div>
                                </div>
                                <div class="form-group row titleeventimage">
                                    <label class="col-sm-4 control-label">Upload Image : </label>
                                    <div class="col-sm-5 file-upload">
                                        <img id="blah1" src="<?php echo site_url(); ?>assets/images/logo/dummy.jpg" alt="your image" />
                                        <label for="upload1" class="file-upload__label">Upload Thumbnail</label>
                                        <input id="upload1" class="file-upload__input" type="file" name="file-upload" onchange="readURL(this, 1);" accept="image/*" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-8 ml-auto">
                                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">
                                            Submit 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </main>
</div>
<script>
    function set_value() {

        var file1 = $.trim($("#upload").val());
        var size = 2097152;
        var file_size = document.getElementById('upload').files[0].size;
        if (file_size >= size) {
            alert('File too large');
            $('#upload').val('');
            return false;
        }
        else{
        var file_name1 = file1.replace(/^.*[\\\/]/, '');

        if (file1 !== '') {
            $('#file-name').val(file_name1);
        }
    }

    }

    function validate() {
        var size = 2097152;
        var file_size = document.getElementById('upload').files[0].size;
        if (file_size >= size) {
            alert('File too large');
            $('#upload').val('');
            return false;
        }
        var type = 'video/*';
        var file_type = document.getElementById('file_upload').files[0].type;
        if (file_type != type) {
            alert('Format not supported,Only .jpeg images are accepted');
            return false;
        }
    }

    function readURL(input, countName) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah1')
                        .attr('src', e.target.result)
                        .width(250)
                        .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>