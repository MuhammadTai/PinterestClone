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

<style scoped lang="scss">
@import '../../sass/_pininput.scss';

</style>