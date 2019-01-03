   
<div class="container_full">
    <main class="content_wrapper">
        <div class="page-heading">
            <div class="container-fluid">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <div class="page-breadcrumb">
                            <h1>Add Question</h1>
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
                                    Add Question
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="addcoupon" method="post" class=" right-text-label-form" action="#">

            <div class="container-fluid">
                <div class="row">
                    <div class=" col-md-12">
                        <div class="card card-shadow mb-4 qbody">
                            <div class="card-body question1">
                                <?=$this->session->flashdata('response'); ?>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Question 1 : </label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control question" rows="3" name="question" data-id="1" ><?= isset($_POST['question'])? $_POST['question']: $question['question']; ?></textarea>
                                        <?= form_error('question') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Option 1 : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Option 1" name="option_1" value="<?= isset($_POST['option_1'])? $_POST['option_1']: $question['option_1']; ?>"/>
                                        <?= form_error('option_1') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Option 2 : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Option 2" name="option_2" value="<?= isset($_POST['option_2'])? $_POST['option_2']: $question['option_2']; ?>"/>
                                        <?= form_error('option_2') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Option 3 : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Option 3" name="option_3" value="<?= isset($_POST['option_3'])? $_POST['option_3']: $question['option_3']; ?>"/>
                                        <?= form_error('option_3') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Option 4 : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Option 4" name="option_4"  value="<?= isset($_POST['option_4'])? $_POST['option_4']: $question['option_4']; ?>"/>
                                        <?= form_error('option_4') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Correct Answer : </label>
                                    <div class="col-sm-5">
                                      <!--<input type="text" class="form-control" placeholder="Answer Is" name="answer"/>-->
                                        <select name="answer" class="form-control"  >
                                            <option disabled selected>Select Answer</option>
                                            <option value="option_1" <?=$question['answer']== 'option_1'?'selected': ''; ?>>Option 1</option>
                                            <option value="option_2" <?=$question['answer']== 'option_2'?'selected': ''; ?>>Option 2</option>
                                            <option value="option_3" <?=$question['answer']== 'option_3'?'selected': ''; ?>>Option 3</option>
                                            <option value="option_4" <?=$question['answer']== 'option_4'?'selected': ''; ?>>Option 4</option>
                                        </select>
                                        <?= form_error('answer') ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="container-fluid">
                <div class="row">
                    <div class=" col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-body">
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6 ml-auto addmore">
                                       <button type="submit" class="btn btn-primary" name="addQuestion">
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



