<template>
    <button :type="buttonType" @click="$emit('triggerButton')" class="button" :disabled="disabled">{{buttonText}}</button>
</template>

<script>
    export default {
        props: {
            buttonText: String,
            submitButton: {
                type: String,
                default: 'button'
            },
            disabled: {
                type: Boolean,
                default: false
            }
        },
        computed: {
            buttonType(){
                return this.submitButton === 'button' ? 'button' : 'submit';
            }
        }
    }
</script>
