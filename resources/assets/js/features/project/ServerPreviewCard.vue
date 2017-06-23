<template>

    <v-card
            class="ml-1 mr-1 mt-3"
            hover
            v-on:click="redirectToServerPage">

        <v-card-row class="title-row">
            <v-card-title class="pt-3 pb-2">
                <span class="">
                    {{server.title}}
                </span>

                <v-spacer></v-spacer>

            </v-card-title>
        </v-card-row>

        <v-card-text>
            <v-card-row>
                {{server.description}}
            </v-card-row>
            <v-card-row class="green mt-5 status-bar pl-1 pr-1">
                <span class="white--text status pt-1">Online</span>
                <span class="white--text date pb-2">{{currentStatusDate}}</span>
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
        computed: {
            currentStatus(){
                return this.$store.getters["statuses/current"](this.server.id);
            },
            currentStatusDate(){
                let createdAt = this.moment.utc(this.currentStatus.created_at);
                return createdAt.fromNow();
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

<style lang="scss" scoped>
    .status-bar{
        align-items: center;
        flex-flow: initial;
        display: flex;
        flex-direction: column;
        span{
            text-align: center;
            width: 100%;
            height: 100%;
        }
        .status{
            font-size: 18px;
        }
        .date{
            font-size: 16px;
            font-style: italic;
            line-height: 1;
        }
    }

    .title-row{
        //border-bottom: 1px solid #FFB300;
    }
</style>
