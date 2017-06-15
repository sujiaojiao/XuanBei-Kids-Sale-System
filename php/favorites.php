<!--其他管理/收货地址页面-->
<?php
 require_once "islogin.php";
 require_once "../plus/DbMysql.php";
 require_once "../plus/page.class.php";	
 
 $sql = "select * from favorites";
 $parm = " where 1 ";
 
 $sql .= $parm;
 $db = new DbMysql();
 
 $pagesize =10 ; //每页显示数量
 $db->sql($sql); //信息总数量
 $infocount = $db->affected();

 echo "<script></script>";
 $page = new page($infocount,$pagesize);
 $sql .= $page->limit();
 
 $result = $db->select($sql);//最终执行分类sql查询
// echo count($result);
?>
 
<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" />
		<title>会员收藏</title>
		<style type="text/css">
		    table{			
				border: 0;
				border-collapse: collapse; 
			}
		    .bgtext{
				font-size: 13.6px;
				color: #888888;
			}
			.fonbac{
				background: #BFC4CA;
				font-weight: 600;
			}
		</style>
		<script>
			function test(){
				if(document.formsearch.key.value==""){
					alert("请输入查询的关键词");
					return false;
				}
			return true;
			}
		
		</script>
	</head>
	
	<body>
	<table width="100%">
	  <tr>
	    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif">
	    	<img src="../images/left-top-right.gif" width="17" height="29" />
	    </td>
	    <td width="935" height="29" valign="top" background="../images/content-bg.gif">
	    	<table width="100%" height="31" id="table2">
		      <tr>
		        <td height="31"><div>会员收藏商品</div></td>
		      </tr>
		    </table>
	   </td>
	    <td width="16" valign="top" background="../images/mail_rightbg.gif">
	    	<img src="../images/nav-right-bg.gif" width="16" height="29" />
	    </td>
	  </tr>
	  <tr>
	    <td height="71" valign="middle" background="../images/mail_leftbg.gif">&nbsp;</td>
	    <td valign="top" bgcolor="#F7F8F9">
		<div>
	    <table width="98%" align="center">
	        <tr><td class="bgtext">当前位置：会员收藏商品列表</td></tr>	            	        
	        <tr>
	            <td height="20">
	            	 

		            <table width="100%" height="1" >
		              <tr>
		                <td>
		                	<div class="add"><A href='ProductMng_add.php'>
		                		<!--<img src="../images/add.gif" width="16" height="16" /> 添加新地址</a>-->
		                	</div>
		                </td>
		                <td width="150" align="right"><label for="select"></label>
		                 
						<select name="select" id="select" onchange="javascript:location.href=this.options[selectedIndex].value" >
								<option value='ProductMng.php'>全部商品</option>	 
								
						</select>
		                
		                </td>
		              </tr>
		            </table>
	       		 </td>
	        </tr>
	        <tr>
	          <td>
	           <form action="ProductMng_alldel.php" method="post" name="info">
	            <table width="100%" height="31">
	                <tr class="fonbac">
		              
		                <td >ID</td>
		                <td >商品名称</td>
		                <td >商品现价</td>
		                <td >商品原价</td>
		                <td >商品数量</td>
		                <td >编号</td> 
		                           
		                <td >操作</td>
	       			</tr>	
	       			 <?php
	       			 if($infocount>=1){
	       			  foreach($result as $row){
//	       			  	var_dump($result);	
	       			 ?>       	       
			        <tr class="left_txt2" style="background: #F2F2F2;">
				        <td><?php echo $row["id"];?></td>  
				        <td><?php echo $row["title"];?></td>  
				        <td><?php echo $row["unitPrice"];?></td>  
				        <td><?php echo $row["Price"];?></td>  
				        <td><?php echo $row["total"];?></td>  
				        <td><?php echo $row["orderID"];?></td>  			       
				        <td><a href=''>删除</a>		          
				        </td> 
			        </tr>
	             <?php
	             	}}else{
	             		echo "<tr><td colspan='9' style='color:red;text-align:center;'>暂无数据</td></tr>";
	             	}
	             	?>
	            
	            </table>
	           </form>
	          </td>
	        </tr>	 
	    </table>
	    <div id="page" style="width: 100%;text-align: center;">
	     <?php echo $page->show(1);?>	    
	    </div>
	                    
       </div>    
	   </td>
	   <td background="../images/mail_rightbg.gif">&nbsp;</td>
	  </tr>
	  <tr>
	    <td valign="middle" background="../images/mail_leftbg.gif">
	    	<img src="../images/buttom_left2.gif" width="17" height="17" />
	    </td>
	    <td height="17" valign="top" background="../images/buttom_bgs.gif">
	      	<img src="../images/buttom_bgs.gif" width="17" height="17" />
	    </td>
	    <td background="../images/mail_rightbg.gif">
	    	<img src="../images/buttom_right2.gif" width="16" height="17" />
	    </td>
	  </tr>
	</table>
	</body>
	
</html>
 
