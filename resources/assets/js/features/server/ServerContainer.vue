<template>
    <div>
        Server Container
        <p>{{server.address}}</p>
        <p>every {{server.timeBetweenRepeats}} minutes</p>
    </div>
</template>

<script>
    export default {
        computed: {
            server(){
                return this.$store.getters["server/withId"](this.$route.params.serverId);
            }
        }
    }
</script>