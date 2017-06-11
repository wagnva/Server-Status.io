<template>
    <v-app>

        <div v-show="!loading">
            <sidebar></sidebar>

            <v-toolbar fixed class="amber darken-2" light>
                <v-toolbar-side-icon light @click.native.stop="switchSidebar"></v-toolbar-side-icon>
                <v-toolbar-title>Server-Status.io</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn
                        icon
                        light
                        v-tooltip:bottom="{html: 'New'}"
                        router
                        :to="{name: 'project_new'}">
                    <v-icon>add</v-icon>
                </v-btn>
            </v-toolbar>

            <main>
                <v-container fluid>
                    <slot></slot>
                </v-container>
            </main>
        </div>

        <preloader
            v-bind:to-load="preLoad"
            v-bind:is-finished="isFinished"
            v-show="loading"></preloader>

        <snackbar-manager></snackbar-manager>

    </v-app>
</template>

<script>
    import Sidebar from "./Sidebar.vue"
    import Preloader from "../features/loader/Preloader.vue"

    export default {
        data(){
            return {
                loading: true
            }
        },
        methods: {
            switchSidebar(){
                this.$store.commit("switchSidebar");
            },
            preLoad(){
                return {
                    "projects/set": this.$http.get("projects")
                };
            },
            isFinished(){
                console.log(this.$store.state.projects.data);
                this.loading = false;
            }
        },
        components: {
            "sidebar": Sidebar,
            "preloader": Preloader
        }
    }
</script>

<style lang="scss">
</style>