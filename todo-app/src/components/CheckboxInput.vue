<script setup>
import { defineProps } from 'vue';

defineProps({
    task: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <input class="hidden" type="checkbox" :id="task.id" :checked="task.is_completed"/>
</template>