<template>
    <v-card>
        <v-card-text class="mt-2">
            <div>
                {{title}}
            </div>
        </v-card-text>
    </v-card>
</template>

<script>
    export default {
        data(){
            return {
                title: "Hello World!"
            }
        }
    }
</script>