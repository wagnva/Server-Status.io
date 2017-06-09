<template>
    <v-navigation-drawer
            persistent
            clipped
            light
            :mini-variant.sync="mini"
            v-model="sidebarOpen"
            enable-resize-watcher>

        <v-list class="pa-0">
            <v-list-item>
                <v-list-tile avatar tag="div">
                    <v-list-tile-avatar>
                        <v-icon>account_circle</v-icon>
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                        <v-list-tile-title>{{username}}</v-list-tile-title>
                    </v-list-tile-content>
                    <v-list-tile-action>
                        <v-btn icon @click.native.stop="mini = !mini">
                            <v-icon>chevron_left</v-icon>
                        </v-btn>
                    </v-list-tile-action>
                </v-list-tile>
            </v-list-item>
        </v-list>

        <v-list class="pt-0" dense>

            <v-divider></v-divider>

            <template v-for="item in items">
                <v-list-item :key="item" v-on:click="linksTo(item.name)">
                    <v-list-tile>
                        <v-list-tile-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ item.title }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list-item>
            </template>

        </v-list>
    </v-navigation-drawer>
</template>

<script>
    export default {
        data(){
            return{
                mini: false,
                items: [
                    { title: 'Home', icon: 'dashboard', name: "home" },
                    { title: 'About', icon: 'question_answer', name: "home"}
                ]
            }
        },
        methods: {
            linksTo(name){
                //just links to the name supplied
                this.$router.push({
                    name: name
                });
            }
        },
        computed: mapState({
            username: state => state.user.name,
            sidebarOpen: state => state.sidebarOpen
        })
    }

    //["user/name", "sidebarOpen"]
</script>