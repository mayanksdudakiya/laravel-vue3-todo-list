<script setup>
import TodoListIcon from '../components/icons/TodoListIcon.vue';
import TodoListItem from '../components/TodoListItem.vue';
import AddNewTask from '../components/AddNewTask.vue';
</script>

<template>
    <div class="flex items-center justify-center w-screen h-screen font-medium">

    	<div class="flex flex-grow items-center justify-center bg-gray-900 h-full">
    		<!-- Component Start -->
    		<div class="max-w-full p-8 bg-gray-800 rounded-lg shadow-lg w-96 text-gray-200">
    			<div class="flex items-center mb-6">
                    <TodoListIcon/>
    				<h4 class="font-semibold ml-3 text-lg">Todo List</h4>
    			</div>
                <TodoListItem>Eavesdrop on Master Frodo & Gandalf.</TodoListItem>
                <TodoListItem>Boil, mash, and stick potatoes in stew.</TodoListItem>
                <TodoListItem>Carry Frodo.</TodoListItem>
                <TodoListItem>Be all round legend.</TodoListItem>

                <AddNewTask />
    		</div>
    		<!-- Component End  -->
    	</div>
    </div>
</template>
