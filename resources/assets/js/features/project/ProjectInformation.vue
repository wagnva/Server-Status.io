<template>
    <v-card class="ml-1 mr-1">
        <v-card-row>
            <v-card-title class="pb-0">
                <span class="grey--text text--darken-2">
                    {{project.title}}
                </span>

                <v-spacer></v-spacer>

            </v-card-title>
        </v-card-row>

        <v-card-text>
            <v-card-row class="grey--text text--darken-1">
                {{project.description}}
            </v-card-row>
        </v-card-text>
    </v-card>
</template>

<script>
    export default {
        props: {
            project: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style>

</style>