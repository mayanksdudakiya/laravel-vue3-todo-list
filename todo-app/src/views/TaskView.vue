<script setup>
import TaskIcon from '@components/icons/TaskIcon.vue'
import TaskItem from '@components/TaskItem.vue'
import AddNewTask from '@components/AddNewTask.vue'
import { onMounted } from 'vue'
import  useTasks  from '@composables/tasks'

const { tasks, allTasks } = useTasks();
onMounted(allTasks);
</script>

<template>
    <div class="flex items-center justify-center w-screen h-screen font-medium">
    	<div class="flex flex-grow items-center justify-center bg-gray-900 h-full">
    		<div class="max-w-full p-8 bg-gray-800 rounded-lg shadow-lg w-96 text-gray-200">
    			<div class="flex items-center mb-6">
                    <TaskIcon/>
    				<h4 class="font-semibold ml-3 text-lg">Tasks List</h4>
    			</div>

				<TaskItem v-for="task in tasks.data" :key="task.id">{{ task.title }}</TaskItem>

                <AddNewTask />
    		</div>
    	</div>
    </div>
</template>