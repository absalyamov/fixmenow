<h1> Сменить пароль </h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ЦУП </a></li>
  <li class="active">Сменить пароль</li>
</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12 form-group"><?php if(isset($error)){ echo $error; } ?></div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">Сменить пароль</div>
				<div class="panel-body">
					<form action="" method="post">
						<input type="hidden" name="sf" value="1" />
						<div class="row">
							<div class="col-md-12 form-group">
								<label for="pass1">Текущий пароль</label>
								<input type="password" name="pass1" id="pass1" value="" class="form-control" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12  form-group">
								<label for="pass2">Новый пароль</label>
								<input type="password" name="pass2" id="pass2" value="" class="form-control" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12  form-group">
								<label for="pass3">Повторите пароль</label>
								<input type="password" name="pass3" id="pass3" value="" class="form-control" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="submit" class="btn btn-danger btn-block">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
