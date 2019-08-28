<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="selectCategory"></label>
                    <select id="selectCategory" class="form-control" v-model="currentCategory" @change="getProductsByCategoryName">
                        <option value="none" selected>Выберите категорию</option>
                        <option v-for="(category,index) in categories" v-bind:key="'b'+index" :value="category.ID_NAME">
                            {{category.title}}
                        </option>
                        <option value="all">Все продукты</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <span class="deleteWorkBtn noDecor" @click="clearData" style="width:137px">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addProductModal">
                        <img src="/images/icons/add_blue.png" alt="edit profile">
                        Add product
                    </a>
                </span>
            </div>
        </div>

        <a href="javascript:void(0)" @click="searchBox = !searchBox" class="btn btn-outline-dark">Поиск</a>

        <div class="searchBox" v-show="searchBox">
            <div class="row">
                <input type="text" class="form-control col-4 m-2" v-model="searchParams.name" placeholder="Название продукта">
                <input type="number" step="any" min="0" max="999999" class="form-control col-4 m-2" v-model="searchParams.price"  placeholder="Цена за 25 кг">
                <input type="number" step="any" min="0" max="999999" class="form-control col-4 m-2" v-model="searchParams.price_500" placeholder="Цена за 500 кг">
                <input type="number" step="any" min="0" max="999999" class="form-control col-4 m-2" v-model="searchParams.price_1000" placeholder="Цена за 1000 кг">
                <input type="text" class="form-control col-4 m-2" v-model="searchParams.international_name" placeholder="Международное название">
                <input type="text" class="form-control col-4 m-2" v-model="searchParams.manufacturer" placeholder="Производитель">
                <input type="text" class="form-control col-4 m-2" v-model="searchParams.description" placeholder="Описание">
            </div>
            <div>
                <a href="javascript:void(0)" class="btn btn-primary mt-2" @click="getSearchedProducts">
                    Поиск
                </a>
            </div>
        </div>
        <hr>
        <h2>Лист продуктов</h2>
        <div v-show="products.length < 1">
            Выберите категорию пожалуйста
        </div>
        <transition-group name="list" class="row">
            <product-component v-for="(product,index) in products" v-bind:key="'a'+index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">

                <div class="row">
                    <div class="col-lg-6 offset-lg-4">
                        <span class="deleteWorkBtn noDecor" @click="deleteProduct(product)">
                            <a href="javascript:void(0)">
                                <img src="/images/icons/close_blue.png" alt="edit profile">
                                Delete
                            </a>
                        </span>

                        <span class="deleteWorkBtn noDecor"  @click="editProduct(product.id)" style=" width: 75px; margin-right:5px;">
                            <a href="javascript:void(0)" data-target="#addProductModal"  data-toggle="modal">
                                <img src="/images/icons/edit_blue.png" alt="edit profile" style="width: 20px;
            padding-right: 7px;
            padding-bottom: 2px;
            height: 15px;">
                                Edit
                            </a>
                        </span>
                    </div>
                </div>
                <div class="row" v-for="(value,key) in product">
                    <div class="col-md-4">
                        <div v-if=" key === 'id'">ID</div>
                        <div v-else-if="key === 'ID_NAME'">Название продукта в УРЛ</div>
                        <div v-else-if="key === 'category_id'">Kатегория</div>
                        <div v-else-if=" key === 'name'">Название</div>
                        <div v-else-if="key === 'price'">Цена за 25 кг</div>
                        <div v-else-if="key === 'price_500'">Цена за 500 кг</div>
                        <div v-else-if="key === 'price_1000'">Цена за 1000 кг</div>
                        <div v-else-if="key === 'international_name'">Международное название</div>
                        <div v-else-if="key === 'photo'">Картинка</div>
                        <div v-else-if="key === 'manufacturer'">Производитель</div>
                        <div v-else-if="key === 'package'">Упаковка</div>
                        <div v-else-if="key === 'description'">Описание</div>
                        <div v-else-if="key === 'created_at'">Дата создания </div>
                        <div v-else-if="key === 'updated_at'">Дата обновления</div>
                        <div v-else>{{key}}</div>
                    </div>
                    <div class="col-md-6">
                        <div v-if="key === 'photo'" class="p-5">
                            <img :src="getImageSrc(value)" alt="product photo" style="width: 300px; height:300px;">
                        </div>
                        <div v-else>
                            {{ value }}
                        </div>
                    </div>
                </div>
                <hr>
            </product-component>
        </transition-group>
        <br/>
        <add-product-component @productAdded="addProductPost" :categories="categories" :toBeEditedProduct="toBeEditedProduct"></add-product-component>
    </div>
