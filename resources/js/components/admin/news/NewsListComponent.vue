<template>
    <div class="container">
        <transition-group name="list" class="row">
            <news-post v-for="(news,index) in newsList" :key="index + 'A'" class="list-item col-12"
                       style="margin: 0px 10px 20px;">

                <span class="deleteWorkBtn NoDecor" @click="deleteNews(news)">
                    <a href="javascript:void(0)">
                        Delete
                    </a>
                </span>

                <span class="deleteWorkBtn NoDecor" @click="editNews(news.id)" style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addNewsModal" data-toggle="modal">
                        Edit
                    </a>
                </span>


                <div>
                    <div class="row m-3">
                        <img :src="getImageSrc(news.photo)" alt="" style="width:300px;">
                    </div>
                    <small>
                        {{news.photo}}
                    </small>
                </div>

                <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                    заголовок : {{news.title}}
                </div>

                <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                    описание : {{news.description}}
                </div>
                <br/>
                <div style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">
                    ссылка :
                    <a :href="news.link"> {{news.link_text}} </a></div>
                <br/>

                <div style="color: #30323D;font-family: Roboto;">дата : {{news.date}}</div>

                <br/>

                <hr>

            </news-post>
        </transition-group>

        <span class="deleteWorkBtn NoDecor" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addNewsModal">
                Добавить новости
            </a>
        </span>
        <br/>
        <add-news-modal @newsAdded="addNewsPost" :toBeEditedNews="toBeEditedNews"></add-news-modal>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                newsList: [],
                toBeEditedNews:{
                    'id':'',
                    'title' :'',
                    'description':'',
                    'date' :'',
                    'link' :'',
                    'link_text' :'',
                    'photo':''
                },
            }
        },
        methods: {
            getNews() {
                axios.get('/admin/get/news')
                    .then((response) => {
                        console.log(response.data);
                        this.newsList = response.data;
                    })
                    .catch((error) => {

                    });
            },
            deleteNews(DNews) {
                if (!confirm('Are you sure you want to delete this news post ?')) {
                    return;
                }
                axios.post('/admin/delete/news', { newsID: DNews.id }).then((response) => {
                    let news = this.newsList;
                    $.each(news, function (i) {
                        if (news[i].id === DNews.id) {
                            news.splice(i, 1);
                            return false;
                        }
                    });
                });
            },
            editNews(news_id) {
                let news = this.newsList;
                let editedNews =  {};

                $.each(news, function(i){
                    if(news[i].id === news_id){
                        editedNews = news[i];
                    }
                });
                this.toBeEditedNews = editedNews;
            },
            addNewsPost(newNews) {
                this.newsList.push(newNews);
            },
            clearData(){
                this.toBeEditedNews ={
                        'id':'',
                        'title' :'',
                        'description':'',
                        'date' :'',
                        'link' :'',
                        'link_text' :'',
                        'photo':''
                };
            },
            getImageSrc(src) {
                if(src === null || src === undefined){
                    return ' ' ;
                }
                if (src.charAt(0) !== '/') {
                    return '/' + src;
                }
                return src;
            },
        },
        mounted() {
            this.getNews();
        }
    }
</script>
