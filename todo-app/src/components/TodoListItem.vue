<script setup>
import CheckboxInput from './CheckboxInput.vue';
import TodoLabel from './TodoLabel.vue';
</script>

<template>
    <div>
        <CheckboxInput />
        <TodoLabel><slot></slot></TodoLabel>
    </div>
</template>