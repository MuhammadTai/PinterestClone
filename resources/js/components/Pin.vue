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
                        <input type="hidden" name="owner_id" :value="pin[0].user_id">

                        <button v-if="show" class="btn btn-danger" type="submit">Delete</button>
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
                            <h1 class="title">{{pin[0].title}}</h1>
                            <h2 style="margin-top: 20px;"><span style="color: grey">Uploaded by</span> {{pin[0].name}}</h2>
                            <h1 class="dsc">{{pin[0].description}}</h1>
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
        props: ['pin', 'comments', 'owner'],
        methods:{
            exit: function(){
                window.location.href='/home'
            },
        },
        computed:{
            show: function(){
                if(this.owner){
                    return true;
                }
                return false;
            }
        }
    }
</script>

<style scoped lang="scss">
@import '../../sass/_pinview.scss';


</style>