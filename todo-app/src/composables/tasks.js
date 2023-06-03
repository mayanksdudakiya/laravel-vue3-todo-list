import { ref } from 'vue'

export default function useTasks() {
    const addNewTask = ref([]);
    const tasks = ref([]);
    const errors = ref('');

    const allTasks = async () => {
        try {
            const response = await fetch(import.meta.env.VITE_API_URL+'/tasks');
            tasks.value = await response.json();
        } catch (error) {
            console.error(error);
        }
    };

    return {
        addNewTask,
        tasks,
        allTasks
    };
}