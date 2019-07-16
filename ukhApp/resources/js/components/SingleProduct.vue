<template>
    <div class="single-courses-page">
        <div class="page-header">
            <div class="page-header-overlay" style="height: 265px;">
                <div class="container product-name">
                    <div class="row">
                        <div class="col-12">
                            <header class="entry-header">
                                <h1>{{product.name}}</h1>
                            </header><!-- .entry-header -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .page-header-overlay -->
        </div><!-- .page-header -->

        <a id="button" @click="scrollUp" href="javascript:void(0)"></a>

        <div class="container flex-wrap-on-phone">
            <div class="row">
                <div class="col-12 offset-lg-1 col-lg-10">
                    <div class="product-image" style="margin-top: 10px;">
                        <img :src="getImageSrc(product.photo)" alt="product image" style="height:250px; width:300px" >
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->

            <div class="row">
                <div class="col-12 offset-lg-1 col-lg-1">
                </div><!-- .col -->

                <div class="col-12 col-lg-8">
                    <div class="single-course-wrap">
                        <div class="course-info flex flex-column">
                            <div class="course-author flex flex-wrap align-items-center mt-3 border-0">
                                <div class="author-wrap">
                                    <label class="m-0">Название</label>
                                    <div class="author-name"><a href="#">{{product.name}}</a></div>
                                </div><!-- .author-wrap -->
                            </div><!-- .course-author -->

                            <div class="course-cats mt-3  border-0">
                                <label class="m-0">Категория</label>
                                <div class="author-name"><a href="#">{{category.title}}</a></div>
                            </div><!-- .course-cats -->

                            <div class="mt-3 d-flex">
                                <div class="course-students">
                                    <label class="m-0">Цена за кг</label>
                                    <div class="author-name"><a href="#">
                                        <span v-show="selectedWeight === 25">
                                            {{product.price}}
                                        </span>
                                        <span v-show="selectedWeight === 500">
                                            {{product.price_500}}
                                        </span>
                                        <span v-show="selectedWeight === 1000">
                                            {{product.price_1000}}
                                        </span>
                                    </a></div>
                                </div>
                                <div class="d-flex flex-column course-students border-0">
                                    <label class="m-0">Выберите весь</label>
                                    <div class="author-name d-flex buy-course">
                                        <a href="javascript:void(0)" class="btn btn-price" :class="{'green-background' : selectedWeight === 25}" @click="selectedWeight = 25">25 кг</a>
                                        <a href="javascript:void(0)" class="btn" @click="selectedWeight = 500">500 кг</a>
                                        <a href="javascript:void(0)" class="btn"  @click="selectedWeight = 1000">1000 кг</a>
                                    </div>
                                </div>
                            </div><!-- .course-students -->
                            <br/>
                            <div class="buy-course mt-3">
                                <a class="btn" href="#">ADD to cart</a>
                            </div><!-- .buy-course -->
                        </div><!-- .course-info -->

                        <div class="single-course-cont-section">
                            <h2>Описание</h2>

                            <p>
                                {{product.description}}
                            </p>

                            <h2>Requirements</h2>

                            <ul class="p-0 m-0 black-doted">
                                <li>64-bit PC capable of running Unreal 4 (recommended).</li>
                                <li>Or a Mac capable of running Unreal 4 (must support Metal).</li>
                                <li>About 15GB of free disc space.</li>
                            </ul>

                            <h2>Description</h2>

                            <p>EW Testing Grounds FPS shipped, including...</p>
                            <p>Much more C++ and Blueprint.</p>
                            <p>AI Blackboards & Behavior Trees.</p>
                            <p>Environmental Query System (EQS).</p>
                            <p>Humanoid Animation Blending.</p>
                            <p>Never-ending Level Design.</p>
                            <p>The course now has high quality hand written subtitles throughout, available as closed captions so you can turn them on or off at your convenience.</p>
                            <p>This course started as a runaway success on Kickstarter. Get involved now, and get access to all future content as it's added. The final course will be over 50 hours of content and 300+ lectures.</p>
                            <p>Learn how to create and mod video games using Unreal Engine 4, the free-to-use game development platform used by AAA studios and indie developers worldwide.</p>
                            <p>We start super simple so you need no prior experience of Unreal or coding! With our online tutorials, you'll be amazed what you can achieve.</p>
                            <p>Benefit from our world-class support from both other students, and the instructors who are on the forums regularly. Go on to build several games including a tank game, and a First Person Shooter.</p>
                            <p>You will have access to a course forum where you can discuss topics on a course-wide basis, or down to the individual video. Our thriving discussion forum will help you learn and share ideas with other students.</p>
                            <p>You will learn C++, the powerful industry standard language from scratch. By the end of the course you'll be very confident in the basics of coding and game development, and hungry to learn more.</p>
                            <p>"Any serious game programmer needs to know C++"Jason Gregory, Lead Programmer at Naughty Dog (creators of Uncharted & The Last of Us)</p>
                            <p>Anyone who wants to learn to create games: Unreal Engine is a fantastic platform which enables you to make AAA-quality games. Furthermore these games can be created for Windows, consoles, MacOS, iOS, Android and Web from a single source!</p>
                            <p>If you're a complete beginner, we'll teach you all the coding and game design principles you'll need. If you're an artist, we'll teach you to bring your assets to life. If you're a coder, we'll teach you game design principles.</p>
                            <p>What this course DOESN'T cover...</p>
                            <p>Whereas this course is already huge, we can't possibly cover everything in that time. Here are some things we will not be covering...</p>

                            <h2>Who is the target audience?</h2>

                            <ul class="p-0 m-0 black-doted">
                                <li>Competent and confident with using a computer.</li>
                                <li>Artists who want to bring their assets alive in a game engine.</li>
                                <li>Developers who want to re-skill across to coding.</li>
                                <li>Complete beginners who are willing to work hard.</li>
                                <li>Existing programmers who want to re-skill to game development.</li>
                            </ul>
                        </div>

                        <div class="single-course-accordion-cont mt-3">
                            <header class="entry-header flex flex-wrap justify-content-between align-items-center">
                                <h2>Curriculum For This Course</h2>

                                <div class="number-of-lectures">340 Lectures</div>

                                <div class="total-lectures-time">42:57:42</div>
                            </header><!-- .entry-header -->

                            <div class="entry-contents">
                                <div class="accordion-wrap type-accordion">
                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center active">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Introduction to this Course</span>
                                        <span class="number-of-lectures">7 Lectures</span>
                                        <span class="total-lectures-time">21:29</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Introduction to Front End Development</span>
                                        <span class="number-of-lectures">4 Lectures</span>
                                        <span class="total-lectures-time">26:45</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap align-items-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Introduction to HTML	</span>
                                        <span class="number-of-lectures">12 Lectures</span>
                                        <span class="total-lectures-time">58:36</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Intermediate HTML</span>
                                        <span class="number-of-lectures">12 Lectures</span>
                                        <span class="total-lectures-time">01:12</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Introduction to this Course</span>
                                        <span class="number-of-lectures">7 Lectures</span>
                                        <span class="total-lectures-time">21:29</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Introduction to CSS</span>
                                        <span class="number-of-lectures">12 Lectures</span>
                                        <span class="total-lectures-time">01:39</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Intermediate CSS</span>
                                        <span class="number-of-lectures">16 Lectures</span>
                                        <span class="total-lectures-time">01:25</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Bootstrap</span>
                                        <span class="number-of-lectures">16 Lectures</span>
                                        <span class="total-lectures-time">01:59</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Introduction to JavaScript</span>
                                        <span class="number-of-lectures">12 Lectures</span>
                                        <span class="total-lectures-time">56:21</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">DOM Manipulation</span>
                                        <span class="number-of-lectures">13 Lectures</span>
                                        <span class="total-lectures-time">01:15</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Color Game Project</span>
                                        <span class="number-of-lectures">10 Lectures</span>
                                        <span class="total-lectures-time">01:47</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Intro to jQuery</span>
                                        <span class="number-of-lectures">9 Lectures</span>
                                        <span class="total-lectures-time">01:09</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Advanced jQuery</span>
                                        <span class="number-of-lectures">5 Lectures</span>
                                        <span class="total-lectures-time">34:34</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>

                                    <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                        <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                        <span class="lecture-group-title">Data Associations</span>
                                        <span class="number-of-lectures">4 Lectures</span>
                                        <span class="total-lectures-time">38:07</span>
                                    </h3>

                                    <div class="entry-content">
                                        <ul class="p-0 m-0">
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">A Note On Asking For Help</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Introducing Our TA</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">01:43</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Our Class Chat Room</span><span class="lectures-preview"></span><span class="lectures-time text-left text-lg-right">07:48</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Why This Course?</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">01:39</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Download</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">2 pages</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Syllabus Walkthrough</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">09:40</span></li>
                                            <li class="flex flex-column flex-lg-row align-items-lg-center"><span class="lecture-title">Lecture Slides</span><span class="lectures-preview">Preview</span><span class="lectures-time text-left text-lg-right">00:03</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .entry-contents -->
                        </div><!-- .single-course-accordion-cont  -->

                        <div class="instructors-info">
                            <header class="entry-heading">
                                <h2 class="entry-title">Instructors</h2>
                            </header><!-- .entry-heading -->

                            <div class="instructor-short-info flex flex-wrap">
                                <div class="instructors-stats">
                                    <img src="/images/instructor.jpg" alt="">

                                    <ul class="p-0 m-0 mt-3">
                                        <li><i class="fa fa-star"></i> 4.7 .7 Average rating</li>
                                        <li><i class="fa fa-comment"></i> 25,182 Reviews</li>
                                        <li><i class="fa fa-user"></i> 11,085 Students</li>
                                        <li><i class="fa fa-play-circle"></i> 2 Courses</li>
                                    </ul>
                                </div><!-- .instructors-stats -->

                                <div class="instructors-details">
                                    <div class="ratings flex align-items-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span> (4 votes)</span>
                                    </div><!-- .ratings -->

                                    <h2 class="entry-title mt-3">The Unreal Engine Developer Course Learn C++ & Make Games</h2>

                                    <div class="course-teacher mt-3">
                                        Teacher: <a href="#">Ms. Lara Croft</a>
                                    </div><!-- .course-teacher -->

                                    <div class="entry-content mt-3">
                                        <p>Hi! I'm Colt. I'm a developer with a serious love for teaching. I've spent the last few years teaching people to program at 2 different immersive bootcamps where I've helped hundreds of people become web developers and change their lives. My graduates work at companies like Google, Salesforce, and Square.</p>
                                    </div><!-- .entry-content -->
                                </div><!-- .instructors-details -->
                            </div><!-- .instructor-short-info -->
                        </div><!-- .instructors-info -->

                        <div class="related-courses">
                            <header class="entry-heading flex flex-wrap justify-content-between align-items-center">
                                <h2 class="entry-title">Related Courses</h2>

                                <a href="#">View all</a>
                            </header><!-- .entry-heading -->

                            <div class="row mx-m-25">
                                <div class="col-12 col-lg-6 px-25">
                                    <div class="course-content">
                                        <figure class="course-thumbnail">
                                            <a href="#"><img src="/images/3.jpg" alt=""></a>
                                        </figure><!-- .course-thumbnail -->

                                        <div class="course-content-wrap">
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="#">The Complete Digital Marketing Course</a></h2>

                                                <div class="entry-meta flex flex-wrap align-items-center">
                                                    <div class="course-author"><a href="#">Ms. Lucius</a></div>

                                                    <div class="course-date">Dec 18, 2018</div>
                                                </div><!-- .course-date -->
                                            </header><!-- .entry-header -->

                                            <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                                <div class="course-cost">
                                                    $55 <span class="price-drop">$78</span>
                                                </div><!-- .course-cost -->

                                                <div class="course-ratings flex justify-content-end align-items-center">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star-o"></span>

                                                    <span class="course-ratings-count">(4 votes)</span>
                                                </div><!-- .course-ratings -->
                                            </footer><!-- .entry-footer -->
                                        </div><!-- .course-content-wrap -->
                                    </div><!-- .course-content -->
                                </div><!-- .col -->

                                <div class="col-12 col-lg-6 px-25">
                                    <div class="course-content">
                                        <figure class="course-thumbnail">
                                            <a href="#"><img src="/images/2.jpg" alt=""></a>
                                        </figure><!-- .course-thumbnail -->

                                        <div class="course-content-wrap">
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="#">The Ultimate Drawing Course Beginner to Advanced</a></h2>

                                                <div class="entry-meta flex flex-wrap align-items-center">
                                                    <div class="course-author"><a href="#">Michelle Golden</a></div>

                                                    <div class="course-date">Mar 14, 2018</div>
                                                </div><!-- .course-date -->
                                            </header><!-- .entry-header -->

                                            <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                                <div class="course-cost">
                                                    <span class="free-cost">Free</span>
                                                </div><!-- .price-drop -->

                                                <div class="course-ratings flex justify-content-end align-items-center">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star-o"></span>

                                                    <span class="course-ratings-count">(4 votes)</span>
                                                </div><!-- .course-ratings -->
                                            </footer><!-- .entry-footer -->
                                        </div><!-- .course-content-wrap -->
                                    </div><!-- .course-content -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .related-course -->
                    </div><!-- .single-course-wrap -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
</template>

<script>
    export default {
        props: ['product','category'],

        data(){
            return{
                selectedWeight : 25
            }
        },
        methods:{
            scrollUp(){
                $('html, body').stop().animate( {
                    'scrollTop': 395
                }, 900, 'swing',function () {});
            },
            getImageSrc(src) {
                if (src.charAt(0) !== '/') {
                    return '/' + src;
                }
                return src;
            },
        },
        mounted() {
            console.log(this.product);
        }
    }
</script>

<style lang="scss">
    .product-name{
        margin-top:-60px;
        @media only screen and (max-width: 600px) {
            margin-top: -14px;
        }
    }
    .product-image{

        border-radius: 6px;
        padding: 15px;
        img{
            box-shadow: 0px 5px 5px 3px #bfbbbb52;
        }
    }

    @media only screen and (max-width: 600px) {
        .entry-header h1{
            font-size: 22px !important;
        }
    }

    .flex-wrap-on-phone{
        display: flex;
        flex-wrap: nowrap;
        @media only screen and (max-width: 600px) {
            flex-wrap: wrap;
        }
    }

    .btn-price{
        padding: 16px 20px;
        margin: 5px;
    }

    .green-background{
        background:#34d986;
        color:white;
    }

</style>