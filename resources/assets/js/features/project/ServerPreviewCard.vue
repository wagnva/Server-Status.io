<template>

    <v-card
            class="ml-1 mr-1 mt-3"
            hover
            v-on:click="redirectToServerPage">

        <v-layout row wrap>
            <v-flex xs12>
                <span class="grey--text text--darken-2">
                    <v-card-title class="pb-0">
                        <h3 class="title mb-0 pb-0 pl-2 pt-3">{{server.title}}</h3>
                    </v-card-title>
                </span>
            </v-flex>

            <v-flex xs12>
                <span class="subtitle pl-3 pt-0 pb-3">{{server.address}}</span>
            </v-flex>

            <v-flex xs12>
                <v-card-text class="pt-0">
                    {{server.description}}
                </v-card-text>
            </v-flex>

            <v-flex xs12 :class="statusBarStyles" class="status-bar ml-1 mr-1 mt-0 pl-1 pr-1">
                <v-flex xs12 class="white--text status pt-1">{{currentStatus.status}}</v-flex>
                <v-flex xs12 class="white--text date pb-2">{{currentStatusDate}}</v-flex>
            </v-flex>
        </v-layout>
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
                /* Humanized Time
                let createdAt = this.moment.utc(this.currentStatus.created_at);
                return createdAt.fromNow();*/
                return this.moment.utc(this.currentStatus.created_at).local().format("HH:mm:ss");
            },
            statusBarStyles(){
                return "mode-" + this.currentStatus.status;
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
    .title{
        line-height: 30px;
    }
    .subtitle{
        font-size: 16px;
        font-style: italic;
        display: block;
    }
    .status-bar{
        align-items: center;
        flex-direction: column;

        &.mode-online{
            background: #00C853;
        }

        &.mode-offline{
            background: #E53935;
        }

        &.mode-unknown{
            background: #90A4AE;
        }

        .flex{
            text-align: center;
            width: 100%;
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
</style>
