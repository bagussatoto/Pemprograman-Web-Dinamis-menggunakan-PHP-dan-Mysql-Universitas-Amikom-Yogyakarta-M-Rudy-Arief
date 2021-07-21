<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once 'config/koneksi.php';
require_once 'config/class_paging.php';

//VARIABLE GET
$GV=(isset($_REQUEST['v']) ) ? $_REQUEST['v'] : "";

?>

<html>
<head>
<title>Ecommerce </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, nofollow">
<link rel="shortcut icon" href="img/fav.png" />
	<!-- begin LINK CSS-OUTSIDE -->
	<link rel="stylesheet" href="../css/outside.css" type="text/css" media="screen" />
	<link href="../css/greenblack.css" rel="stylesheet" type="text/css">
	<!-- END LINK CSS-->
	
	<!-- BEGIN JQUERY -->
	<script type="text/javascript" src="../lang/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="../lang/jquery.validate.js"></script>
	<!-- END JQUERY -->
	

</head>

<body>

<div id="bg-gradient">	
  <div id="wrapper">
  <div id="header" class="left">
  		<div id="logo-text" class="thertysixfive left">
            <h1><span>Ecommerce </span></h1>
           
		</div>
		
		<div id="nav-top" class="thertysixfive right">
 

      </div>
      </div>
      
      

      <br /><br /><br /><br /><br />
      <div id="content-wrapper" class="left">
        <div id="sidebar" class="left">
        
          <div id="sidebar-module" class="oneninetyfive corner-bottom corner-top box-shadow border overflow">
            <div id="sidebar-module-header" class="oneninetyfive corner-top left-no-margin dark-half">
              <h5>Menu</h5>
            
            </div>
           <?php require_once "menu.html";?>
            <div id="sidebar-module-content" class="oneninetyfive corner-bottom overflow">     
			
	
		</div>
          </div>
        
          
          
      </div>
      
		<div id='content' class='sixtysixzero corner-bottom corner-top left overflow dark-half box-shadow border'>
		<div id='content-heder' class='sixtyfivefive corner-top left'>
        <h5>
        
        <?php
			
			if($GV=='buku')
			{
				echo 'Buku';
			}
			elseif($GV=='penerbit')
			{
				echo 'Penerbit';
			}
			elseif($GV=='order')
			{
				echo 'Pesanan';
			}
			else
		    {
				echo 'Selamat datang admin.';
			}
		?>
        
        </h5>
        </div>
        <div id='content-content' class='corner-bottom left'>
        <div class='fiveninetyfive produk-headline left'>
		<?php
		require_once 'content.php';
		?>
		</div>
		</div>
		</div>
       
    </div>
    <div id="footer" class="eightysixzero left ">
      <ul id="content-no-margin" class="inline linkfooter">
        <li>copyright &copy; 2022<a href="">Ecommerce</a></li>
     </ul>
    </div>
    
  </div>
</div>



</body>
</html>
