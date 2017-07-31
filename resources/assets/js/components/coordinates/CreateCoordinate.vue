<template>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Coordinate</div>
                <div class="panel-body">
                    <form @submit.prevent="create">
                        <div class="form-group">
                            <label>Coordinates</label>
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
    export default {
        data() {
            return {
                coordinates: '',
            }
        },

        methods: {
            create() {
                this.$validator.validateAll().then(result => {
                    if(result) {
                        var data = {coordinates: this.coordinates}
                        this.$http.post('/api/coordinates', data)
                            .then(response => {
                                this.$router.push('/coordinates');
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