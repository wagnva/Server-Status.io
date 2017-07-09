<template>

    <v-card
            class="ml-1 mr-1"
            hover
            v-on:click="redirectToProjectPage">

        <!--<v-card-title>
            <div>
                <h3 class="headline mb-0">{{project.title}}</h3>
                <v-card-text>{{project.description}}</v-card-text>
            </div>
        </v-card-title>-->
        <v-layout row wrap class="card">
            <v-flex xs12 class="amber darken-2">
                <v-card-title>
                    <h3 class="mb-0 white--text">{{project.title}}</h3>
                </v-card-title>
            </v-flex>
            <v-flex xs12 class="description">
                <v-card-text>{{project.description}}</v-card-text>
            </v-flex>
        </v-layout>

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
                    params: {projectId: id}
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
    .card{
        .description{
            min-height: 100px;
            max-height: 100px;
        }
    }
</style>

<style lang="scss">
    //fix for the card for all cards globally
    .card__title{
        padding: 8px 8px 8px 10px;

        h3{
            font-size: 24px;
        }

        @media screen and (max-width: 1440px){
            padding: 6px 6px 6px 8px;

            h3{
                font-size: 22px;
            }
        }
    }

    .card{
        .layout .flex{
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>