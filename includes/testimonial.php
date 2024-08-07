<section class="section section-testimonial mt-3 m-3">

    <!-- Slider main container -->
    <!-- Swiper -->
    <div class="swiper mySwiper container">
        <div class="container center-text">
            <h2 class="fashion_tital">Connected <span>Testimonial</span></h2>
        </div>
        <div class="swiper-wrapper">

            <?php
            $testimonial = fetchalldata("testimonial");
            foreach ($testimonial as $key => $value) { ?>
                <div class="swiper-slide">
                    <div class="swiper-client-msg">
                        <p>
                            <?= $value['t_description'] ?>
                        </p>
                    </div>
                    <div class="swiper-client-data grid grid-two-col">
                        <figure>

                            <img loading="lazy" src="assets/img/men/<?= $value['t_img'] ?> " alt="" />
                        </figure>
                        <div class="client-data-details">
                            <p>
                                <?= $value['t_name'] ?>
                            </p>
                            <p>
                                <?= $value['t_occupation'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- slide end  -->
            <div class="swiper-slide">
                <div class="swiper-client-msg">
                    <p>
                        Calvin: You know sometimes when I'm talking, my words can't keep
                        up with my thoughts... I wonder why we think faster than we
                        speak. Hobbes: Probably so we can think twice.
                    </p>
                </div>
                <div class="swiper-client-data grid grid-two-col">
                    <figure>
                        <img loading="lazy" src="assets/img/kid2.png" alt="" />
                    </figure>
                    <div class="client-data-details">
                        <p>Vipul Chauhan</p>
                        <p>Entrepruner</p>
                    </div>
                </div>
            </div>
            <!-- slide end  -->
            <div class="swiper-slide">
                <div class="swiper-client-msg">
                    <p>
                        Calvin: You know sometimes when I'm talking, my words can't keep
                        up with my thoughts... I wonder why we think faster than we
                        speak. Hobbes: Probably so we can think twice.
                    </p>
                </div>
                <div class="swiper-client-data grid grid-two-col">
                    <figure>
                        <img loading="lazy" src="assets/img/kid2_poster.png" alt="" />
                    </figure>
                    <div class="client-data-details">
                        <p>Vipul Chauhan</p>
                        <p>Entrepruner</p>
                    </div>
                </div>
            </div>
            <!-- slide end  -->
            <div class="swiper-slide">
                <div class="swiper-client-msg">
                    <p>
                        Calvin: You know sometimes when I'm talking, my words can't keep
                        up with my thoughts... I wonder why we think faster than we
                        speak. Hobbes: Probably so we can think twice.
                    </p>
                </div>
                <div class="swiper-client-data grid grid-two-col">
                    <figure>
                        <img loading="lazy" src="assets/img/kid4.png" alt="" />
                    </figure>
                    <div class="client-data-details">
                        <p>Vipul Chauhan</p>
                        <p>Entrepruner</p>
                    </div>
                </div>
            </div>
            <!-- slide end  -->
            <div class="swiper-slide">
                <div class="swiper-client-msg">
                    <p>
                        Calvin: You know sometimes when I'm talking, my words can't keep
                        up with my thoughts... I wonder why we think faster than we
                        speak. Hobbes: Probably so we can think twice.
                    </p>
                </div>
                <div class="swiper-client-data grid grid-two-col">
                    <figure>
                        <img src="assets/img/aboutpage-banner1.png" alt="" />
                    </figure>
                    <div class="client-data-details">
                        <p>Vipul Chauhan</p>
                        <p>Entrepruner</p>
                    </div>
                </div>
            </div>
            <!-- slide end  -->
            <div class="swiper-slide">
                <div class="swiper-client-msg">
                    <p>
                        Calvin: You know sometimes when I'm talking, my words can't keep
                        up with my thoughts... I wonder why we think faster than we
                        speak. Hobbes: Probably so we can think twice.
                    </p>
                </div>
                <div class="swiper-client-data grid grid-two-col">
                    <figure>
                        <img src="assets/img/cardImg1.avif" alt="" />
                    </figure>
                    <div class="client-data-details">
                        <p>Vipul Chauhan</p>
                        <p>Entrepruner</p>
                    </div>
                </div>
            </div>
            <!-- slide end  -->
            <div class="swiper-slide">
                <div class="swiper-client-msg">
                    <p>
                        Calvin: You know sometimes when I'm talking, my words can't keep
                        up with my thoughts... I wonder why we think faster than we
                        speak. Hobbes: Probably so we can think twice.
                    </p>
                </div>
                <div class="swiper-client-data grid grid-two-col">
                    <figure>
                        <img src="assets/img/cardImg3.avif" alt="" />
                    </figure>
                    <div class="client-data-details">
                        <p>Vipul Chauhan</p>
                        <p>Entrepruner</p>
                    </div>
                </div>
            </div>
            <!-- slide end  -->
            <div class="swiper-slide">
                <div class="swiper-client-msg">
                    <p>
                        Calvin: You know sometimes when I'm talking, my words can't keep
                        up with my thoughts... I wonder why we think faster than we
                        speak. Hobbes: Probably so we can think twice.
                    </p>
                </div>
                <div class="swiper-client-data grid grid-two-col">
                    <figure>
                        <img src="assets/img/cardImg2.avif" alt="" />
                    </figure>
                    <div class="client-data-details">
                        <p>Vipul Chauhan</p>
                        <p>Entrepruner</p>
                    </div>
                </div>
            </div>
            <!-- slide end  -->
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>