<template>
    <div>
        <preloader
                v-bind:to-load="preLoad"
                v-bind:is-finished="isFinished"
                v-if="loading"></preloader>

        <component :is="component"></component>
    </div>
</template>

<script>
    import BaseLayout from "./../../layout/BaseLayout.vue"
    import BasePreloader from "./BasePreloader.vue";

    export default {
        data(){
            return {
                loading: true,
                component: ""
            }
        },
        methods: {
            preLoad(){

                //get the projects
                let projects = this.$http.get("projects")
                    .then(response => {
                        this.Normalizer.normalize({
                            data: response.data,
                            key: "server",
                            mutations: {
                                data: "projects/set",
                                normalized: "server/add"
                            }
                        });
                    });

                return projects;
            },
            isFinished(){
                this.loading = false;

                //creates the baselayout and adds it into the view
                this.component = "base-layout";

                console.log("Data is finishéd loading");
            }
        },
        components: {
            "preloader": BasePreloader,
            "base-layout": BaseLayout
        }
    }
</script>