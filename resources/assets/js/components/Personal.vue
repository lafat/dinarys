<template>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Personal Info</div>
            <div class="panel-body">
                <form @submit.prevent="update">
                    <!--
                    <div class="form-group">
                        <input type="file" class="form-control" @change="imageChanged">
                    </div>
                    -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model="name" class="form-control" type="text" placeholder="Name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" placeholder="Email" id="email"
                               v-validate="'required|email'"
                               v-model="email">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea v-model="description" rows="10" class="form-control" id="description" placeholder="Description"></textarea>
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary pull-right">
                </form>
            </div>
        </div>
    </div>
</template>

<style>
    textarea {
        resize: none;
        overflow: auto;
    }
</style>

<script>
    export default {

        data() {
            return {
                name: '',
                user_id: '',
                email: '',
                description: '',
                //avatar: '',
            }
        },

        created() {
            this.$http.get('/api/profile')
                .then(response => {
                    var user = response.body

                    this.name = user.name
                    this.user_id = user.id
                    this.email = user.email
                    this.description = user.description
                    //this.avatar = user.avatar
                });
        },

        methods: {

//            imageChanged(e){
//                console.log(e.target)
//
//                var fileReader = new FileReader()
//                fileReader.readAsDataURL(e.target.files[0])
//
//                fileReader.onload = (e) => {
//                    this.avatar = e.target.result
//                }
//            },

            update(){
                this.$validator.validateAll().then(result => {
                    if (result) {
                        var data = {
                            name: this.name,
                            email: this.email,
                            description: this.description,
                        }

                        this.$http.put('/api/profile/' + data.id, data)
                            .then(response => {
                                console.log(response)
                            })
                    }
                })
            }
        }
    }
</script>