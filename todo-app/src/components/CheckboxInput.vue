<script setup>
import { defineProps } from 'vue';

defineProps({
    taskId: {
        type: Number,
        required: true
    }
});
</script>

<template>
    <input class="hidden" type="checkbox" :id="taskId"/>
</template>