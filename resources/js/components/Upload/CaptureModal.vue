<template>
    <div class="overlay">
        <div>
            <video ref="video" id="video" width="640" height="480" autoplay></video>
        </div>
        <div>
            <base-button type="button" buttonText="Capture Image" @triggerButton="capture()"></base-button>
        </div>
        <canvas ref="canvas" id="canvas" width="640" height="480"></canvas>
    </div>
</template>

<script>
    import BaseButton from '../Button/BaseButton'
    export default {
        components: {
            BaseButton,
        },
        data() {
            return {
                video: {},
                canvas: {},
                capturedImage: '',
            }
        },
        mounted() {
            this.video = this.$refs.video;
            navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
                this.video.crossOrigin = 'anonymous';
                this.video.srcObject = stream;
                this.video.play();
            });

        },
        methods: {
            capture() {
                this.canvas = this.$refs.canvas;
                var context = this.canvas.getContext("2d").drawImage(this.video, 0, 0, 640, 480);
                this.capturedImage = canvas.toDataURL("image/png");
                this.$emit('capturedImage', this.capturedImage);
            }
        }
    }
</script>

<style>

    #video {
        background-color: #000000;
    }
    #canvas {
        display: none;
    }
</style>
