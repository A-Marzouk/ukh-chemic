<template>
    <div class="courses-page">
        <div class="page-header">
            <div class="page-header-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <header class="entry-header">
                                <h1>Каталог продукции</h1>
                            </header><!-- .entry-header -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .page-header-overlay -->
        </div><!-- .page-header -->

        <a id="button" @click="scrollUp" href="javascript:void(0)"></a>

        <div :class="{'loader margin' : isLoading}">
            <div :class="{'d-none' : isLoading, 'container' : !isLoading}" style="max-width: 1360px;">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs" id="next">
                            <ul class="flex flex-wrap align-items-center p-0 m-0">
                                <li class="noDecor"><a href="/"><i class="fa fa-home"></i> Главная страница</a></li>
                                <li class="noDecor"><a href="/catalogue" @click="clearCategory" style="color: cornflowerblue">Каталог</a></li>
                                <li v-if="currentCategory.title">{{currentCategory.title}}</li>
                            </ul>
                        </div><!-- .breadcrumbs -->
                    </div><!-- .col -->
                </div><!-- .row -->

                <div class="row"  v-show="!currentCategory.id" style="padding: 15px;">
                    <div class="featured-courses courses-wrap">
                        <div class="row mx-m-25 noDecor">
                            <div v-for="(category,index) in categories" v-bind:key="index" class="col-12 col-md-4 px-25" @click="setCategory(category)">
                                <div class="course-content">
                                    <figure class="course-thumbnail">
                                        <a :href="'/catalogue/'+category.ID_NAME"><img  :src="getImageSrc(category.photo)" alt="category image"></a>
                                    </figure><!-- .course-thumbnail -->

                                    <div class="course-content-wrap">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a :href="'/'+category.ID_NAME">{{ category.title }} </a></h2>
                                        </header><!-- .entry-header -->
                                    </div><!-- .course-content-wrap -->
                                </div><!-- .course-content -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .category products -->
                </div>

                <div class="row" v-show="currentCategory.id">
                    <div class="col-12 col-lg-3 d-none d-lg-block">
                        <div class="sidebar">
                            <div class="search-widget">
                                <form class="flex flex-wrap align-items-center" @submit.prevent="searchProducts">
                                    <input type="search" placeholder="Поиск..." v-model="keyword" :onkeydown="searchProducts">
                                    <button type="submit" class="flex justify-content-center align-items-center"><i class="fa fa-search"></i></button>
                                </form><!-- .flex -->
                            </div><!-- .search-widget -->
                                <span class="noDecor" v-show="searchResults.length > 0 && keyword.length > 0">
                                    <a href="javascript:void(0)" class="btn btn-default" @click="searchResults=[]">Clear search</a>
                                </span>
                            <div style="margin-top: 15px;">
                                <span class="alert alert-danger" v-show="showSearchError">
                                    Не найдено
                                </span>
                            </div>
                            <div class="cat-links">
                                <h2>Категории</h2>
                                <ul class="p-0 m-0">
                                    <li v-for="(category,index) in categories" v-bind:key="index" class="noDecor"  @click="setCategory(category)">
                                        <router-link :to="'/catalogue/'+category.ID_NAME" :class="{ activeCategory : category.id === currentCategory.id}">
                                            {{ category.title }}
                                        </router-link>
                                    </li>
                                </ul>
                            </div><!-- .cat-links -->
                            <div class="latest-courses">
                                <h2>Последние просмотренные товары</h2>

                                <ul class="p-0 m-0">
                                    <li class="flex flex-wrap justify-content-between align-items-center">
                                        <img src="/images/products/LiOH.png" alt="">

                                        <div class="content-wrap">
                                            <h3><a href="#">Натрий нитрат</a></h3>

                                            <div class="course-cost">100 грн</div>
                                        </div><!-- .content-wrap -->
                                    </li>

                                    <li class="flex flex-wrap justify-content-between align-items-center">
                                        <img src="images/products/LiOH.png" alt="">

                                        <div class="content-wrap">
                                            <h3><a href="#">Винная кислота</a></h3>

                                            <div class="course-cost">150 грн<span class="price-drop">210 грн</span></div>
                                        </div><!-- .content-wrap -->
                                    </li>
                                </ul>
                            </div><!-- .latest-courses -->
                            <div class="ads">
                                <img src="images/favicon-default.png" width="50%" style="margin-left:25%;" alt="">
                            </div><!-- .ads -->
                        </div><!-- .sidebar -->
                    </div><!-- .col -->
                    <div class="col-12 col-lg-9">

                        <div class="featured-courses courses-wrap">
                            <div class="row mx-m-25">
                                <div v-show="searchResults.length < 1" v-for="(product,index) in paginatedData" v-bind:key="index" class="col-12 col-md-4 px-25">
                                    <div class="course-content">
                                        <figure class="course-thumbnail">
                                            <a :href="'/catalogue/' + currentCategory.ID_NAME +'/' + product.id "><img  :src="getImageSrc(product.photo)" alt="product image"></a>
                                        </figure><!-- .course-thumbnail -->

                                        <div class="course-content-wrap">
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a :href="'/catalogue/' + product.category_id +'/' + product.id ">{{ product.name }} </a></h2>

                                                <div class="entry-meta flex flex-wrap align-items-center">
                                                    <div class="course-date">Международное название: {{ product.international_name }}</div>
                                                </div><!-- .course-date -->
                                            </header><!-- .entry-header -->

                                            <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                                <div class="course-cost" v-show="product.price_1000">
                                                    {{ product.price_1000 }} грн
                                                </div><!-- .course-cost -->
                                            </footer><!-- .entry-footer -->
                                            <div class="buy-course">
                                                <a class="btn" href="#">Заказать</a>
                                            </div><!-- .buy-course -->

                                        </div><!-- .course-content-wrap -->
                                    </div><!-- .course-content -->
                                </div><!-- .col -->
                                <div v-show="searchResults.length > 0" v-for="(product,index) in searchResults" v-bind:key="'c'+index" class="col-12 col-md-4 px-25">
                                    <div class="course-content">
                                        <figure class="course-thumbnail">
                                            <a :href="'/catalogue/' + product.category_id +'/' + product.id "><img  :src="getImageSrc(product.photo)" alt="product image"></a>
                                        </figure><!-- .course-thumbnail -->

                                        <div class="course-content-wrap">
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a :href="'/catalogue/' + product.category_id +'/' + product.id ">{{ product.name }} </a></h2>

                                                <div class="entry-meta flex flex-wrap align-items-center">
                                                    <div class="course-date">Международное название: {{ product.international_name }}</div>
                                                </div><!-- .course-date -->
                                            </header><!-- .entry-header -->

                                            <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                                <div class="course-cost" v-show="product.price_1000">
                                                    {{ product.price_1000 }} грн
                                                </div><!-- .course-cost -->
                                            </footer><!-- .entry-footer -->
                                            <div class="buy-course">
                                                <a class="btn" href="#">Заказать</a>
                                            </div><!-- .buy-course -->

                                        </div><!-- .course-content-wrap -->
                                    </div><!-- .course-content -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .category products -->

                        <div v-show="searchResults.length < 1">
                            <div  class="pagination flex flex-wrap justify-content-between align-items-center">
                                <div class="col-12 col-lg-4 order-2 order-lg-1 mt-3 mt-lg-0">
                                    <ul class="flex flex-wrap align-items-center order-2 order-lg-1 p-0 m-0">
                                        <li v-show="pageNumber+1 !== 1">
                                            <a href="javascript:void(0)" @click="prevPage"><i class="fa fa-angle-left"></i></a>
                                        </li>
                                        <li v-for="(page ,index) in pageCount" v-bind:key="index" :class="{ active : index === pageNumber}">
                                            <a href="javascript:void(0)" @click="setPage(index)">
                                                {{ index + 1 }}
                                            </a>
                                        </li>
                                        <li v-show="pageNumber+1 !== pageCount">
                                            <a href="javascript:void(0)" @click="nextPage"><i class="fa fa-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .pagination -->
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div>

        <div class="clients-logo">
            <div class="container">
                <div class="row">
                    <div class="col-12 flex flex-wrap justify-content-center justify-content-lg-between align-items-center">
                        <div class="logo-wrap">
                            <img src="/images/logo-1.png" alt="">
                        </div><!-- .logo-wrap -->

                        <div class="logo-wrap">
                            <img src="images/logo-2.png" alt="">
                        </div><!-- .logo-wrap -->

                        <div class="logo-wrap">
                            <img src="/images/logo-3.png" alt="">
                        </div><!-- .logo-wrap -->

                        <div class="logo-wrap">
                            <img src="/images/logo-4.png" alt="">
                        </div><!-- .logo-wrap -->

                        <div class="logo-wrap">
                            <img src="/images/logo-5.png" alt="">
                        </div><!-- .logo-wrap -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .clients-logo -->
    </div>
