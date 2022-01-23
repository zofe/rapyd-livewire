<template>
    <span>
        <el-input v-bind="$attrs" v-model="value" @input="input" :debounce="250"></el-input>
        <span v-if="has_error" role="alert" class="invalid-feedback d-block">
            <strong>{{ error_message }}</strong>
        </span>
    </span>
</template>
<script>
export default {

    props: ['model'],
    data() {
        return {
            wire: null,
            pickerOptions: {},
            value: null,
            error_message: null,
            has_error:false
        };
    },

    methods: {
        input(value) {
            Livewire.find(this.wire).set(this.model,value);
            console.log(value);
        }
    },
    mounted() {
        this.wire = this.$el.closest('div[wire\\:id]').getAttribute('wire:id');

        // //ad ogni modifica al dom incluso il primo caricamento forzo
        // document.addEventListener('livewire:load', function () {
        //     this.value = Livewire.find(this.wire).get(this.model);
        // }.bind(this))
        //
        // document.addEventListener("DOMContentLoaded", () => {
        //     Livewire.hook('message.received', (message, component) => {
        //         if(component.id === this.wire) {
        //             this.value = Livewire.find(this.wire).get(this.model);
        //
        //             let errors = component.serverMemo.errors;
        //             if (errors.hasOwnProperty(this.model)) {
        //                 this.has_error = true;
        //                 this.error_message = errors[this.model][0];
        //             } else {
        //                 this.has_error = false;
        //                 this.error_message = '';
        //             }
        //
        //         }
        //
        //     });
        //
        //
        // });


    }
};
</script>
