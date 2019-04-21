<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                    <span class="deleteWorkBtn noDecor" @click="clearData" style="width:137px">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addProductModal">
                            <img src="/images/icons/add_blue.png" alt="edit profile">
                            Add product
                        </a>
                    </span>
            </div>
        </div>
        <hr>
        <h1>Products list</h1>
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
                        {{ key }} :
                    </div>
                    <div class="col-md-6">
                        {{ value }}
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
        data() {
            return {
                products: [],
                categories: [],
                canAdd:true,
                toBeEditedProduct:{
                    'id':'',
                    'category_id':'',
                    'name' :'',
                    'price':'',
                    'old_price' :'',
                    'international_name' :'',
                    'package' :'',
                    'description':''
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
                    'old_price' :'',
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
            }
        },

        created() {
            this.getProducts();
            this.getCategories();
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
</style>