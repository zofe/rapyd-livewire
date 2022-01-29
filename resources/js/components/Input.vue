
<template>
    <span>
        <el-input v-bind="$attrs" v-model="value"></el-input>
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
    watch: {
        value: function () {
            this.debounceInput();
        }
    },

    methods: {
        debounceInput: _.debounce(function () {
            Livewire.find(this.wire).set(this.model,this.value);
        }, 250)
    },
    mounted() {
        this.wire = this.$el.closest('div[wire\\:id]').getAttribute('wire:id');
    }
};
</script>
