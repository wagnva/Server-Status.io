<template>
    <v-navigation-drawer
            persistent
            clipped
            light
            :mini-variant.sync="mini"
            v-model="sidebarOpen"
            v-on:input="drawerChange"
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

        <v-divider></v-divider>

        <v-list dense>

            <sidebar-item
                    title="Dashboard"
                    name="home"
                    icon="dashboard">
            </sidebar-item>


        </v-list>

    </v-navigation-drawer>
</template>

<script>
    import SideBarItem from "./SideBarItem.vue"

    export default {
        data(){
            return {
                mini: false
            }
        },
        methods: {
            linksTo(name, params){
                //just links to the name supplied
                this.$router.push({
                    name: name,
                    params: params || {}
                });
            },
            drawerChange(param){
                ///called when the drawer state changes
                this.$store.commit("setSidebar", param);

                console.log(this.items);
            }
        },
        computed: {
            ...mapState({
                username: state => state.user.name,
                sidebarOpen: state => state.sidebarOpen,
                projects: state => state.projects.data
            }),
            projectsLinks(){
                return this.projects.map(element => {
                    return {
                        title: element.title,
                        icon: "dashboard",
                        name: "project",
                        params: {id: element.id}
                    }
                })
            }
        },
        components: {
            "sidebar-item": SideBarItem
        }
    }

    /*

     <template v-for="(item, i) in items">

     <!-- If header item -->
     <v-layout
     row
     v-if="item.heading"
     align-center
     :key="i">

     <v-flex xs6>
     <v-subheader v-if="item.heading">
     {{ item.heading }}
     </v-subheader>
     </v-flex>
     </v-layout>

     <!-- If the item has children -->
     <v-list-group
     v-else-if="item.children"
     v-model="item.model"
     no-action>

     <!-- Header for child elements -->
     <v-list-item slot="item" >
     <v-list-tile>
     <v-list-tile-action>
     <v-icon v-if="item.model">
     {{item.icon}}
     </v-icon>
     <v-icon v-else>
     {{item.iconAlt}}
     </v-icon>
     </v-list-tile-action>
     <v-list-tile-content>
     <v-list-tile-title>
     {{ item.text }}
     </v-list-tile-title>
     </v-list-tile-content>
     </v-list-tile>
     </v-list-item>

     <!-- All the child elements -->
     <v-list-item
     v-for="(child, i) in item.children"
     :key="i"
     v-on:click="linksTo(child.name, child.params)">

     <v-list-tile>
     <v-list-tile-action v-if="child.icon">
     <v-icon>{{ child.icon }}</v-icon>
     </v-list-tile-action>
     <v-list-tile-content>
     <v-list-tile-title>
     {{ child.text }}
     </v-list-tile-title>
     </v-list-tile-content>
     </v-list-tile>

     </v-list-item>
     </v-list-group>

     <!-- If the item has no children -->
     <v-list-item v-else v-on:click="linksTo(item.name, item.params)">
     <v-list-tile>
     <v-list-tile-action>
     <v-icon>{{ item.icon }}</v-icon>
     </v-list-tile-action>
     <v-list-tile-content>
     <v-list-tile-title>
     {{ item.text }}
     </v-list-tile-title>
     </v-list-tile-content>
     </v-list-tile>
     </v-list-item>
     </template>

     {{ item.model ? item.icon : item.iconAlt }}
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
     */
</script>