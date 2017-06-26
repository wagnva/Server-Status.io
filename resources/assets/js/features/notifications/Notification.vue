<template>
    <div class="notification mt-1 mr-2 ml-2 amber">
        <v-icon class="notification-icon" light>
            {{notification.icon}}
        </v-icon>
        <div class="notification-text grey--text text--lighten-4 pb-1 pt-1 pl-1">
            <span class="notification-title">{{notification.title}}</span>
            <span class="notification-description">{{notification.description}}</span>
        </div>
    </div>
</template>

<script>
    export default {
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
        border-left: 5px solid #FFA000!important;

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