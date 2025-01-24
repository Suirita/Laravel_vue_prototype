<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const showModal = ref(false); // Controls modal visibility
const name = ref(""); // Bind name input
const email = ref(""); // Bind email input
const password = ref(""); // Bind password input
const users = ref([]); // Holds user data from the backend

// Function to show the modal
const ShowModal = () => {
    showModal.value = true;
};

// Function to close the modal
const closeModal = () => {
    showModal.value = false;
};

// Fetch existing users on mount
onMounted(async () => {
    try {
        const res = await axios.get("/users/index");
        users.value = res.data; // Assign response data
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});

// Function to handle form submission
const submitForm = async () => {
    try {
        const res = await axios.post("/submit-form", {
            name: name.value,
            email: email.value,
            password: password.value,
        });
        users.value.push(res.data); // Update users list
        closeModal(); // Close the modal after submission
    } catch (error) {
        console.error("Error submitting form:", error);
    }
};
</script>

<template>
    <div>
        <h2>HOME</h2>
        <router-link to="/test">Take me to Test page</router-link>
        <button @click="ShowModal">Show Modal</button>

        <!-- Users List -->
        <div v-if="users.length">
            <h3>Users List</h3>
            <ul>
                <li v-for="(user, index) in users" :key="index">
                    Name: {{ user.name }}, Email: {{ user.email }}
                </li>
            </ul>
        </div>

        <!-- Modal -->
        <div v-if="showModal" class="modal">
            <div class="modal-content">
                <h3>Form Modal</h3>
                <form @submit.prevent="submitForm">
                    <label for="name">Name:</label>
                    <input
                        v-model="name"
                        type="text"
                        id="name"
                        name="name"
                        required
                    />

                    <label for="email">Email:</label>
                    <input
                        v-model="email"
                        type="email"
                        id="email"
                        name="email"
                        required
                    />

                    <label for="password">Password:</label>
                    <input
                        v-model="password"
                        type="password"
                        id="password"
                        name="password"
                        required
                    />

                    <button type="submit">Submit</button>
                </form>
                <button @click="closeModal">Close</button>
            </div>
        </div>
    </div>
</template>

<style>
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

button {
    margin-top: 10px;
}
</style>
