<script setup>
import TaskIcon from '../components/icons/TaskIcon.vue';
import TaskItem from '../components/TaskItem.vue';
import AddNewTask from '../components/AddNewTask.vue';
</script>

<template>
    <div class="flex items-center justify-center w-screen h-screen font-medium">

    	<div class="flex flex-grow items-center justify-center bg-gray-900 h-full">
    		<!-- Component Start -->
    		<div class="max-w-full p-8 bg-gray-800 rounded-lg shadow-lg w-96 text-gray-200">
    			<div class="flex items-center mb-6">
                    <TaskIcon/>
    				<h4 class="font-semibold ml-3 text-lg">Tasks List</h4>
    			</div>
                <TaskItem>Eavesdrop on Master Frodo & Gandalf.</TaskItem>
                <TaskItem>Boil, mash, and stick potatoes in stew.</TaskItem>
                <TaskItem>Carry Frodo.</TaskItem>
                <TaskItem>Be all round legend.</TaskItem>

                <AddNewTask />
    		</div>
    		<!-- Component End  -->
    	</div>
    </div>
</template>
