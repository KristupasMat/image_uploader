<template>
    <div class="header">
        <h1 class="header__title">Image Uploader</h1>
        <upload-form></upload-form>
        <div class="overlay" v-if="showOverlay">
            <base-button buttonText="Close" @triggerButton="closeOverlay"></base-button>
            <div class="image__overlay--wrappper">
                <img class="image__img" :src="imageSource">
                <figcaption class="image__caption">{{image.caption}}</figcaption>
            </div>
        </div>
    </div>
</template>

<script>
    import UploadForm from './Upload/UploadForm';
    import BaseButton from './Button/BaseButton'
    export default {
        components: {
            UploadForm,
            BaseButton
        },
        data() {
            return {
                image: null,
                showOverlay: false
            }
        },
        computed: {
            imageSource() {
                if(this.image) {
                    return this.image.image.includes('uploads') ? '/storage/' + this.image.image : this.image.image;
                }
            }
        },
        methods: {
            closeOverlay() {
                this.eventHub.$emit('closeOverlay');
                this.image = null;
                this.showOverlay = false;
            }
        },
        created() {
            this.eventHub.$on('showOverlay', image => {
                this.image = image;
                this.showOverlay = true;
            })
        }
    }
</script>
