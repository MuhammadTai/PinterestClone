<template>
        <div class="d-flex justify-content-center">
            <div class="main-div">
                <form
                    action="pin"
                    method="post"
                    enctype="multipart/form-data"
                >
                
                <input type="hidden" name="_token" :value="csrf">
                
                 <div class="row justify-content-end" style="margin: 0">
                    <button class="btn btn-danger" type="submit">Save</button>
                 </div>
                <div class="row" style="margin: 0">
                    <div class="content col-md-5 d-flex justify-content-center">
                        <div class="img">
                            <input id="image" type="file" name="image" class="img-input" accept="image/*">
                        </div>
                    </div>
                    <div class="content col-md-7 d-flex flex-column"  style="padding: 20px">
                        <input id="title" type="text" name="title" placeholder="Add your title" class="title-input">
                        <p class="name">{{user}}</p>
                        <input id="desc" type="text" name="description" placeholder="Tell everyone what your Pin is about" class="dsc-input">
                    </div>
                </div>
                </form>
            </div>
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted. BUILDER')
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        props: ['user'],
    }
</script>

<style scoped>
.main-div{
    background: white;
    border-radius: 16px;
    width: 100%;
    margin-top: 30px;
    height: 600px;
    padding: 20px;
}

.content{
    height: 450px; 
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
    width: 80%;
    height: 100%;
}

@media (max-width: 768px) { 
.main-div{
    height: fit-content;
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