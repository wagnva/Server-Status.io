<template>
    <v-app>

        <div>
            <sidebar></sidebar>

            <v-toolbar fixed dark class="amber darken-2">
                <v-toolbar-side-icon light @click.native.stop="switchSidebar"></v-toolbar-side-icon>
                <v-toolbar-title class="white--text">Server-Status.io</v-toolbar-title>
                <v-spacer></v-spacer>

                <notification-button></notification-button>

                <notification-list></notification-list>

                <v-btn  icon
                        light
                        v-tooltip:bottom="{html: 'New'}"
                        router
                        :to="{name: 'project_new'}">
                    <v-icon>add</v-icon>
                </v-btn>

            </v-toolbar>

            <main>
                <v-container fluid>

                    <router-view></router-view>

                </v-container>
            </main>
        </div>

    </v-app>
</template>

<script>
    import Sidebar from "./Sidebar.vue"
    import NotificationButton from "./../features/notifications/NotificationButton.vue"
    import NotificationList from "./../features/notifications/NotificationList.vue"

    export default {
        methods: {
            switchSidebar(){
                this.$store.commit("switchSidebar");
            }
        },
        components: {
            "sidebar": Sidebar,
            "notification-button": NotificationButton,
            "notification-list": NotificationList
        }
    }
</script>

<style lang="scss">
    *::-moz-focus-inner,
    *:focus,
    *:hover{
        outline: none!important;
    }
</style>