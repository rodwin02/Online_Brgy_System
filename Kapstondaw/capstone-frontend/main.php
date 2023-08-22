<?php include '../BACKENDMONATO/server/server.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barangay Management System</title>
    <link rel="stylesheet" href="./scss/styles.css?<?php echo time() ?>" />

    <!-- swiper js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>


    <?php include './actives.php' ?>
    <?php include './header.php' ?>

    <div class="hide home" id="home">
        <div class="context">
            <h1>WELCOME TO <span>BARANGAY ZONE IV</span></h1>
            <p>
                Camerino Ave, Brgy Zone 4, Bayan Dasmariñas, Cavite Open Hours of
                Barangay: Monday to Friday (8:00 AM - 5:00 AM)
                barangayhall.zone4@gmail.com / (046) 471 1247
            </p>
            <button>ABOUT US</button>
        </div>
        <div class="logo">
            <img src="./assets/dasma-logo.png" alt="dasma-logo" />
        </div>
    </div>


    <div class="hide zone4">
        <div class="layer1">
            <div class="logo">
                <img src="./assets/brgy-logo.png" alt="brgy-logo" />
            </div>
            <div class="brgy">
                <span>Republic of the Philippines</span>
                <h2>Zone IV Dasmariñas Cavite</h2>
            </div>
        </div>
    </div>

    <div class="hide about" id="about">
        <h2 class="title">ABOUT OUR BARANGAY</h2>
        <h2 class="background">HISTORICAL BACKGROUND</h2>
        <p>
            Zone IV, formerly Poblacion, is a barangay in the city of Dasmariñas, in
            the province of Cavite. Its population as determined by the 2020 Census
            was 3,770. This represented 0.54% of the total population of Dasmariñas.
            The household population of Zone IV in the 2015 Census was 3,224 broken
            down into 901 households or an average of 3.58 members per
            household.According to the 2015 Census, the age group with the highest
            population in Zone IV is 20 to 24, with 375 individuals. Conversely, the
            age group with the lowest population is 80 and over, with 21
            individuals.Combining age groups together, those aged 14 and below,
            consisting of the young dependent population which include
            infants/babies, children and young adolescents/teenagers, make up an
            aggregate of 23.02% (753). Those aged 15 up to 64, roughly, the
            economically active population and actual or potential members of the
            work force, constitute a total of 72.82% (2,382). Finally, old dependent
            population consisting of the senior citizens, those aged 65 and over,
            total 4.16% (136) in all. The computed Age Dependency Ratios mean that
            among the population of Zone IV, there are 32 youth dependents to every
            100 of the working age population; there are 6 aged/senior citizens to
            every 100 of the working population; and overall, there are 37
            dependents (young and old-age) to every 100 of the working population.
            The median age of 28 indicates that half of the entire population of
            Zone IV are aged less than 28 and the other half are over the age of 28.
        </p>
        <div class="officials">
            <img src="./assets/officials.png" alt="officials" />
        </div>
    </div>

    <div class="hide goal">
        <div class="vision">
            <h2>Vision</h2>
            <p>
                We envision the Barangay Zone IV to be more productive and enjoy
                harmonious way of life, business,at work and at home, and most
                specially for a more directed and progressive Barangay Governance
            </p>
            <p>
                “A Community that maintains Peace and Order, pursue the ideals of a
                free and democratic society, implement basic health services, protect
                the children, develop and educate the youth, respect the rights of men
                and women, take good care of the elders, from the grass-roots to the
                highest level of our society”.
            </p>
        </div>

        <div class="mission">
            <h2>Mission</h2>
            <p>
                We provide accessible timely and responsive, support to meet the needs
                of our citizens specially to indigent people. While developing the
                community, we also ensure the safety and security of our fellow
                citizens by roving 24/7 and monitoring thru CCTV cameras.
            </p>
            <p>
                We commit to perform better duties and responsibilities to carry out
                the plans and objectives of the barangay thru voluntary and excellent
                performance, most specially in the delivery of basic needs such as
                improved roads and environment, water system, health care, education,
                housing and agricultural farming needs of the farmers and residents of
                the barangay.
            </p>
            <p>
                “To establish a vibrant community, dedicated towards a Harmonious,
                Peace-Loving, Economically stable citizenry, with spiritual guidance
                of the Almighty God”.
            </p>
        </div>
    </div>

    <div class="hide brgyInformation">
        <div class="layer1">
            <h2>Location</h2>
            <table>
                <tbody>
                    <tr>
                        <td>Island Group:</td>
                        <td>Luzon</td>
                    </tr>
                    <tr>
                        <td>Region:</td>
                        <td>Calabarzon (Region IV-A)</td>
                    </tr>
                    <tr>
                        <td>Province:</td>
                        <td>Cavite</td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td>Dasmarinas</td>
                    </tr>
                    <tr>
                        <td>Coordinates:</td>
                        <td>14.3267, 120.9381 (14° 20' North, 120° 56' East)</td>
                    </tr>
                    <tr>
                        <td>Dasmariñas City hall:</td>
                        <td>270 m</td>
                    </tr>
                    <tr>
                        <td>Approx. Time of travel to City hall:</td>
                        <td>3min</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="layer2">
            <h2>Physical Information</h2>
            <table>
                <tbody>
                    <tr>
                        <td>Total Land Area (in hectares):</td>
                        <td>77.00 Hectares (770,000 sq.m)</td>
                    </tr>
                    <tr>
                        <td>Barangay Category:</td>
                        <td>Urban</td>
                    </tr>
                    <tr>
                        <td>Land Classification:</td>
                        <td>Landlocked</td>
                    </tr>
                    <tr>
                        <td>Barangay Location:</td>
                        <td>Commercial</td>
                    </tr>
                    <tr>
                        <td>Total Population:</td>
                        <td>3,770 (2020 Census)</td>
                    </tr>
                    <tr>
                        <td>Total Number of Household:</td>
                        <td>7,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php include './services.php' ?>

    <?php include './concerns.php' ?>

    <?php include './announcement.php' ?>

    <?php include './hotlines.php' ?>

    <div class="main-news" id="main-news">
        <div class="main-news-header" id="main-news-header">
            <div class="layer1">
                <div class="logo">
                    <img src="./assets/brgy-logo.png" alt="brgy-logo" />
                </div>
                <div class="brgy">
                    <span>Republic of the Philippines</span>
                    <h2>Zone IV Dasmariñas Cavite</h2>
                </div>
            </div>

            <ul class="sub-menu">
                <li class="news-list-header"><a href="#">Home</a></li>
                <li class="news-list-header"><a href="#about">About</a></li>
                <li class="news-list-header"><a href="#services">Services</a></li>
                <li class="news-list-header">
                    <a href="#announcement">Announcement</a>
                </li>
                <li class="news-list-header">Contact us!</li>
                <li class="news-list-header">Login</li>
            </ul>
        </div>
        <section class="title">
            <h2>SECOND QUARTER NATIONWIDE SIMULTANEOUS EARTHQUAKE DRILL</h2>
        </section>

        <section class="container">
            <section class="image-container">
                <img src="./assets//main-news-img.png" alt="" />
            </section>
            <h2>NUTRITION MONTH 2023</h2>
            <p>
                This month of July we celebrate Nutrition Month with the theme
                "Healthy Diet gawing affordable for all” which aims to preserve and
                maintain the health and wellness of our bodies. A healthy diet and
                focus on our physical well-being will benefit both our bodies and
                minds. Let's celebrate and strive together to make healthy diet
                affordable for everyone! #NutritionMonth2023 #SulongNaSulongPa
            </p>
        </section>
    </div>

    <footer>
        <img src="./assets/brgy-footer-logo.png" alt="" />

        <h2>BARANGAY ZONE IV DASMARINAS, CAVITE</h2>

        <div class="links">
            <h2>
                QUICK LINKS
                <ul>
                    <li>HOME</li>
                    <li>ABOUT</li>
                    <li>SERVICES</li>
                    <li>ANNOUNCEMENT</li>
                    <li>CONTACT US</li>
                </ul>
            </h2>
        </div>

        <div class="com">
            <ul>
                <li>
                    <img src="./assets/location.png" alt="" />
                    <p>Camerino Ave, Brgy Zone 4, Bayan Dasmariñas, Cavite</p>
                </li>
                <li>
                    <img src="./assets/email.png" alt="" />
                    <p>barangayhall.zone4@gmail.com</p>
                </li>
                <li>
                    <img src="./assets/telephone.png" alt="" />
                    <p>(046) 471 1247</p>
                </li>
            </ul>
        </div>
    </footer>

    <div class="copyright">
        <h2>
            Copyright © 2023 by Barangay Zone IV Dasmariñas Cavite. All Rights
            Reserved.
        </h2>
    </div>

    <script src="./js//jQuery-3-7-0.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".servicesSwiper", {
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 2,
            },
            900: {
                slidesPerView: 3,
            },
        },
    });

    var swiper = new Swiper(".swiperConcerns", {
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 2,
            },
            900: {
                slidesPerView: 3,
            },
        },
    });

    var swiper = new Swiper(".swiperAnnouncement", {
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 2,
            },
            900: {
                slidesPerView: 3,
            },
        },
    });
    </script>
</body>

</html>