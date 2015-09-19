<h1>Заказ № <?php echo $order['Pid']; ?></h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ЦУП</a></li>
  <li><a href="<?php echo base_url('orders'); ?>">Заказы</a></li>
  <li class="active">посмотреть заказ</li>
</ol>
</section>
<section class="content">

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php if(isset($message) AND $message!=""){ echo $message; } ?>
			<div class="panel panel-primary">
				<div class="panel-heading"><strong>Заказ # <?php echo $order['Pid']; ?></strong></div>
				<table class="table table-bordered table-striped">
				<form action="" method="post">
				<input type="hidden" name="sf" value="update_status">
				<tr>
					<td width="150"><strong>Статус:</strong></td>
					<td width="200">
						<select name="status" id="status" class="form-control">
							<?php if($order['status']=='Pending'){
								echo '<option value="Pending" selected="selected">В ожидании</option>
							<option value="Under Review">На арбитраже</option>
							<option value="Confirmed">Подтверждено</option>';
							}elseif($order['status']=='Under Review'){
								echo '<option value="Pending">В ожидании</option>
							<option value="Under Review" selected="selected">На арбитраже</option>
							<option value="Confirmed">Подтверждено</option>';
							}elseif($order['status']=='Confirmed'){
								echo '<option value="Pending">Подтверждено</option>
							<option value="Under Review">На арбитраже</option>
							<option value="Confirmed" selected="selected">Подтверждено</option>';
							} ?>
						</select>
					</td>
					<td>
						<input type="hidden" name="id" value="<?php echo md5($order['Pid']); ?>">
						<input type="submit" class="btn btn-danger" value="Обновить статус">
					</td>
				</tr>
				</form>
				<tr>
					<td><strong>Дата/Время: </strong></td>
					<td colspan="2"><?php echo $order['date']; ?></td>
				</tr>
				<tr>
					<td><strong>Мастер №": </strong></td>
					<td colspan="2"><?php echo $order['carNumber']; ?></td>
				</tr>
				<tr>
					<td><strong>Имя: </strong></td>
					<td colspan="2"><?php echo $order['name']; ?></td>
				</tr>
				<tr>
					<td><strong>Адрес: </strong></td>
					<td colspan="2"><?php echo $order['address']; ?></td>
				</tr>
				<tr>
					<td><strong>Телефон: </strong></td>
					<td colspan="2"><?php echo $order['phone']; ?></td>
				</tr>
				<tr>
					<td><strong>Комментарий: </strong></td>
					<td colspan="2"><?php echo $order['comment']; ?></td>
				</tr>
			</table>
			</div>
		</div>
	</div>
</section>