<div class="container_full">

    <main class="content_wrapper">

        <div class="page-heading">

            <div class="container-fluid">

                <div class="row d-flex align-items-center">

                    <div class="col-md-6">

                        <div class="page-breadcrumb">

                            <h1> Request Detail </h1>

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

                                    Request Detail

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

                        <h3>Speciality</h3>

                        <h4><?php
                            $speciality = get_speciality($request_info['speciality']);
                            if ($speciality) {
                                echo $speciality[0]['speciality'];
                            } else {
                                echo "unknown";
                            }
                            ?></h4>

                    </div>

                </div>
				<div class="col-md-4">
					<div class="detailbox">
						<h3>Shift Type</h3>
						<h4><?php 
						$getArr=array(1=>'Daily',2=>'Weakly',3=>'Monthly',4=>'Yearly');
						foreach($getArr as $key=>$val){
							if($key==$request_info['shift_type']){
								echo $val;
							}
						}
						?></h4>

                    </div>
				</div>
				<div class="col-md-4">
					<div class="detailbox">
						<?php 
						$workingTypeKey='';
						$getArr=array(1=>'Days',2=>'Weak',3=>'Month',4=>'Year');
						foreach($getArr as $key=>$val){
							if($key==$request_info['shift_type']){
								echo '<h3>Working '.$val.'</h3>';
								$workingTypeKey=$val;
							}
						}
						?>
						<h4><?=$request_info['shift_numbers'].' '.$workingTypeKey;?></h4>
					</div>
				</div>
				<?php if($request_info['shift_type']==2){?>
				<div class="col-md-4">
					<div class="detailbox">
						<h3>Working Days</h3>
						<h4><?php
						$request_info['shift_days']=ltrim($request_info['shift_days'],',');
						$request_info['shift_days']=rtrim($request_info['shift_days'],',');
						$shift_days=explode(',',$request_info['shift_days']);
						//print_r($shift_days);
						foreach($shift_days  as $val){
							if($val==1){ echo 'Mon,'; }
							if($val==2){ echo 'Tue,'; }
							if($val==3){ echo 'Wed,'; }
							if($val==4){ echo 'Thu,'; }
							if($val==5){ echo 'Fri,'; }
							if($val==6){ echo 'Sat,'; }
							if($val==7){ echo 'Sun,'; }
						}
						?></h4>
					</div>
				</div><?php } ?>
				<div class="col-md-4">
					<div class="detailbox">
						<h3>Working Hours(per Day)</h3>
						<h4><?=$request_info['working_hours']; ?> Hours</h4>
					</div>
				</div>
				<div class="col-md-4">
					<div class="detailbox">
						<h3>Shift Date</h3>
						<h4><?= date('d-m-Y', strtotime($request_info['shift_date'])); ?></h4>
					</div>
				</div>

                <div class="col-md-4">
					<div class="detailbox">
						<h3>Shift Time</h3>
						<h4><?= $request_info['shift_time']; ?></h4>
					</div>
				</div>
				<div class="col-md-4">
					<div class="detailbox">
						<h3>Created Date</h3>
						<h4><?= $request_info['date_time']; ?></h4>
					</div>
				</div>


            </div>

        </div>
		<div class="container-fluid Franchieseedetail">

            <div class="row">



                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Provider Name</h3>

                        <h4><a href="<?=base_url('Provider/provider-detail/'.$request_info['provider_id']);?>"><?php echo $request_info['provider_name']; ?> <i class="fa fa-eye"></i></a></h4>

                    </div>

                </div>
				
                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Contact Person Name</h3>

                        <h4><?= $request_info['person_name'] ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Contact Person No</h3>

                        <h4><?= $request_info['mobile'] ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Location</h3>

                        <h4><?= $request_info['location'] ?></h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>City</h3>

                        <h4><?php
                            $city = get_city($request_info['city_id']);
                            if ($city) {
                                echo $city[0]['city'];
                            } else {
                                echo 'City not found';
                            }
                            ?>
                        </h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="detailbox">

                        <h3>Price</h3>

                        <h4><?= $request_info['price'] ?></h4>

                    </div>

                </div>

                <!--                <div class="col-md-6">
                
                                    <div class="detailbox">
                
                                        <h3>Hours</h3>
                
                                        <h4><?//= $request_info['shift_time'] ?></h4>
                
                                    </div>
                
                                </div>-->

                <div class="col-md-12">

                    <div class="detailbox">

                        <h3>Description</h3>

                        <h4><?= $request_info['description'] ?></h4>

                    </div>

                </div>

            </div>

        </div>
		<?php if($request_info['status']==0){?>
			<div class="container-fluid verification">
				<div class="row">
					<div class="col-sm-3">
						<div class="adminbutton">
							<a href="<?php echo base_url('Request/delete-request/'.$request_info['request_id']); ?>">Delete Request</a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="adminbutton">
							<a href="<?php echo base_url('Request/request-caregiver/'.$request_info['speciality'].'/'.$request_info['request_id']); ?>">Send To Caregiver </a>
						</div>
					</div>
				</div>
			</div>
		<?php }else if($request_info['status']==4){ ?>
			<div class="container-fluid verification">
				<div class="row">
					<div class="col-sm-12">
						<a href="<?php echo base_url('Request/assigned-caregivers-list/'.$request_info['request_id']); ?>">Views Assigned Caregivers List.<a>
					</div>
				</div>
			</div>
		<?php } ?>

    </main>

</div>



