<template>
    <div class="courses-page">
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

        <div class="row pl-3">
            <div class="col-12">
                <div class="breadcrumbs" id="next">
                    <ul class="flex flex-wrap align-items-center p-0 m-0">
                        <li class="noDecor"><a href="/"><i class="fa fa-home"></i> Главная страница</a></li>
                        <li class="noDecor"><a href="/catalogue" style="color: cornflowerblue">Каталог</a></li>
                        <li v-if="category.title" class="noDecor"><a style="color: cornflowerblue" :href="'/catalogue#/' + category.ID_NAME">{{category.title}}</a></li>
                        <li v-if="product.name">{{product.name}}</li>
                    </ul>
                </div><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->

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
                            <div class="course-cats flex flex-wrap align-items-center mt-3 border-0">
                                <div class="author-wrap">
                                    <label class="m-0">Название</label>
                                    <div class="author-name" style=" color:#34d986;"><a href="#">{{product.name}}</a></div>
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
                                    <label class="m-0">Весь</label>
                                    <div class="author-name d-flex buy-course">
                                        <a href="javascript:void(0)" class="btn btn-price" :class="{'green-background' : selectedWeight === 25}" @click="selectedWeight = 25">25 кг</a>
                                        <a href="javascript:void(0)" class="btn btn-price" :class="{'green-background' : selectedWeight === 500}" @click="selectedWeight = 500">500 кг</a>
                                        <a href="javascript:void(0)" class="btn btn-price" :class="{'green-background' : selectedWeight === 1000}"  @click="selectedWeight = 1000">1000 кг</a>
                                    </div>
                                </div>
                            </div><!-- .course-students -->
                            <br/>
                            <div class="buy-course mt-3">
                                <a class="btn" href="javascript:void(0)">Добавить в корзину</a>
                            </div><!-- .buy-course -->
                        </div><!-- .course-info -->

                        <div class="single-course-cont-section">
                            <h2>Описание</h2>

                            <p>
                                {{product.description}}
                            </p>
                        </div>
                    </div><!-- .single-course-wrap -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->

        <div class="container">
            <div class="related-courses">
                <header class="entry-heading flex flex-wrap justify-content-between align-items-center">
                    <h2 class="entry-title">Похожие товары</h2>

                    <a :href="'/catalogue#/' + category.ID_NAME ">Показать все</a>
                </header><!-- .entry-heading -->

                <div class="row mx-m-25">
                    <div v-for="(product,index) in similarProducts" v-bind:key="index + 'A'" class="col-12 col-md-4 px-25">
                            <div class="course-content">
                                <figure class="course-thumbnail">
                                    <a :href="'/catalogue/' + category.ID_NAME +'/' + product.id "><img  :src="getImageSrc(product.photo)" alt="product image"></a>
                                </figure><!-- .course-thumbnail -->

                                <div class="course-content-wrap">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="#">{{ product.name }} </a></h2>

                                        <div class="entry-meta flex flex-wrap align-items-center">
                                            <div class="course-date">Международное название: {{ product.international_name }}</div>
                                        </div><!-- .course-date -->
                                    </header><!-- .entry-header -->

                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <div class="course-cost" v-show="product.price">
                                            {{ product.price }} грн
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <div class="buy-course">
                                        <a class="btn" href="#">Заказать</a>
                                    </div><!-- .buy-course -->

                                </div><!-- .course-content-wrap -->
                            </div><!-- .course-content -->
                </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .related-course -->
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product','category'],

        data(){
            return{
                selectedWeight : 1000,
                similarProducts:[]
            }
        },
        methods:{
            scrollUp(){
                $('html, body').stop().animate( {
                    'scrollTop': 270.7
                }, 900, 'swing',function () {});
            },
            getImageSrc(src) {
                if (src.charAt(0) !== '/') {
                    return '/' + src;
                }
                return src;
            },
            getSimilarProducts(){
                this.getCategoryProducts();
            },
            getCategoryProducts(){
                let categoryName = this.category.ID_NAME;
                axios.get('/catalogue/get/' + categoryName + '/products').then(
                    (response)=>{
                        this.similarProducts = response.data.slice(0,3);
                    }
                );
            },
        },
        mounted() {
            this.getSimilarProducts();
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
        color:white !important;
    }

</style>
