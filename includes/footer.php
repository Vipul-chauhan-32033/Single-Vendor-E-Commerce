<footer id="footer">
    <div class="containers">
        <div class="row  text-center">
            <div class=" product-col col-lg-3  col-sm-12">

                <!-- <div class="col-md-3 align-items-center"> -->
                <a href="index.php"><img src="assets/img/<?= $sitesettingdata['logo'] ?>" alt=""
                        class="img-fluid logo-footer" style="width:200px; height:23vh" /></a>
                <div class="footer-about">
                    <p>
                        <?= $sitesettingdata['description'] ?>
                    </p>
                </div>
            </div>
            <div class=" product-col col-lg-3  col-sm-12">

                <!-- <div class="col-md-3"> -->
                <div class="useful-link">
                    <h2>Useful Links</h2>
                    <div class="use-links">
                        <li>
                            <a href="index.php"><i class="fa-solid fa-angles-right"></i> Home</a>
                        </li>
                        <li>
                            <a href="about.php"><i class="fa-solid fa-angles-right"></i> About Us</a>
                        </li>
                        <li>
                            <a href="profile.php"><i class="fa-solid fa-angles-right"></i> Profile</a>
                        </li>
                        <li>
                            <a href="shop.php"><i class="fa-solid fa-angles-right"></i> Shop</a>
                        </li>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3"> -->
            <div class=" product-col col-lg-3 col-sm-12">

                <div class="social-links">
                    <h2>Follow Us</h2>
                    <div class="social-icons">
                        <li>
                            <a href="https://www.facebook.com"><i class="bx bxl-facebook"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com"><i class="bx bxl-instagram-alt"></i> Instagram</a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com"><i class="bx bxl-linkedin"></i> Linkedin</a>
                        </li>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3"> -->
            <div class=" product-col col-lg-3  col-sm-12">

                <div class="address">
                    <h2>Address</h2>
                    <div class="address-links">
                        <li class="address1">
                            <i class="fa-solid fa-location-dot"></i>
                            <?= $sitesettingdata['address'] ?>
                        </li>
                        <li>
                            <a href="#"><i class="bx bx-phone"></i> +
                                <?= $sitesettingdata['phone'] ?>
                            </a>
                        </li>
                        <li>
                            <a href="#"><i class="bx bxs-envelope"></i>
                                <?= $sitesettingdata['email'] ?>
                            </a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer section end -->
<!-- footer copy right section start -->
<section id="copy-right">
    <div class="copy-right-sec">
        <i class="bx bx-copyright"></i>
        <?= $sitesettingdata['copyright']; ?>
        <a href="index.php">E-Commerce</a>
    </div>
</section>
<!-- footer copy right section end -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script> -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
    let scrollContainer = document.querySelector(".card-collection");
    let scrollContainers = document.querySelector("#cardCollection");
    let left = document.querySelector(".left");
    let right = document.querySelector(".right");

    scrollContainer.addEventListener("wheel", (e) => {
        e.preventDefault();

        scrollContainer.scrollLeft += e.deltaY;
        scrollContainer.style.scrollBrhavior = "auto";
    });

    left.addEventListener("click", () => {
        scrollContainer.style.scrollBrhavior = "smooth";
        scrollContainer.scrollLeft -= 800;
    });
    right.addEventListener("click", () => {
        scrollContainer.style.scrollBrhavior = "smooth";
        scrollContainer.scrollLeft += 900;
    });
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    function myFunction(widthSize) {
        if (widthSize.matches) {
            // If media query matches
            const swiper = new Swiper(".swiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                autoplay: {
                    // delay: 2500,
                    delay: 5000,
                    disableOnInteraction: false,
                },

                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        } else {
            const swiper = new Swiper(".swiper", {
                slidesPerView: 2,
                spaceBetween: 30,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        }
    }

    const widthSize = window.matchMedia("(max-width: 780px)");
    // Call listener function at run time
    myFunction(widthSize);
    // Attach listener function on state changes
    widthSize.addListener(myFunction);
</script>