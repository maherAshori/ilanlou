<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lingua project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title.' | '.$this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('/web/styles/bootstrap4/bootstrap.min.css') ?>
    <?= $this->Html->css('/web/plugins/font-awesome-4.7.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('/web/plugins/OwlCarousel2-2.2.1/owl.carousel.css') ?>
    <?= $this->Html->css('/web/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') ?>
    <?= $this->Html->css('/web/plugins/OwlCarousel2-2.2.1/animate.css') ?>
    <?= $this->Html->css('/web/plugins/iranfont/fontiran.css') ?>
    <?= $this->Html->css('/web/styles/' . $style) ?>
    <?= $this->Html->css('/web/styles/' . $style . '_responsive') ?>
    <?= $this->fetch('css') ?>
</head>
<body>

<div class="super_container">

    <!-- Header -->
    <header class="header">

        <!-- Top Bar -->
        <div class="top_bar">
            <div class="top_bar_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                <div class="top_bar_phone"><span
                                        class="top_bar_title">  شماره پشتیبانی:</span> <?= $phone ?>
                                </div>
                                <div class="top_bar_right ml-auto">

                                    <!-- Language -->
                                    <!--                                    <div class="top_bar_lang">-->
                                    <!--                                        <span class="top_bar_title">site language:</span>-->
                                    <!--                                        <ul class="lang_list">-->
                                    <!--                                            <li class="hassubs">-->
                                    <!--                                                <a href="#">English<i class="fa fa-angle-down"-->
                                    <!--                                                                      aria-hidden="true"></i></a>-->
                                    <!--                                                <ul>-->
                                    <!--                                                    <li><a href="#">Persian</a></li>-->
                                    <!--                                                </ul>-->
                                    <!--                                            </li>-->
                                    <!--                                        </ul>-->
                                    <!--                                    </div>-->

                                    <!-- Social -->
                                    <div class="top_bar_social">
                                        <ul>
                                            <li>
                                                <a href="<?= $instagram ?>">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <span class="top_bar_title social_title">ما را دنبال کنید</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Content -->
        <div class="header_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo_container mr-auto">
                                <?= $this->Html->link('<div class="logo_text">' . $title . '</div>', "/", ['escape' => false]) ?>
                            </div>
                            <nav class="main_nav_contaner" dir="rtl">
                                <ul class="main_nav">
                                    <li class="<?= $this->request->getParam("controller") === "Pages" && $this->request->getParam("action") === 'display' ? 'active' : '' ?>">
                                        <?= $this->Html->link('خانه', "/") ?>
                                    </li>
                                    <li class="<?= $this->request->getParam("controller") === "Classrooms" && $this->request->getParam("action") === 'index' ? 'active' : '' ?>">
                                        <?= $this->Html->link('کلاس ها', ['controller' => 'Classrooms', 'action' => 'index']) ?>
                                    </li>
                                    <li class="<?= $this->request->getParam("controller") === "Teachers" && $this->request->getParam("action") === 'index' ? 'active' : '' ?>">
                                        <?= $this->Html->link('اساتید', ['controller' => 'Teachers', 'action' => 'index']) ?>
                                    </li>
                                    <li class="<?= $this->request->getParam("controller") === "Events" && $this->request->getParam("action") === 'index' ? 'active' : '' ?>">
                                        <?= $this->Html->link('رویدادها', ['controller' => 'Events', 'action' => 'index']) ?>
                                    </li>
                                    <li class="<?= $this->request->getParam("controller") === "Pages" && $this->request->getParam("action") === 'contact' ? 'active' : '' ?>">
                                        <?= $this->Html->link('اطلاعات تماس', ['controller' => 'Pages', 'action' => 'contact']) ?>
                                    </li>
                                    <?php if ($auth): ?>
                                        <li class="logout">
                                            <?= $this->Html->link('خروج از حساب کاربری', ['controller' => 'Students', 'action' => 'logout'], ['class' => 'text-danger']) ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                            <div class="header_content_right ml-auto text-right"
                                 style="width: <?= $auth ? '200px' : '100px' ?>">
<!--                                <div class="header_search">-->
<!--                                    <div class="search_form_container">-->
<!--                                        <form action="#" id="search_form" class="search_form trans_400">-->
<!--                                            <input type="search" class="header_search_input trans_400"-->
<!--                                                   placeholder="Type for Search" required="required">-->
<!--                                            <div class="search_button">-->
<!--                                                <i class="fa fa-search" aria-hidden="true"></i>-->
<!--                                            </div>-->
<!--                                        </form>-->
<!--                                    </div>-->
<!--                                </div>-->

                                <!-- Hamburger -->


                                <div class="user">
                                    <?=
                                        $this->Html->link('<i class="fa fa-user" aria-hidden="true"></i>',
                                        ['controller' => 'Students', 'action' => $auth ? 'view' : 'login'],
                                        ['escape' => false])
                                    ?>
                                    <?php
                                    if($auth){
                                        echo $this->Html->link('<span class="text-nowrap" lang="fa">'.$student->firstName.' '.$student->lastName.'</span>',
                                            ['controller' => 'Students', 'action' => 'view'],
                                            ['escape' => false, 'class' => 'text-dark']);
                                    }else{
                                        echo $this->Html->link('<span class="text-nowrap" lang="fa">ورود به حساب کاربری</span>',
                                            ['controller' => 'Students', 'action' => 'login'],
                                            ['escape' => false, 'class' => 'text-dark']);
                                    }
                                    ?>
                                </div>

                                <div class="hamburger menu_mm">
                                    <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Menu -->
    <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
        <div class="menu_close_container">
            <div class="menu_close">
                <div></div>
                <div></div>
            </div>
        </div>
<!--        <div class="search">-->
<!--            <form action="#" class="header_search_form menu_mm">-->
<!--                <input type="search" class="search_input menu_mm" placeholder="Search" required="required">-->
<!--                <button-->
<!--                    class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">-->
<!--                    <i class="fa fa-search menu_mm" aria-hidden="true"></i>-->
<!--                </button>-->
<!--            </form>-->
<!--        </div>-->
        <nav class="menu_nav w-100">
            <ul class="menu_mm text-right">
                <?php if ($auth): ?>
                    <li class="menu_mm">
                        <?= $this->Html->link('PROFILE', ['controller' => 'Students', 'action' => 'view'], ['class' => 'text-primary', 'escape' => false]) ?>
                        <i class="fa fa-chevron-right text-muted"></i> <?= $student->firstName.' '.$student->lastName ?>
                    </li>
                <?php endif; ?>
                <li class="menu_mm <?= $this->request->getParam("controller") === "Pages" && $this->request->getParam("action") === 'display' ? 'active' : '' ?>">
                    <?= $this->Html->link('خانه', "/") ?>
                </li>
                <li class="menu_mm <?= $this->request->getParam("controller") === "Classrooms" && $this->request->getParam("action") === 'index' ? 'active' : '' ?>">
                    <?= $this->Html->link('کلاس ها', ['controller' => 'Classrooms', 'action' => 'index']) ?>
                </li>
                <li class="menu_mm <?= $this->request->getParam("controller") === "Teachers" && $this->request->getParam("action") === 'index' ? 'active' : '' ?>">
                    <?= $this->Html->link('اساتید', ['controller' => 'Teachers', 'action' => 'index']) ?>
                </li>
                <li class="menu_mm <?= $this->request->getParam("controller") === "Events" && $this->request->getParam("action") === 'index' ? 'active' : '' ?>">
                    <?= $this->Html->link('رویدادها', ['controller' => 'Events', 'action' => 'index']) ?>
                </li>
                <li class="menu_mm <?= $this->request->getParam("controller") === "Pages" && $this->request->getParam("action") === 'contact' ? 'active' : '' ?>">
                    <?= $this->Html->link('اطلاعات تماس', ['controller' => 'Pages', 'action' => 'contact']) ?>
                </li>
                <?php if ($auth): ?>
                    <li class="menu_mm">
                        <hr>
                        <?= $this->Html->link('Logout', ['controller' => 'Students', 'action' => 'logout'], ['class' => 'text-danger']) ?>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <?= $this->fetch('content') ?>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer_body">
            <div class="container">
                <div class="row">

                    <!-- Newsletter -->
                    <div class="col footer_col">
                        <div class="newsletter_container d-flex flex-column align-items-start justify-content-end text-right">
                            <div class="footer_logo mb-auto">
                                <?= $this->Html->link($title, "/", ['escape' => false, 'class' => 'text-white h2']) ?>

                                <p class="text-muted" dir="rtl">
                                    <small lang="fa">
                                        موسسه حقوقی زبان های خارجی ایلانلو ایرانیان (شکوه) فعالیت خود را با مدیریت مرحوم استاد علی اصغر ایلانلو به عنوان اولین مرکز حرفه ای آموزش زبان انگلیسی در منطقه رباط کریم و حومه از سال 1379 آغاز کرد.
                                    </small>
                                </p>

                                <?= $this->Html->link('ادامه متن', ['controller' => 'Pages', 'action' => 'about']) ?>
                            </div>
                        </div>
                    </div>

                    <!-- About -->
                    <div class="col-lg-2 offset-lg-1 footer_col text-right">
                        <div>
                            <div class="footer_title">درباره ما</div>
                            <ul class="footer_list">
                                <li>
                                    <?= $this->Html->link('کلاس ها', ['controller' => 'Classrooms', 'action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link('اساتید', ['controller' => 'Teachers', 'action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link('رویدادها', ['controller' => 'Events', 'action' => 'index']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link('اطلاعات تماس', ['controller' => 'Pages', 'action' => 'contact']) ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Help & Support -->
                    <div class="col-lg-2 footer_col text-right">
                        <div class="footer_title">پشتیبانی</div>
                        <ul class="footer_list">
                            <li>
                                <?= $this->Html->link('سئوالات متداول', ['controller' => 'Pages', 'action' => 'faq']) ?>
                            </li>
                        </ul>
                    </div>

                    <!-- Privacy -->
                    <div class="col-lg-2 footer_col clearfix text-right">
                        <div>
                            <div class="footer_title">قوانین و مقررات</div>
                            <ul class="footer_list">
                                <li>
                                    <?= $this->Html->link('قوانین', ['controller' => 'Pages', 'action' => 'terms']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link('سیاست ها', ['controller' => 'Pages', 'action' => 'privacy']) ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div
                            class="copyright_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
                            <div class="cr">
                                تمامی اطلاعات وب سایت محفوظ است
                            </div>
                            <div class="cr_right ml-md-auto">
                                <div class="footer_phone"><span class="cr_title">شماره پشتیبانی:</span> <?= $phone ?></div>
                                <div class="footer_social">
                                    <ul>
                                        <li>
                                            <a href="<?= $instagram ?>">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <span class="cr_social_title">ما را دنبال کنید</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<?= $this->Html->script('/web/js/jquery-3.2.1.min.js') ?>
<?= $this->Html->script('/web/styles/bootstrap4/popper.js') ?>
<?= $this->Html->script('/web/styles/bootstrap4/bootstrap.min.js') ?>
<?= $this->Html->script('/web/plugins/OwlCarousel2-2.2.1/owl.carousel.js') ?>
<?= $this->Html->script('/web/plugins/easing/easing.js') ?>
<?= $this->Html->script('/web/js/custom.js') ?>
<?= $this->fetch('script') ?>

</body>
</html>
