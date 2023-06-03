<script setup>
import { ref } from 'vue'
import  useTasks  from '@composables/tasks'

const { insertNewTask } = useTasks();

const newTaskTitle = ref('');

function createTask() {
    insertNewTask(newTaskTitle.value);
    newTaskTitle.value = '';
}
</script>
<template>
    <form class="flex items-center w-full" @submit.prevent="createTask">
        <button type="submit" class="flex-grow h-8 px-2 mt-2 text-sm font-medium rounded">
            <svg class="w-5 h-5 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </button>

        <input v-model="newTaskTitle" name="title" type="text" class="flex-grow h-8 ml-4 bg-transparent focus:outline-none font-medium"  placeholder="add a new task"/>
    </form>
</template>