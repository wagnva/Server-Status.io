<template>
    <div class="center-completely">
        <v-progress-circular
                indeterminate class="amber--text darken-2"
                size="50">
        </v-progress-circular>
    </div>
</template>

<script>
    export default {
        mounted(){
            const toBeLoaded = this.toLoad();
            const keys = Object.keys(toBeLoaded);
            const values = Object.values(toBeLoaded);

            //go through every promise
            Promise.all(values)
                .then((responses) => {
                    //go through all the responses
                    responses.forEach((response, index) => {

                        const data = response.data;

                        //call the mutations method (key)
                        this.$store.commit(keys[index], data);

                    });

                    //call the finish function
                    this.isFinished();
                });

        },
        props: {
            toLoad: {
                type: Function,
                required: true
            },
            isFinished: {
                type: Function,
                required: true
            }
        }
    }
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