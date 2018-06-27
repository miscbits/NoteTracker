<template>
    <div class="container">
        <div class="large-12 medium-12 small-12 cell">
            <form>
                <div class="form-group">
                    <label for="note">Description</label>
                    <textarea class="form-control" name="note" v-model="note"></textarea>
                </div>
                <button v-on:click="submitNote()">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                note: null,
            };
        },

        props: ['student'],

        methods: {
            submitNote() {
                event.preventDefault();

                axios.post('/api/students/' + this.student.id + "/notes", {
                    note: this.note,
                    user_id: this.getUserId()
                })
                .then(response => {
                    this.$emit('noteSubmitted', response.data);
                })
                .catch(function(){
                    console.log('FAILURE!!');
                });
            },

            getUserId(){
                return axios.get('api/user').id;
            }
        }
    }
</script>
