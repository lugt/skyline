   <?php 
   
   function auth_detail($now){
   	starter();
   	?>
        <div class="wrap" style="background:#ffffff;font-size:16px;">
            <div class="nav">
                <ul class="cc">
                    <li class="current">
                        <a href="#">预约信条</a>
                    </li>
                </ul>
            </div>
                <div class="h_a" style="height:20px;">
                	<h3>预约</h3>
                </div>
                <div class="table_full">
                    <table width="100%">
                        <colgroup>
                            <col class="th">
                            <col width="400">
                   
                        </colgroup>
                        <tbody>
                        	<tr>
                                <th>
                                    当前状态
                                </th>
                                <td>
                                	<h2><?php echo transtate($now->sa); ?></h3>   
                                </td>
                                <td>
                                    <div class="fun_tips">
                                    	<?php if($now->sa == 300){
                                    		echo "您可以准备如期联系对方！";
                                    		}?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    预约项目
                                </th>
                                <td>
                                	<?php echo $now->na; ?>
                                </td>
                                <td>
                                 	<?php echo translate_cl($now->cl); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                   联系方式
                                </th>
                                <td>
                                    <?php echo trans_re($now->re); ?>
                                    <span width="20">&nbsp;&nbsp;</span>
                                    在 &nbsp; &nbsp; <?php echo $now->po;?>
                                     </td>
                                   
                                <td>
                                	<?php echo date("Y-m-d",$now->st) . " - " . trans_day($now->st);?> <?php echo trans_time($now)?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    备注
                                </th>
                                <td>
                                    <?php echo $now->me;?>
                                </td>
                                <td>
                                    <div class="fun_tips">
                                    </div>
                                </td>
                            </tr>
                                  <tr>
                                <th>
                                    申请订户
                                </th>
                                <td>
                                   <?php echo trans_te($now->ap,$now);?>
                                </td>
                                <td>
                                    <div class="fun_tips" style="color:#f33;">
                                        <?php echo show_tel($now->ap);?>
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <th>
                                    审核小二
                                </th>
                                <td>
                                    <?php
                                    	echo translate_au($now->ex,$now);
                                    ?>
                                </td>
                                <td>
                                    <div class="fun_tips" style="color:#f33;">
                                        <?php echo show_tel($now->ex);?>
                                    </div>
                                </td>
                            </tr>
                      
                        </tbody>
                    </table>
                </div>
                
                <div class="btn_wrap">
                    <div class="btn_wrap_pd">
                        <div class="error_return"><a href="<?php
							if(!isset($_SERVER['HTTP_REFERER'])){
								echo "javascript:window.history.go(-1);";
							}else{
								echo $_SERVER['HTTP_REFERER'];
							}
							?>" class="btn">返回</a></div>
										</div>
                </div>
            </form>
        </div>
        <?php
        
        ender();
        
      }

function translate_cl($cl){
	if($cl < 10){
			$p = "未知年级";
	}else if($cl < 20){
			$p = "初一";
			
	}else if($cl < 30){
			$p = "初二";
			
	}else if($cl < 40){
			$p = "初三";
			
	}else if($cl < 50){
			$p = "高一";
			
	}else if($cl < 60){
			$p = "高二";
			
	}else if($cl < 70){
			$p = "高三";
	}else{
			$p = "未知年级";	
	}
	$p .= " ".($cl % 10) . " 班";
	return $p;	
}
function translate_au($t,$lfo){
	if($t == 0){
		return "<a href=\"index.php?cast=auth&leave=".$lfo->id."\">点击准假</a>";
	}
	$tei = new Teach_Info();
	$tei->load();
	$an = $tei->getname($t);
	$ar = $tei->gettitle($t);
	if($an == NULL || $an == FALSE){
		return "某个老师";
	}else{
		return "<a href='index.php?cast=teacher&a=".$t."'>".$ar." ".$an."</a>";
	}
}
function trans_te($t,$lfo){
	$tei = new Teach_Info();
	$tei->load();
	$an = $tei->getname($t);
	$ar = $tei->gettitle($t);
	if($an == NULL || $an == FALSE){
		return "某个老师";
	}else{
		return "<a href='index.php?cast=teacher&a=".$t."'>".$ar." ".$an."</a>";
	}
}

function trans_re($re){
	switch($re){
  		case "s3":
  			$sre = "QQ";	
  			break;
  		case "s1":
 		  	$sre = "Earth";
 		  	break;
  		case "s2":
  			$sre = "Skype";
  			break;
  		case "s4":
  			$sre = "YY";	
  			break;
  		case "s5":
  			$sre = "其他";
  			break;
  		case "s6":
  			$sre = "其他";
  			break;
  		default:
  			$sre =$re;
  	}
  	return $sre;
	
	}
	
function transtate($c){
	if($c == 2000){
		return "已过期";
	} else if ($c == 800){
		return "确认超时";
	} else if ($c == 100){
		return "<span style=\"color:#aa3;\">等待确认";
	} else if ($c == 300){
		return "<span style=\"color:#393;\">已审核</span>";
	} else if ($c == 400){
		return "<span style=\"color:#f33;\">预约驳回";
	} else if ($c == 500){
		return "<span style=\"color:#f33;\">预约失效";
	} else if ($c == 600){
		return "<span style=\"color:#f33;\">预约取消";
	}	else {
		return "<span style=\"color:#f33;\">预约出错";	
	}
}

      
function show_tel($ap){
		$tei = new Teach_Info();
		$tei->load();
		$an = $tei->getphone($ap);
		if($an != NULL || $an > 0){
 			return "手机号码为：".$an;
 		}else{
 			return "未记录手机号码";
 		}
}

function trans_time($now){
if(strtotime("13:00",$now->st) == $now->st){
								// 中午
								echo "上午";
						}else if(strtotime("18:40",$now->st) == $now->st){
							// 同一天
								echo "下午";
						}else if(strtotime("10:00",$now->st) == $now->st){
								echo "晚间";
						}else{
							echo "特定时间";//date("H:i:s",$now->st);
						}	
}

function trans_day($st){
	if(strtotime("00:00",$st) == strtotime("00:00")){
	 	return "今天";
	}else 
	if(strtotime("+1 day 00:00",$st) == strtotime("+1 day 00:00")){
	 	return "明天";
	}else 
	if(strtotime("-1 day 00:00",$st) == strtotime("-1 day 00:00")){
	 	return "昨天";
	}
	return;
}
?>
        
