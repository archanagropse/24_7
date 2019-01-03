   
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
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Question 1 : </label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control question" rows="3" name="question[]" data-id="1" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Option 1 : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Option 1" name="option_1[]" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Option 2 : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Option 2" name="option_2[]" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Option 3 : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Option 3" name="option_3[]" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Option 4 : </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Option 4" name="option_4[]" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Correct Answer : </label>
                                    <div class="col-sm-5">
                                      <!--<input type="text" class="form-control" placeholder="Answer Is" name="answer"/>-->
                                        <select name="answer[]" class="form-control" required>
                                            <option disabled selected>Select Answer</option>
                                            <option value="option_1">Option 1</option>
                                            <option value="option_2">Option 2</option>
                                            <option value="option_3">Option 3</option>
                                            <option value="option_4">Option 4</option>
                                        </select>
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
                                        
                                        <a href="#" onclick="addmorequestion();">Add Question</a>
                                        <a href="#" class="bg-danger" onclick="deletequestion();">Delete Question</a>
                                         
                                    </div>
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
<script>
    function addmorequestion() {
        var count=$(".question:last").attr('data-id');
        count++;
        
        var html="";
        html +="<div class='card-body question"+count+"'>";
        html +="<div class='form-group row'>";
        html +="<label class='col-sm-4 control-label'>Question "+count+" : </label>";
        html +="<div class='col-sm-5'>";
        html +="<textarea class='form-control question' rows='3' name='question[]' data-id='"+count+"' required></textarea>";
        html +="</div>";
        html +="</div>";
        html +="<div class='form-group row'>";
        html +="<label class='col-sm-4 control-label'>Option 1 : </label>";
        html +="<div class='col-sm-5'>";
        html +="<input type='text' class='form-control' placeholder='Option 1' name='option_1[]' required/>";
        html +="</div>";
        html +="</div>";
        html +="<div class='form-group row'>";
        html +="<label class='col-sm-4 control-label'>Option 2 : </label>";
        html +="<div class='col-sm-5'>";
        html +="<input type='text' class='form-control' placeholder='Option 2' name='option_2[]' required/>";
        html +="</div>";
        html +="</div>";
        html +="<div class='form-group row'>";
        html +="<label class='col-sm-4 control-label'>Option 3 : </label>";
        html +="<div class='col-sm-5'>";
        html +="<input type='text' class='form-control' placeholder='Option 3' name='option_3[]' required/>";
        html +="</div>";
        html +="</div>";
        html +="<div class='form-group row'>";
        html +="<label class='col-sm-4 control-label'>Option 4 : </label>";
        html +="<div class='col-sm-5'>";
        html +="<input type='text' class='form-control' placeholder='Option 4' name='option_4[]' required/>";
        html +="</div>";
        html +="</div>";
        html +="<div class='form-group row'>";
        html +="<label class='col-sm-4 control-label'>Correct Answer : </label>";
        html +="<div class='col-sm-5'>";
      
        html +="<select name='answer[]' class='form-control' required>";
        html +="<option disabled selected>Select Answer</option>";
        html +="<option value='option_1'>Option 1</option>";
        html +="<option value='option_2'>Option 2</option>";
        html +="<option value='option_3'>Option 3</option>";
        html +="<option value='option_4'>Option 4</option>";
        html +="</select>";
        html +="</div>";
        html +="</div>";

        html +="</div>";
        $(".qbody").append(html);
        
    }
    
        function deletequestion() {
        var check=confirm("Are you sure to delete last question?");
        if(check){
        var count=$(".question:last").attr('data-id');
        if(count != '1'){
        $('.question'+count).remove();
        }else{
            alert('Aleast One Question is required');
        }
    }
    }
</script>

