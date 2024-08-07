<div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators"></ol>
    <div class="carousel-inner mt-5">
        <?php
        $slider = fetchalldata("slider");

        foreach ($slider as $key => $value) {
            if (isset($value['s_status']) && $value['s_status'] == 1) {
                ?>
                <?php if (isset($key) && $key == 0) { ?>
                    <div class="carousel-item active ">
                        <img src="./admin/uploads/banner/<?= $value['s_img'] ?>" class="d-block img-fluid w-100" height="500"
                            alt="..." />
                    </div>
                <?php } else { ?>

                    <div class="carousel-item">
                        <img src="admin/uploads/banner/<?= $value['s_img'] ?>" class="d-block img-fluid w-100" height="500"
                            alt="..." />
                    </div>
                <?php }
            } ?>
        <?php } ?>


    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>