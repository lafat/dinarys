<template>
    <div class="row">
        <h2>Coordinates List</h2>
        <router-link to="/coordinates/create" class="btn btn-primary">
            + Add Coordinates
        </router-link>
        <hr>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Coordinates</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="coordinate in coordinates">
                    <td>{{ coordinate.coordinates }}</td>
                    <td>
                        <router-link :to="'/coordinates/' + coordinate.id + '/edit'" class="btn btn-primary">
                            Edit
                        </router-link>
                        <button @click="deleteCoordinates(coordinate)" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    import swal from 'sweetalert'

    export default {
        data() {
            return {
                coordinates: {}
            }
        },

        created() {
            this.$http.get('/api/coordinates/')
                .then(response => {
                    this.coordinates = response.body
                })
        },

        methods: {
            deleteCoordinates(coordinate) {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this coordinates?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },

                function(){
                    this.$http.delete('/api/coordinates/' + coordinate.id)
                        .then(response => {
                            let index = this.coordinates.indexOf(coordinate)

                            this.coordinates.splice(index, 1)

                            swal("Deleted!", "Your coordinates has been deleted.", "success");
                        })
                }.bind(this)
                );
            }
        }
    }
</script>