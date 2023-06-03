<script setup>
import CheckboxInput from '@components/CheckboxInput.vue';
import TaskLabel from '@components/TaskLabel.vue';
import { defineProps } from 'vue';
import useTasks  from '@composables/tasks';

const { deleteTask } = useTasks();

defineProps({
    taskId: {
        type: Number,
        required: true
    },
    taskIndex: {
        type: Number,
        required: true
    }
});
</script>

<template>
    <div class="flex items-center h-10 px-2 rounded cursor-pointer hover:bg-gray-900">
        <CheckboxInput :task-id="taskId"/>
        <TaskLabel :task-id="taskId"><slot></slot></TaskLabel>

        <a @click="deleteTask(taskId, taskIndex)" href="javascript:void(0);" class="flex-wrap ml-5 underline hover:text-red-600" >X</a>
    </div>
</template>