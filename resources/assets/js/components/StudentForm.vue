<template>
    <div class="container">
        <div class="large-12 medium-12 small-12 cell">
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" v-model="name" />
                </div>
                <div class="form-group">
                    <label for="sid">S-ID</label>
                    <input class="form-control" name="sid" v-model="sid" />
                </div>
                <button v-on:click="submitStudent()">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: null,
                sid: null,
            };
        },

        methods: {
            submitStudent() {
                event.preventDefault();

                axios.post('/api/students', {
                    name: this.name,
                    sid: this.sid
                })
                .then(response => {
                    this.$emit('studentSubmitted', response.data);
                })
                .catch(function(){
                    console.log('FAILURE!!');
                });
            }
        }
    }
</script>
