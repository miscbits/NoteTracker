<template>
    <div class="card card-default">
        <div class="card-body">
            <p>{{ note.note }}</p>
        </div>
        <div class="card-footer">{{ note.updated_at }}</div>
    </div>
</template>

<script>
    export default {

        props: ['note'],

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
