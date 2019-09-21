<template>
        <div class="d-flex justify-content-center">
            <div class="main-div">
                
                 <div class="row justify-content-between" style="margin: 0">
                    <form
                        v-bind:action="'/home/'+pin[0].id"
                        method="POST"
                    >
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="pin_id" :value="pin[0].id">
                        
                        <button class="btn btn-danger" type="submit">Delete</button>
                     </form>
                    
                    <button class="btn btn-danger" v-on:click="exit">Exit</button>
                 </div>
                <div class="row" style="justify-content: center; margin: 0">
                    <div class="content col-md-7 d-flex justify-content-center">
                        <div class="img">
                            <img class="img-width" v-bind:src="'/storage/'+pin[0].image">
                        </div>
                    </div>
                    <div class="content col-md-5 d-flex flex-column align-items-start"  style="padding: 20px">
                            <h1 class="title-input">{{pin[0].title}}</h1>
                            <h2 style="margin-top: 20px;"><span style="color: grey">Uploaded by</span> {{pin[0].name}}</h2>
                            <h3 style="margin-top: 60px;">{{comments.size}} Comments</h3>
                            <p style="font-size: 18px; color: grey; font-weight: 300;">Share feedback, ask a question or give a high five</p>
                            <form
                                action="comment"
                                method="post"
                                style="width: 100%; display: flex; flex-wrap: wrap; justify-content: flex-end;"
                            >
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="pin_id" :value="pin[0].id">
                                <textarea class="form-control" name="comment_text" placeholder="Add a comment" rows="2"></textarea>
                                <button style=" align-self: end; margin-top: 10px" class="btn btn-secondary" type="submit">Comment</button>
                            </form>
                            
                            <div style="width: 100%; margin-top: 10px;">
                               
                                    <div v-for="comment in comments" v-bind:key="comment.id" class="comment">
                                        <div style="font-weight: bolder">
                                            {{comment.name}}
                                        </div>
                                        <div>
                                            {{comment.comment}}
                                        </div>
                                    </div>
                               
                            </div>
                            <h1 class="dsc-input">{{pin[0].description}}</h1>
                            
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log(this.pin)
            console.log(this.comments)
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        props: ['pin', 'comments'],
        methods:{
            exit: function(){
                window.location.href='/home'
            }
        }
    }
</script>

<style scoped>
.comment{
    height: fit-content;
    width: 100%;
    border-style: solid;
    border-color: #efefef;
    font-size: 14px;
    border-radius: 10px;
    padding: 12px;
    margin-bottom: 20px;
}
.img-width{
    width: 100%;
}

.main-div{
    background: white;
    border-radius: 16px;
    width: 100%;
    margin-top: 30px;
    height: fit-content;
    padding: 20px;
}

.content{
    height: fit-content; 
    width: 80%; 
    padding: 20px;
}

.img-input{
    background: #efefef; 
    width: 100%; 
    height: 100%;
    border-radius: 10px;
}

.title-input{
    margin-top: 20px;
    border-top-style: hidden;
    border-left-style: hidden;
    border-right-style: hidden;
    font-size: 40px;
}

.dsc-input{
    margin-top: 20px;
    border-top-style: hidden;
    border-left-style: hidden;
    border-right-style: hidden;
    font-size: 18px;

}

.name{
    margin-top: 20px;
    font-size: 14px;
}

.img{
    max-width: 500px;
    height: 100%;
}
@media (max-width: 1199.98px) {

}
@media (max-width: 768px) { 

.title-input{
    font-size: 38px;
}
.dsc-input{
    font-size: 16px;
}

.img{
    width: 80%;
}

}

@media (max-width: 575.98px) { 
.title-input{
    font-size: 24px;
}
.dsc-input{
    font-size: 14px;
}
.main-div{
    width: 80%;
}
.img{
    width: 100%;
    height: 100%;
}
}

</style>