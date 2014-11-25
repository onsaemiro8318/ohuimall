<?php
	// 설정파일
	include_once "../config.php";

	include "./head.php";
?>


<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">일자별 마음 구매자 수 PC / Mobile</h1>
      </div>
    </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="table-responsive">
            <div id="daily_topgirl_vote_count_div1" style="display:block">
              <table class="table table-hover">
                <thead>
                  <tr><th>날짜</th><th>구매한 마음</th><th>PC</th><th>Mobile</th><th>Total</th></tr>
                </thead>
                <tbody>
<?php
	$daily_date_query	= "SELECT buyer_date FROM ".$_gl['buyer_info_table']." WHERE buyer_date <> '0000-00-00' Group by substr(buyer_date,1,10)";
	$date_res			= mysqli_query($my_db, $daily_date_query);
	while($date_daily_data = mysqli_fetch_array($date_res))
	{
		$daily_date		= substr($date_daily_data['buyer_date'],0,10);
		$buyer_goods_query	= "SELECT buyer_goods, COUNT( buyer_goods ) buyer_cnt FROM ".$_gl['buyer_info_table']." WHERE buyer_date LIKE  '%".$daily_date."%' GROUP BY buyer_goods";
		$buyer_res		= mysqli_query($my_db, $buyer_goods_query);
		
		unset($goods_idx);
		unset($buyer_cnt);
		unset($pc_cnt);
		unset($mobile_cnt);
		$total_buyer_cnt = 0;
		while ($buyer_daily_data = mysqli_fetch_array($buyer_res))
		{
			$buyer_goods[]	= $buyer_daily_data['buyer_goods'];
			$buyer_cnt[]	= $buyer_daily_data['buyer_cnt'];
			$pc_query		= "SELECT * FROM ".$_gl['buyer_info_table']." WHERE buyer_date LIKE  '%".$daily_date."%' AND buyer_goods='".$media_daily_data['buyer_goods']."' AND gubun='PC'";
			$pc_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));
			$mobile_query	= "SELECT * FROM ".$_gl['buyer_info_table']." WHERE buyer_date LIKE  '%".$daily_date."%' AND buyer_goods='".$media_daily_data['buyer_goods']."' AND gubun='MOBILE'";
			$mobile_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_query));
			$pc_cnt[]		= $pc_count;
			$mobile_cnt[]	= $mobile_count;
		}

		$rowspan_cnt =  count($buyer_goods);
		$i = 0;
		foreach($buyer_goods as $key => $val)
		{
?>
                  <tr>
<?
			if ($i == 0)
			{
?>
                    <td rowspan="<?=$rowspan_cnt?>"><?php echo $daily_date?></td>
<?
			}
?>
                    <td><?=$val?>번 마음</td>
                    <td><?=number_format($pc_cnt[$i])?></td>
                    <td><?=number_format($mobile_cnt[$i])?></td>
                    <td><?=number_format($buyer_cnt[$i])?></td>
                  </tr>
<?php
			$total_buyer_cnt += $buyer_cnt[$i];
			$i++;
		}
?>
                  <tr>
                    <td colspan="4">합계</td>
                    <td><?php echo number_format($total_buyer_cnt)?></td>
                  </tr>

<?
	}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->