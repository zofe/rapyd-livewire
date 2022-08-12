<template>
    <el-date-picker
        v-model="value"
        v-bind="$attrs"
        @change="changeRange"
        :picker-options="pickerOptions"
    >
    </el-date-picker>
</template>
<script>
export default {


    props: ['model_from','model_to'],
    data() {
        return {
            wire: null,
            pickerOptions: {
                shortcuts: [{
                    text: 'Settimana',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('week').toDate();
                        const end = currentDate.clone().endOf('week').toDate();
                        picker.$emit('pick', [start, end]);
                    }
                }, {
                    text: 'Mese',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('month').toDate();
                        const end = currentDate.clone().endOf('month').toDate();
                        picker.$emit('pick', [start, end]);
                    }

                }, {
                    text: 'Q1',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('year').toDate();
                        const end = currentDate.clone().startOf('year').quarter(2).subtract(1).toDate();

                        picker.$emit('pick', [start, end]);
                    }
                }, {
                    text: 'Q2',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('year').quarter(2).toDate();
                        const end = currentDate.clone().startOf('year').quarter(3).subtract(1).toDate();

                        picker.$emit('pick', [start, end]);
                    }
                }, {
                    text: 'Q3',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('year').quarter(3).toDate();
                        const end = currentDate.clone().startOf('year').quarter(4).subtract(1).toDate();

                        picker.$emit('pick', [start, end]);
                    }
                }, {
                    text: 'Q4',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('year').quarter(4).toDate();
                        const end = currentDate.clone().endOf('year').toDate();

                        picker.$emit('pick', [start, end]);
                    }
                },{
                    text: 'Anno Corr.',
                    onClick(picker) {
                        const currentDate = moment();
                        const start = currentDate.clone().startOf('year').toDate();
                        const end = currentDate.clone().endOf('year').toDate();
                        picker.$emit('pick', [start, end]);
                    }
                }
                ,{
                    text: 'Anno Prec.',
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
            Livewire.find(this.wire).set(this.model_from,range[0]);
            Livewire.find(this.wire).set(this.model_to,range[1]);
        }
    },
    mounted() {
        this.wire = this.$el.closest('div[wire\\:id]').getAttribute('wire:id');
        document.addEventListener('livewire:load', function () {
            let from = Livewire.find(this.wire).get(this.model_from);
            let to = Livewire.find(this.wire).get(this.model_to);
            console.log(from);

            if(from===null) {
                this.value = null;
            } else {
                this.value = [from,to];
            }

        }.bind(this));

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
