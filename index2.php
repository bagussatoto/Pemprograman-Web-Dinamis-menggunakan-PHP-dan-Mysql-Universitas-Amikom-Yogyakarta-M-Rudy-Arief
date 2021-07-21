<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
$SessionId=session_id();
require_once 'dashboard/config/koneksi.php';

?>
<html>
<head>
<title>Ecommerce </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta http-equiv="Copyright" content="Ecommerce for Beginer">
<meta name="author" content="Ecommerce ">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<META NAME="DESCRIPTION" CONTENT="DESKRIPSI Ecommerce for Beginer"> 
<META NAME="KEYWORDS" CONTENT="Buku, penerbit, dll"> 
<link rel="shortcut icon" href="img/fav.png" />

	<!-- begin LINK CSS-OUTSIDE -->
	<link rel="stylesheet" href="css/outside.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/table.css" type="text/css" media="screen" />
	<link href="css/greenblack.css" rel="stylesheet" type="text/css">
	

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
      
      
      <div id="nav-menu" class="eightysixzero left corner-top corner-bottom dark-half box-shadow2 border">
             <div id="nav-menu-menu">
             <?php
                echo "
                <ul id='navigation' class='link'>
                  <li><a href='index.php' title='Home'>Beranda</a></li>
					<li style='float:right; padding-right:3px; margin-top:-1px;'>
                      <form action='".$StaticRoot."core.php' class='asholder' id='searchform' method='GET' style='display: inline;''>
    	                <input type='hidden' name='module' value='searchproduk'>
    	                <small style='float:right'><input type='hidden' id='testid' value='' disabled='disabled' /></small>
	   	                <input id='s' maxlength='255' name='search' type='text'>
       	              <input id='searchsubmit' type=submit value='Cari' class='small green awesome' name='submit'>
    	                </form>
                  </li>
                </ul>"
    	     ?>           
                
                  
            </div> 
      </div>

      
      <div id="content-wrapper" class="left">
        <div id="sidebar" class="left">
        
          <div id="sidebar-module" class="oneninetyfive corner-bottom corner-top box-shadow border overflow">
            <div id="sidebar-module-header" class="oneninetyfive corner-top left-no-margin dark-half">
              <h5>Keranjang Belanja</h5>
            </div>
            <div id="sidebar-module-content" class="oneninetyfive corner-bottom overflow">     
			
	
		</div>
          </div>
        
          <div id="sidebar-module" class="oneninetyfive corner-bottom corner-top box-shadow border overflow">
            <div id="sidebar-module-header" class="oneninetyfive corner-top left-no-margin dark-half">
              <h5>Kategori</h5>
            </div>
            <div id="sidebar-module-content" class="oneninetyfive corner-bottom overflow">  
             <div id='list'>   
             <ul>    
				
			 </ul>
			 </div>
      		</div>
          </div>
          
      </div>
      
		<div id='content' class='sixtysixzero corner-bottom corner-top left overflow dark-half box-shadow border'>
		<div id='content-heder' class='sixtyfivefive corner-top left'>
        <h5></h5>
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
        <li>copyright &copy; 2011 <a href="">Ecommerce</a></li>
     </ul>
    </div>
    
  </div>
</div>



</body>
</html>
