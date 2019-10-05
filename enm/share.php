<?php $currenturl1=(addslashes($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&print=1"));
 $urlshare="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 $urlshare=urlencode($urlshare);?>
 
<div style="text-align:right">
<div style="display:inline-block;vertical-align:middle">
  <a title="Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $urlshare?>" target="_blank"><img src="../images/fb2.png" alt="Facebook" style="width:30px"></a>
</div>
<div style="display:inline-block;vertical-align:middle">
  <a title="Twitter" href="https://twitter.com/home?status=<?php echo $urlshare?>" target="_blank"><img src="../images/twitter.png" alt="Twitter" style="width:30px"></a>
</div>
<div style="display:inline-block;vertical-align:middle">
  <a title="Google Plus" href="https://plus.google.com/share?url=<?php echo $urlshare?>" target="_blank"><img src="../images/google.png" alt="Google" style="width:30px"></a>
</div>





</div>


  

