<script setup>
defineProps({
    projects: Array,
});
</script>

<template>
    <h1>Mes projets</h1>

    <ul>
        <li v-for="project in projects" :key="project.slug">
            <img v-if="project.cover_url" :src="project.cover_url" alt="" width="300" />
            <h2>{{ project.title }}</h2>
            <p>{{ project.summary }}</p>
            <a :href="`/projets/${project.slug}`">Voir le projet</a>
        </li>
    </ul>
</template>
