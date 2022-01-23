<template>
    <el-select v-model="value" filterable multiple :placeholder="plh" @change="change" ref="me">
        <el-option
            v-for="item in items"
            :key="item.key"
            :label="item.label"
            :value="item.key"
        >
        </el-option>
    </el-select>
</template>

<script>
export default {
    props: ['options','model','values','placeholder'],
    data() {
        return {
            wire: null,
            items:[],
            value: [],
            plh: this.placeholder ? this.placeholder : 'Seleziona'
        }
    },
    methods: {
        change(newvalues) {
            Livewire.find(this.wire).set(this.model,newvalues);
        }
    },

    mounted() {
        this.wire = this.$el.closest('div[wire\\:id]').getAttribute('wire:id');

        for (const [key, value] of Object.entries(this.options)) {
            let item = {key: key, value: key, label: value};
            this.items.push(item);
            if (this.values.includes(key)){
                 this.value.push(key);
            }
        }
    }
}
</script>
