<script setup>
defineProps({
    type: { type: String, default: 'info' },
});
</script>

<template>
    <div :class="type === 'danger' ? 'text-red-700' : 'text-neutral-700'">
        <slot />
    </div>
</template>
