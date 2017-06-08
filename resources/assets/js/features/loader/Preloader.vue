<template>
    <div class="center-completely">
        <v-progress-circular
                indeterminate class="amber--text darken-2"
                size="50">
        </v-progress-circular>
    </div>
</template>

<script>

    //component that loads data and shows spinner while doing so
    //abstract
    //event method: to-load (what should be loaded) -> should return promises
    //event method: is-finished (called when finished)
    //allows this component to be used for the general preloading
    //and also when loading other small stuff in the pages

    export default {
        mounted(){
            const toBeLoaded = this.$emit("to-load");
            console.log(toBeLoaded);
        }
    }
    //["to-load", "is-finished"]
</script>

<style lang="scss" scoped>
    .center-completely{
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>