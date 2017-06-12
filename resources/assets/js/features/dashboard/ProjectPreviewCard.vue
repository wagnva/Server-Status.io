<template>
    <v-card
            class="ml-1 mr-1"
            hover
            v-on:click="redirectToProjectPage">
        <v-card-row class="amber darken-1">
            <v-card-title>
                <span class="white--text">
                    {{project.title}}
                </span>

                <v-spacer></v-spacer>

            </v-card-title>
        </v-card-row>

        <v-card-text>
            <v-card-row height="75px">
                {{project.description}}
            </v-card-row>
        </v-card-text>
    </v-card>
</template>

<script>
    export default {
        data(){
            return {
            }
        },
        methods: {
            redirectToProjectPage(){
                //click listener on the project preview card
                //redirects to the project overview page

                const id = this.project.id;
                this.$router.push({
                    name: "project",
                    params: {id: id}
                });
            }
        },
        props: {
            "project": {
                type: Object,
                required: true
            }
        }
    }
</script>

<style lang="scss" scoped>
    .card__title{
        font-size: 20px;
        padding: 10px 10px 10px 12px;
    }
</style>