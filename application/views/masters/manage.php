<h1>ЦУП пользователями</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url(); ?>masters/"><i class="fa fa-dashboard"></i> Мастера</a></li>
  <li class="active">Мастера</li>
</ol>
</section>
<section class="content">
  <div class="row">
  	<div class="col-md-8 col-md-offset-2">
  		<div class="panel panel-default">
  			<div class="panel-heading">Мастера</div>
  			<table class="table table-bordered table-striped">
  				<thead>
  					<tr>
              <th width="120">Фото</th>
  						<th width="150">Номер мастера</th>
  						<th>Телефон</th>
  						<th width="100">Тариф</th>
  						<th width="100">Статус</th>
              <th width="100">Компетенции</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php
            if(count($masters)){
              $html = '';
              foreach($masters as $car){
                $html .= '<tr>';
                  $html .= '<td><img src="'.base_url().'uploads/'.$car['skillsimg'].'" width="100" height="100" style="border-radius:100px;" alt=""></td>';
                  $html .= '<td>'.$car['masterid'].'</td>';
                  $html .= '<td>'.$car['masterid'].'</td>';
                  $html .= '<td>'.$car['rent'].'</td>';
                  if($car['availability']=='Available'){
                    $html .= '<td><span  class="label label-success">Доступен</span></td>';
                  }elseif($car['availability']=='Not Available'){
                    $html .= '<td><span  class="label label-danger">Не доступен</span></td>';
                  }elseif($car['availability']=='Pending'){
                    $html .= '<td><span  class="label label-warning">В ожидании</span></td>';
                  }
                  $html .= '<td>
                    <a href="'.base_url().'masters/edit/'.md5($car['masterid']).'" class="btn btn-primary btn-xs">Правка</a>
                     <a href="'.base_url().'masters/delete/'.md5($car['masterid']).'" class="btn btn-danger btn-xs btn-del">Удалить</a>
                  </td>';
                $html .= '</tr>';
              }
              echo $html;
            }
            ?>
  				</tbody>
  			</table>
  		</div>
  	</div>
  </div>
</div>
