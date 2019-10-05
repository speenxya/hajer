<?php include "../includes/ini.php";
$data=$con->fetch_array($con->query("select * from projects where projectsid='".$_REQUEST['id']."'"));?>
<?php if($data['imageb']!=''){?>
											<li><a href="#" data-image="../uploads/projects/<?php echo $data['imageb']?>" data-zoom-image="../uploads/projects/<?php echo $data['imageb']?>"><img src="../uploads/projects/<?php echo $data['imageb']?>" alt="" /></a></li>
                                            <?php }?>
                                        <?php if($data['imageb2']!=''){?>
											<li><a href="#" data-image="../uploads/projects/<?php echo $data['imageb2']?>" data-zoom-image="../uploads/projects/<?php echo $data['imageb2']?>"><img src="../uploads/projects/<?php echo $data['imageb2']?>" alt="" /></a></li>
                                            <?php }?>
                                            
                                            <?php if($data['imageb3']!=''){?>
											<li><a href="#" data-image="../uploads/projects/<?php echo $data['imageb3']?>" data-zoom-image="../uploads/projects/<?php echo $data['imageb3']?>"><img src="../uploads/projects/<?php echo $data['imageb3']?>" alt="" /></a></li>
                                            <?php }?>
                                            <?php $pp=$con->query("select * from projectspics left join colors on colorsid=iidcolor where idproject='".$data['projectsid']."' and colorname='".$_REQUEST['name']."' and duplicate='0' and projectspics.deleted='0'  order by ppriority asc");
					while($p=$con->fetch_array($pp)){?>
                    <li><a class="colorimageholder" theid="<?php echo $p['projectspicsid']?>" thecolor="<?php echo str_replace(" ","",$p['colorname'])?>" href="#" data-image="../uploads/projects/<?php echo $p['image']?>" data-zoom-image="../uploads/projects/<?php echo $p['image']?>"><img src="../uploads/projects/<?php echo $p['image']?>" alt="" /></a></li>
                    <?php }?>
