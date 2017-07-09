<template>
    <form>
        <v-layout row wrap>

            <v-flex xs12 sm12 lg2>
                <h4 class="form_title hidden-md-and-down">Title</h4>
            </v-flex>
            <v-flex xs12 sm12 lg10>
                <v-text-field
                        name="title"
                        label="Project Title"
                        id="project_title"
                        v-model="title"
                        required>
                </v-text-field>
            </v-flex>

            <v-flex xs12 sm12 lg2>
                <h4 class="form_title hidden-md-and-down">Description</h4>
            </v-flex>
            <v-flex xs12 sm12 lg10>
                <v-text-field
                        name="description"
                        label="Project Description"
                        id="project_title"
                        v-model="description"
                        multi-line
                        required>
                </v-text-field>
            </v-flex>

            <v-flex xs12>
                <v-btn
                    light
                    large
                    class="amber darken-1 submit white--text"
                    v-on:click.native="onSubmit"
                    :loading="loading"
                    type="submit">
                Create Project
                </v-btn>

            </v-flex>

        </v-layout>

    </form>
</template>

<script>
    export default{
        data(){
            return {
                title: "",
                description: "",
                snackbar: false,
                loading: false
            }
        },
        methods: {
            onSubmit(event){

                if(this.is.notEmpty(this.title)
                && this.is.notEmpty(this.description)){
                    event.preventDefault();

                    this.loading = true;

                    this.$store.dispatch("projects/create", {
                        title: this.title,
                        description: this.description,
                        cb: (promise) => {
                            promise.then(() => {
                                this.loading = false;
                                this.$router.push({
                                    name: "project",
                                    params: {id: 1} //todo fix
                                });
                            });
                        }
                    });
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .form_title{
        font-size: 20px;
        text-align: center;
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        margin-bottom: 0;
        padding-bottom: 20px;

        @media screen and (max-width: 1440px){
            text-align: left;
            padding-bottom: 0px;
        }
    }
    .submit{
        float: right;
        margin-right: 4%;
    }
</style>