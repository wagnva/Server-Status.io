<template>
    <v-app>

        <div>
            <sidebar></sidebar>

            <v-toolbar fixed class="amber darken-2" light>
                <v-toolbar-side-icon light @click.native.stop="switchSidebar"></v-toolbar-side-icon>
                <v-toolbar-title>Server-Status.io</v-toolbar-title>
                <v-spacer></v-spacer>
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


    export default {
        methods: {
            switchSidebar(){
                this.$store.commit("switchSidebar");
            }
        },
        components: {
            "sidebar": Sidebar
        }
    }
</script>

<style lang="scss">
</style>