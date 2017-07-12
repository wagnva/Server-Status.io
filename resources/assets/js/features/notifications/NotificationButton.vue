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
</style>

