<script setup>
import axios from "axios";
import { ref } from "vue";

const showModal = ref(false); // Controls modal visibility

// Function to fetch data from the API and show the modal
const ShowModal = () => {
    showModal.value = true; // Show the modal
};

// Function to close the modal
const closeModal = () => {
    showModal.value = false;
};
</script>

<template>
    <div>
        <h2>HOME</h2>
        <router-link to="/test">Take me to Test page</router-link>
        <button @click="ShowModal">Trigger Endpoint</button>

        <!-- Modal -->
        <div v-if="showModal" class="modal">
            <div class="modal-content">
                <h3>Form Modal</h3>
                <form @submit.prevent="closeModal">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required />
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required />
                    <button type="submit">Submit</button>
                </form>
                <button @click="closeModal">Close</button>
            </div>
        </div>
    </div>
</template>

<style>
/* Add some simple styles for the modal */
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
