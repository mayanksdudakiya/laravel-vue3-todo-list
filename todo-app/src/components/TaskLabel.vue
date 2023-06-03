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
    <label :for="taskId">
        <span class="inline-flex items-center justify-center w-5 h-5 text-transparent border-2 border-gray-500 rounded-full">
            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </span>
        <span class="ml-4 text-sm">
            <slot></slot>
        </span>
    </label>
</template>
