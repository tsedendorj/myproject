a<?php 
session_start();
include '../includes/config.php'; 

if( !check_user($_SESSION['user'], $_SESSION['pass']) ){
  header('Location: login.php');
  die();
}
?>
<?php include '_header.php'; ?>
<?php include '_menu.php'; ?>




<html xmlns="http://www.w3.org/1999/xhtml">    
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Параметр |</title>
        <link rel="stylesheet" href="asset/css/other.css" type="text/css" media="screen"/>
      
        <link rel="stylesheet" type="text/css" href="asset/css/backend/tablelog.css" media="screen" />

            <link href="asset/css/backend/defaultTheme.css" rel="stylesheet" media="screen" />
        <link href="asset/css/backend/myTheme.css" rel="stylesheet" media="screen" />      
        <link rel="stylesheet" type="text/css" href="asset/css/backend/main.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="asset/css/backend/leftmenu.css" media="screen" />
        
        <link rel="stylesheet" type="text/css" href="asset/css/backend/table.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="asset/css/backend/edit_reg.css" media="screen" />
     
        <script type="text/javascript" src="asset/js/backend/jquery.min.js"></script>
        <script type="text/javascript" src="asset/js/backend/jquery-ui.min.js"></script>
        <script type="text/javascript" src="asset/js/backend/datetimepicker_css.js"></script>
   
           <script src="asset/js/backend/jquery.fixedheadertable.js"></script>
    </head>
    <body class="body"> 


        
        <div>

            <div class="ports_list_div"style="height:100px;">  
              
                <form action="http://login.php/index.php/log/index" method="post" accept-charset="utf-8">                <table border="0" style="width: 100%;margin-bottom: 5px;height: 90px; background: transparent linear-gradient(to bottom, #fafafa 0%, #efefef 100%) repeat scroll 0 0;" class="contentTable">
                    <tr height="30">            
                        <td colspan="10">
                            
                        </td>

                    </tr>
                    <tr>

                        <td class="titleColumn"><span class="padding5">Он</span></td>
                        <td  class="titleColumn">
                            <input type="text" class="txtSrchInput" id="demo1"value="2018-10-25"name="date"style="width:60px;height:25px;padding-left:2px;" placeholder="Сонгоно уу"required/>
                            <img src="asset/js/backend/images2/cal.gif" onclick="javascript:NewCssCal('demo1')"style="margin-bottom: -8px;width:20px;height:25px;"/>

                        </td>
                        <td class="titleColumn"><span class="padding5">Цаг</span></td>
                        <td class="titleColumn">
                            <select name="time" class="select border_saral" style="width:100px;">
                         <option value="7" >07:00 цаг</option>
                         <option value="13" >13:00 цаг</option>
                         <option value="19" >19:00 цаг</option>
                         <option value="22" >22:00 цаг</option>
                            </select>
                        </td>
                        <td class="titleColumn pad"><span class="padding5">Бүсчлэл</span></td>
                       

                        <td class="titleColumn">
                            <button name="button" class="BtnLogin button_p1"value="1">Хайх</button>
                        </td>

                    </tr>
                </table>
