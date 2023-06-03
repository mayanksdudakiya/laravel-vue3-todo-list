<script setup>
import CheckboxInput from '@components/CheckboxInput.vue';
import TaskLabel from '@components/TaskLabel.vue';
import { defineProps } from 'vue';

defineProps({
    taskId: {
        type: Number,
        required: true
    }
});
</script>

<template>
    <div>
        <CheckboxInput :task-id="taskId"/>
        <TaskLabel :task-id="taskId"><slot></slot></TaskLabel>
    </div>
</template>