<template>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <span class="navbar-brand">Dinarys Test</span>
            </div>
            <ul class="nav navbar-nav pull-right">
                <router-link tag="li" to="/main">
                    <a>Main</a>
                </router-link>
                <router-link tag="li" to="/login" v-if="!isAuth">
                    <a>Login</a>
                </router-link>
                <router-link tag="li" to="/register" v-if="!isAuth">
                    <a>Register</a>
                </router-link>

                <router-link tag="li" to="/coordinates" v-if="isAuth">
                    <a>Coordinates</a>
                </router-link>
                <router-link tag="li" to="/personal" v-if="isAuth">
                    <a>Personal</a>
                </router-link>

                <li v-if="isAuth"><a @click.prevent="logout" href="#">Logout</a></li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                isAuth: null
            }
        },

        created() {
            this.isAuth = this.$auth.isAuthenticated()

            if(this.isAuth)
                this.setAuthenticatedUser()
        },

        methods: {
            setAuthenticatedUser() {
                this.$http.get('/api/profile')
                    .then(response => {
                        this.$auth.setAuthenticatedUser(response.body)
                    })
            },

            logout() {
                this.$auth.destroyToken()
                this.$router.go('/login')
            }
        }
    }
</script>