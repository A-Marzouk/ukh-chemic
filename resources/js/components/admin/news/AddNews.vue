<template>
    <div>
        <div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="addNewsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeNewsModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  method="post" @submit.prevent="submitForm">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title" class="panelFormLabel">Title :</label>
                                    <input type="text" class="form-control" id="title" name="title" v-model="toBeEditedNews.title" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description" class="panelFormLabel">Description :</label>
                                    <textarea class="form-control" rows="3" id="description" name="description" v-model="toBeEditedNews.description" required>
                                    </textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title" class="panelFormLabel">Link :</label>
                                    <input type="text" class="form-control" id="link" name="link" v-model="toBeEditedNews.link" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="title" class="panelFormLabel">Link text :</label>
                                    <input type="text" class="form-control" id="link" name="link" v-model="toBeEditedNews.link_text" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="title" class="panelFormLabel">Date :</label>
                                    <input type="date" class="form-control"  v-model="toBeEditedNews.date" required>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="file">
                                        Загрузить картинку
                                    </label>
                                    <div class="border-dark p-5">
                                        <img :src="getImageSrc(toBeEditedNews.photo)" alt="product photo" style="width:300px;">
                                    </div>
                                    <input type="file"
                                           id="file"
                                           ref="file"
                                           v-on:change="handleFileUpload"
                                           name="newsImage"
                                           class="form-control"
                                    />
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Post</button>
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
        props:['toBeEditedNews'],
        data(){
            return{
                newsImage:''
            }
        },
        methods:{
            submitForm(){

                // post data :
                let news = this.toBeEditedNews;
                let form_data = new FormData();
                for ( var key in news) {
                    form_data.append(key, news[key]);
                }
                form_data.append('newsImage',this.newsImage);

                axios.post('/admin/add/news',form_data).then( (response) => {

                    if(this.toBeEditedNews.id === ""){
                        this.$emit('newsAdded',this.toBeEditedNews);
                    }
                    // save the news id :
                    this.toBeEditedNews.id = response.data.id;
                    this.toBeEditedNews.photo = response.data.photo;


                });
                $('#closeNewsModal').click();
            },

            handleFileUpload() {
                this.newsImage = this.$refs.file.files[0];
            },
            getImageSrc(src) {
                if(src === null || src === undefined || src.length < 1){
                    return '/images/empty-image-holder.jpg' ;
                }

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