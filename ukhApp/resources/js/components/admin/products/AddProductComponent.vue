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
                                    <label for="id_name" class="panelFormLabel">ID Name :</label>
                                    <input type="text" class="form-control" id="id_name" name="ID_NAME" v-model="toBeEditedProduct.ID_NAME" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price" class="panelFormLabel">Цена :</label>
                                    <input type="number" min="0" max="9999999" class="form-control" id="price" name="price" v-model="toBeEditedProduct.price" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="old_price" class="panelFormLabel">Старая цена :</label>
                                    <input type="number" min="0" max="9999999" class="form-control" id="old_price" name="old_price" v-model="toBeEditedProduct.old_price" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="international_name" class="panelFormLabel">Международное название:</label>
                                    <input type="text" class="form-control" id="international_name" name="international_name" v-model="toBeEditedProduct.international_name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="package" class="panelFormLabel">Международное название:</label>
                                    <input type="text" class="form-control" id="package" name="package" v-model="toBeEditedProduct.package" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="manufacturer" class="panelFormLabel">Международное название:</label>
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
            }
        },
        methods:{
            submitForm(){
                // post data :
                axios.post('/admin/add/product',this.toBeEditedProduct).then( (response) => {
                    //
                    console.log(response.data);
                    if(this.toBeEditedProduct.id === ""){
                        this.$emit('productAdded',this.toBeEditedProduct);
                    }
                    // save the product id :
                    this.toBeEditedProduct.id = response.data.id;

                });
                $('#closeProductModal').click();
            },
        },
        mounted(){
        }
    }
</script>