</template>

<script>
    import AddProductComponent from "./AddProductComponent";

    export default {
        components: {AddProductComponent},
        props:['saved_category'],
        data() {
            return {
                products: [],
                searchResult:[],
                searchBox:false,
                searchParams:{
                    'name' : '',
                    'price_25' : '',
                    'price_500' : '',
                    'price_1000' : '',
                    'international_name' : '',
                    'manufacturer' : '',
                    'description' : '',
                },
                categories: [],
                canAdd:true,
                currentCategory:'',
                toBeEditedProduct:{
                    'id':'',
                    'category_id':'',
                    'name' :'',
                    'price':'',
                    'price_500':'',
                    'price_1000':'',
                    'international_name' :'',
                    'package' :'',
                    'description':'',
                    'photo':''
                },
            }
        },

        methods: {
            getProducts() {
                axios.get('/admin/get/products').then(
                    (response) => {
                        let products =  response.data;
                        $.each(products, function(i){
                        });
                        this.products = products;

                    }
                );
            },

            getSearchedProducts() {
                axios.post('/admin/search/products',this.searchParams).then(
                    (response) => {
                        console.log(response.data);
                        return;

                        let searchedProducts =  response.data;
                        $.each(searchedProducts, function(i){

                        });
                        this.searchResult = searchedProducts;

                    }
                );
            },
            getProductsByCategoryName() {
                if(this.currentCategory === 'all' ){
                    return this.getProducts() ;
                }

                if(this.currentCategory === "none" ){
                    this.products = [] ;
                }

                axios.get('/admin/get/products/' + this.currentCategory ).then(
                    (response) => {
                        let products =  response.data;
                        $.each(products, function(i){
                        });
                        this.products = products;
                    }
                );
            },

            addProductPost(newProduct) {
                this.products.push(newProduct);

            },

            deleteProduct(product){
                if(!confirm('Are you sure you want to delete this product ?')){
                    return;
                }
                axios.post('/admin/delete/product',{productID:product.id}).then((response)=>{
                    let products = this.products;
                    $.each(products, function(i){
                        if(products[i].id === product.id) {
                            products.splice(i,1);
                            return false;
                        }
                    });
                });
            },

            editProduct(productID){
                let products = this.products;
                let editedProduct =  {};

                $.each(products, function(i){
                    if(products[i].id === productID){
                        editedProduct = products[i];
                    }
                });
                this.toBeEditedProduct = editedProduct;
            },

            clearData(){
                this.toBeEditedProduct={
                    'id':'',
                    'category_id':'',
                    'name' :'',
                    'price':'',
                    'international_name' :'',
                    'package' :'',
                    'description':''
                };
            },
            getCategories(){
                axios.get('/catalogue/get/categories').then(
                    (response) => {
                        this.categories = response.data;
                    }
                );
            },
            getImageSrc(src) {
                if(src === null || src === undefined){
                    return '' ;
                }
                if (src.charAt(0) !== '/') {
                    return '/' + src;
                }
                return src;
            },
            getSavedCategoryProducts(){
                if(this.saved_category.length > 0){
                    this.currentCategory =  this.saved_category ;
                    this.getProductsByCategoryName();
                }
            }
        },

        created() {
            this.getCategories();
            this.getSavedCategoryProducts();
        }
    }
</script>

<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
    }
    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }

    .searchBox{
        padding: 20px;
        border-radius: 20px;
        border: 1px lightblue solid;
        margin-top:15px;
    }
</style>