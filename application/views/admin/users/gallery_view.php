<div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Gallery</h1>  
	<?php
if (is_array($created_at) || is_object($created_at))
	{
 		foreach($created_at as $data)
			{ ?>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="<?php echo $data->image_path ?>" class="img-responsive">
            </div>
	<?php   }
	} ?>
        </div>
    </div>
</section>