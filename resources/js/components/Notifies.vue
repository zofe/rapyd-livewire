<template>
    <div>
    </div>
</template>

<script>
import { Notification } from 'element-ui';

export default {
    props: ['message', 'message_type'],
    data() {
        return {
            msg: this.message,
            msgtype: this.message_type ? this.message_type : 'success',
            timeout: null
        }
    },
    methods: {

        clearMessage() {
            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => this.msg = '', 4000);
        }
    },
    mounted: function () {
        this.clearMessage();

        if (this.msg) {
            if(this.msgtype === 'success')
            {
                Notification.success({
                    message:  this.msg,
                });
            }

            if(this.msgtype === 'error')
            {
                Notification.error({
                    message:  this.msg,
                });
            }

        }

        bus.$on('on-messages',  (message, type) => {
            this.msg = message;
            this.msgtype = type ? type : 'success';
            this.clearMessage();
            if(this.msgtype === 'success')
            {
                Notification.success({
                    message:  this.msg,
                });
            }
            if(this.msgtype === 'error')
            {
                Notification.error({
                    message:  this.msg,
                });
            }
        })

        Livewire.on('livewire-on-messages', (message, type) => {
            this.msg = message;
            this.msgtype = type ? type : 'success';

            console.log('livewire-on-messages!');
            this.clearMessage();

            if(this.msgtype === 'success')
            {
                Notification.success({
                    message:  this.msg,
                });
            }

            if(this.msgtype === 'error')
            {
                Notification.error({
                    message:  this.msg,
                });
            }

        })

    }
};
</script>
<style>

</style>
