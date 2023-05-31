<script setup>
import CheckboxInput from './CheckboxInput.vue';
import TaskLabel from './TaskLabel.vue';
</script>

<template>
    <div>
        <CheckboxInput />
        <TaskLabel><slot></slot></TaskLabel>
    </div>
</template>