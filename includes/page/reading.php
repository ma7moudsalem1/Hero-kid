<?php
    $allCatData = getData('reading_category', 'read_cat_id', 'ASC');
    $FirstCat =  getLimitData('reading_category', 'read_cat_id' , 'ASC', 1);
    $FirstStory =  getRowById('reading', 'read_cat' , $FirstCat['read_cat_id'], 1);
        
        $cat = $FirstCat['read_cat_id'];
        $id  = $FirstStory['read_id'];
    if(isset($_GET['cat'])){
        if(is_numeric($_GET['cat'])){   
            $cat = intval($_GET['cat']);
            if(isset($_GET['id'])){
             $id = intval($_GET['id']);
            }else{
                $FirstStory =  getRowById('reading', 'read_cat' , $cat, 1);
                $id  = $FirstStory['read_id'];
            }
            
        }else{
            header("Location: error&t=2");
            exit();
        }
    }else{
     
        header("Location: reading&cat=$cat&id=$id");
        exit();
    }

    
 if($Story =  getRow2ById('reading', 'read_id' , $id,  'read_cat', $cat, 1)){
     $Story =  getRow2ById('reading', 'read_id' , $id,  'read_cat', $cat, 1);
     
 }else{
     header("Location: error&t=3");
     exit();
 }
$AllStoriesData =  getAllRowById('reading', 'read_cat', $cat, 8);
?>
<!-- Start Of Reading Section -->
		<section class="sec-of-read">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
							<ul class="nav nav-pills nav-stacked visible-lg text-center">
                                <?php 
                                    if(!empty($allCatData)){
                                        foreach ($allCatData as $catData){
                                        
                                ?>
 						   		<li role="presentation"><a href="reading&cat=<?= $catData['read_cat_id'] ?>"><?= $catData['read_cat_name'] ?></a></li>
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
 						   		 <li id="<?= $catData['read_cat_id'] ?>"><a href="reading&cat=<?= $catData['read_cat_id'] ?>"><?= $catData['read_cat_name'] ?></a></li>
                                <?php }
                                    }else{
                                        header("Location: error&t=3");
                                        exit();
                                    }
                                ?>
       								
       								 
    								</ul>
							</div>
					</div>
					<div class="col-lg-8 marg">
						<h3 class="text-center"><?= $Story['read_title'] ?></h3>
						<img src="<?= $resourcesImg ?>story/<?= $Story['read_img'] ?>" alt="<?= $Story['read_title'] ?>" class="img-responsive img-story">
						<article>
							<p class="lead"><?= $Story['story'] ?></p>
						</article>
						<hr>
                        	
							
                                <?php
                                    if(!empty($AllStoriesData)){
                                        ?>
                                <div class="row text-center">
                                <h3>More Stories</h3>
							    
                                <?php
                                        foreach($AllStoriesData as $stories){
                                            
                                            if($stories['read_id'] == $Story['read_id']){
                                                continue;
                                            }
                                          
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
								    <a href="reading&cat=<?= $stories['read_cat'] ?>&id=<?= $stories['read_id'] ?>" class="a-custom"><img src="<?= $resourcesImg ?>story/<?= $stories['read_img']  ?>" class="img-respnsive" alt="<?= $stories['read_title'] ?>">
								    <span><?= $stories['read_title'] ?></span></a>
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
		<!-- End Of Reading Section -->
	