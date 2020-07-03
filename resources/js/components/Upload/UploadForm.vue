<template>
    <form class="form" action="/image" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" :value="csrf">
        <div class="form__group">
            <label for="image">Browse</label>
            <input type="file" ref="selectImage" name="image" class="inputFile" @change="previewFiles">
        </div>
        <p> or </p>
        <div class="form__group form__group--capture">
            <label for="image">Take a picture</label>
            <base-button type="button" buttonText="Capture" @triggerButton="openCaptureModel" :disabled="!getUserMediaSupported"></base-button>
            <p class="warning" v-if="!getUserMediaSupported">Unfortunately, your browser does not support userMedia</p>
        </div>

        <input type="hidden" name="capturedImage" :value="capturedImage">
        <img class="form__image" :src="capturedImage" v-if="capturedImage">

        <div class="form__group form__group--caption">
            <label for="caption">Image caption</label>
            <input type="text" name="caption" placeholder="Enter a caption..." required>
        </div>

        <p class="warning" v-if="disableSubmit">Please select or take an image</p>
        <base-button type="submit" buttonText="Upload" :disabled="disableSubmit"></base-button>
        <!-- Upload from camera model -->
        <capture-modal v-if="showCaptureModel && getUserMediaSupported" @capturedImage="showCapturedImage"></capture-modal>
    </form>
</template>

<script>
    import BaseButton from '../Button/BaseButton'
    import CaptureModal from './CaptureModal';
    export default {
        components: {
            BaseButton,
            CaptureModal
        },
        data() {
            return {
                csrf: window.Laravel.csrfToken,
                showCaptureModel: false,
                capturedImage: '',
                fileSelected: false
            }
        },
        computed: {
            disableSubmit() {
                console.log(this.fileSelected)
                return !this.capturedImage && !this.fileSelected;
            },
            getUserMediaSupported() {
                return navigator.mediaDevices && navigator.mediaDevices.getUserMedia;
            }
        },
        methods: {
            previewFiles(event) {
                this.fileSelected = true;
            },
            openCaptureModel(){
                this.showCaptureModel = true;
            },
            showCapturedImage(imageSrc) {
                this.capturedImage = imageSrc;
                this.showCaptureModel = false;
            }
        }
    }
</script>
