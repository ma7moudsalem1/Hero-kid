<section class="dashboard text-center">
    <h3>Welcome To Dashboard</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="stat admin">
                    <i class="fa fa-users" aria-hidden="true"></i> Admins
                    <span><?= getCount('admin_id', 'admin'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat vid">
                    <i class="fa fa-video-camera" aria-hidden="true"></i> Videos
                    <span><?= getCount('video_id', 'videos'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat reading">
                   <i class="fa fa-book" aria-hidden="true"></i> Reading Stories
                    <span><?= getCount('read_id', 'reading'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat quest">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i> Questions
                    <span><?= getCount('writing_id', 'writing'); ?></span>
                </div>
            </div>
        </div>
    </div>  
    <a href="?page=app" class="btn btn-primary">Go To Site Main Settings</a>
</section>
