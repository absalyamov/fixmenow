<h1>ЦУП </h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url(); ?>masters/"><i class="fa fa-dashboard"></i>Компетенции</a></li>
  <li class="active">правка мастера</li>
</ol>
</section>
<section class="content">
  <div class="row">
  	<div class="col-md-12">
  		<?php if(isset($error)){ echo $error; } ?>
  	</div>
  </div>

  <form action="" method="post"  enctype="multipart/form-data">
  <input type="hidden" name="sf" value="1">
  <div class="row">
  	<div class="col-md-12">
  		<div class="panel panel-default">
  			<div class="panel-heading">правка мастера</div>
  			<div class="panel-body">
  				<div class="row">
  					<div class="col-md-12">
  						<h3>Инфо о мастере</h3> <hr>
  						<div class="row">
  							<div class="col-md-3 form-group">
  								<label for="master_id">ID мастера<span class="req">*</span></label>
								<input type="text" disabled="disabled" class="form-control" name="master_id" id="master_id" value="<?php echo $skill['masterid']; ?>">
  							</div>
  							<div class="col-md-3 form-group">
  								<label for="master_phone">Телефон мастера <span class="req">*</span></label>
								<input type="text" class="form-control" name="master_phone" id="master_phone" value="<?php echo $skill['masterid']; ?>">
  							</div>
  							<div class="col-md-3 form-group">
  								<label for="image">Фото <span class="req">*</span></label>
								<input type="file" class="form-control" name="image" id="image" value="">
  							</div>
  							<div class="col-md-3 form-group">
  								<label for="fare_price">Ставка мастера<span class="req">*</span></label>
								<input type="text" class="form-control" name="fare_price" id="fare_price" value="<?php echo $skill['rent']; ?>">
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-md-6 form-group">
  								<label for="address1">Адрес</label>
  								<input type="text" class="form-control" name="address1" id="address1" value="<?php echo $skill['address']; ?>">
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-md-3 form-group">
  								<label for="city">Город <span class="req">*</span></label>
								<input type="text" class="form-control" name="city" id="city" value="<?php echo $skill['city']; ?>">
  							</div>
  							<div class="col-md-3 form-group">
  								<label for="state">Область/Регион <span class="req">*</span></label>
								<input type="text" class="form-control" name="state" id="state" value="<?php echo $skill['state']; ?>">
  							</div>
  							<div class="col-md-3 form-group">
  								<label for="email">Email <span class="req">*</span></label>
								<input type="text" class="form-control" name="email" id="email" value="<?php echo $skill['email']; ?>">
  							</div>
  							<div class="col-md-3 form-group">
  								<label for="status">Статус <span class="req">*</span></label>
								<select name="status" id="status" class="form-control combo" data-value="<?php echo $skill['availability']; ?>">
									<?php if($skill['availability']=='Available')
									{
										echo '<option value="Available" selected="selected">доступен</option>
										<option value="Not Available">недоступен</option>
										<option value="Pending">В ожидании</option>';
								  }
								  elseif($skill['availability']=='Not Available')
								  {
										echo '<option value="Available">доступен</option>
										<option value="Not Available"  selected="selected">недоступен</option>
										<option value="Pending">В ожидании</option>';
								  }
										elseif($skill['availability']=='Pending')
										{
											echo '<option value="Available">доступен</option>
											<option value="Not Available">недоступен</option>
											<option value="Pending"  selected="selected">В ожидании</option>';
										} ?>
								</select>
  							</div>
  						</div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="description">Описание</label>
                  <textarea name="description" id="description" class="form-control" rows="5"><?php echo $skill['any_other_desc']; ?></textarea>
                </div>
              </div>
  						<h3>Доступные дни</h3> <hr>
  						<div class="row">
  							<div class="col-md-3 form-group">
  								<label for="start_date">Начальная дата<span class="req">*</span></label>
								<input type="text" class="form-control datepicker" name="start_date" id="start_date" value="<?php echo $skill['start_date']; ?>">
  							</div>
  							<div class="col-md-3 form-group">
  								<label for="start_time">Время начала<span class="req">*</span></label>
								<input type="text" class="form-control" name="start_time" id="start_time" value="<?php echo $skill['start_time']; ?>">
  							</div>
  							<div class="col-md-3 form-group">
  								<label for="end_date">Дата окончания <span class="req">*</span></label>
								<input type="text" class="form-control datepicker" name="end_date" id="end_date" value="<?php echo $skill['end_date']; ?>">
  							</div>
  							<div class="col-md-3 form-group">
  								<label for="end_time">Время окончания<span class="req">*</span></label>
								<input type="text" class="form-control" name="end_time" id="end_time" value="<?php echo $skill['end_time']; ?>">
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-md-3">
  								<input type="submit" class="btn btn-success" value="Submit">
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
  </form>
</div>
