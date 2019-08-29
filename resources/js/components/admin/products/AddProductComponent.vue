<template>
    <div>
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeProductModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  method="post" @submit.prevent="submitForm">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name" class="panelFormLabel">Название :</label>
                                    <input type="text" class="form-control" id="name" name="name" v-model="toBeEditedProduct.name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name" class="panelFormLabel">SEO заголовок :</label>
                                    <input type="text" class="form-control" v-model="toBeEditedProduct.seo_title" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name" class="panelFormLabel">meta Описание :</label>
                                    <input type="text" class="form-control" v-model="toBeEditedProduct.meta_description" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name" class="panelFormLabel">ярлык :</label>
                                    <input type="text" class="form-control" v-model="toBeEditedProduct.label" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="id_name" class="panelFormLabel">ID Name :</label>
                                    <input type="text" class="form-control" id="id_name" name="ID_NAME" v-model="toBeEditedProduct.ID_NAME" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price" class="panelFormLabel">Цена : (25 кг (мешок) )</label>
                                    <input type="number" min="0" max="9999999" step="any" class="form-control" id="price" name="price" v-model="toBeEditedProduct.price" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price_500" class="panelFormLabel">Цена : ( 500 кг ) </label>
                                    <input type="number" step="any" min="0" max="999999" class="form-control" id="price_500" name="price_500" v-model="toBeEditedProduct.price_500" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price_1000" class="panelFormLabel">Цена : ( 1000 кг ) </label>
                                    <input type="number" min="0" max="9999999" step="any" class="form-control" id="price_1000" name="price_1000" v-model="toBeEditedProduct.price_1000" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="international_name" class="panelFormLabel">Международное название:</label>
                                    <input type="text" class="form-control" id="international_name" name="international_name" v-model="toBeEditedProduct.international_name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="package" class="panelFormLabel">Упаковка:</label>
                                    <input type="text" class="form-control" id="package" name="package" v-model="toBeEditedProduct.package" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="manufacturer" class="panelFormLabel">Производитель:</label>
                                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" v-model="toBeEditedProduct.manufacturer" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description" class="panelFormLabel">Описание :</label>
                                    <textarea class="form-control" rows="3" id="description" name="description" v-model="toBeEditedProduct.description" required>
                                    </textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="category_id" class="panelFormLabel">Категории :</label>
                                    <select class="custom-select" name="category_id" id="category_id" v-model="toBeEditedProduct.category_id">
                                        <option :value="category.id" v-for="(category,index) in categories" v-bind:key="index">
                                            {{category.title}}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="file">
                                       Загрузить картинку продукта
                                    </label>
                                    <div class="border-dark p-5">
                                        <img :src="getImageSrc(toBeEditedProduct.photo)" alt="product photo" style="width:250px; height:250px;">
                                    </div>
                                    <input type="file"
                                           id="file"
                                           ref="file"
                                           v-on:change="handleFileUpload"
                                           name="productImage"
                                           class="form-control"
                                    />
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['toBeEditedProduct','categories'],
        data(){
            return{
                productImage:''
            }
        },
        methods:{
            submitForm(){
                // post data :
                let product = this.toBeEditedProduct;
                let form_data = new FormData();
                for ( var key in product) {
                    form_data.append(key, product[key]);
                }
                form_data.append('productImage',this.productImage);

                axios.post('/admin/add/product',form_data).then( (response) => {
                    if(this.toBeEditedProduct.id === ""){
                        this.$emit('productAdded',this.toBeEditedProduct);
                    }
                    // save the product id :
                    this.toBeEditedProduct.id = response.data.product.id;
                    this.toBeEditedProduct.photo = response.data.product.photo;

                    if(response.data.status === 'success'){
                        // changes saved :
                        $('#changesSaved').removeClass('d-none');
                        setTimeout(function() {
                            $('#changesSaved').addClass('d-none');
                        }, 3500);
                    }else{
                        $('#fail').removeClass('d-none');
                        setTimeout(function() {
                            $('#fail').addClass('d-none');
                        }, 3500);
                    }

                    $('#closeProductModal').click();

                }).catch( (error) => {
                    console.log(error);
                    $('#fail').removeClass('d-none');
                    setTimeout(function() {
                        $('#fail').addClass('d-none');
                    }, 3500);
                    $('#closeProductModal').click();
                });


            },
            handleFileUpload() {
                this.productImage = this.$refs.file.files[0];
            },
            getImageSrc(src) {
                if (src.charAt(0) !== '/') {
                    return '/' + src;
                }
                return src;
            },
        },
        mounted(){
        }
    }
</script>