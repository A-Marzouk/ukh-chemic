<template>
    <div class="contact-form">
        <h3>Контактная форма </h3>

        <form v-if="!success">
            <input type="text" placeholder="Имя.. *" v-model="formData.name">
            <span class="has-error" v-if="!!errors.name">{{errors.name[0]}}</span>
            <input type="email" placeholder="Почта.. *" v-model="formData.email">
            <span class="has-error" v-if="!!errors.email">{{errors.email[0]}}</span>

            <input type="text" placeholder="Номер телефона.. *" v-model="formData.telephone">
            <span class="has-error" v-if="!!errors.telephone">{{errors.telephone[0]}}</span>

            <input type="text" placeholder="Тема.. *" v-model="formData.title">
            <span class="has-error" v-if="!!errors.title">{{errors.title[0]}}</span>

            <textarea placeholder="Сообщение.. *" rows="2" v-model="formData.message"></textarea>
            <span class="has-error" v-if="!!errors.message">{{errors.message[0]}}</span>

            <input type="submit" value="Отправить" @click.prevent="submitForm">
        </form>

        <div v-else class="message">
            Спасибо наш менеджер свяжется с вами.
        </div>
    </div><!-- .contact-form -->
</template>

<script>
    export default {
        name: "ContactForm",
        data(){
            return{
                formData:{
                    name:'',
                    title:'',
                    message:'',
                    email:'',
                    telephone:''
                },
                success:false,
                errors:[]
            }
        },
        methods:{
            submitForm(){
                this.errors = [] ;
                axios.post('/contacts', this.formData)
                    .then( (response) => {
                        this.success = true;
                    })
                    .catch( (err) => {
                        this.errors = err.response.data.errors ;
                    });
            }
        }
    }

</script>

<style scoped>
.has-error{
    color: red;
    font-size: small;
}
</style>