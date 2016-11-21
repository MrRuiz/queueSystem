<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta charset="utf-8">

		<meta name="description" content="Queue App Technical Test">
		<meta name="keywords" content="HTML, CSS, JS, SASS, BOOTSTRAP, jQUERY, FONT-AWESOME, PHP, CODEIGNITER, MYSQL, GIT">

		<meta author="Rafael Ruiz Morales">
		
		<title>Queue App</title>
		
		<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>/css/app.css">
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center">Queue App</h1>
					</div>
				</div>
			</div>
		</header>
		
		<main>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
  							<div class="panel-heading">
  								<h2><i class="fa fa-user" aria-hidden="true"></i> New Customer</h2>
  							</div>
  							<div class="panel-body">
  								<?php
  									$attributes = array('id' => 'queue-form'); 
  									echo form_open(base_url(). 'index.php/queue/add_user', $attributes); 
  								?>
  									<fieldset class="form-group">
									    
									    <legend>
									    	<h3>Services</h3>
									    </legend>

									    <?php foreach( $services as $key => $service ): ?>
									    	<div class="form-check">
										      	<label class="form-check-label">
										        	<input type="radio" class="form-check-input" name="services" id="service-<?php echo $service->id; ?>" value="<?php echo $service->id; ?>" <?php echo  set_radio('services', $service->id); ?> <?php echo ($key === 0) ? 'checked' : ''; ?> > <?php echo $service->name; ?>
										      	</label>
										    </div>
									    <?php endforeach; ?>
									    
									    <div class="btn-group" data-toggle="buttons">
										    <?php foreach( $typeOfUsers as $key => $typeOfUser ): ?>
										    	<label class="btn btn-primary <?php echo ($key === 0) ? 'active' : ''; ?>">
													<input type="radio" name="users" id="user-<?php echo $typeOfUser->id; ?>" value="<?php echo $typeOfUser->id; ?>" <?php echo set_radio('users', $typeOfUser->id); ?> autocomplete="off" <?php echo ($key === 0) ? 'checked' : ''; ?> > <?php echo $typeOfUser->type; ?>
												</label>
										    <?php endforeach; ?>
									    </div>
											
										<div class="user-fields">

											<div class="citizen-fields">
										
												<div class="form-group">
											    	<label for="title">Title</label>
												    <select class="form-control" id="title" name="title">
												      	<option value="Mr."   <?php echo  set_select('title', 'Mr.');   ?> >Mr.</option>
												      	<option value="Mrs."  <?php echo  set_select('title', 'Mrs.');  ?> >Mrs.</option>
												      	<option value="Miss"  <?php echo  set_select('title', 'Miss');  ?> >Miss</option>
												      	<option value="Dr."   <?php echo  set_select('title', 'Dr.');   ?> >Dr.</option>
												      	<option value="Prof." <?php echo  set_select('title', 'Prof.'); ?> >Prof.</option>
												      	<option value="Rev"   <?php echo  set_select('title', 'Rev');   ?> >Rev.</option>
												      	<option value="Other" <?php echo  set_select('title', 'Other'); ?> >Other</option>
											    	</select>
											  	</div>

											  	<div class="form-group">
											    	<label for="first-name">First Name</label>
											    	<input type="text" class="form-control" id="first-name" name="first-name" value="<?php echo set_value('first-name'); ?>" placeholder="Enter First name">
											  		<div class="text-danger"></div>
											  	</div>

											  	<div class="form-group">
											    	<label for="last-name">Last Name</label>
											    	<input type="text" class="form-control" id="last-name" name="last-name" value="<?php echo set_value('last-name'); ?>" placeholder="Enter Last name">
											  		<div class="text-danger"></div>
											  	</div>

											</div>

											<div class="organisation-fields">

												<div class="form-group">
											    	<label for="organisation">Organisation</label>
											    	<input type="text" class="form-control" id="organisation" name="organisation" value="<?php echo set_value('organisation'); ?>" placeholder="Enter Organaisation">
											  		<div class="text-danger"></div>
											  	</div>

											</div>

										</div>

									 </fieldset>

									 <button type="submit" id="queue-form-submit" class="btn btn-primary">Submit</button>

  								<?php echo form_close(); ?>
  							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
  							<div class="panel-heading">
  								<h2><i class="fa fa-list-ol" aria-hidden="true"></i> Queue</h2>
  							</div>
  							<div class="panel-body">

  								<?php if( count($users) > 0 ): ?>
  								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Type</th>
											<th>Name</th>
											<th>Service</th>
											<th>Queue At</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($users as $user): ?>
											<?php $fullName = $user->title . " " .$user->first_name . " " . $user->last_name; ?>
											<tr>
												<th scope="row"><?php echo $user->id; ?></th>
												<td><?php echo $user->type; ?></td>
												<td><?php echo  (strcmp(trim($fullName), "") == 0) ? "Anonymous" : $fullName; ?></td>
												<td><?php echo $user->name; ?></td>
												<td><?php echo $user->queue_at; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							<?php else: ?>
								<p class="lead text-center">There are no people queuing at the moment! </p>
							<?php endif; ?>
  							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						
					</div>
				</div>
			</div>
		</footer>

		
		<script src="<?php echo assets_url(); ?>/js/app.js"></script>

	</body>
</html>