</template>

<script>
    export default {
        props:['category'],
        data(){
          return{
              isLoading : true,
              categories:[],
              currentCategory: {},
              categoriesProducts:{
                  'ceramic_and_glass_industry' : [],
                  'wood_industry' : [],
                  'metallurgical_industry' : [],
                  'agricultural_industry' : [],
                  'leathers_industry' : [],
                  'food_industry' : [],
                  'construction_industry' : [],
                  'pharmaceutical_industry' : [],
                  'electroplating_metals' : [],
                  'varnishes_paints_and_resins' : [],
                  'lubricants_and_oils' : [],
                  'tires_and_rubber_goods' : [],
                  'cosmetic_industry' : []
              },
              pageNumber:0,
              productsPerPage : 9,
              searchResults:[],
              keyword:'',
              showSearchError:false
          }
        },
        computed:{
            pageCount(){
                let currentProducts = this.categoriesProducts[this.currentCategory.ID_NAME];
                if(currentProducts !== undefined) {
                    let l = currentProducts.length,
                        s = this.productsPerPage;
                    return Math.ceil(l / s);
                }
            },
            paginatedData:{
                get(){
                    let currentProducts = this.categoriesProducts[this.currentCategory.ID_NAME];
                    const  start = this.pageNumber * this.productsPerPage,
                        end = start + this.productsPerPage;
                    if( currentProducts !== undefined){
                        return this.categoriesProducts[this.currentCategory.ID_NAME].slice(start, end);
                    }
                }
            }
        }
        ,
        methods:{
            getImageSrc(src) {
                if(src === null || src === undefined || src.length < 1){
                    return '/images/empty-image-holder.jpg' ;
                }

                if (src.charAt(0) !== '/') {
                    return '/' + src;
                }

                return src;
            },
            getCategories(){
                axios.get('/catalogue/get/categories').then(
                    (response) => {
                        this.isLoading = false;
                        this.categories = response.data;
                        $.each( this.categories ,(i) => {
                            if(this.categories[i].ID_NAME === this.$route.path.replace('/','')){
                                this.setCategory(this.categories[i]);
                            }
                            if(this.category.length > 1){
                                if(this.categories[i].ID_NAME === this.category){
                                    this.setCategory(this.categories[i]);
                                }
                            }

                        });
                        if(!this.currentCategory.id){
                            // this.setCategory(this.categories[0]);
                        }

                        if (this.$attrs['searchedproducts'] !== undefined && this.$attrs['searchedproducts'].length > 0){
                            this.currentCategory =  this.categories[0] ;
                            this.searchResults = this.$attrs['searchedproducts'] ;
                        }

                    }
                );
            },
            setCategory(category){
                this.currentCategory = category;
                this.pageNumber = 0 ;
                this.getCategoryProducts(category);
                setTimeout(this.scrollUp,500);
                this.searchResults = [];
            },
            clearCategory(){
                this.currentCategory = {};
                this.searchResults = [];
            },
            getCategoryProducts(category){
                let categoryName = category.ID_NAME;
                if( this.categoriesProducts[categoryName].length > 0){
                    return;
                }
                axios.get('/catalogue/get/' + category.ID_NAME + '/products').then(
                    (response)=>{
                        this.categoriesProducts[category.ID_NAME] = response.data;
                    }
                );
            },
            nextPage(){
                this.pageNumber++;
                this.scrollUp();
            },
            prevPage(){
                this.pageNumber--;
                this.scrollUp();
            },
            setPage(index){
                this.pageNumber = index ;
                this.scrollUp();
            },
            scrollUp(){
                $('html, body').stop().animate( {
                    'scrollTop': 395
                }, 900, 'swing',function () {});
            },
            searchProducts(){
                axios.post('/catalogue/search',{keyword: this.keyword}).then(
                    response => {
                        this.searchResults = response.data ;

                        if(response.data.length < 1){
                            this.showSearchError = true;
                            setTimeout(() => {
                                this.showSearchError = false;
                            },2000)
                        }
                    }
                );
            }
        },
        mounted() {
            this.getCategories();
        }
    }
