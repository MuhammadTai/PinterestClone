<template>
        <div class="grid">
            <div class="grid-item" v-for="pin in pins" v-bind:key="pin.id">
                <a v-on:click="viewPin(pin.id)"><div class="pin-wrapper">
                    <img class="img-width" v-bind:src="'/storage/'+pin.image">
                    <div class="pin-body">
                        <img src="../../images/more.svg" style="vertical-align: unset" width="12" height="12">
                    </div>
                </div></a>
            </div>
        </div>
</template>

<script>
    import Masonry from 'masonry-layout'
    import imagesLoaded from 'imagesloaded'
    export default {
        props:['pins'],
        methods:{
            viewPin :function(id){
                console.log(this.pins)
                window.location.href='/home/'+id
            }
            
        },
        mounted() {
            console.log(this.pins)
            //data-masonry='{ "columnWidth": 250, "itemSelector": ".grid-item", "isFitWidth": true }'
            
            var $grid;
            console.log("jquery")
            // init Masonry
            function triggerMasonry() {
                // don't proceed if $grid has not been selected
                if ( $('.grid').attr('class')!== 'grid') {
                    console.log("hello")
                    return;
                }
                var msnry = new Masonry('.grid',{
                    // options...
                    itemSelector: '.grid-item',
                    columnWidth: 240,
                    isFitWidth: true,
                    gutter: 20,
                })
                console.log("123")
                imagesLoaded('.grid').on( 'progress', function() {
                    // layout Masonry after each image loads
                    msnry.layout();
                });
                /*
                var $grid = $('.grid').masonry({
                    // options...
                    itemSelector: '.grid-item',
                    columnWidth: 250,
                    isFitWidth: true,
                    gutter: 200,
                });
                // layout Msasonry after each image loads
                $grid.imagesLoaded().progress( function() {
                    $grid.masonry('layout');
                });
                */
            }
            // trigger masonry on document ready
            $(function(){
                console.log($('.grid').attr('class'))
                $grid = $('.grid');
                triggerMasonry();
            });
      
        
        }
    }
</script>

<style scoped>
.grid-item{
    /*display: grid;
    grid-template-columns: repeat(6, 200px);
    grid-template-rows: none;
    grid-auto-rows: auto;*/
    /*MIN HEIGHT 55px
    column-gap: 20px;
    justify-content: center;
    */
    width: 240px;
    border-radius: 10px;
    margin-bottom: 5px;
}

.grid{
    margin: 0 auto;
    margin-top: 10px;
}

.pin-wrapper{
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    cursor: zoom-in;
}

.pin-wrapper:hover{
    background: #D0D3D4;
}

.pin-wrapper:hover .img-width{
    filter: brightness(0.7)
}

.img-width{
    width: 220px;
    border-radius: 10px;
    align-self: center;
    margin-top: 10px;
}

.pin-body{
    padding-left: 200px;
    padding-top: 5px;
}


</style>