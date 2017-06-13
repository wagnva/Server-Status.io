<template>
    <div>
        <project-information
            :project="project">

        </project-information>
    </div>
</template>

<script>
    import ProjectInformation from "./ProjectInformation.vue"

    export default {
        components: {
            "project-information": ProjectInformation
        },
        methods: {
              getProject(id){
                  return this.$store.getters["projects/withId"](id);
              }
        },
        computed: {
            project(){
                return this.getProject(this.$route.params.id);
            }
        }
    }
</script>

