<!--<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />-->

<meta http-equiv="cache-control" content="max-age=1000000" />
<meta http-equiv="cache-control" content="public" />

<meta name="keywords" content="" />
	<meta name="description" content="">
    
     <meta property="og:title" content="<?php echo $titl?>" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    
	
    <meta name="twitter:card" content="summary">
    <meta property="twitter:title" content="<?php echo $titl?>" />
    <meta property="twitter:description" content="" />
    <meta property="twitter:image" content="<?php echo $m_rooturl?>images/logomobile.png" />
    
    <meta itemprop="name" content="<?php echo $titl?>">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="<?php echo $m_rooturl?>images/logomobile.png">
    
<?php $ismobile=m_fill("ismobile",$_REQUEST);
if($ismobile=='1'){?>
<style>
header {display:none!important}
footer {display:none!important}

</style>
    <?php }?>