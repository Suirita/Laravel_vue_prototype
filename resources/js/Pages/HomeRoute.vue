<script setup>
import axios from "axios";
import { ref } from "vue";

// Define the ref
const response = ref(null);

// Function to fetch data from the API
const getValue = async () => {
    response.value = await axios.get("/hello");
};
</script>

<template>
    <div>
        <h2>HOME</h2>
        <router-link to="/test">Take me to Test page</router-link>
        <button @click.prevent="getValue">Trigger Endpoint</button>
        <p v-if="response">{{ response.data.message }}</p>
    </div>
</template>
