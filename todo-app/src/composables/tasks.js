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

    const deleteTask = async (taskId, taskIndex) => {
        try {
            const response = await fetch(`${baseUrl}/tasks/${taskId}`, {
                method: 'DELETE',
            });

            if (taskIndex !== -1) {
                tasks.value.splice(taskIndex, 1);
            }
        } catch (error) {
            console.log(error);
        }
    };

    const completeUncompleteTask = async (taskId, isCompleted) => {
        try {
            const response = await fetch(`${baseUrl}/tasks/${taskId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(
                    { is_completed: isCompleted }
                )
            });

            console.log(response);
        } catch (error) {
            console.log(error);
        }
    };

    return {
        tasks,
        allTasks,
        insertNewTask,
        deleteTask,
        completeUncompleteTask
    };
}