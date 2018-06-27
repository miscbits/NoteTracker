<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
            	<div v-for="student in students">
                    <a v-on:click="selectStudent(student)">
                        <student
                            v-bind:key="student.id"
                            v-bind:student="student"
                        ></student>
                    </a>
            	</div>
                <student-form @studentSubmitted="onSubmitStudent"></student-form>
            </div>
            <div class="col-md-8">
                <div v-if="selectedStudent">
                    <note-form @noteSubmitted="onSubmitNote" v-bind:student="selectedStudent"></note-form>
                </div>
                <div v-for="note in notes" class="card card-default">
	                <note 
	                    v-bind:key="note.id"
	                    v-bind:note="note"
	                ></note>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                students: [],
                notes: [],
                selectedStudent: null
            };
        },

        created: function () {
            this.getStudents();
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            /**
             * Get all of the authorized tokens for the user.
             */
            getStudents() {
                axios.get('/api/students')
                        .then(response => {
                            this.students = response.data;
                            this.selectStudent(this.students[0]);
                        });
            },



            getStudentNotes(studentId) {
                axios.get('/api/students/' + studentId + '/notes')
	                .then(response => {
	                    this.notes = response.data.reverse();
	                });

            },

            selectStudent(student) {
                this.selectedStudent = student;
                this.getStudentNotes(this.selectedStudent.id);
            },

            onSubmitNote (value) {
                this.notes.unshift(value);
            },

            onSubmitStudent(value) {
                this.students.push(value);
            }
        }

    }
</script>
