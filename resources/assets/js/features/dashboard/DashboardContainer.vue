<template>
    <div>
        <v-layout row wrap>
            <template v-for="project in projects">
                <v-flex xs4>
                    <project-preview-card></project-preview-card>
                </v-flex>
            </template>
        </v-layout>
    </div>
</template>

<script>
    import ProjectPreviewCard from "./ProjectPreviewCard.vue"


    export default {
        computed: mapState(["projects"]),
        components: {
            ProjectPreviewCard
        },
        mounted(){
            console.log(this.$store);
        }
    }
</script>