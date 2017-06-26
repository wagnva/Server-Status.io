<template>
    <div id="notifications" :class="classes" v-if="open">

        <span class="header pt-1 grey--text text--darken-3">Notifications</span>

        <v-icon class="close-icon" large @click="close">close</v-icon>

        <div class="notification-container">
            <notification :notification="notification" v-for="notification in visible" :value="true" :key="notification">

            </notification>
        </div>

        <v-btn class="close-button" @click.native="close" flat>
            Close
        </v-btn>
    </div>
</template>

<script>
    import Notification from "./Notification.vue"

    export default {
        methods: {
            close(){
                this.$store.commit("notifications/setWindow", false);
            }
        },
        computed: {
            open(){
                return this.$store.state.notifications.windowOpen;
            },
            classes(){
                let styles = ["elevation-2"];

                styles.push(this.open? "open" : "closed");

                return styles;
            },
            visible(){
                return this.$store.getters["notifications/visible"];
            }
        },
        components: {
            Notification
        }
    }
</script>

<style lang="scss" scoped>

    $breakpoint: 550px;

    #notifications{
        background: white;
        z-index: 900;

        .close-icon{
            display: none;
        }

        .notification-container{
            overflow-y: auto;
        }

        .close-button{
            display: none;
        }

        //small list modal
        @media screen and (min-width: $breakpoint){
            min-height: 400px;
            width: 400px;
            top: 95%;
            right: 2%;
            position: absolute;

            .header{
                text-align: center;
                width: 100%;
                display: inline-block;
                font-size: 18px;
            }
            .notification-container{
                margin-top: 8px;
                padding-bottom: 8px;
            }
        }

        //full screen
        @media screen and (max-width: $breakpoint - 1px){
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;

            .header{
                text-align: center;
                width: 100%;
                display: inline-block;
                font-size: 20px;
                padding-top: 18px!important;
            }

            .close-icon{
                display: inline-block;
                position: absolute;
                top: 0;
                right: 0;
                padding: 20px;
                cursor: pointer;
            }

            .notification-container{
                margin-top: 20px;
                padding-bottom: 20px;
            }

            .close-button{
                display: block;
                position: absolute;
                bottom: 20px;
                left: 0;
                margin-left: 20px;
                width: calc(100% - 40px);
            }

        }

    }
</style>