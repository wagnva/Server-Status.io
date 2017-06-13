<template>
    <div>
        <project-information
            :project="project">

        </project-information>

        <h5 class="mt-5 mb-0 ml-1 grey--text text--darken-2">Server</h5>

        <v-layout row wrap class="negative-margin">
            <template v-for="server in project.server">
                <v-flex xs12 sm6 m4 xl3 :key="server.id">

                    <server-preview-card
                            :server="server">
                    </server-preview-card>

                </v-flex>
            </template>
        </v-layout>



    </div>
</template>

<script>
    import ProjectInformation from "./ProjectInformation.vue"
    import ServerPreviewCard from "./ServerPreviewCard.vue"

    export default {
        methods: {
              getProject(id){
                  return this.$store.getters["projects/withId"](id);
              }
        },
        computed: {
            project(){
                return this.getProject(this.$route.params.projectId);
            }
        },
        components: {
            "project-information": ProjectInformation,
            "server-preview-card": ServerPreviewCard
        }
    }
</script>

