<script setup>
import CheckboxInput from '@components/CheckboxInput.vue';
import TaskLabel from '@components/TaskLabel.vue';
</script>

<template>
    <div>
        <CheckboxInput />
        <TaskLabel><slot></slot></TaskLabel>
    </div>
</template>