</script>
<style>
    .activeCategory{
     color:  #19c880 !important;
    }

    .loader {
        border: 15px solid lightblue;
        border-radius: 50%;
        border-top: 15px solid #3498db;
        width: 150px;
        height: 150px;
        margin-right: 25px;
        margin-top: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .shaded{
        background: lightgrey;
    }
    .selectDefault{
        border-top: 6px solid white;
    }
    .selectGREY{
        border-top: 6px solid grey;
    }
    .selectRED{
        border-top: 6px solid red;
    }
    .selectGREEN{
        border-top: 6px solid green;
    }
    .selectLIGHTGREEN{
        border-top: 6px solid lightgreen;
    }
    .selectORANGE{
        border-top: 6px solid orange;
    }
    .float{
        position:fixed;
        width:100px;
        height:30px;
        bottom:40px;
        right:40px;
        background-color:red;
        color: #FFF !important;
        padding:5px;
        border-radius:10px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
    }

    .margin{
        margin: auto; margin-top: 100px;
    }

    .my-float{
        margin-top:22px;
    }

    #button {
        display: inline-block;
        background-color: lightgreen;
        width: 50px;
        height: 50px;
        text-align: center;
        border-radius: 4px;
        position: fixed;
        bottom: 30px;
        right: 30px;
        transition: background-color .3s,
        opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
    }
    #button::after {
        content: "\f077";
        font-family: FontAwesome;
        font-weight: normal;
        font-style: normal;
        font-size: 2em;
        line-height: 50px;
        color: #fff;
    }
    #button:hover {
        cursor: pointer;
        background-color: #333;
    }
    #button:active {
        background-color: #555;
    }
    #button.show {
        opacity: 1;
        visibility: visible;
    }

    /* Styles for the content section */

    .content {
        width: 77%;
        margin: 50px auto;
        font-family: 'Merriweather', serif;
        font-size: 17px;
        color: #6c767a;
        line-height: 1.9;
    }
    @media (min-width: 500px) {
        .content {
            width: 43%;
        }
        #button {
            margin: 30px;
        }
    }
    .content h1 {
        margin-bottom: -10px;
        color: #03a9f4;
        line-height: 1.5;
    }
    .content h3 {
        font-style: italic;
        color: #96a2a7;
    }
</style>
