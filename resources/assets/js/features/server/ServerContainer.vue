<template>
    <div>
        Server Container
        <p>{{server.address}}</p>
        <p>every {{server.timeBetweenRepeats}} minutes</p>
        {{date}}
    </div>
</template>

<script>
    export default {
        computed: {
            server(){
                return this.$store.getters["server/withId"](this.$route.params.serverId);
            },
            current(){
                return this.$store.getters["statuses/current"](this.$route.params.serverId);
            },
            date(){
                return this.moment(this.current.created_at).format("DD. MM. YYYY");
            }
        }
    }
</script>