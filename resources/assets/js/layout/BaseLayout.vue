<template>
    <v-app>

        <v-navigation-drawer persistent clipped light :mini-variant.sync="mini" v-model="drawer">
            <v-list class="pa-0">
                <v-list-item>
                    <v-list-tile avatar tag="div">
                        <v-list-tile-avatar>
                            <v-icon>account_circle</v-icon>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            <v-list-tile-title>Username</v-list-tile-title>
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
                <v-list-item v-for="item in items" :key="item">
                    <v-list-tile>
                        <v-list-tile-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-toolbar fixed class="amber darken-2" light>
            <v-toolbar-side-icon light @click.native.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>Server-Status.io</v-toolbar-title>
        </v-toolbar>


        <main>
            <v-container fluid>
                <slot></slot>
            </v-container>
        </main>
    </v-app>
</template>

<script>
    export default {
        data () {
            return {
                drawer: true,
                items: [
                    { title: 'Home', icon: 'dashboard' },
                    { title: 'About', icon: 'question_answer' }
                ],
                mini: false,
                right: null
            }
        },
        mounted(){

        }
    }
</script>