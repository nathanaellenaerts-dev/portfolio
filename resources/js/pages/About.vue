<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="À propos" />

    <main class="about space-y-12">

        <header class="about-header space-y-4">
            <h1 class="text-3xl font-bold">À propos de moi</h1>
            <h2 class="text-xl font-semibold">
                Derrière chaque ligne de code, une idée à concrétiser.
            </h2>

            <div class="space-y-4">
                <p>
                    Je m'appelle [Prénom] et je suis développeur web en formation
                    à l'IFOSUP Wavre, avec l'ambition de faire de cette passion
                    mon métier.
                </p>

                <p>
                    Ce qui m'attire dans le développement web, c'est avant tout
                    la possibilité de partir d'une idée et de la transformer en
                    quelque chose de concret. J'aime autant réfléchir à la manière
                    dont un projet doit fonctionner que prendre le temps de
                    construire une interface agréable, intuitive et cohérente.
                </p>

                <p>
                    Au fil de ma formation et de mes différents projets, j'ai
                    découvert un domaine qui correspond à ma façon de penser :
                    comprendre, analyser, chercher des solutions et constamment
                    apprendre de nouvelles choses.
                </p>

                <p>
                    Chaque difficulté est une occasion de progresser et chaque
                    projet représente un nouveau défi.
                </p>
            </div>
        </header>

        <section class="about-vision space-y-4">
            <h2 class="text-2xl font-bold">Ma vision du développement</h2>

            <div class="space-y-4">
                <p>
                    Pour moi, un bon site web ne se limite pas à un beau design
                    ou à quelques fonctionnalités.
                </p>

                <p>
                    Il doit avant tout répondre à un besoin, faciliter la vie
                    de ses utilisateurs et offrir une expérience agréable.
                </p>

                <p>
                    J'accorde donc une importance particulière à trois aspects :
                </p>
            </div>

            <ul class="list-disc pl-6 space-y-3">
                <li>
                    <strong>La réflexion :</strong>
                    comprendre les besoins avant de commencer à développer,
                    afin de proposer une solution réellement adaptée.
                </li>

                <li>
                    <strong>La qualité :</strong>
                    privilégier un code structuré, lisible et maintenable,
                    tout en accordant de l'attention aux détails.
                </li>

                <li>
                    <strong>L'expérience :</strong>
                    concevoir des interfaces intuitives, accessibles
                    et agréables à utiliser.
                </li>
            </ul>

            <div class="space-y-4">
                <p>
                    Je pense également qu'un bon développeur ne cesse jamais
                    d'apprendre.
                </p>

                <p>
                    Les technologies évoluent, les méthodes changent et il y a
                    toujours de nouvelles choses à découvrir.
                </p>

                <p>
                    C'est aussi ce qui rend ce métier particulièrement stimulant.
                </p>
            </div>
        </section>

        <section class="about-skills space-y-4">
            <h2 class="text-2xl font-bold">Mon univers technique</h2>

            <div class="space-y-4">
                <p>
                    Au cours de ma formation, j'ai développé des compétences
                    aussi bien en développement front-end qu'en back-end.
                </p>

                <p>
                    J'utilise notamment HTML, CSS, JavaScript, PHP, Laravel
                    et Vue.js pour concevoir des sites et applications web
                    dynamiques.
                </p>

                <p>
                    Je m'intéresse également à la gestion des bases de données,
                    à la conception d'applications et au développement de
                    fonctionnalités personnalisées.
                </p>

                <p>
                    Je cherche à aller au-delà de la simple réalisation visuelle
                    d'un site : comprendre son fonctionnement dans son ensemble
                    me permet de construire des solutions plus complètes et cohérentes.
                </p>
            </div>
        </section>

        <section class="about-personality space-y-4">
            <h2 class="text-2xl font-bold">Au-delà du code</h2>

            <div class="space-y-4">
                <p>
                    Je suis quelqu'un de curieux qui aime comprendre comment
                    les choses fonctionnent.
                </p>

                <p>
                    J'apprécie particulièrement les projets qui demandent de
                    la réflexion, de la créativité et une certaine capacité
                    à sortir des solutions toutes faites.
                </p>

                <p>
                    J'aime apprendre par la pratique, expérimenter différentes
                    approches et prendre le temps de comprendre ce que je construis.
                </p>

                <p>
                    Je préfère chercher à comprendre pourquoi une solution
                    fonctionne plutôt que simplement reproduire quelque chose
                    sans en saisir la logique.
                </p>
            </div>
        </section>

        <section class="about-contact space-y-4">
            <h2 class="text-2xl font-bold">Et maintenant ?</h2>

            <div class="space-y-4">
                <p>
                    Mon objectif est de mettre mes compétences au service
                    de projets concrets, d'accompagner des personnes et des
                    entreprises dans leurs besoins numériques et de continuer
                    à évoluer dans ce domaine.
                </p>

                <p>
                    Que ce soit pour créer un site vitrine, développer
                    une application web ou imaginer une fonctionnalité
                    sur mesure, chaque projet est une nouvelle opportunité
                    de créer quelque chose d'utile et de bien pensé.
                </p>

                <p>
                    <strong>
                        Vous avez une idée en tête ?
                        Je serais ravi d'en discuter avec vous.
                    </strong>
                </p>
            </div>

            <Link
                href="/contact"
                class="inline-block rounded-lg bg-blue-600 px-6 py-3 text-white hover:bg-blue-700 transition"
            >
                Me contacter
            </Link>
        </section>

    </main>
</template>
