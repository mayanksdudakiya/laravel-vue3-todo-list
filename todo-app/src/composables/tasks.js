import { inject, ref } from 'vue'

const tasks = ref([]);

export default function useTasks() {

    const baseUrl = inject('baseUrl');

    const allTasks = async () => {
        try {
            const response = await fetch(`${baseUrl}/tasks`);
            const responseJson = await response.json();
            tasks.value = responseJson.data;
        } catch (error) {
            console.error(error);
        }
    };

    const insertNewTask = async (newTask) => {
        try {
            const response = await fetch(`${baseUrl}/tasks`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(
                    { title: newTask }
                )
            });

            const jsonData = await response.json();
            tasks.value.push(jsonData.data);
        } catch (error) {
            console.error(error);
        }
    };

    return {
        insertNewTask,
        tasks,
        allTasks
    };
}