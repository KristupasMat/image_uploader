<template>
    <figure class="image" @click="showOverlay">
        <img class="image__img" :src="imageSource">
        <figcaption class="image__caption">{{image.caption}}</figcaption>
    </figure>
</template>

<script>
    export default {
        props: {
            image: {
                type: Object
            }
        },
        data() {
            return {
                showOverlayImage: true
            }
        },
        computed: {
            imageSource() {
                if(this.image.image) {
                    return this.image.image.includes('uploads') ? '/storage/' + this.image.image : this.image.image;
                }
            }
        },
        created() {
            this.eventHub.$on('closeOverlay', () => {
                this.showOverlayImage = false;
            })
        },
        methods: {
            showOverlay(){
                this.eventHub.$emit('showOverlay', this.image);
            }
        }
    }
</script>

