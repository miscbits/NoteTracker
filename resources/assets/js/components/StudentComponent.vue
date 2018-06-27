<template>
    <div class="card card-default">
        <div class="card-body">
            <p>{{ student.name }}</p>
            <p>{{ student.sid }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['student'],

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
