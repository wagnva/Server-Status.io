<template>
    <v-btn  icon
            light
            @click.native="click"
            :class="['notification-btn', {'no-badge': badgeToggleClass}]">

            <v-icon class="icon" v-badge="{ value: unreadCount, overlap: true}">assignment</v-icon>

    </v-btn>
</template>

<script>
    export default {
        methods: {
            click(){
                this.$store.commit("notifications/switchWindow");

                //if the window is now open, mark all the notifications as read
                if(this.$store.state.notifications.windowOpen){
                    this.$store.commit("notifications/markAllAsRead");
                }
            }
        },
        computed: {
            unreadCount(){
                return this.$store.getters["notifications/countUnread"];
            },
            badgeToggleClass(){
                return this.unreadCount === 0;
            }
        }
    }
</script>

<style lang="scss" scoped>
    .icon::after{
        height: 18px;
        width: 18px;
        top: -5px;
        right: -5px;
    }
    .no-badge{
        .icon::after{
            visibility: hidden;
        }
    }
</style>

<style>
    .notification-btn .btn__content{
        overflow: visible!important;
    }
</style>