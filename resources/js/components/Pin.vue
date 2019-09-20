<template>
        <div class="d-flex justify-content-center">
            <div class="main-div">
                <input type="hidden" name="_token" :value="csrf">
                
                 <div class="row justify-content-end" style="margin: 0">
                    <button class="btn btn-danger" type="submit">Exit</button>
                 </div>
                <div class="row" style="margin: 0">
                    <div class="content col-md-7 d-flex justify-content-center">
                        <div class="img">
                            <img class="img-width" v-bind:src="'/storage/'+pin[0].image">
                        </div>
                    </div>
                    <div class="content col-md-5 d-flex flex-column align-items-center"  style="padding: 20px">
                            <h1 class="display4">{{pin[0].title}}</h1>
    
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
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        props: ['pin', 'comments'],
    }
</script>

<style scoped>

.img-width{
    width: 100%
}

.main-div{
    background: white;
    border-radius: 16px;
    width: 70%;
    margin-top: 30px;
    height: fit-content;
    padding: 20px;
}

.content{
    height: fit-content; 
    width: 100%; 
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

@media (max-width: 768px) { 
.main-div{
    height: fit-content;
    width: 70%;
}
.title-input{
    font-size: 38px;
}
.dsc-input{
    font-size: 16px;
}

.img{
    width: 70%;
}
.content{
    height: 400px; 
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
    width: 80%;
    height: 100%;
}
}

</style>