</form>            </div>
            <a href="medeenemeh.php" class="btn btn-success btn-sm">Параметр мэдээ нэмэх</a>
            
            <div class="ports_list_div1">
              
    <table class="fancyTable" id="myTable02" cellpadding="0" cellspacing="0" style="width: 100%">
 
       <tr height="30">            
        <td class="titleColumn border_bottom_n"><span></span></td>
        <td class="titleColumn border_bottom_n" ><span></span></td>
        <td class="titleColumn" colspan="6"><span>1-р хэлхээ</span></td>
        <td class="titleColumn"colspan="6"><span>2-р хэлхээ</span></td>
        <td class="titleColumn" colspan="4"><span>1-р хэлхээ</span></td>
        <td class="titleColumn"colspan="3"><span>2-р хэлхээ</span></td>
        <td class="titleColumn"><span>ХХУ</span></td>
        <td class="titleColumn" colspan="4"><span>1-р хэлхээ</span></td>
        <td class="titleColumn"colspan="3"><span>2-хэлхээ</span></td>
        <td class="titleColumn"colspan="2"><span>Усан хангамж</span></td>
        <td class="titleColumn border_bottom_n"></td>
    </tr>
        
    <tr height="30">
    
        <td class="titleColumn border_top_n border_bottom_n"><span>Харъяа<br>дүүрэг</span></td>
        <td class="titleColumn border_top_n border_bottom_n" ><span>УДДТ №</span></td>
        <td class="titleColumn"colspan="3"><span>Батлагд<br>сан</span></td>
        <td class="titleColumn bg_title"colspan="3"><span>Бодит</span></td>
        <td class="titleColumn"colspan="3"><span>Батлагд<br>сан</span></td>
        <td class="titleColumn bg_title"colspan="3"><span>Бодит</span></td>
        <td class="titleColumn"colspan="2"><span>Батлагд<br>сан</span></td>
        <td class="titleColumn bg_title"colspan="2"><span>Бодит</span></td>
        <td class="titleColumn"><span>Батлагд<br>сан</span></td>
        <td class="titleColumn bg_title"colspan="2"><span>Бодит</span></td>
        <td class="titleColumn bg_title"><span>Бодит</span></td>
        <td class="titleColumn"><span>Батлагд<br>сан</span></td>
       <td class="titleColumn"><span>Батлагд<br>сан</span></td>
        <td class="titleColumn">Батлагд<br>сан</span></td>
        <td class="titleColumn bg_title"><span>Бодит</span></td>
        <td class="titleColumn"><span>Батлагд<br>сан</span></td>
        <td class="titleColumn border_bottom_n"><span>Дулаа<br>ны</span></td>
        <td class="titleColumn border_bottom_n" ><span>ХХУ дулаа<br>ны</span></td>
        <td class="titleColumn"><span>насос өмнө</span></td>
        <td class="titleColumn"><span>насос дараа</span></td>
             <td class="titleColumn  border_top_n border_bottom_n"><span>Дулааны заалтын зөрүү</span></td>
   
    </tr>
                
    
                 <tr height="30">            
        <td class="titleColumn border_top_n width4"></td>
        <td class="titleColumn border_top_n width4" ></td>
        <td class="titleColumn width2-5"><span>P1</span></td>
        <td class="titleColumn width2-5"><span>P2</span></td>
        <td class="titleColumn width2-5 add-bg"><span>H М</span></td>
        <td class="titleColumn width2-5"><span>P1</span></td>
        <td class="titleColumn width2-5"><span>P2</span></td>
        <td class="titleColumn width2-5"><span>H М</span></td>
        <td class="titleColumn width2-5"><span>P1||</span></td>
        <td class="titleColumn width2-5"><span>P2||</span></td>
        <td class="titleColumn width2-5 add-bg"><span>H</span></td>
        <td class="titleColumn width2-5"><span>P1</span></td>
        <td class="titleColumn width2-5"><span>P2</span></td>
        <td class="titleColumn width2-5"><span>H М</span></td>
        <td class="titleColumn width2-5"><span>T1</span></td>
        <td class="titleColumn width2-5"><span>T2</span></td>
        <td class="titleColumn width2-5"><span>T1</span></td>
        <td class="titleColumn width2-5"><span>T2</span></td>
        <td class="titleColumn width2-5"><span>T3</span></td>
        <td class="titleColumn width2-5"><span>T1</span></td>
        <td class="titleColumn width2-5"><span>T2</span></td>
        <td class="titleColumn width2-5"><span>T</span></td>
        <td class="titleColumn width2-5"><span>Gxal м3/ц</span></td>
        <td class="titleColumn width2-5"><span>Gxху м3/ц</span></td>
        <td class="titleColumn width2-5"><span>Нийлбэр</span></td>
        <td class="titleColumn width2-5"><span>Нийлбэр</span></td>
         <td class="titleColumn width2-5"><span>Gxal м3/ц</span></td>
        <td class="titleColumn width2-5 border_top_n"><span> тоол<br>уурын заалт</span></td>
        <td class="titleColumn width2-5 border_top_n"><span>тоол<br>уурын заалт</span></td>
        <td class="titleColumn width2-5"><span>P1</span></td>
        <td class="titleColumn width2-5"><span>P2</span></td>
        <td class="titleColumn  width2-5  border_top_n"></td>
        <td class="titleColumn  width2-5  border_top_n">Created_at</td>
   
    </tr> 
    
        <?php $allcall = get_all_medee(); ?>
          <?php foreach($allcall as $row){ ?>
                
 <tr height="30">            
         
     <td class="titleColumn border_top_n width4"><?php echo $row['hariyadvvreg']; ?></td>
        <td class="titleColumn border_top_n width4" ><?php echo $row['uddt']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['p1bat']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['p2bat']; ?></td>
        <td class="titleColumn width2-5 add-bg"><?php echo $row['hbatlagdsan']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['p1bodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['p2bodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['hbodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['2p1bat']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['2p2bat']; ?></td>
        <td class="titleColumn width2-5 add-bg"><?php echo $row['2hbatlagdsan']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['2p1bodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['2p2bodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['2hbodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['t1bat']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['t2bat']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['t1bodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['t2bodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['2t3bat']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['2t1bodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['2t2bodit']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['thhu']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['ghal']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['ghhu']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['batniilber']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['boditniilber']; ?></td>
         <td class="titleColumn width2-5"><?php echo $row['2ghal']; ?></td>
        <td class="titleColumn width2-5 border_top_n"><?php echo $row['dulaaniitooluur']; ?></td>
     <td class="titleColumn width2-5 border_top_n"><?php echo $row['hhudulaaniitooluur']; ?></td>
        <td class="titleColumn width2-5 border_top_n"><?php echo $row['2p1']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['2p2']; ?></td>
        <td class="titleColumn width2-5"><?php echo $row['zorvv']; ?></td>
     <td class="titleColumn width2-5"><?php echo $row['created_at']; ?></td>
        
 <?php } ?>
        
   
    </tr> 
            
                
                
    
   
 
            </table>
            
</div>
        </div>
    </body>

<div class="clear"></div>
          <script type="text/javascript">
               $('#myTable02').fixedHeaderTable({ footer: true, altClass: 'odd' });
          </script>
</html>
    </body>
</html>

<?php include '_footer.php'; ?>