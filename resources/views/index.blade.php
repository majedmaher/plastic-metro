<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metro Plastics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <!-- Header Start -->
    <header>
        <a href="{{route('home')}}" class="logo"><img src="{{asset('images/logo.png')}}" alt="logo"></a>

        <div class="navigation">
            <ul class="menu">
                <div class="close-btn"><i class="fas fa-times"></i></div>
                <li class="menu-item"><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="menu-item"><a href="#who-are-we-section">من نحن</a></li>
                <li class="menu-item"><a href="#latest-projects-section">المشاريع</a></li>
                <li class="menu-item"><a href="#latest-news-section">الجديد</a></li>
                <li class="menu-item"><a>اتصل بنا</a></li>


            </ul>
        </div>
        <div class="social-media">
            <ul class="social-menu">
                <li class="social-item"><a target="_blank" href="https://www.twitter.com/metroplasticsa1/"><i class="fab fa-twitter"></i></a></li>
                <li class="social-item"><a target="_blank" href="https://www.facebook.com/metroplasticsksa1/"><i class="fab fa-facebook-f"></i></a></li>
                <li class="social-item"><a target="_blank" href="https://www.instagram.com/metroplasticsksa1"><i class="fab fa-instagram"></i></a></li>
                <li class="social-item"><a target="_blank" href="https://www.linkedin.com/company/metroplasticsksa1/"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
        <div class="menu-btn active"><i class="fas fa-bars"></i></div>
    </header>
    <!-- Header End -->

    <!-- Slider Start -->
    <section class="slider">

        @foreach ($slides as $slide)
        <div class="slide">
            <div class="slider-img">
                <img src="{{URL::asset($slide->image)}}" alt="{{$slide->image}}">
            </div>
            <div class="slider-text">
                <h1><span>{{$slide->title}}</span> <br> {{$slide->sub_title}} </h1>
                <p>{{$slide->details}}</p>
            </div>
        </div>
        @endforeach

        <div class="navigation">
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
        </div>
        <div class="navigation-two">
            <?php $i = 1 ?>
            @foreach ($slides as $slide)
            <div class="btn-two">
                <h3>0{{$i++}}.</h3>
                <br>
                <h4><span>{{$slide->title}}</span><br> {{$slide->sub_title}}</h4>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Slider End -->

    <!-- Who Are We Start -->
    <section class="who-are-we-section">
        <div class="absolute">
            <div id="who-are-we-section"></div>
        </div>
        <div class="who-are-we">
            <div class="who-are-we-text">
                <h3>مــن نـحــن</h3>
                <div class="about-us">
                    <h2>مترو بلاستيك</h2>
                    <p>مصنع مترو للمستلزمات الطبية والمخبرية هو عبارة عن شركة سعودية خاصة تأسست عام 2022 تختص في تصنيع الأدوات الطبية المصممة للاستخدام مرة واحدة والتي يمكن التخلص منها وفق الأساليب القياسية لتلبية احتياجات المعامل.
                        فانسجاماً مع توجيهات خادم الحرمين الشريفين وولي عهده الأمين ورؤيته بأن مكانة المملكة العربية السعودية وجب أن تكون في مقدمة الشعوب، قررنا أن يكون لنا بصمة في ذلك، حيث نتطلع لآن نكون حجر في بناء رؤية المملكة العربية السعودية 2030 وتحقيق نجاحاتها، وأن نشارك لنبني سويًا حلماً يسعى له الجميع ولن يتحقق إلا بمشاركة كل الاطراف، بعزيمة قوية نحو النجاح تحقق المستحيل وتجتاز كل الصعاب.
                    </p>
                </div>

                <!-- <div class="projects-statistics">
                    <div class="statistics">
                        <div class="col">
                            <h3>عدد المشاريع<br> التي نعمل عليها</h3>
                        </div>
                        <div class="col">
                            <h3>500</h3>
                            <p>مشروع</p>
                        </div>
                        <div class="col">
                            <h3>500</h3>
                            <p>مشروع</p>
                        </div>
                        <div class="col">
                            <h3>500</h3>
                            <p>مشروع</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="who-are-we-img">
                <img src="{{asset('images/دراسة-جدوى-مشروع-إعادة-تدوير-البلاستيك.jpg')}}" alt="دراسة جدوى مشروع إاعاة تدوير البلاستيك">
            </div>
        </div>
    </section>
    <!-- Who Are We End -->

    <!-- Latest Projects Start -->
    <section class="latest-projects-section">
        <div class="absolute">
            <div id="latest-projects-section"></div>
        </div>
        <div class="latest-projects-header">
            <h3>أحدث المشاريع</h3>
            <div class="filter-buttons">
                <p class="active" data-target="الكل">الكل</p>
                @foreach ($categories as $category)
                <p data-target="{{$category->name}}">{{$category->name}}</p>
                @endforeach
                <!-- <a href="#">رؤية المزيد</a> -->
            </div>
        </div>
        <div class="latest-projects-content">
            <div class="latest-projects-gallery">
                @foreach ($latestProjects as $project)
                <div class="item active" data-id="الكل">
                    <div class="inner">
                        <img src="{{URL::asset($project->image)}}" alt="{{$project->image}}">

                    </div>
                    <div class="project-title" style="margin: 10px 0;">
                        <h3>{{$project->title}}</h3>
                    </div>
                    <div class="project-description">
                        <p>{{$project->description}}</p>
                    </div>
                </div>
                @endforeach

                @foreach ($projects as $category)
                @foreach ($category->project as $project)
                <div class="item" data-id="{{$category->name}}">
                    <div class="inner">
                        <img src="{{URL::asset($project->image)}}" alt="{{$project->image}}">
                    </div>
                    <div class="project-title" style="margin: 10px 0;">
                        <h3>{{$project->title}}</h3>
                    </div>
                    <div class="project-description">
                        <p>{{$project->description}}</p>
                    </div>
                </div>
                @endforeach
                @endforeach


            </div>
        </div>
    </section>
    <!-- Leatest Projects End -->

    <!-- Layer 1 Section Start -->

    <section class="layer-img-1-section">

        @foreach ($banners as $banner)

        <div class="layer-img">
            <img src="{{URL::asset($banner->image)}}" alt="{{$banner->image}}">
        </div>
        @endforeach

    </section>

    <!-- Layer 1 Section End -->

    <!-- Latest News Section Start -->
    <section class="latest-news-section" id="">
        <div class="absolute">
            <div id="latest-news-section"></div>
        </div>
        <div class="latest-news-header">
            <h3>أخر الاخبار</h3>
            <div class="filter-buttons">
                <p class="active" data-target="الكل">الكل</p>
                @foreach ($categories as $category)
                <p data-target="{{$category->name}}">{{$category->name}}</p>
                @endforeach
                <!-- <a href="#">رؤية المزيد</a> -->
            </div>

        </div>
        <div class="latest-news-content">
            <div class="latest-news-gallery">
                @foreach ($latestNews as $new)
                <div class="item active" data-id="الكل">
                    <div class="inner">
                        <div class="box-height"></div>
                        <div class="box-width">
                            <div class="date"><span>
                                    {{ \Carbon\Carbon::parse($new->created_at)->translatedFormat('l j F Y') }}


                                </span></div>
                            <div class="title-new">
                                <h3>{{$new->title}}</h3>
                            </div>
                            <div class="content-new">
                                <p>{{$new->details}}</p>
                            </div>
                            <!-- <div class="read-new-btn">
                                <a href="">قراءة الخبر</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($news as $category)
                @foreach ($category->news as $new)
                <div class="item" data-id="{{$category->name}}">
                    <div class="inner">
                        <div class="box-height"></div>
                        <div class="box-width">
                            <div class="date"><span>
                                    {{ \Carbon\Carbon::parse($new->created_at)->translatedFormat('l j F Y') }}


                                </span></div>
                            <div class="title-new">
                                <h3>{{$new->title}}</h3>
                            </div>
                            <div class="content-new">
                                <p>{{$new->details}}</p>
                            </div>
                            <!-- <div class="read-new-btn">
                                <a href="">قراءة الخبر</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach

            </div>
        </div>
    </section>
    <!-- Latest News Section End -->

    <!-- Layer 2 Section Start -->
    <section class="layer-img-2-section">
        <div class="layer-img-2">
            @foreach ($banners2 as $banner)

            <img src="{{URL::asset($banner->image)}}" alt="{{$banner->image}}">

            @endforeach
        </div>
    </section>
    <!-- Layer 2 Section End -->

    <!-- Footer Start -->
    <footer>
        <div class="footer">
            <div class="col">
                <h2>مترو بلاستيك </h2>
                <p>مترو بلاستيك هي شركة مصنعة للأكياس البلاستيكية تأسست في السعودية العربية. نحن نستخدم أساليب التصنيع والإدارة الحديثة والمنهجية. يتمتع مؤسسنا بخبرة 25 عامًا في تصنيع البلاستيك وشركتنا مجهزة بالكامل بمعدات وآلات عالية التقنية.</p>
            </div>
            <div class="col">
                <h4>تواصل معنا</h3>
                    <p>
                        Mohamad Grawi (Director)</br>
                        5/2-8 South St Rydalmere NSW 2144</br>
                        P: 02 9645 5408</br>
                        M: 0416 411 232</br>
                        E: sales@metroplastics.com.au
                    </p>
            </div>
            <div class="col">
                <h4>خدماتنا</h4>
                <p>
                    العلب </br>
                    العلب </br>
                    العلب </br>
                    العلب </br>
                    العلب </br>
                </p>
            </div>
        </div>
    </footer>
    <!-- Footer End -->


    <script src="{{asset('js/script.js')}}"></script>

</body>

</html>