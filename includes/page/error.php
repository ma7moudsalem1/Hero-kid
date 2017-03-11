<?php
if(isset($_GET['t'])){
?>
<!-- Start Of Error -->
		<section class="error text-center">
			<h4>
            <?php
                if($_GET['t'] == 1){
                    redirctErrorUrl('index', 'Page Requested Not Found: You Will Redirct To Home Page After 2 Seconds', 2);
                }  else if($_GET['t'] == 2){
                    redirctErrorUrl('index', 'Undifine Page: You Will Redirct To Home Page After 2 Seconds', 2);
                }else if($_GET['t'] == 3){
                    redirctErrorUrl('index', 'No Data For This Page: You Will Redirct To Home Page After 2 Seconds', 2);
                } else{
                    header("Location: index");
                    exit();
                }   
            ?>
            </h4>
			<a href="#"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> back</a> 
		</section>
		<!-- Start Of Error -->
<?php }
else{
    header("Location: index");
    exit();
}
?> 