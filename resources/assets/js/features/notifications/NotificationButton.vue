<template>
    <v-btn  icon
            light
            @click.native="click">

        <div>
            <v-icon class="icon">assignment</v-icon>
        </div>

    </v-btn>
</template>

<script>
    export default {
        methods: {
            click(){
                this.$store.commit("notifications/switchWindow");
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>