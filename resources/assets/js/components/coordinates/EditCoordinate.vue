<template>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Coordinate</div>
                <div class="panel-body">
                    <form @submit.prevent="update">
                        <div class="form-group">
                            <label>Coordinates</label>
                            <div class="help-block alert alert-danger" v-show="errors.has('coordinates')">{{ errors.first('coordinates') }}</div>
                            <textarea class="form-control" rows="8" placeholder="Enter coordinates" name="coordinates"
                                      v-model="coordinates"
                                      v-validate="'required'">

                            </textarea>
                            <div class="help-block alert alert-danger" v-show="errors.has('coordinates')">{{ errors.first('coordinates') }}</div>
                        </div>
                        <input type="submit" class="btn btn-success pull-right" value="+ Add Coordinates">
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import swal from 'sweetalert'

    export default {
        created() {
            this.getCoordinates()
        },

        data() {
            return {
                coordinates: '',
            }
        },

        methods: {
            getCoordinates() {
                this.$http.get('/api/coordinates/' + this.$route.params.coordinates)
                    .then(response => {
                        this.coordinates = response.body.coordinates
                    })
            },

            update() {
                this.$validator.validateAll().then(result => {
                    if (result) {
                        var data = {coordinates: this.coordinates}
                        this.$http.put('/api/coordinates/' + this.$route.params.coordinates, data)
                            .then(response => {
                                swal("Updated", "Yor coordinates has been updated", "success");
                            })
                    }
                })
            }
        }
    }
</script>

<style>
    textarea {
        resize: none;
    }
</style>