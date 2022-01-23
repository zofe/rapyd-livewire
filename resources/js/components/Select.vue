<template>
    <el-select v-model="value" filterable placeholder="Select" @change="change">
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
    props: ['options','model'],
    data() {
        return {
            wire: null,
            items:[],
            value: null,
        }
    },
    methods: {
        change(newvalue) {
            Livewire.find(this.wire).set(this.model,newvalue);
        }
    },

    mounted() {
        this.wire = this.$el.closest('div[wire\\:id]').getAttribute('wire:id');

        for (const [key, value] of Object.entries(this.options)) {
            this.items.push({key: key, value: value, label: value});
        }
    }
}
</script>
