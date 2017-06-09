<template>
    <div>
        <v-layout row wrap class="negative-margin">
            <template v-for="(project, index) in projects">
                <v-flex xs12 sm12 md6 xl4>
                    <project-preview-card
                            :project="project"
                            class="mt-4">
                    </project-preview-card>
                </v-flex>
            </template>
        </v-layout>
    </div>
</template>

<script>
    import ProjectPreviewCard from "./ProjectPreviewCard.vue"

    export default {
        components: {
            ProjectPreviewCard
        },
        computed: {
            projects(){
                return this.$store.state.projects.data;
            }
        }

    }
</script>

<style lang="scss" scoped>
    .negative-margin{
        //since all preview cards have a top margin of 24px,
        //we move the whole thing 24px up, so that there is no big margin at the top
        margin-top: -24px;
    }
</style>