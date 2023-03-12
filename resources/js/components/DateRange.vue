<template>
    <span class="w-100">
        <el-date-picker
            v-model="value"
            v-bind="$attrs"
            @change="changeRange"
            :picker-options="pickerOptions"
        >
        </el-date-picker>
    </span>
</template>
<script>
export default {

    props: ['model_from','model_to'],
    data() {
        return {
            wire: null,
            pickerOptions: {
                shortcuts: [{
                    text: 'Week',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('week').toDate();
                        const end = currentDate.clone().endOf('week').toDate();
                        picker.$emit('pick', [start, end]);
                    }
                }, {
                    text: 'Month',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('month').toDate();
                        const end = currentDate.clone().endOf('month').toDate();
                        picker.$emit('pick', [start, end]);
                    }

                },{
                    text: 'This Year',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('year').toDate();
                        const end = currentDate.clone().endOf('year').toDate();
                        picker.$emit('pick', [start, end]);
                    }
                }
                ,{
                    text: 'Prev Year',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().subtract(1, 'years').startOf('year').toDate();
                        const end = currentDate.clone().subtract(1, 'years').endOf('year').toDate();
                        picker.$emit('pick', [start, end]);
                    }

                }

                ]
            },
            value: null,
        };
    },
    methods: {
        changeRange(range) {
            if (range === null) {
                range = [null,null];
            }
            console.log('change');
            console.log(this.model_from);
            console.log(range);
            Livewire.find(this.wire).set(this.model_from,range[0]);
            Livewire.find(this.wire).set(this.model_to,range[1]);
        }
    },
    mounted() {
        this.wire = this.$el.closest('div[wire\\:id]').getAttribute('wire:id');
        console.log(this.wire);
        console.log(this.model_from);
        document.addEventListener('livewire:load', () => {
            let from = Livewire.find(this.wire).get(this.model_from);
            let to = Livewire.find(this.wire).get(this.model_to);
            console.log(from);

            if(from===null) {
                this.value = null;
            } else {
                this.value = [from,to];
            }

        });

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.received', (message, component) => {
                if(component.id === this.wire) {
                    let from = Livewire.find(this.wire).get(this.model_from);
                    let to = Livewire.find(this.wire).get(this.model_to);
                    if(from===null) {
                        this.value = null;
                    } else {
                        this.value = [from,to];
                    }
                }
            });
        });
    }
};
</script>
