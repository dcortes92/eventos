<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<head>
<title><?php echo $title_for_layout; ?></title>
<meta charset="utf-8">
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">


<?php 
   echo $this->Html->css('reset.css');
   echo $this->Html->css('style.css');
?>

<!--<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">-->
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!--[if lt IE 7]>
     <link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="screen">
     <script type="text/javascript" src="js/ie_png.js"></script>
     <script type="text/javascript">
        ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');
     </script>
<![endif]-->
<!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>
<body id="page1">
<div class="wrap">
   <!-- header -->
   <header>
      <div class="container">
         <h1><a href="inicio.html">Sitio de Eventos</a></h1>
         <nav>
            <?php echo $this->element('menu'); ?>
         </nav>
      </div>
   </header>
   <div class="container">
      <!-- aside -->
      <aside>
         <h3>Enlaces r&aacute;pidos</h3>
         <?php echo $this->element('sidemenu')?>
         
         <h2>Pr&oacute;ximos <span>Eventos</span></h2>
         <?php echo $this->element('events')?>
      </aside>
      <!-- content -->
      <section id="content"> <!-- Esta es la sección que se debe modificar -->
         <?php
             echo $this->Session->flash();
          ?>
        
        <?php echo $this->element('usermenu', array('username' => $this->Session->read('User')['User']['username'])); ?>

        <?php 
           /*Carga el contenido de alguna vista en esta sección*/
           echo $this->fetch('content');
        ?>
      </section>
   </div>
</div>
<!-- footer -->
<footer>
   <div class="container">
      <div class="inside">
         <div class="wrapper">
            <div class="aligncenter"><a rel="nofollow" href="http://www.templatemonster.com" class="new_window">Website template</a> designed by TemplateMonster.com<br>
               <a href="http://www.templates.com/product/3d-models/" class="new_window">3D Models</a> provided by Templates.com</div>
         </div>
      </div>
   </div>
</footer>
</body>
</html>