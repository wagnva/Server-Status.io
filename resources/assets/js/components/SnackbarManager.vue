<template>
    <div>
        <v-snackbar
                v-for="(item, index) in all"
                :key="index"
                :timeout="item.timeout"
                :multi-line="item.multiline"
                v-model="item.visible"
                top
                right
                vertical>

            {{msg(item.msg)}}
            {{timeoutFix(index)}}

            <v-btn flat class="amber--text darken-1" @click.native="hide(index)">Close</v-btn>
        </v-snackbar>

    </div>
</template>

<script>
    export default {
        data(){
            return {
            }
        },
        methods: {
            hide(index){
                this.$store.commit("snackbar/remove", {
                    index: index
                })
            },
            msg(msg){
                if(this.is.String(msg)){return msg}
                if(this.is.Array(msg)){
                    return msg.reduce((full, element) => full + element + "<br>");
                }
            },
            timeoutFix(index){
                //since the timeout of the snackbar doesnt seem to work
                ///manually remove it after the specified time
                setTimeout(
                    (() => this.hide(index)),
                    this.$store.state.snackbar.all[index].timeout
                );
            }
        },
        computed: mapState({
            all: (state) => state.snackbar.all
        })
    }
</script>