<template>

    <v-card
            class="ml-1 mr-1 mt-3"
            hover
            v-on:click="redirectToServerPage">

        <v-card-row class="amber darken-1">
            <v-card-title class="pt-2 pb-2">
                <span class="white--text">
                    {{server.title}}
                </span>

                <v-spacer></v-spacer>

            </v-card-title>
        </v-card-row>

        <v-card-text>
            <v-card-row>
                {{server.description}}
            </v-card-row>
        </v-card-text>
    </v-card>

</template>

<script>
    export default {
        methods: {
            redirectToServerPage(){
                this.$router.push({
                    name: "server",
                    params: {
                        projectId: this.$route.params.projectId,
                        serverId: this.server.id
                    }
                })
            }
        },
        props: {
            server: {
                type: Object,
                required: true
            }
        }
    }
</script>
