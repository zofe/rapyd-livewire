<template>
    <span class="w-100">
        <el-date-picker
            v-model="value"
            type="datetime"
            v-bind="$attrs"
            @change="change"
        >
        </el-date-picker>
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
        change(value) {
            Livewire.find(this.wire).set(this.model,value);
        }
    },
    mounted() {
        this.wire = this.$el.closest('div[wire\\:id]').getAttribute('wire:id');

        //ad ogni modifica al dom incluso il primo caricamento forzo
        document.addEventListener('livewire:load', function () {
            this.value = Livewire.find(this.wire).get(this.model);
        }.bind(this))

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.received', (message, component) => {
                if(component.id === this.wire) {
                    this.value = Livewire.find(this.wire).get(this.model);

                    let errors = component.serverMemo.errors;
                    if (errors.hasOwnProperty(this.model)) {
                        this.has_error = true;
                        this.error_message = errors[this.model][0];
                    } else {
                        this.has_error = false;
                        this.error_message = '';
                    }

                }

            });


        });


    }
};
</script>
