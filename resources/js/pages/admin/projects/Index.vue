
<script setup>
import { Form, Head, Link, usePage } from '@inertiajs/vue3';
import { watch } from 'vue';
import { toast } from 'vue-sonner';
import ProjectController from '@/actions/App/Http/Controllers/Admin/ProjectController';
import { Button } from '@/components/ui/button';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';
import { create, index, edit } from '@/routes/admin/projects';

defineOptions({
    layout: {
        breadcrumbs: [{ title: 'Projets', href: index() }],
    },
});

defineProps({
    projects: Array,
});

// Notification après une action réussie
const page = usePage();

watch(
    () => page.props.flash?.success,
    (message) => {
        if (message) {
            toast.success(message);
        }
    },
    { immediate: true }
);
</script>

<template>
    <Head title="Projets" />

    <div class="space-y-4 p-4">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-semibold">Projets</h1>

            <Button as-child>
                <Link :href="create()">Nouveau projet</Link>
            </Button>
        </div>

        <Table>
            <TableHeader>
                <TableRow>
                    <TableHead>Titre</TableHead>
                    <TableHead>Adresse</TableHead>
                    <TableHead class="text-right">Actions</TableHead>
                </TableRow>
            </TableHeader>

            <TableBody>
                <TableRow v-for="project in projects" :key="project.id">
                    <TableCell class="font-medium">
                        {{ project.title }}
                    </TableCell>

                    <TableCell>
                        /projets/{{ project.slug }}
                    </TableCell>

                    <TableCell>
                        <div class="flex justify-end gap-2">
                            <Button variant="outline" size="sm" as-child>
                                <Link :href="edit(project)">
                                    Modifier
                                </Link>
                            </Button>

                            <Dialog>
                                <DialogTrigger as-child>
                                    <Button variant="destructive" size="sm">
                                        Supprimer
                                    </Button>
                                </DialogTrigger>

                                <DialogContent>
                                    <Form
                                        v-bind="ProjectController.destroy.form(project)"
                                        :options="{
                                            preserveScroll: true,
                                        }"
                                        class="space-y-6"
                                        v-slot="{ processing }"
                                    >
                                        <DialogHeader class="space-y-3">
                                            <DialogTitle>
                                                Êtes-vous sûr de vouloir supprimer ce projet ?
                                            </DialogTitle>

                                            <DialogDescription>
                                                Le projet
                                                <strong>{{ project.title }}</strong>
                                                sera définitivement supprimé.
                                                Cette action est irréversible.
                                            </DialogDescription>
                                        </DialogHeader>

                                        <DialogFooter class="gap-2">
                                            <DialogClose as-child>
                                                <Button
                                                    variant="secondary"
                                                    type="button"
                                                >
                                                    Annuler
                                                </Button>
                                            </DialogClose>

                                            <Button
                                                type="submit"
                                                variant="destructive"
                                                :disabled="processing"
                                            >
                                                Confirmer la suppression
                                            </Button>
                                        </DialogFooter>
                                    </Form>
                                </DialogContent>
                            </Dialog>
                        </div>
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
    </div>
</template>
