<h1>Список заказов</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> ЦУП</a></li>
  <li class="active">Список заказов</li>
</ol>
</section>
<section class="content">
  <div class="row">
  	<div class="col-md-10 col-md-offset-1">
  		<div class="panel panel-default">
  			<div class="panel-heading">Список заказов</div>
  			<table class="table table-bordered table-striped">
  				<thead>
  					<tr>
  						<th width="75">Мастер №</th>
  						<th>Имя клиента</th>
  						<th width="150">Телефон клиента</th>
  						<th width="150">Статус заказа</th>
  						<th width="150">Что нужно</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php
		            if(count($orders)==0)
					{
		              $html = '<tr><td colspan="5"><div class="alert alert-warning">Заказы еще на сформированы.</div></td></tr>';
		            }
					else
					{
		              $html = '';
		              foreach($orders as $order){
		                $html .= '<tr>';
		                  $html .= '<td>'.$order['carNumber'].'</td>';
		                  $html .= '<td>'.$order['name'].'</td>';
		                  $html .= '<td>'.$order['phone'].'</td>';
		                  if($order['status']=='Confirmed'){
		                  	$html .= '<td><div class="label label-success"><i class="fa fa-check"></i> Подтверждено</div></td>';
		                  }elseif($order['status']=='Pending'){
		                  	$html .= '<td><div class="label label-warning"><i class="fa fa-spinner"></i> В ожидании</div></td>';
		                  }elseif($order['status']=='Under Review'){
		                  	$html .= '<td><div class="label label-primary"><i class="fa fa-binoculars"></i> На арбитраже</div></td>';
		                  }
		                  $html .= '<td>';
		                    $html .= '<a class="btn btn-xs btn-primary" href="'.base_url().'orders/view/'.md5($order['Pid']).'"><i class="fa fa-search"></i> посмотреть</a> ';
		                    $html .= '<a class="btn btn-xs btn-danger btn-del" href="'.base_url().'orders/delete/'.md5($order['Pid']).'"><i class="fa fa-trash" ></i> удалить</a>';
		                  $html .= '</td>';
		                $html .= '</tr>';
		              }
		            }
		            echo $html;
		            ?>
  				</tbody>
  			</table>
  		</div>
  	</div>
  </div>
</div>
