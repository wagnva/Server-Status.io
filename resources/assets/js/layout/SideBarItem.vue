<template>
    <div>

        <!-- If the item has children -->
        <v-list-group
                v-if="hasChildren"
                v-model="model"
                no-action>

            <!-- Header for child elements -->
            <v-list-tile slot="item">
                <v-list-tile-action>
                    <v-icon v-if="model">
                        {{icon}}
                    </v-icon>
                    <v-icon v-else>
                        {{iconAlt}}
                    </v-icon>
                </v-list-tile-action>

                <v-list-tile-content>
                    <v-list-tile-title>
                        {{ title }}
                    </v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>

            <!-- All the child elements -->
            <v-list-item
                    v-for="(child, i) in children"
                    :key="i"
                    v-on:click.native="linksTo(child.name, child.params)">

                <v-list-tile>
                    <v-list-tile-action v-if="child.icon">
                        <v-icon>{{ child.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>
                            {{ child.title }}
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>

            </v-list-item>

        </v-list-group>

        <!-- If the item has no children -->
        <v-list-item v-else v-on:click="linksTo">
            <v-list-tile>
                <v-list-tile-action>
                    <v-icon>{{icon}}</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title>
                        {{title}}
                    </v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list-item>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                model: true
            }
        },
        methods: {
            linksTo(){
                //only link if the item has no children
                if(this.hasChildren){return;}

                this.$router.push({
                    name: this.name,
                    params: this.params
                });
            }
        },
        mounted(){
            console.log(this.$refs);
        },
        computed: {
            hasChildren(){
                return this.children.length !== 0;
            }
        },
        props: {
            title: {type: String, required: true},
            name: {type: String, default: ""},
            icon: {type: String, default: "keyboard_arrow_down"},
            iconAlt: {type: String, default: "keyboard_arrow_up"},
            params: {type: Object, default: ()=>{return {}}},
            children: {type: Array, default: ()=>{return []}}
        }
    }
</script>