<template>
    <div :class="styles">
        <v-icon class="notification-icon" light>
            {{notification.icon}}
        </v-icon>
        <div class="notification-text grey--text text--lighten-4 pb-1 pt-1 pl-1">
            <span class="notification-title">{{notification.title}}</span>
            <span class="notification-description pb-1">{{notification.description}}</span>
        </div>

        <v-icon class="close-icon" light @click="close">close</v-icon>
    </div>
</template>

<script>
    export default {
        methods: {
            close(){
                this.$store.commit("notifications/close", this.notification.id);
            }
        },
        computed: {
            styles(){
                let styles = ["notification", "mt-1", "mr-2", "ml-2"];

                styles.push("mode-" + this.notification.mode);

                return styles;
            }
        },
        props: {
            notification: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style lang="scss" scoped>
    .notification{
        display: flex;
        position: relative;

        &.mode-info{
            background: #FFCA28;
            border-left: 5px solid #FFC107;
        }

        &.mode-error{
            background: #EF5350;
            border-left: 5px solid #D32F2F!important;
        }

        .close-icon{
            position: absolute;
            top: 0;
            right: 0;
            padding: 5px;
            align-items: flex-start;
            cursor: pointer;

            @media screen and (max-width: 549px){
                padding: 8px;
            }
        }

        .notification-icon{
            width: 15%;
            display: block;
            text-align: center;
            vertical-align: center;
            line-height: 66px;
        }
        .notification-text{
            display: block;
            width: 70%;
            span{
                display: block;
                padding-top: 5px;
            }
        }
    }
    .notification-title{
        font-weight: bold;
        font-size: 18px;
    }

</style>