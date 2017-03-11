<?php
    $allCatData = getData('video_category', 'video_cat_id', 'ASC');
    $FirstCat =  getLimitData('video_category', 'video_cat_id' , 'ASC', 1);
    $FirstVideo =  getRowById('videos', 'vid_cat' , $FirstCat['video_cat_id'], 1);
        
        $cat = $FirstCat['video_cat_id'];
        $id  = $FirstVideo['video_id'];
    if(isset($_GET['cat'])){
        if(is_numeric($_GET['cat'])){   
            $cat = intval($_GET['cat']);
            if(isset($_GET['id'])){
             $id = intval($_GET['id']);
            }else{
                $FirstVideo =  getRowById('videos', 'vid_cat' , $cat, 1);
                $id  = $FirstVideo['video_id'];
            }
            
        }else{
            header("Location: error&t=2");
            exit();
        }
    }else{
     
        header("Location: videos&cat=$cat&id=$id");
        exit();
    }

    
 if($Svideo =  getRow2ById('videos', 'video_id' , $id,  'vid_cat', $cat, 1)){
     $video       =  getRow2ById('videos', 'video_id' , $id,  'vid_cat', $cat, 1);
     $currentcat =  getRowById('video_category', 'video_cat_id' , $cat, 1);
     
 }else{
     header("Location: error&t=3");
     exit();
 }
$AllVideosData =  getAllRowById('videos', 'vid_cat', $cat, 8);
?>
<!-- Start Of Videos Section -->
		<section class="sec-of-videos">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-12">
							<ul class="nav nav-pills nav-stacked visible-lg text-center">
 						   		<?php 
                                    if(!empty($allCatData)){
                                        foreach ($allCatData as $catData){
                                        
                                ?>
 						   		<li role="presentation"><a href="videos&cat=<?= $catData['video_cat_id'] ?>"><?= $catData['video_cat_name'] ?></a></li>
                                <?php }
                                    }else{
                                        header("Location: error&t=3");
                                        exit();
                                    }
                                ?>
							</ul>
							<div class="input-group-btn select hidden-lg" id="select1">
   								 <button type="button" class="btn btn-defualt dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="selected">Choose</span> <span class="caret"></span></button>
    								<ul class="dropdown-menu option" role="menu">
       								 <?php 
                                    if(!empty($allCatData)){
                                        foreach ($allCatData as $catData){
                                        
                                        ?>
 						   		 <li id="<?= $catData['read_cat_id'] ?>"><a href="videos&cat=<?= $catData['video_cat_id'] ?>"><?= $catData['video_cat_name'] ?></a></li>
                                <?php }
                                    }else{
                                        header("Location: error&t=3");
                                        exit();
                                    }
                                ?>
    								</ul>
							</div>
					</div>
					<div class="col-lg-8 col-md-12 marg">
						<h3 class="text-center"><?= $currentcat['video_cat_name'] ?></h3>
						<div class="embed-responsive embed-responsive-16by9">
								<iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $video['video_url'] ?>"  allowfullscreen></iframe>
						</div>

						<div class="panel panel-default">
  								<div class="panel-heading"><?= $video['video_title'] ?></div>
  										<div class="panel-body">
    										<?= $video['video_description'] ?>
 										</div>
								</div>

						<hr>
                                <?php
                                    if(!empty($AllVideosData)){
                                        ?>
                                <div class="row text-center">
                                <h3>More Videos</h3>
							    
                                <?php
                                        foreach($AllVideosData as $videos){
                                            if($videos['video_id'] == $video['video_id']){
                                                continue;
                                            }
                                          
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
								    <a href="videos&cat=<?= $videos['vid_cat'] ?>&id=<?= $videos['video_id'] ?>" class="a-custom"><img src="<?= $resourcesImg ?>video/<?= $videos['videos_img']  ?>" class="img-respnsive" alt="<?= $videos['video_title'] ?>">
								    <span><?= $videos['video_title'] ?></span></a>
                                </div>
							
                            <?php
                                        }
                                        ?>
                                   
                                </div>
                                <?php
                                    }  
                                ?>
                            	
					</div>
				</div>
			</div>
		</section>
		<!-- End Of Videos Section -->