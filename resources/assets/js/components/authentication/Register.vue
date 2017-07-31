<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form @submit.prevent="register">
                        <div class="form-group">
                            <input v-model="name" class="form-control" type="text" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <div class="help-block alert alert-danger" v-show="errors.has('email')">{{ errors.first('email') }}</div>
                            <input class="form-control" name="email" type="email" placeholder="Email"
                                   v-model="email"
                                   v-validate="'email|required'">
                        </div>
                        <div class="form-group">
                            <div class="help-block alert alert-danger" v-show="errors.has('password')">{{ errors.first('password') }}</div>
                            <input class="form-control" name="password" type="password" placeholder="Password"
                                   v-model="password"
                                   v-validate="'required'">
                        </div>
                        <input type="submit" class="btn btn-primary pull-right" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                password: ''
            }
        },

        methods: {

            register(){
                this.$validator.validateAll().then(result => {
                    if (result) {
                        var data = {
                            name: this.name,
                            email: this.email,
                            password: this.password
                        }
                        this.$http.post('api/register/', data)
                            .then(response => {
                                this.$router.push('/login')
                                swal("Success!", "Data successfully updated", "success")
                            })
                    }
                })
            }
        }
    }
</script>
